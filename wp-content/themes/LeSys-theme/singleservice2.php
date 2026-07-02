<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
// ACF Field Mapping
$hero = get_field('hero_section') ?: [];
$bg = $hero['background_image'] ?? '';
$subtitle = $hero['subtitle'] ?? '';
$short_desc = $hero['short_description'] ?? '';
$overview_heading = get_field('overview__heading');
$overview_part1 = get_field('overview_part1');
$overview_part2 = get_field('overview_part2');
$how_we_help = get_field('how_we_help'); // This will be transformed into the circles
$key_outcomes = get_field('key_outcomes');
$operational_impact = get_field('operational_impact');
$why_lesys = get_field('why_lesys');

$cta1 = get_field('cta_button_1_text') ?: 'Talk to an Expert';
$cta1_url = get_field('cta_button_1_url') ?: home_url('/contact');
$cta2 = get_field('cta_button_2_text') ?: 'Explore Services';
$cta2_url = get_field('cta_button_2_url') ?: get_post_type_archive_link('service');
?>

<!-- Hero Section -->
<section class="industry-hero" style="background-image:url('<?php echo esc_url($bg); ?>');">
    <div class="overlay"></div>
    <div class="container hero-content">
        <?php if ($subtitle): ?><span class="hero-subtitle"><?php echo esc_html($subtitle); ?></span><?php endif; ?>
        <h1 class="hero-title"><?php the_title(); ?></h1>
        <?php if ($short_desc): ?><p class="hero-description"><?php echo esc_html($short_desc); ?></p><?php endif; ?>
        <div class="hero-cta">
            <a href="<?php echo esc_url($cta1_url); ?>" class="btn-primary"><?php echo esc_html($cta1); ?></a>
            <a href="<?php echo esc_url($cta2_url); ?>" class="btn-secondary"><?php echo esc_html($cta2); ?></a>
        </div>
        
        <!-- Breadcrumbs -->
        <?php if (shortcode_exists('lesys_breadcrumbs')) {
    echo do_shortcode('[lesys_breadcrumbs]');
} ?>
    </div>
</section>

<!-- Sticky Nav -->
<nav class="industry-sticky-nav">
    <a href="#overview">Overview</a>
    <a href="#deliverables">What We Deliver</a>
    <a href="#capabilities">Key Capabilities</a>
    <a href="#impact">Business Value</a>
    <a href="#why-lesys">Why LESYS</a>
    <a href="#Related">Related Services</a>
</nav>

<section class="industry-section">
    <div class="container">
        <div class="industry-content-full">
            
           <section class="overview-section" id="overview">
    <div class="container overview-grid">
        <div class="overview-content">
            <span class="section-label">Overview</span>
            <!-- You can hardcode a headline here or use a secondary ACF field -->
            <h3><?php echo esc_html($overview_heading);?></h3>
            <?php echo wpautop($overview_part1); ?>
        </div>
        <div class="overview-highlight">
            <p><?php echo wpautop($overview_part2); ?></p>
        </div>
    </div>
</section>

            <!-- What We Deliver: Circles Outline -->
<section class="industry-block" id="deliverables">
    <div class="hub-wrapper">
        <!-- Center Hub -->
        <div class="main-hub">
            <h3>What We Deliver</h3>
        </div>

        <?php 
        // Assuming $how_we_help contains your list items
        $items = strip_tags($how_we_help, '<li>');
        $item_list = explode('<li>', str_replace('</li>', '', $items));
        array_shift($item_list); // Remove empty first element

        foreach ($item_list as $index => $item) {
            echo '<div class="sub-item" style="--i:' . $index . '; --total:' . count($item_list) . ';">
                    <div class="sub-content">' . trim($item) . '</div>
                  </div>';
        }
        ?>
    </div>
</section>
            <div class="industry-block" id="capabilities">
    <span class="section-label">Key Capabilities</span>
    <div class="stepper-container">
        <?php 
        $clean_list = str_replace(['<ul>', '</ul>'], '', $key_outcomes);
        $items = explode('<li>', $clean_list);
        $counter = 1;

        foreach ($items as $item) {
            if (trim($item) !== '') {
                echo '<div class="step-item">
                        <div class="step-number">' . str_pad($counter++, 2, '0', STR_PAD_LEFT) . '</div>
                        <div class="step-content">' . str_replace('</li>', '', $item) . '</div>
                      </div>';
            }
        }
        ?>
    </div>
</div>
<?php if ($operational_impact): ?>
<div class="industry-block" id="impact">
    <span class="section-label">Business Value</span>
    <div class="business-value-grid">
        <?php 
        // Strips the <ul>/</ul> tags and converts <li> items into cards
        $clean_list = str_replace(['<ul>', '</ul>'], '', $operational_impact);
        $items = explode('<li>', $clean_list);
        
        foreach ($items as $item) {
            if (trim($item) !== '') {
                echo '<div class="value-card">
                        <div class="value-check">✓</div>
                        <p>' . str_replace('</li>', '', $item) . '</p>
                      </div>';
            }
        }
        ?>
    </div>
</div>
<?php endif; ?>
            <div class="industry-block highlight" id="why-lesys">
                <h2>Why LESYS</h2>
                <?php echo wpautop($why_lesys); ?>
            </div>
            <!-- Related Services Section -->
<section class="related-services-section" id="related-services">
    <div class="container">
        <span class="section-label">Related Services</span>
        <p>Driving growth through digital excellence. We specialize in transforming business operations through expert technology assessment, robust cybersecurity frameworks, and scalable infrastructure strategies, ensuring your enterprise remains competitive, efficient, and resilient.</p>
        <div class="related-grid">
            <?php
            // Get the current service's categories
            $terms = get_the_terms(get_the_ID(), 'category');
            if ($terms && !is_wp_error($terms)) {
                $term_ids = wp_list_pluck($terms, 'term_id');

                $related_query = new WP_Query([
                    'post_type'      => 'service',
                    'posts_per_page' => 3,
                    'post__not_in'   => [get_the_ID()],
                    'tax_query'      => [[
                        'taxonomy' => 'category',
                        'field'    => 'term_id',
                        'terms'    => $term_ids,
                    ]],
                ]);
                if ($related_query->have_posts()) :
                    while ($related_query->have_posts()) : $related_query->the_post(); ?>
                        <div class="related-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="card-img"><?php the_post_thumbnail('medium'); ?></div>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <!-- Displaying the excerpt -->
                    <div class="card-excerpt">
                        <?php echo get_the_excerpt(); ?>
                    </div>
                            <a href="<?php the_permalink(); ?>" class="btn-text">View Service →</a>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>No other services found in this category.</p>';
                endif;
            }
            ?>
        </div>
    </div>
</section>

        </div>
    </div>
</section>
<?php 
get_template_part('template-parts/content', 'successstory'); 
get_template_part('template-parts/content', 'trustedfoundations'); 
get_template_part('template-parts/content', 'contact'); ?>
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
            "name" => "Services",
            "item" => get_post_type_archive_link('service')
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
<?php endwhile; endif; get_footer(); ?>

