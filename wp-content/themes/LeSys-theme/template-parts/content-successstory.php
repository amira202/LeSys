<section class="section menu-boundary" id="startnav" style="padding-top:30px;">
  <div class="container">
    <div class="story">
      <div class="story-bg"></div>
      <div class="story-inner">
        <div class="eyebrow"><?php echo esc_html(get_theme_mod('success_heading')); ?></div>
        <h2>
            <?php echo esc_html(get_theme_mod('success_title1')); ?><br>
            <?php echo esc_html(get_theme_mod('success_title3')); ?>
            <span class="ac"><?php echo esc_html(get_theme_mod('success_title2')); ?></span> 
            
        </h2>
        
        <div class="story-cols">
          <?php for ($i = 1; $i <= 3; $i++): ?>
            <?php $title = get_theme_mod("success_column_{$i}_title"); ?>
            <?php if (!empty($title)): ?>
                <div>
                  <h6><?php echo esc_html($title); ?></h6>
                  <p><?php echo esc_html(get_theme_mod("success_column_{$i}_paragraph")); ?></p>
                </div>
            <?php endif; ?>
          <?php endfor; ?>
        </div>
        
        <a href="<?php echo esc_url(get_theme_mod('story_button_url')); ?>" class="btn btn-primary">
            <?php echo esc_html(get_theme_mod('story_button_text')); ?> 
            <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span>
        </a>
      </div>
    </div>
  </div>
</section>