/* ----------------------------------------------------------
  Inject dynamic gradient colors
---------------------------------------------------------- */

var smartlink__colorlist = [];

function smartlink__set_gradients() {

    var rules = '';
    jQuery('[data-color]').each(function set_gradient() {
        var color = jQuery(this).attr('data-color');
        var color_exists = smartlink__colorlist.indexOf(color);
        if (color_exists >= 0) {
            return;
        }
        smartlink__colorlist.push(color);

        rules += '[data-color="' + color + '"] .gradient {';
        rules += 'background-image: -webkit-linear-gradient(top, ' + color + ', transparent);';
        rules += 'background-image: -moz-linear-gradient(top, ' + color + ', transparent);';
        rules += 'background-image: linear-gradient(top, ' + color + ', transparent);';
        rules += '}';
    });
    $jqbody.append('<style>' + rules + '</style>');

}

/* ----------------------------------------------------------
  Quotes
---------------------------------------------------------- */

function smartlink__set_quotes_slider() {
    function set_dkjsusliderquote() {

        var slider = jQuery(this);
        setSwipeEvent(slider.get(0));
        slider.on('swipetoleft', function() {
            slider.trigger('nextslide');
        });
        slider.on('swipetoright', function() {
            slider.trigger('prevslide');
        });

        function set_slider_size() {
            var newHeight = slider.find('[data-current-slide="1"] .loop-quote').height();
            slider.parent().css({
                'height': newHeight
            });
        }

        slider.on('sliderready', set_slider_size);
        jQuery(window).on('resize', set_slider_size);

        slider.dkJSUSlider({
            transition: function(oldSlide, newSlide, oldNb, nb) {
                var self = this;
                newSlide.css({
                    'opacity': 0,
                    'z-index': 2
                }).animate({
                    'opacity': 1
                }, 300);

                set_slider_size();

                setTimeout(function() {
                    oldSlide.css({
                        'z-index': 0
                    });
                    newSlide.css({
                        'z-index': 1
                    });
                    // Authorizing a new slide
                    self.canSlide = 1;
                }, 300);
            },
            showNavigation: 'special'
        });
    }
    jQuery('.strate-quote .strate-quote__list').each(set_dkjsusliderquote);
}

/* Top posts */

function smartlink__set_top_posts() {

    jQuery('.top-posts').each(function set_toppoststabs() {
        var $parent = jQuery(this),
            tabs = $parent.find('[data-for]'),
            tabs_content = $parent.find('.tab');

        tabs.on('click', function(e) {
            e.preventDefault();
            var $this = jQuery(this),
                data_for = $this.attr('data-for'),
                $target = $parent.find('.' + data_for);
            tabs.removeClass('current');
            tabs_content.removeClass('current');

            $this.addClass('current');
            $target.addClass('current');
            setTimeout(function() {
                tabs_content.find('.top-list').slick('setPosition');
            }, 50);
        });

    });

    function set_toppostsslider() {
        var slider = jQuery(this).find('.top-list');
        slider.slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            arrows: true,
            appendArrows: jQuery(this).find('.slider-actions'),
            appendDots: jQuery(this).find('.slider-actions'),
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }]
        });
    }
    jQuery('.top-list-container').each(set_toppostsslider);

}

/* ----------------------------------------------------------
  Home
---------------------------------------------------------- */

/* Slider */

function smartlink_home__set_slider() {
    function set_dkjsuslider() {
        var $this = jQuery(this);
        setSwipeEvent($this.get(0));
        $this.on('swipetoleft', function() {
            $this.trigger('nextslide');
        });
        $this.on('swipetoright', function() {
            $this.trigger('prevslide');
        });
        jQuery(this).dkJSUSlider({
            autoSlide: false,
            createNavigation: true
        });
    }
    jQuery('.home-slider .slider').each(set_dkjsuslider);
}

/* Slider video */

function smartlink_home__set_videoslider() {
    function set_videoslider() {
        jQuery(this).slick({
            centerMode: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                breakpoint: 767,
                settings: {
                    centerMode: false,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true
                }
            }]
        });
    }
    jQuery('.video-slider .slider').each(set_videoslider);
}

/* Slider Tweets */

function smartlink_home__set_twitterslider() {
    function set_twitterslider() {
        var slider = jQuery(this).find('.on-twitter__list');
        slider.slick({
            slidesToShow: 3,
            infinite: true,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            appendArrows: jQuery(this).find('.slider-actions'),
            appendDots: jQuery(this).find('.slider-actions'),
            autoplay: true,
            autoplaySpeed: 3500
        });
    }
    jQuery('.on-twitter__list-container').each(set_twitterslider);
}

/* ----------------------------------------------------------
  Load more
---------------------------------------------------------- */

