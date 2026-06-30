<section class="trusted">
    <div class="container">
        <div class="eyebrow"><?php echo esc_html(get_theme_mod('trusted_title')); ?></div>
        <div class="sub"><?php echo esc_html(get_theme_mod('trusted_subtitle')); ?></div>

        <div class="logo-track-wrap">
            <div class="logo-track" id="logoTrack">
                <?php 
                // Function to output logo HTML to avoid duplicating code

function render_logo_span($i) {
    $url   = get_theme_mod("logo_{$i}_url");
    $name  = get_theme_mod("logo_{$i}_name");
    $class = get_theme_mod("logo_{$i}_css"); // Retrieve the custom class
    
    // Merge base class 'lg' with the custom class
    $classes = "lg " . esc_attr($class);

    if ($url): ?>
        <span class="<?php echo $classes; ?>">
            <img src="<?php echo esc_url($url); ?>" alt="<?php echo esc_attr($name); ?>">
        </span>
    <?php elseif ($name): ?>
        <span class="<?php echo $classes; ?>"><?php echo ($name); if($name=="aruba"){echo "<em>HPE</em>";}?></span>
    <?php endif;
}


                // Render loops
                for ($j = 0; $j < 2; $j++) { // Run twice for seamless loop
                    for ($i = 1; $i <= 8; $i++) {
                        render_logo_span($i);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>