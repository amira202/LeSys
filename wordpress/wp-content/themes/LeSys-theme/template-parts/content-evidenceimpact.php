<!-- =================================================================
     OUTCOMES MEASURE — 8 KPI tiles (2 rows × 4)
     ================================================================= -->
<?php
// Retrieve the ACF values from the current page and save them into variables
$evidence_title = get_field( 'evidence_title' );
$evidence_title1  = get_field( 'evidence_title1' );

$evidence_title2 = get_field( 'evidence_title2' );

$evidence_description  = get_field( 'evidence_description' );
$evidence_stats  = get_field( 'evidence_stats' );
$start_index = 4; // Change this to your desired starting index (0-based)
$sliced_stats = array_slice($evidence_stats, $start_index);

?>
<section class="section">
  <div class="container">
    <div class="sec-eyebrow-row"><div class="eyebrow"><?php echo $evidence_title; ?></div></div>
    <div class="sec-head">
      <h2 class="title"><?php echo $evidence_title1; ?><br><span class="ac"><?php echo $evidence_title2; ?></span></h2>
      <div class="right">
        <p><?php echo $evidence_description; ?></p>
      </div>
    </div>

    <div class="outcomes-grid">
        <?php $i=0; foreach( $evidence_stats as $stat ): if( $i < 4 ): ?>
          <div class="ot"><div><div class="val"><?php echo $stat['evidence_percentage']; ?><span class="black"><?php echo $stat['evidence_percentage_symbol']; ?></span></div><div class="lbl"><?php echo $stat['evidence_solve']; ?></div><div class="src"><?php echo $stat['evidence_product']; ?></div></div><div class="gauge"></div></div>
        <?php $i++; endif; endforeach; ?>
    </div>
    <div class="outcomes-grid">
        <?php $i=0; foreach( $sliced_stats as $stat ): if( $i < 4 ): ?>
          <div class="ot"><div><div class="val"><?php echo $stat['evidence_percentage']; ?><span class="black"><?php echo $stat['evidence_percentage_symbol']; ?></span></div><div class="lbl"><?php echo $stat['evidence_solve']; ?></div><div class="src"><?php echo $stat['evidence_product']; ?></div></div><div class="gauge"></div></div>
        <?php $i++; endif; endforeach; ?>
    </div>
  </div>
</section>
