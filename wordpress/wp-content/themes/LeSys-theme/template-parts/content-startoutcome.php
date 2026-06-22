<!-- =================================================================
     OUTCOME TABS — horizontal expanding tab strip
     Tab content driven by data attributes; click or hover to expand.
     ================================================================= -->
<?php
$tab1 = get_field('tab_1');
$tab2 = get_field('tab_2');
$tab3 = get_field('tab_3');
$tab4 = get_field('tab_4');
$tab5 = get_field('tab_5');
$tab6 = get_field('tab_6');
?>

<section class="tabsec">
    <div class="container">
        <div class="tab-bar" id="tabBar">

            <div class="tb-intro">

                <div class="eyebrow" style="align-self:flex-start;">
                    <?php the_field('outcome_eyebrow'); ?>
                </div>

                <div>
                    <h3>
                        <?php echo wp_kses_post(get_field('outcome_title')); ?>
                    </h3>

                    <p>
                        <?php the_field('outcome_description'); ?>
                    </p>
                </div>

                <div class="nav">
                    <button class="round" id="tabPrev">
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>

                    <button class="round filled" id="tabNext">
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>

            </div>

            <?php
            $tabs = [
                $tab1,
                $tab2,
                $tab3,
                $tab4,
                $tab5,
                $tab6
            ];

            foreach ($tabs as $index => $tab) :
            ?>

            <div class="tab t<?php echo $index + 1; ?> <?php echo $index === 1 ? 'active' : ''; ?>"
                 data-idx="<?php echo $index; ?>">

                <div class="num">
                    <?php echo sprintf('%02d', $index + 1); ?>
                </div>

                <span class="open-ico">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </span>

                <div class="body">
                    <div class="small">
                        <?php echo esc_html($tab['small']); ?>
                    </div>

                    <h4>
                        <?php echo esc_html($tab['title']); ?>
                    </h4>

                    <p>
                        <?php echo esc_html($tab['description']); ?>
                    </p>
                </div>

            </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>