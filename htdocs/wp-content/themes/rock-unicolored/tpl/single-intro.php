<?php
global $attachments;
if ( $attachments ) {
    $i=1;
    $custom = get_post_custom($post->ID);

    $post_attachment_infoshow =
        isset($custom["post_attachment_infoshow"][0])
        ? $custom["post_attachment_infoshow"][0]
        : false;

    foreach ( $attachments as $attachment ) {
        $image_src2=wp_get_attachment_image_src( $attachment->ID, 'large' );
        if($i===1) {
            $image_src_thumbnail = wp_get_attachment_image_src( $attachment->ID, 'large' );
        } ?>
<div class="container">
<section class="<?php echo $i==1 ? '' : false ; ?> attachment" style="background-image:url();">
<img itemprop="image" src="<?php echo str_replace('http://','https://',$image_src2[0]) ?>" alt="<?php echo $attachment->post_title ?>" />
</section>
</div>
        <?php
        $i++;
    }
}