function smartlink__set_loadmore() {

    var has_infinite_scroll = false,
        can_infinite_scroll = true,
        post_container = jQuery('ul.post-list'),
        buttonWrapper = false,
        button = false,
        buttonTop = 0;

    if (!post_container) {
        return;
    }

    function update__button() {
        button = jQuery('.cssc-button--loadmore');
        if (button.length > 0) {
            buttonWrapper = button.parent();
            var button_href = button.attr('href');
            button_href = button_href.replace('\?ajax=1', '');
            button_href = button_href.replace('\&ajax=1', '');
            button.attr('href', button_href);
            buttonTop = button.position().top;
        }
        else {
            has_infinite_scroll = false;
            button = false;
        }
    }
    update__button();

    if (!button) {
        return;
    }

    /* Load more function */
    function load_more() {
        if (button === false) {
            return;
        }

        can_infinite_scroll = false;
        buttonWrapper.addClass('loading');

        /* Appel page distante avec param ajax */
        jQuery.ajax({
            url: button.attr('href'),
            data: {
                ajax: 1
            },
            success: function(response) {

                var container = jQuery('<div></div>');
                container.html(response);

                /* Get & Inject posts */
                container.find('.post-list > li').each(function() {
                    post_container.append(jQuery(this));
                });

                /* New button */
                button.remove();
                var newButton = container.find('.cssc-button--loadmore');
                if (newButton) {
                    newButton.appendTo(buttonWrapper);
                    update__button();
                }

                setTimeout(function() {
                    buttonWrapper.removeClass('loading');
                    /* Allow infinite scroll */
                    can_infinite_scroll = true;
                    /* Refresh gradients */
                    smartlink__set_gradients();
                    /* Allow a new load more */
                    if (is_button_visible()) {
                        load_more();
                    }
                }, 100);

                container.remove();

            }
        });

    }

    function is_button_visible() {
        var scrollTop = $win.scrollTop() + $win.height() + 200;
        return (scrollTop > buttonTop);
    }

    /* Scroll event */
    var $win = jQuery(window);
    $win.on('scroll', function loadmore__scrollevent() {
        if (!has_infinite_scroll || !can_infinite_scroll) {
            return false;
        }
        if (is_button_visible()) {
            load_more();
        }

    });

    /* Click event */
    $jqbody.on('click', '.cssc-button--loadmore', function loadmore__clickevent(e) {
        e.preventDefault();
        has_infinite_scroll = true;
        update__button();
        load_more();
    });
}

/* ----------------------------------------------------------
  Gallery
---------------------------------------------------------- */

function smartlink__set_gallery() {

    jQuery('.gallery-size-large').each(function() {
        var $this = jQuery(this);

        function set_resize() {
            $this.parent().css({
                height: ($this.find('[data-current-slide="1"] img').height() + 45)
            });
        }

        function set_resize_timeout() {
            setTimeout(set_resize, 300);
        }
        set_resize_timeout();
        jQuery(window).on('resize', set_resize_timeout);

        $this.dkJSUSlider({
            showNavigation: false,
            wrapperClassName: 'smartlink-gallery-slider',
            transition: function(oldSlide, newSlide, oldNb, nb) {
                var self = this;
                newSlide.css({
                    'z-index': 2
                });
                self.wrapper.animate({
                    height: (newSlide.find('img').height() + 45)
                }, 300);
                setTimeout(function() {
                    oldSlide.css({
                        'z-index': 0
                    });
                    newSlide.css({
                        'z-index': 1
                    });

                    // Authorizing a new slide
                    self.canSlide = 1;
                }, 300);
            },
        });
    });

}

/* ----------------------------------------------------------
  Search
---------------------------------------------------------- */

function smartlink__set_search() {
    var search_link = jQuery('.header__search a'),
        hasSearchOpen = false;

    function toggle_search(e) {
        if (e) {
            e.preventDefault();
        }
        if (hasSearchOpen) {
            close_search();
        }
        else {
            open_search();
        }
    }

    function close_search() {
        if (hasSearchOpen) {
            $jqbody.removeClass('has-search-open');
            hasSearchOpen = false;
        }
    }

    function open_search() {
        if (!hasSearchOpen) {
            $jqbody.addClass('has-search-open');
            hasSearchOpen = true;
            jQuery('#s').focus();
        }
    }

    jQuery(search_link).on('click', toggle_search);
    jQuery('.cc-header-search button.reset').on('click', toggle_search);
    jQuery(window).on('scroll', close_search);
    jQuery(document).keyup(function(e) {
        if (e.keyCode == 27) {
            close_search();
        }
    });
}

/* ----------------------------------------------------------
  Cookies
---------------------------------------------------------- */

function smartlink__set_cookies() {
    var banner = jQuery('.banner-cookies');
    // Hide on close
    banner.on('click', '.close-cookies', function(e) {
        e.preventDefault();
        banner.attr('data-is-visible', '');
        setCookie('cookiemessageok', '1', 365);
    });
    // Display if no cookie
    if (getCookie('cookiemessageok') != 1) {
        banner.attr('data-is-visible', '1');
    }
}