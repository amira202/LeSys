<?php
$section_title = get_field('platform_eyebrow');
$platforms_title = get_field('platform_title');
$platforms_subtitle = get_field('platform_subtitle');
$button_text = get_field('platforms_button_text');
$button_url = get_field('platforms_button_url');

// Query your 'platform' custom post type dynamically
$platforms_query = new WP_Query([
    'post_type'      => 'platform',
    'posts_per_page' => 5, // Fetch all platforms
    'post_status'    => 'publish',
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
]);

$platforms_list = [];

if ( $platforms_query->have_posts() ) {
    while ( $platforms_query->have_posts() ) {
        $platforms_query->the_post();
        $p_id = get_the_ID();
$features=get_field('platforms_features', $p_id);

        // Safely fetch metrics 1, 2, and 3 from ACF groups
        $m1 = $features['platform_feature_1'] ?? [];
        $m2 = $features['platform_feature_2'] ?? [];
        $m3 = $features['platform_feature_3'] ?? [];



        $compiled_metrics = [];
        if (!empty($m1['feature_name'])) $compiled_metrics[] = [$m1['feature_name'], $m1['feature_percentage_value'], $m1['platform_feature_suffix'], $m1['platform_feature_percentage']];
        if (!empty($m2['feature_name'])) $compiled_metrics[] = [$m2['feature_name'], $m2['feature_percentage_value'], $m2['platform_feature_suffix'], $m2['platform_feature_percentage']];
        if (!empty($m3['feature_name'])) $compiled_metrics[] = [$m3['feature_name'], $m3['feature_percentage_value'], $m3['platform_feature_suffix'], $m3['platform_feature_percentage']];

        $platforms_list[] = [
            'key'        => sanitize_title(get_the_title()), // forms a clean data slug key
            'nav_label'  => get_the_title(),
            'title_html' => get_the_title(),
            'tagline'    =>get_the_category()[0]->name ?? '', // Uses first category as tagline if available        
            'lead'       => get_the_content(), // pulling the primary editor description text
            'visual'     => get_field('platform_visual', $p_id),
            'metrics'    => $compiled_metrics
        ];
    }
    wp_reset_postdata();
}
?>

<!-- =================================================================
     PROPRIETARY PLATFORMS (DARK) — Live Interactive Query Layout
     ================================================================= -->
<section class="section dark" id="platforms">
  <div class="container">
    <div class="sec-eyebrow-row">
      <div class="eyebrow on-dark"><?php echo esc_html($section_title); ?></div>
    </div>
    <div class="sec-head">
      <h2 class="title"><?php echo wp_kses_post($platforms_title); ?></h2>
      <div class="right">
        <p><?php echo esc_html($platforms_subtitle); ?></p>
      </div>
    </div>

    <?php if (!empty($platforms_list)) : 
        $initial = $platforms_list[0]; // Capture first post for initial server rendering
    ?>
      <!-- Dynamically Render Filter Tab Navigation Buttons -->
      <div class="plat-tabs" id="platTabs">
        <?php foreach ($platforms_list as $index => $plat) : 
            $active_class = ($index === 0) ? ' active' : '';
            ?>
            <button class="plat-tab<?php echo $active_class; ?>" 
                    data-key="<?php echo esc_attr($plat['key']); ?>"
                    data-title="<?php echo esc_attr($plat['title_html']); ?>"
                    data-tagline="<?php echo esc_attr($plat['tagline']); ?>"
                    data-lead="<?php echo esc_attr($plat['lead']); ?>"
                    data-metrics="<?php echo esc_attr(json_encode($plat['metrics'])); ?>">
              <?php echo esc_html($plat['nav_label']); ?>
            </button>
            
            <!-- Hidden storage divs to securely hold raw SVG/HTML layouts -->
            <div id="svg-storage-<?php echo esc_attr($plat['key']); ?>" style="display:none;">
                <?php echo $plat['visual']; ?>
            </div>
        <?php endforeach; ?>
      </div>

      <!-- Main Display Panel Group Layout (Pre-filled with post 1 data on page load) -->
      <div class="plat-card">
        <div class="plat-visual" id="platVisual">
          <?php echo $initial['visual']; ?>
        </div>
        <div>
            <?php 
        $first_two = mb_substr(wp_kses_post($initial['title_html']), 0, 2); // Get first 2 letters
        $remainder = mb_substr(wp_kses_post($initial['title_html']), 2);    // Get everything else
        ?>
          <h3 id="platTitle"><span class="ac"><?php echo $first_two;?></span><?php echo $remainder; ?></h3>
          <div class="tagline" id="platTagline"><?php echo esc_html($initial['tagline']); ?></div>
          <p class="lead" id="platLead"><?php echo esc_html($initial['lead']); ?></p>
          
          <div class="metrics" id="platMetrics">
            <?php foreach ($initial['metrics'] as $m) :  ?>
              <div class="metric">
                <div class="top">
                  <span><?php echo esc_html($m[0]); ?></span>
                  <span class="val"><?php echo esc_html($m[1]); ?><span class="pct"><?php echo esc_html($m[2]); ?></span></span>
                </div>
                <div class="bar"><span style="width:<?php echo esc_attr($m[3]); ?>%"></span></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($button_text) : ?>
      <div class="plat-cta">
        <a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary"><?php echo ($button_text); ?></a>
      </div>
    <?php endif; ?>
  </div>
</section>

<script>
(function(){
  document.addEventListener('DOMContentLoaded', function() {
    const tabs = document.querySelectorAll('#platTabs .plat-tab');
    const viewVisual = document.getElementById('platVisual');
    const viewTitle = document.getElementById('platTitle');
    const viewTagline = document.getElementById('platTagline');
    const viewLead = document.getElementById('platLead');
    const viewMetrics = document.getElementById('platMetrics');

    if (tabs.length === 0) return;

    tabs.forEach(btn => {
      btn.addEventListener('click', () => {
        // Toggle Active CSS Highlighting class filters
        tabs.forEach(x => x.classList.remove('active'));
        btn.classList.add('active');

        const key = btn.getAttribute('data-key');

        // Swap out structural textual card values

const rawTitle = btn.getAttribute('data-title') || '';
const firstTwo = rawTitle.slice(0, 2);   // Gets the first 2 letters
const remainder = rawTitle.slice(2);     // Gets everything else

viewTitle.innerHTML = `<span class="ac">${firstTwo}</span>${remainder}`;

        viewTagline.textContent = btn.getAttribute('data-tagline');
        viewLead.textContent = btn.getAttribute('data-lead');

        // Swap structural SVG canvas code via hidden backup DOM containers
        const sourceStorage = document.getElementById('svg-storage-' + key);
        if (sourceStorage && viewVisual) {
          viewVisual.innerHTML = sourceStorage.innerHTML;
        }

        // Decompile dynamic JSON string to loop out responsive metric progress tracks
        try {
          const metricsData = JSON.parse(btn.getAttribute('data-metrics'));
          viewMetrics.innerHTML = metricsData.map(m => `
            <div class="metric">
              <div class="top">
                <span>${m[0]}</span>
                <span class="val">${m[1]}<span class="pct">${m[2]}</span></span>
              </div>
              <div class="bar"><span style="width:${m[3]}%"></span></div>
            </div>
          `).join('');
        } catch(e) {
          viewMetrics.innerHTML = '';
        }
      });
    });
  });
})();
</script>
