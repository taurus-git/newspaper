<?php
$editors_pick_news = get_editors_pick_news ();
$world_news = get_world_news();
?>
<!-- ##### Editorial Post Area Start ##### -->
<div class="editors-pick-post-area section-padding-80-50">
    <div class="container">
        <div class="row">
            <!-- Editors Pick -->
            <div class="col-12 col-md-7 col-lg-9">
                <div class="section-heading">
                    <h6>Editor’s Pick</h6>
                </div>
                <div class="row">
                    <?php echo $editors_pick_news; ?>
                </div>
            </div>
            <!-- World News -->
            <div class="col-12 col-md-5 col-lg-3">
                <div class="section-heading">
                    <h6>World News</h6>
                </div>
                <?php echo $world_news; ?>
            </div>
        </div>
    </div>
</div>
