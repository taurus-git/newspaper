<?php
$background = get_field('video-post-area_background_image');
$videos_posts = get_videos_posts ();
$background_url = $background['url'];
?>

<!-- ##### Video Post Area Start ##### -->
<div class="video-post-area bg-img bg-overlay" style="background-image: url(<?php echo $background_url; ?>);">
    <div class="container">
        <div class="row justify-content-center">
            <?php echo $videos_posts; ?>
        </div>
    </div>
</div>
<!-- ##### Video Post Area End ##### -->