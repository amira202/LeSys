<?php
$kpis  = get_field( 'home_stats' );
?>
<!-- =================================================================
     STATS — 4 KPI metrics
     ================================================================= -->
<section class="stats">
  <div class="container">
    <div class="stats-grid">
      <?php foreach( $kpis as $kpi ): ?>
        <div class="stat">
          <div class="num"><?php echo $kpi['stat_title']; ?></div>
          <div class="lbl"><?php echo $kpi['stat_description']; ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>