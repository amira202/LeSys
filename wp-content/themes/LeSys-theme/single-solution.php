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
                <?php if($trans_b_head) echo '<p><b>' . esc_html($trans_b_head) . '</b></p>'; ?>
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
<style>
    /* 1. Initial State: Cards are hidden and shifted down */
.why-item {
    opacity: 0;
    transform: translateY(30px);
    transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

/* 2. Active State: Cards are visible and in place (added by JS below) */
.why-item.is-visible {
    opacity: 1;
    transform: translateY(0);
}

/* 3. Stagger the animation delay so they appear one by one */
/* Item 1 */
.why-choose-grid .why-item:nth-child(1) { transition-delay: 0.1s; }
/* Item 2 */
.why-choose-grid .why-item:nth-child(2) { transition-delay: 0.3s; }
/* Item 3 */
.why-choose-grid .why-item:nth-child(3) { transition-delay: 0.5s; }
/* Item 4 */
.why-choose-grid .why-item:nth-child(4) { transition-delay: 0.7s; }

/* Optional: Super subtle continuous "pulse" breathing effect after loading */
@keyframes subtle-pulse {
    0% { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
    50% { box-shadow: 0 15px 20px -3px rgba(0, 0, 0, 0.15); }
    100% { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
}

.why-item.is-visible:hover {
    animation: subtle-pulse 2s infinite;
    transform: translateY(-5px); /* Still lift on hover */
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const observerOptions = {
        root: null, // use the viewport
        threshold: 0.2 // trigger when 20% of the item is visible
    };

    const observerCallback = (entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // Optional: stop observing after it has triggered once
                // observer.unobserve(entry.target);
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);

    // Target all the items inside the grid
    document.querySelectorAll('.why-choose-grid .why-item').forEach((item) => {
        observer.observe(item);
    });
});
</script>

 <script>

document.addEventListener("DOMContentLoaded", function () {
    const video = document.getElementById("earthVideo");
    const btn = document.getElementById("soundToggle");
    const heroSection = document.querySelector(".hero");
    let sectionVisible = false;

    // 1. Initialize State from LocalStorage
    const isSoundEnabled = localStorage.getItem("soundEnabled") === "true";
    video.muted = !isSoundEnabled;
    btn.textContent = isSoundEnabled ? "🔊 Sound On" : "🔇 Sound Off";

    // 2. Play helper: Ensures we only play if visible and not hidden
    const attemptPlay = () => {
        if (sectionVisible && !document.hidden) {
            video.play().catch(e => console.log("Autoplay prevented", e));
        }
    };

    // 3. Toggle Logic
    btn.addEventListener("click", () => {
        const newSoundState = video.muted; // current state
        video.muted = !newSoundState;
        localStorage.setItem("soundEnabled", (!newSoundState).toString());
        btn.textContent = video.muted ? "🔇 Sound Off" : "🔊 Sound On";
        attemptPlay();
    });

    // 4. Observer: Stop/Play when scrolling
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            sectionVisible = entry.isIntersecting;
            if (sectionVisible) {
                attemptPlay();
            } else {
                video.pause();
            }
        });
    }, { threshold: 0.3 });

    observer.observe(heroSection);

    // 5. Tab Visibility: Stop/Play when switching tabs
    document.addEventListener("visibilitychange", () => {
        if (document.hidden) {
            video.pause();
        } else {
            attemptPlay();
        }
    });
});
    </script>
<style>
.video-sound-btn {
    position: absolute;
    bottom: 20px;
    right: 20px;
    z-index: 10;
    background: rgba(0,0,0,0.6);
    color: #fff;
    border: 1px solid rgba(255,255,255,0.3);
    padding: 10px 14px;
    border-radius: 6px;
    cursor: pointer;
}
</style>
<?php get_footer(); ?>