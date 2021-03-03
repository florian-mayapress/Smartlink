<?php
/**
 * RSS2 Feed Template for displaying RSS2 Posts feed.
 *
 * @package WordPress
 */

header('Content-Type: text/xml; charset=' . get_option('blog_charset'), true);
$more = 1;

echo '<?xml version="1.0" encoding="'.get_option('blog_charset').'"?'.'>';

/**
 * Fires between the xml and rss tags in a feed.
 *
 * @since 4.0.0
 *
 * @param string $context Type of feed. Possible values include 'rss2', 'rss2-comments',
 *                        'rdf', 'atom', and 'atom-comments'.
 */
do_action( 'rss_tag_pre', 'rss2' );
?>
<rss version="2.0"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
    <?php
    /**
     * Fires at the end of the RSS root to add namespaces.
     *
     * @since 2.0.0
     */
    do_action( 'rss2_ns' );
    ?>
>

<channel>
    <title><?php bloginfo_rss('name'); wp_title_rss(); ?></title>
    <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
    <link><?php bloginfo('url') ?></link>
    <description><?php bloginfo_rss("description") ?></description>
    <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
    <language><?php bloginfo( 'language' ); ?></language>
    <sy:updatePeriod><?php
        $duration = 'hourly';

        /**
         * Filter how often to update the RSS feed.
         *
         * @since 2.1.0
         *
         * @param string $duration The update period. Accepts 'hourly', 'daily', 'weekly', 'monthly',
         *                         'yearly'. Default 'hourly'.
         */
        echo apply_filters( 'rss_update_period', $duration );
    ?></sy:updatePeriod>
    <sy:updateFrequency><?php
        $frequency = '1';

        /**
         * Filter the RSS update frequency.
         *
         * @since 2.1.0
         *
         * @param string $frequency An integer passed as a string representing the frequency
         *                          of RSS updates within the update period. Default '1'.
         */
        echo apply_filters( 'rss_update_frequency', $frequency );
    ?></sy:updateFrequency>
    <?php
    /**
     * Fires at the end of the RSS2 Feed Header.
     *
     * @since 2.0.0
     */
    do_action( 'rss2_head');

    while( have_posts()) : the_post();
    $thumb_url = wputhumb_get_thumbnail_url('maxithumb',get_the_ID());
    $thumb_url_full = wputhumb_get_thumbnail_url('maxithumb',get_the_ID());
    $thumb_url_ext = explode('.',$thumb_url_full);
    ob_start();
    the_excerpt_rss();
    $excerpt = ob_get_clean();
    $excerpt = strip_tags($excerpt);
    ?>
    <item>
        <title><?php the_title_rss() ?></title>
        <description><?php echo $excerpt; ?><![CDATA[<br /><br /> <img src="<?php echo $thumb_url; ?>" alt="" />]]></description>
        <link><?php the_permalink_rss() ?></link>
        <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
        <guid isPermaLink="false"><?php the_guid(); ?></guid>
        <enclosure url="<?php echo $thumb_url_full; ?>" type="image/<?php echo end($thumb_url_ext); ?>" length="0"/>
        <?php rss_enclosure(); ?>
    <?php
    /**
     * Fires at the end of each RSS2 feed item.
     *
     * @since 2.0.0
     */
    do_action( 'rss2_item' );
    ?>
    </item>
    <?php endwhile; ?>
</channel>
</rss>
