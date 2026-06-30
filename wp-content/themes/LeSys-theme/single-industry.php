<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
// Optional ACF fields (recommended structure)
$overview = get_field('overview');
$how_we_help = get_field('how_we_help');
$key_outcomes = get_field('key_outcomes');
$operational_impact = get_field('operational_impact');
$why_lesys = get_field('why_lesys');
$cta_primary = get_field('cta_button_1_text') ?: 'Contact Us';
$cta_secondary = get_field('cta_button_2_text') ?: 'Explore Industries';
$cta_primary_link = get_field('cta_button_1_url') ?: home_url('/contact');
$cta_secondary_link = get_field('cta_button_2_url') ?: get_post_type_archive_link('industry');
?>

<?php
$hero = get_field('hero_section') ?: [];

$bg = $hero['background_image'] ?? '';
$subtitle = $hero['subtitle'] ?? '';
$short_desc = $hero['short_description'] ?? '';
?>

<section class="industry-hero" style="background-image:url('<?php echo esc_url($bg); ?>');">
    <div class="overlay"></div>

    <div class="container hero-content">

        <?php if ($subtitle): ?>
            <span class="hero-subtitle"><?php echo esc_html($subtitle); ?></span>
        <?php endif; ?>

        <h1 class="hero-title"><?php the_title(); ?></h1>

        <?php if ($short_desc): ?>
            <p class="hero-description">
                <?php echo esc_html($short_desc); ?>
            </p>
        <?php endif; ?>

        <!-- ✅ CTA BUTTONS -->
        <div class="hero-cta">

            <a href="<?php echo esc_url($cta_primary_link); ?>" class="btn-primary">
                <?php echo esc_html($cta_primary); ?>
            </a>

            <a href="<?php echo esc_url($cta_secondary_link); ?>" class="btn-secondary">
                <?php echo esc_html($cta_secondary); ?>
            </a>

        </div>

        <!-- Breadcrumbs -->
        <?php if (shortcode_exists('lesys_breadcrumbs')) {
    echo do_shortcode('[lesys_breadcrumbs]');
} ?>

    </div>
</section>
<nav class="industry-sticky-nav">
    <a href="#overview" class="active">Overview</a>
    <a href="#how-we-help">How We Help</a>
    <a href="#key-outcomes">Key Outcomes</a>
    <a href="#impact">Operational Impact</a>
    <a href="#why-lesys">Why LESYS</a>
    <a href="#lesys-advantage">Advantage</a>
    <a href="#related">Related Industries</a>
</nav>
<section class="industry-section">
    <div class="container">

        <div class="industry-two-column">

            <!-- LEFT SIDE (SINGLE MEDIA) -->
            <div class="industry-media-sticky">

                <div class="media-box">

                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php else: ?>
                        <div class="media-placeholder">
                            Industry Visual
                        </div>
                    <?php endif; ?>

                </div>

            </div>

            <!-- RIGHT SIDE (ALL CONTENT) -->
            <div class="industry-content">

                <?php if ($overview): ?>
                <div class="industry-block" id="overview">
                    <h2>Overview</h2>
                    <div class="content">
                        <?php echo wpautop($overview); ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($how_we_help): ?>
                <div class="industry-block" id="how-we-help">
                    <h2>How We Help</h2>
                    <div class="content">
                        <?php echo wpautop($how_we_help); ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($key_outcomes): ?>
                <div class="industry-block" id="key-outcomes">
                    <h2>Key Outcomes</h2>
                    <div class="content">
                        <?php echo wpautop($key_outcomes); ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($operational_impact): ?>
                <div class="industry-block" id="impact">
                    <h2>Operational Impact</h2>
                    <div class="content">
                        <?php echo wpautop($operational_impact); ?>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($why_lesys): ?>
                <div class="industry-block highlight" id="why-lesys">
                    <h2>Why LESYS</h2>
                    <div class="content">
                        <?php echo wpautop($why_lesys); ?>
                    </div>
                </div>
                <?php endif; ?>

            </div>

        </div>

    </div>
</section>
<!-- =========================
     LESYS Advantage Section
