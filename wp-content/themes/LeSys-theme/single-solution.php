<?php 
/**
 * Template Name: Business Applications Page
 */
get_header(); 

// 1. Get the terms assigned to this post
$terms = get_the_terms(get_the_ID(), 'solution_category');

if ($terms && !is_wp_error($terms)) {
    // Take the first category found
    $current_term = $terms[0];
    
    // 1. Get the Name
    $category_name = $current_term->name;
    
    // 2. Get the Content (Description)
    // Note: WordPress stores the term content in the 'description' field
    $category_content = term_description($current_term->term_id); 
    
    // 3. Output them where you need them
    $term_id = $current_term->term_id;
    $term_context = 'solution_category_' . $term_id;

    // 2. Now you can fetch the fields using the context
    $hero_video     = get_field('hero_background_ur', $term_context);
    $hero_title     = get_field('hero_head', $term_context);
    $hero_intro     = get_field('hero_intro', $term_context);
    $trans_head     = get_field('transform_heading', $term_context);
$trans_desc     = get_field('transform_desc', $term_context);
$trans_b_head   = get_field('transformation_bullets_head', $term_context);
$trans_b_raw    = get_field('transformation_bullets', $term_context);
$trans_bullets  = $trans_b_raw ? explode("\n", str_replace("\r", "", $trans_b_raw)) : [];
    // ... rest of your fields
} else {
    // Fallback if no category is assigned
    $hero_video = '';
    $hero_title = get_the_title();
    $hero_intro = '';
    $trans_desc     = '';
$trans_b_head   = '';
$trans_b_raw    = '';
$trans_bullets  = [];
}

// 3. Query 'solution' posts in this category
$solutions = get_posts([
    'post_type'      => 'solution',
    'posts_per_page' => -1,
    'tax_query'      => [['taxonomy' => 'solution_category', 'field' => 'term_id', 'terms' => $term_id]],
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
]);
?>

<header class="hero" <?php 
    // Logic: If it's an image, set it as a background style
    if (!empty($hero_video) && !str_ends_with(strtolower($hero_video), '.mp4')) {
        echo 'style="background-image: url(' . esc_url($hero_video) . '); background-size: cover; background-position: center;"';
    } 
?>>
    <?php 
    // Logic: Only show the video tag if the file ends in .mp4
    if (!empty($hero_video) && str_ends_with(strtolower($hero_video), '.mp4')) : ?>
        <video id="earthVideo" class="hero-video" autoplay loop muted playsinline preload="auto" src="<?php echo esc_url($hero_video); ?>"></video>
        <button id="soundToggle" class="video-sound-btn">🔊 Enable Sound</button>
    <?php endif; ?>

    <div class="hero-overlay"></div>
    <div class="hero-inner">
        <h1 class="hero-title"><?php echo wp_kses_post($hero_title); ?></h1>
        <p class="hero-sub"><?php echo esc_html($hero_intro); ?></p>
        <div class="hero-ctas">
            <?php 
            $btn1_text ='Get Started';
            $btn1_url  = "#contact";
            if ( ! empty($btn1_text) ) : ?>
                <a href="<?php echo esc_url($btn1_url ?: '#contact'); ?>" class="btn btn-primary">
                    <?php echo esc_html($btn1_text); ?> 
                    <span class="arrow"><i class="fa-solid fa-arrow-right"></i></span>
                </a>
            <?php endif; ?>

            <?php 
            $btn2_text = 'Explore Capabilities';
            $btn2_url  = "#capabilities";
            if ( ! empty($btn2_text) ) : ?>
                <a href="<?php echo esc_url($btn2_url ?: '#capabilities'); ?>" class="btn btn-ghost">
                    <?php echo esc_html($btn2_text); ?>
                </a>
            <?php endif; ?>
        </div>
                <!-- Breadcrumbs -->
        <?php if (shortcode_exists('lesys_breadcrumbs')) {
    echo do_shortcode('[lesys_breadcrumbs]');
} ?>
    </div>
</header>

<div class="page-wrapper main-wrapper" id="capabilities">
    <aside class="sticky-sidebar">
        <h3>Our Solutions - <?php echo esc_html($category_name); ?></h3>
        <ul>
            <?php foreach ($solutions as $sol) : ?>
                <li><a href="#<?php echo sanitize_title($sol->post_title); ?>"><?php echo esc_html($sol->post_title); ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div style="margin-top: 20px;">
        <a href="<?php echo esc_url(get_post_type_archive_link('solution')); ?>" class="explore-btn" style="display: block; background: var(--blue); color: #fff; text-align: center; padding: 12px; border-radius: 6px; text-decoration: none; font-weight: bold;">
            Explore All Solutions
        </a>
    </div>
    </aside>

    <div class="content-area">
        <section class="intro-text"><p><?php echo ($category_content); ?></p></section>

        <section class="transform-section">
            <h2><?php echo esc_html($trans_head); ?></h2>
            <p><?php echo esc_html($trans_desc); ?></p>
            
            <div class="transform-details" style="margin-top: 25px;">
                <?php if($trans_b_head) echo '<p>' . esc_html($trans_b_head) . '</p>'; ?>
                <ul style="list-style: none; padding: 0; margin-top: 10px;">
                    <?php foreach ($trans_bullets as $b) : if(!empty(trim($b))) : ?>
                        <li style="margin-bottom: 8px; padding-left: 20px; position: relative;">• <?php echo esc_html(trim($b)); ?></li>
                    <?php endif; endforeach; ?>
                </ul>
            </div>
        </section>

        <?php foreach ($solutions as $sol) : 
            $banner = get_field('banner_image', $sol->ID);
            $caps = explode("\n", str_replace("\r", "", get_field('capabilities', $sol->ID)));
            $bens = explode("\n", str_replace("\r", "", get_field('benefits', $sol->ID)));
        ?>
            <section id="<?php echo sanitize_title($sol->post_title); ?>" class="solution-detail-card">
                <?php if($banner) : ?>
                    <div class="solution-banner"><img src="<?php echo esc_url($banner['url']); ?>" alt="<?php echo esc_attr($sol->post_title); ?>"></div>
                <?php endif; ?>
                <h2><?php echo esc_html($sol->post_title); ?></h2>
                <p><?php echo (esc_html(strip_tags($sol->post_content))); ?></p>
                <div class="specs-grid">
                    <div class="list-column"><h3>Capabilities</h3><ul><?php foreach($caps as $c) if(!empty(trim($c))) echo "<li>".esc_html(trim($c))."</li>"; ?></ul></div>
                    <div class="list-column"><h3>Benefits</h3><ul><?php foreach($bens as $b) if(!empty(trim($b))) echo "<li>".esc_html(trim($b))."</li>"; ?></ul></div>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
</div>
<?php
// Get category term
$terms = get_the_terms(get_the_ID(), 'solution_category');
$term = ($terms && !is_wp_error($terms)) ? $terms[0] : null;

if ($term) : 
    $ctx = 'solution_category_' . $term->term_id;
?>
<section class="why-choose-section">
    <h2 style="text-align: center; margin-bottom: 40px;">Why Choose LeSys?</h2>
    <div class="why-choose-grid">
        <?php for ($i = 1; $i <= 4; $i++) : 
            $title = get_field('wc_title_' . $i, $ctx);
            $desc  = get_field('wc_desc_' . $i, $ctx);
            if ($title) : ?>
                <div class="why-item">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($desc); ?></p>
                </div>
            <?php endif; 
        endfor; ?>
    </div>
</section>
<?php endif; ?>
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
            "name" => "Solutions",
            "item" => get_post_type_archive_link('solution')
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
<?php get_footer(); ?>