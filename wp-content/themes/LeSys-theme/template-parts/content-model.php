<?php
// Structural section titles
$stack_eyebrow     = get_field('eyebrow_section_title');
$stack_title       = get_field('stack_title');
$stack_description = get_field('stack_description');
// Map array variables to ACF group names
$tabs_data = [
    0 => get_field('tab_applications'),
    1 => get_field('tab_integration'),
    2 => get_field('tab_data_ai'),
    3 => get_field('tab_infrastructure'),
    4 => get_field('tab_security'),
    5 => get_field('tab_managed_ops')
];
?>

<section class="section" id="stack">
  <div class="container">
    
    <?php if ( $stack_eyebrow ) : ?>
      <div class="sec-eyebrow-row">
        <div class="eyebrow"><?php echo esc_html( $stack_eyebrow ); ?></div>
      </div>
    <?php endif; ?>

    <div class="sec-head">
      <h2 class="title"><?php echo wp_kses_post( $stack_title ); ?></h2>
      <?php if ( $stack_description ) : ?>
        <div class="right">
          <p><?php echo esc_html( $stack_description ); ?></p>
        </div>
      <?php endif; ?>
    </div>

    <div class="stack-card" id="stackCard">
      <div class="stack-tabs">
        <div class="stack-tab active" data-idx="0">Applications <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="1">Integration <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="2">Data &amp; AI <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="3">Infrastructure <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="4">Security <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
        <div class="stack-tab" data-idx="5">Managed Ops <span class="chev"><i class="fa-solid fa-chevron-right"></i></span></div>
      </div>

      <div class="stack-panel" id="stackPanel">
        <?php foreach ( $tabs_data as $idx => $data ) : 
            if ( ! $data ) continue;
            $display_style = ( $idx === 0 ) ? 'display: block;' : 'display: none;';
            ?>
            <div class="tab-content-panel" id="panel-idx-<?php echo $idx; ?>" style="<?php echo $display_style; ?>">
                <div class="topimg">
                    <?php echo $data['visual']; // Outputs raw SVG markup ?>
                </div>
                <h3><?php echo esc_html( $data['title'] ); ?></h3>
                <div class="cols">
                    <!-- Column 1 -->
                    <div>
                        <h5><?php echo esc_html( $data['c1_h'] ); ?></h5>
                        <ul>
                            <?php 
                            if ( ! empty( $data['c1_li'] ) ) {
                                $lines = explode( "\n", str_replace( "\r", "", $data['c1_li'] ) );
                                foreach ( $lines as $line ) {
                                    if ( trim( $line ) !== '' ) {
                                        echo '<li>' . esc_html( trim( $line ) ) . '</li>';
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Column 2 -->
                    <div>
                        <h5><?php echo esc_html( $data['c2_h'] ); ?></h5>
                        <ul>
                            <?php 
                            if ( ! empty( $data['c2_li'] ) ) {
                                $lines = explode( "\n", str_replace( "\r", "", $data['c2_li'] ) );
                                foreach ( $lines as $line ) {
                                    if ( trim( $line ) !== '' ) {
                                        echo '<li>' . esc_html( trim( $line ) ) . '</li>';
                                    }
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('#stackCard .stack-tab');
  const panels = document.querySelectorAll('#stackPanel .tab-content-panel');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      // Toggle Tab Highlights
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      // Toggle Panel Visibilities
      const targetIdx = tab.getAttribute('data-idx');
      panels.forEach(panel => {
        if (panel.id === 'panel-idx-' + targetIdx) {
          panel.style.display = 'block';
        } else {
          panel.style.display = 'none';
        }
      });
    });
  });
});
</script>