<?php
/*
Template Name: Solution Template
*/

get_header();

$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$hero_description = get_field('hero_description');
$hero_image = get_field('hero_image');

?>

<section class="solution-hero">
    <div class="container">
        <div class="hero-content">

            <div class="hero-text">
                <span class="eyebrow"><?php echo esc_html($hero_subtitle); ?></span>

                <h1><?php echo esc_html($hero_title); ?></h1>

                <p>
                    <?php echo esc_html($hero_description); ?>
                </p>

                <?php if(get_field('hero_button_link')) : ?>
                    <a href="<?php the_field('hero_button_link'); ?>" class="btn-primary">
                        <?php the_field('hero_button_text'); ?>
                    </a>
                <?php endif; ?>

            </div>

            <div class="hero-image">
                <?php if($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="">
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<section class="business-benefits">
    <div class="container">

        <div class="section-title">
            <h2>Transform Your Business Operations</h2>
        </div>

        <div class="benefits-grid">

            <?php
            $benefits = get_field('benefits');

            if($benefits):

                $items = explode("\n", $benefits);

                foreach($items as $item):
            ?>

                <div class="benefit-card">
                    <span class="icon">✓</span>
                    <h3><?php echo esc_html(trim($item)); ?></h3>
                </div>

            <?php endforeach; endif; ?>

        </div>

    </div>
</section>

<section class="solution-services">
    <div class="container">

        <div class="section-title">
            <h2>Our Business Application Solutions</h2>
        </div>

        <div class="solutions-grid">

            <?php
            $query = new WP_Query([
                'post_type' => 'solution_item',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);

            while($query->have_posts()) :
            $query->the_post();
            ?>

            <div class="solution-card">

                <h3><?php the_title(); ?></h3>

                <p>
                    <?php the_field('solution_intro'); ?>
                </p>

                <div class="capabilities">

                    <h4>Capabilities</h4>

                    <ul>

                        <?php
                        $caps = explode("\n", get_field('capabilities'));

                        foreach($caps as $cap):
                        ?>

                            <li><?php echo esc_html(trim($cap)); ?></li>

                        <?php endforeach; ?>

                    </ul>

                </div>

                <div class="benefits">

                    <h4>Benefits</h4>

                    <ul>

                        <?php
                        $benefits = explode("\n", get_field('solution_benefits'));

                        foreach($benefits as $benefit):
                        ?>

                            <li><?php echo esc_html(trim($benefit)); ?></li>

                        <?php endforeach; ?>

                    </ul>

                </div>

            </div>

            <?php endwhile; wp_reset_postdata(); ?>

        </div>

    </div>
</section>

<section class="why-lesys">

    <div class="container">

        <div class="section-title">
            <h2>Why Choose LeSys?</h2>
        </div>

        <div class="why-grid">

            <div class="why-card">
                <h3>Industry Expertise</h3>
                <p>
                    Government, Smart Cities, Utilities,
                    Healthcare, Education and Enterprise sectors.
                </p>
            </div>

            <div class="why-card">
                <h3>End-to-End Delivery</h3>
                <p>
                    Strategy, Design, Implementation,
                    Integration, Training and Support.
                </p>
            </div>

            <div class="why-card">
                <h3>Seamless Integration</h3>
                <p>
                    Connect existing enterprise systems
                    with minimum disruption.
                </p>
            </div>

            <div class="why-card">
                <h3>Future-Ready Platforms</h3>
                <p>
                    Scalable and flexible environments
                    that evolve with your business.
                </p>
            </div>

        </div>

    </div>

</section>

<section class="cta-banner">

    <div class="container">

        <h2>
            Ready to Transform Your Business Operations?
        </h2>

        <p>
            Partner with LeSys to build intelligent
            business applications that drive efficiency,
            innovation and growth.
        </p>

        <a href="/contact-us/" class="btn-primary">
            Request Consultation
        </a>

    </div>

</section>

<?php get_footer(); ?>