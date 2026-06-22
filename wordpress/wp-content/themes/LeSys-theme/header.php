<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="description" content="<?php bloginfo( 'description' ); ?>" />

<!-- =========================================================
     EXTERNAL LIBRARIES (CDN — no build step required)
     ========================================================= -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
<!-- =================================================================
     NAVBAR — pill navigation overlay
     ================================================================= -->
<div class="nav-wrap">
  <nav class="navbar">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand">
      
      <?php 
      $header_logo = get_theme_mod( 'lesys_footer_logo' );
      if ( ! empty( $header_logo ) ) : 
      ?>
        <!-- Dynamic Uploaded Image Logo -->
        <span class="brand-logo uploaded-logo">
            <img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
        </span>
      <?php else : ?>
        <!-- Default Inline SVG Logo Fallback -->
        <span class="brand-logo">
          <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" aria-label="Leader logo">
            <g fill="none" stroke="#e2462b" stroke-width="2.6" stroke-linejoin="round" stroke-linecap="round">
              <path d="M20 4 L36 20 L20 36 L4 20 Z"/>
              <path d="M20 4 L20 36 M4 20 L36 20"/>
              <path d="M11 11 L29 29 M29 11 L11 29" stroke-width="1.4"/>
            </g>
          </svg>
        </span>
        <span class="brand-text">
          <span class="lead">LEADER</span>
          <span class="sub"><?php bloginfo( 'name' ); ?></span>
        </span>
      <?php endif; ?>
      
    </a>

    <div class="nav-menu" id="navMenu">
        <?php
        $menu_html = wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'container'      => false,
            'echo'           => false,
            'items_wrap'     => '%3$s',
            'fallback_cb'    => false,
        ));
        
        if ( $menu_html ) {
            // Strips out <li> tags to preserve your raw <a> styling flow rules
            $clean_menu = preg_replace('/<li[^>]*>/', '', $menu_html);
            $clean_menu = str_replace('</li>', '', $clean_menu);
            echo $clean_menu;
        }
        ?>
    </div>
  
    <div class="nav-actions">
      <button class="search-btn" aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
      
      <!-- Dynamic Customizer CTA Link -->
      <a href="<?php echo esc_attr( get_theme_mod( 'lesys_header_cta_url', '#contact' ) ); ?>" class="nav-cta">
        <?php echo esc_html( get_theme_mod( 'lesys_header_cta_text', 'Talk to an Expert' ) ); ?>
      </a>
      
      <button class="menu-toggle" id="menuToggle" aria-label="Menu"><i class="fa-solid fa-bars"></i></button>
    </div>
  </nav>
</div>
