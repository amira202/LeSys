<!-- =================================================================
     OUTCOME TABS — horizontal expanding tab strip
     Tab content driven by data attributes; click or hover to expand.
     ================================================================= -->

<section class="tabsec" id="#solutions">
    <div class="container">
        <div class="tab-bar" id="tabBar">

            <div class="tb-intro">
                <div class="eyebrow" style="align-self:flex-start;">
                    <?php the_field('outcome_eyebrow'); ?>
                </div>
                <div>
                    <h3><?php echo wp_kses_post(get_field('outcome_title')); ?></h3>
                    <p><?php 
                    the_field('outcome_description');?></p>
                </div>
                <div class="nav">
                    <button class="round" id="tabPrev"><i class="fa-solid fa-arrow-left"></i></button>
                    <button class="round filled" id="tabNext"><i class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>

            <?php
            // 1. Fetch all terms from the solution_category taxonomy
            $terms = get_terms([
                'taxonomy'   => 'solution_category',
                'orderby'    => 'menu_order', // Or 'name' / 'count'
                'order'      => 'ASC',
                'hide_empty' => false,
            ]);

            // 2. Check if terms exist and loop
            if (!empty($terms) && !is_wp_error($terms)) :
                foreach ($terms as $index => $term) :
                    // Get custom field values for the term (ACF syntax)
                    $small_text = get_field('hero_head', $term); // Replace with your actual field name
                    $short=get_field('hero_intro',$term);
                    ?>

                    <div class="tab t<?php echo $index + 1; ?> <?php echo $index === 0 ? 'active' : ''; ?>"
                         data-idx="<?php echo $index; ?>"
                         onclick="window.location.href='<?php echo esc_url(get_term_link($term)); ?>'">

                        <div class="num">
                            <?php echo sprintf('%02d', $index + 1); ?>
                        </div>

                        <span class="open-ico">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </span>

                        <div class="body">
                            <div class="small">
                                <?php echo esc_html($small_text); ?>
                            </div>

                            <h4><?php echo esc_html($term->name);?></h4>

                            <p><?php  
                    echo mb_strimwidth($short, 0, 90, '...');?></p>
                        </div>
                    </div>

                <?php endforeach; 
            endif; ?>

        </div>
    </div>
</section>