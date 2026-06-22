<header class="hero">
  <?php 
  // Fetch the custom video file URL; fallback to the default URL if left unassigned
  $video_url = get_field('hero_video'); 
  if ( empty($video_url) ) {
      $video_url = 'https://pixabay.com';
  }
  ?>
  <video id="earthVideo" class="hero-video" autoplay muted loop playsinline preload="auto" src="<?php echo esc_url( $video_url ); ?>"></video>
  
  <div class="hero-overlay"></div>

  <div class="hero-inner">
    <!-- Hero Title: wp_kses_post allows your custom design elements like <span> and <br> modifications -->
    <h1 class="hero-title">
      <?php 
      $hero_title = get_field('hero_title');
      if ( ! empty($hero_title) ) {
          echo wp_kses_post($hero_title);
      } else {
          echo '<span class="light">One Partner. Complete</span><br>ACCOUNTABILITY.<br><span class="light">Enormous Capabilities</span><br>LIKE NO OTHER.';
      }
      ?>
    </h1>
    
    <!-- Hero Subtitle -->
    <p class="hero-sub">
      <?php 
      $hero_subtitle = get_field('hero_subtitle');
      echo ! empty($hero_subtitle) ? esc_html($hero_subtitle) : 'LeSys unifies strategy, technology, implementation, and operations under a single partner model. We design, build, integrate, and operate the systems that power enterprises, governments, and smart cities.'; 
      ?>
    </p>
    
    <div class="hero-ctas">
      <!-- Button 1 (Primary) -->
      <?php 
      $btn1_text = get_field('button_1_text');
      $btn1_url  = get_field('button_1_url');
      if ( ! empty($btn1_text) ) : 
      ?>
        <a href="<?php echo esc_attr( !empty($btn1_url) ? $btn1_url : '#contact' ); ?>" class="btn btn-primary">
          <?php echo esc_html($btn1_text); ?> 
          <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span>
        </a>
      <?php endif; ?>

      <!-- Button 2 (Ghost) -->
      <?php 
      $btn2_text = get_field('button_2_text');
      $btn2_url  = get_field('button_2_url');
      if ( ! empty($btn2_text) ) : 
      ?>
        <a href="<?php echo esc_attr( !empty($btn2_url) ? $btn2_url : '#platforms' ); ?>" class="btn btn-ghost">
          <?php echo esc_html($btn2_text); ?>
        </a>
      <?php endif; ?>
    </div>
  </div>
</header>
