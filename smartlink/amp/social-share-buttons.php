<?php

$idpost = get_the_ID();
$title = get_the_title($idpost);
$sharelinks = get_share_links($idpost,$title);
?>
<div class="social-box">
    <amp-social-share type="twitter" width="53" height="43"
                      data-param-text="<?php print $title; ?>"
                      data-param-url="<?php print $sharelinks['twitter']; ?>">
    </amp-social-share>
    <amp-social-share type="facebook" width="53" height="43"
                      data-param-text="<?php print $title; ?>"
                      data-param-url="<?php print $sharelinks['facebook']; ?>"
                      data-param-app_id="387718261572906">
    </amp-social-share>
    <amp-social-share type="gplus" width="53" height="43"
                      data-param-text="<?php print $title; ?>"
                      data-param-url="<?php print $sharelinks['google']; ?>">
    </amp-social-share>
    <amp-social-share type="linkedin" width="53" height="43"
                      data-param-text="<?php print $title; ?>"
                      data-param-url="<?php print $sharelinks['linkedin']; ?>">
    </amp-social-share>
    <amp-social-share type="whatsapp" width="53" height="43"
                      data-share-endpoint="whatsapp://send"
                      data-param-text="Check out this article: TITLE - CANONICAL_URL">
    </amp-social-share>
</div>
