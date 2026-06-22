<?php 
$strips=get_field('home_strips');
if( $strips ): 
?>
<section class="outcome-strip-section">
      <div class="outcome-strip">
  <?php foreach( $strips as $strip ): ?>

      <div class="oc">
        <div class="label"><?php echo $strip['label']; ?></div>
        <div class="name"><?php echo $strip['name']; ?></div>
        <div class="desc"><?php echo $strip['desc']; ?></div>
      </div>
  
  <?php endforeach;  ?>
    </div>
</section>
<?php endif;?>

