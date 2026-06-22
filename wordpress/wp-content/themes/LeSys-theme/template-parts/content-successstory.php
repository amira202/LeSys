<!-- =================================================================
     CUSTOMER SUCCESS STORY — full-width dark card
     ================================================================= -->
<?php
// Retrieve the ACF values from the current page and save them into variables
$success_heading = get_field( 'sucess_heading' );
$success_title1  = get_field( 'success_title1' );

$success_title2 = get_field( 'success_title2' );
$success_title3  = get_field( 'success_title3' );

$story_button_text  = get_field( 'story_button_text' );
$story_button_url  = get_field( 'story_button_url' );
$story_columns  = get_field( 'story_columns' );
?>
<section class="section" style="padding-top:30px;">
  <div class="container">
    <div class="story">
      <div class="story-bg"></div>
      <div class="story-inner">
        <div class="eyebrow"><?php echo $success_heading; ?></div>
        <h2><?php echo $success_title1;?><br><span class="ac"><?php echo $success_title2;?></span> <?php echo $success_title3;?></h2>
        <div class="story-cols">
          <?php foreach( $story_columns as $column ): ?>
            <div>
              <h6><?php echo $column['success_column_title']; ?><h6>
              <p><?php echo $column['success_column_paragraph']; ?></p>
            </div>
          <?php endforeach; ?>
        </div>
        <a href="<?php echo $story_button_url; ?>" class="btn btn-primary"><?php echo $story_button_text; ?> <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
      </div>
    </div>
  </div>
</section>