========================== -->
<section class="lesys-section" id="lesys-advantage">
    <div class="lesys-container">

        <!-- HEADER -->
        <div class="lesys-header">
            <span class="lesys-tag">The LESYS Advantage</span>

            <h2>The LESYS Advantage Across Industries</h2>

            <p>
                Regardless of industry, LESYS helps organizations achieve four strategic outcomes:
            </p>
        </div>

        <!-- GRID -->
        <div class="lesys-grid cols-2">

            <!-- 1 -->
            <div class="lesys-card">
                <div class="lesys-icon">⚙</div>
                <h3>Operational Excellence</h3>
                <p>
                    Transforming fragmented processes into streamlined,
                    measurable, and optimized operations.
                </p>
            </div>

            <!-- 2 -->
            <div class="lesys-card">
                <div class="lesys-icon">📊</div>
                <h3>Digital Intelligence</h3>
                <p>
                    Providing real-time visibility, analytics, and actionable
                    insights for informed decision-making.
                </p>
            </div>

            <!-- 3 -->
            <div class="lesys-card">
                <div class="lesys-icon">🛡</div>
                <h3>Resilience & Security</h3>
                <p>
                    Protecting critical operations, infrastructure, and data
                    through secure and resilient technology environments.
                </p>
            </div>

            <!-- 4 -->
            <div class="lesys-card">
                <div class="lesys-icon">🚀</div>
                <h3>Sustainable Growth</h3>
                <p>
                    Creating scalable digital foundations that support innovation,
                    efficiency, and long-term organizational success.
                </p>
            </div>

        </div>

    </div>
</section>
<section class="related-industries"  id="related">
    <div class="container">

        <div class="section-header">
            <span class="section-eyebrow">Related Industries</span>
            <h2>You May Also Be Interested In</h2>
            <p>
                Explore how LESYS helps organizations across industries accelerate
                transformation, improve operations, and deliver measurable outcomes.
            </p>
        </div>

        <div class="related-industries-grid">

            <?php
            $related = new WP_Query([
                'post_type'      => 'industry',
                'posts_per_page' => 3,
                'post__not_in'   => [get_the_ID()],
                'orderby'        => 'menu_order',
            ]);

            if ($related->have_posts()) :
                while ($related->have_posts()) :
                    $related->the_post();

                    $hero = get_field('hero_section');
                    $bg = $hero['background_image'] ?? '';
                    $card_desc = $hero['short_description'] ?? '';
                    ?>

                    <article class="industry-card">

                        <a href="<?php the_permalink(); ?>" class="industry-card-image">
                        <?php 
                        // Get the image from ACF
                        if ($bg) : 
                        // If ACF image exists, display it
                        // You can change 'medium_large' to 'full' or any custom size
                           ?>
                           <img src="<?php echo esc_url($bg); ?>" alt="Industry Image">
                        <?php
                        elseif (has_post_thumbnail()) : 
                         // Fallback to featured image if ACF field is empty
                            the_post_thumbnail('large'); 
                         else : 
                        // Fallback to placeholder
                        ?>
                            <div class="industry-card-placeholder">
                                    Industry
                            </div>
                        <?php endif; ?>

                        </a>

                        <div class="industry-card-content">

                            <h3>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php if ($card_desc) : ?>
                                <p><?php echo wp_trim_words($card_desc, 18); ?></p>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="industry-link">
                                Learn More →
                            </a>

                        </div>

                    </article>

                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>

        </div>

        <div class="related-industries-footer">

            <a href="<?php echo esc_url(get_post_type_archive_link('industry')); ?>"
               class="explore-industries-btn">
                Explore All Our Solutions
            </a>

        </div>

    </div>
</section>

<?php 
get_template_part('template-parts/content', 'successstory'); 
get_template_part('template-parts/content', 'trustedfoundations'); 
get_template_part('template-parts/content', 'contact'); ?>

<?php endwhile; endif; ?>
<?php 
echo '<script type="application/ld+json">';
echo json_encode([
    "@context" => "https://schema.org",
    "@type" => "BreadcrumbList",
    "itemListElement" => [
        [
            "@type" => "ListItem",
            "position" => 1,
            "name" => "Home",
            "item" => home_url()
        ],
        [
            "@type" => "ListItem",
            "position" => 2,
            "name" => "Industries",
            "item" => get_post_type_archive_link('industry')
        ],
        [
            "@type" => "ListItem",
            "position" => 3,
            "name" => get_the_title(),
            "item" => get_permalink()
        ]
    ]
]);
echo '</script>';?>
<?php
get_footer(); ?>