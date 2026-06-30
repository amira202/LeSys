<!-- =================================================================
     WHY LEADER SYSTEMS — Vision 2030 + 6 feature tiles
     ================================================================= -->
<?php
// Retrieve the ACF values from the current page and save them into variables
$section_title = get_field( 'section_title' );
$heading_part1  = get_field( 'heading_part1' );

$heading_part2 = get_field( 'heading_part2' );
$heading_part3  = get_field( 'heading_part3' );

$paragraph = get_field( 'paragraph' );
$button_text  = get_field( 'button_text' );
$button_url  = get_field( 'button_url' );
$capabilities  = get_field( 'capabilities' );
?>
<section class="section">
  <div class="container">
    <div class="why-grid">
      <div class="why-left">
        <div class="eyebrow"><?php echo $section_title;?></div>
        <h2><?php echo $heading_part1;?><br><span class="ac"><?php echo $heading_part2;?></span> <?php echo $heading_part3;?></h2>
        <p><?php echo $paragraph;?></p>
        <a href="<?php echo $button_url; ?>" class="btn btn-primary"><?php echo $button_text; ?> <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span></a>
      </div>
      <div class="why-tiles">
        <?php 
        $i=1;foreach( $capabilities as $capability ): ?>
          <div class="why-tile">
            <div class="why-ico"><?php echo $capability['icon'.$i]; ?></div>
            <h5><?php echo $capability['label'.$i]; ?></h5>
            <p><?php echo $capability['paragraph'.$i]; ?></p>
          </div>
        <?php 
        $i++;

      endforeach; ?>
      </div>
    </div>
  </div>
</section>