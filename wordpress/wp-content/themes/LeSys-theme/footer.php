<!-- =================================================================
     FOOTER
     ================================================================= -->
<footer>
  <div class="container">
    <div class="foot-grid">
      <div class="fb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
          
          <?php 
          $footer_logo = get_theme_mod( 'lesys_footer_logo' );
          if ( ! empty( $footer_logo ) ) : 
          ?>
            <!-- Dynamic Customizer Uploaded Image Logo -->
            <span class="brand-logo uploaded-logo">
                <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
            </span>
          <?php else : ?>
            <!-- Default SVG Logo fallback -->
            <span class="brand-logo">
              <svg viewBox="0 0 40 40" xmlns="http://w3.org">
                <g fill="none" stroke="#e2462b" stroke-width="2.6" stroke-linejoin="round" stroke-linecap="round">
                  <path d="M20 4 L36 20 L20 36 L4 20 Z"/>
                  <path d="M20 4 L20 36 M4 20 L36 20"/>
                  <path d="M11 11 L29 29 M29 11 L11 29" stroke-width="1.4"/>
                </g>
              </svg>
            </span>
            <span class="brand-text"><span class="lead">LEADER</span><span class="sub" style="color:#8b95a4">LEADER SYSTEMS</span></span>
          <?php endif; ?>
          
        </a>
        
        <!-- Dynamic Customizer Description -->
        <p><?php echo esc_html( get_theme_mod( 'lesys_footer_desc', 'One accountable partner across strategy, technology, implementation and operations — the systems that power enterprises, governments and critical infrastructure, engineered and operated end-to-end.' ) ); ?></p>
        
        <!-- Dynamic Customizer Social Icons -->
        <div class="fsoc">
          <?php if ( get_theme_mod( 'lesys_social_twitter' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'lesys_social_twitter' ) ); ?>" target="_blank" aria-label="X"><i class="fa-brands fa-x-twitter"></i></a>
          <?php endif; ?>
          <?php if ( get_theme_mod( 'lesys_social_instagram' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'lesys_social_instagram' ) ); ?>" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <?php endif; ?>
          <?php if ( get_theme_mod( 'lesys_social_linkedin' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'lesys_social_linkedin' ) ); ?>" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <?php endif; ?>
        </div>
      </div>
      
      <!-- Dynamic Platforms Menu -->
      <div class="fcol">
        <h6><?php _e( 'PLATFORMS', 'lesys' ); ?></h6>
        <?php 
        wp_nav_menu( array(
            'theme_location' => 'footer-platforms',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'fallback_cb'    => false,
        ) ); 
        ?>
      </div>
      
      <!-- Dynamic Capabilities Menu -->
      <div class="fcol">
        <h6><?php _e( 'CAPABILITIES', 'lesys' ); ?></h6>
        <?php 
        wp_nav_menu( array(
            'theme_location' => 'footer-capabilities',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'fallback_cb'    => false,
        ) ); 
        ?>
      </div>
      
      <!-- Dynamic Company Menu -->
      <div class="fcol">
        <h6><?php _e( 'COMPANY', 'lesys' ); ?></h6>
        <?php 
        wp_nav_menu( array(
            'theme_location' => 'footer-company',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'fallback_cb'    => false,
        ) ); 
        ?>
      </div>
    </div>

    <div class="fbot-row">
      <!-- Dynamic Customizer Copyright Line -->
      <div class="copy">
        © <?php echo date( 'Y' ); ?> <?php echo esc_html( get_theme_mod( 'lesys_footer_copyright', 'Leader Systems (LeSys). Engineered for secure, accountable execution.' ) ); ?>
      </div>
      
      <!-- Dynamic Customizer Compliance Badges -->
      <div class="compl">
        <?php 
        $badges_text = get_theme_mod( 'lesys_compliance_badges', 'NCA ECC 2.0, SAMA CSF, SDAIA PDPL, ISO 27001, SOC 2' );
        if ( ! empty( $badges_text ) ) {
            $badges_array = explode( ',', $badges_text );
            foreach ( $badges_array as $badge ) {
                echo '<span>' . esc_html( trim( $badge ) ) . '</span>';
            }
        }
        ?>
      </div>
    </div>
  </div>
</footer>
<div id="siteSearchModal" class="search-overlay-modal">
  <!-- Close Button Element Trigger -->
  <button id="closeSearchBtn" aria-label="Close Search">
      <i class="fa-solid fa-xmark"></i>
  </button>
  
  <div class="search-modal-inner">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input type="search" class="search-field" placeholder="Search platforms, capabilities..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
      
      <?php if ( function_exists('pll_current_language') ) : ?>
        <input type="hidden" name="lang" value="<?php echo pll_current_language(); ?>" />
      <?php endif; ?>
    </form>
  </div>
</div>


<?php wp_footer(); ?>
</body>
</html>
