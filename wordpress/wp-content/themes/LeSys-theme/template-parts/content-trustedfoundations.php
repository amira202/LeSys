<!-- =================================================================
     TRUSTED FOUNDATIONS — auto-running logo marquee (CSS animation)
     Add or remove logo SPAN items inside .logo-track (duplicated for loop)
     ================================================================= -->
<section class="trusted">
    <div class="container">

        <div class="eyebrow">
            <?php the_field('trusted_section_title'); ?>
        </div>

        <div class="sub">
            <?php the_field('trusted_section_subtitle'); ?>
        </div>

        <div class="logo-track-wrap">
            <div class="logo-track" id="logoTrack">

                <?php if (have_rows('trusted_logos')) : ?>

                    <?php
                    $logos = get_field('trusted_logos');

                    // First loop
                    foreach ($logos as $logo) :
                    ?>
                        <span class="lg <?php echo esc_attr($logo['logo_css_class']); ?>">
                            <?php if (!empty($logo['logo_image'])) : ?>
                                <img
                                    src="<?php echo esc_url($logo['logo_image']['url']); ?>"
                                    alt="<?php echo esc_attr($logo['logo_name']); ?>">
                            <?php else : ?>
                                <?php echo ($logo['logo_name']); ?>
                            <?php endif; ?>
                        </span>
                    <?php endforeach; ?>

                    <?php
                    // Duplicate loop for seamless marquee
                    foreach ($logos as $logo) :
                    ?>
                        <span class="lg <?php echo esc_attr($logo['logo_css_class']); ?>">
                            <?php if (!empty($logo['logo_image'])) : ?>
                                <img
                                    src="<?php echo esc_url($logo['logo_image']['url']); ?>"
                                    alt="<?php echo esc_attr($logo['logo_name']); ?>">
                            <?php else : ?>
                                <?php echo ($logo['logo_name']); ?>
                            <?php endif; ?>
                        </span>
                    <?php endforeach; ?>

                <?php endif; ?>

            </div>
        </div>

    </div>
</section>