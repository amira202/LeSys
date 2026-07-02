<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php
// ACF Field Mapping
$hero = get_field('hero_section') ?: [];
$bg = $hero['background_image'] ?? '';
$video = $hero['media'] ?? '';
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
<!--<section class="industry-hero" style="background-image:url('<?php echo esc_url($bg); ?>');">
    <div class="overlay"></div>
    <div class="container hero-content">
        <?php if ($subtitle): ?><span class="hero-subtitle"><?php echo esc_html($subtitle); ?></span><?php endif; ?>
        <h1 class="hero-title"><?php the_title(); ?></h1>
        <?php if ($short_desc): ?><p class="hero-description"><?php echo esc_html($short_desc); ?></p><?php endif; ?>
        <div class="hero-cta">
            <a href="#contact" class="btn-primary"><?php echo esc_html($cta1); ?></a>
            <a href="<?php echo esc_url($cta2_url); ?>" class="btn-secondary"><?php echo esc_html($cta2); ?></a>
        </div>
        
        <?php if (shortcode_exists('lesys_breadcrumbs')) {
    echo do_shortcode('[lesys_breadcrumbs]');
} ?>
    </div>
</section>-->


<section class="industry-hero <?php echo $video ? 'has-video' : 'has-image'; ?>" 
         style="<?php echo !$video ? 'background-image:url(\'' . esc_url($bg) . '\');' : ''; ?>">

    <?php if ($video) : ?>
        <video id="industryVideo" class="hero-video" autoplay loop muted playsinline preload="auto" src="<?php echo esc_url($video); ?>"></video>
        <button id="soundToggle" class="video-sound-btn">🔇 Sound Off</button>
    <?php endif; ?>

    <div class="overlay"></div>
    
    <div class="container hero-content">
        <?php if ($subtitle): ?><span class="hero-subtitle"><?php echo esc_html($subtitle); ?></span><?php endif; ?>
        <h1 class="hero-title"><?php the_title(); ?></h1>
        <?php if ($short_desc): ?><p class="hero-description"><?php echo esc_html($short_desc); ?></p><?php endif; ?>
        
        <div class="hero-cta">
            <a href="#contact" class="btn-primary"><?php echo esc_html($cta1); ?></a>
            <a href="<?php echo esc_url($cta2_url); ?>" class="btn-secondary"><?php echo esc_html($cta2); ?></a>
        </div>
        
        <?php if (shortcode_exists('lesys_breadcrumbs')) {
            echo do_shortcode('[lesys_breadcrumbs]');
        } ?>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const video = document.getElementById("industryVideo");
    const btn = document.getElementById("soundToggle");
    const section = document.querySelector(".industry-hero");

    if (video && btn) {
        // Sound State
        const isSoundEnabled = localStorage.getItem("homesoundEnabled") === "true";
        video.muted = !isSoundEnabled;
        btn.textContent = isSoundEnabled ? "🔊 Sound On" : "🔇 Sound Off";

        btn.addEventListener("click", () => {
            video.muted = !video.muted;
            localStorage.setItem("homesoundEnabled", (!video.muted).toString());
            btn.textContent = video.muted ? "🔇 Sound Off" : "🔊 Sound On";
        });

        // Intersection Observer for Play/Pause
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                entry.isIntersecting ? video.play().catch(() => {}) : video.pause();
            });
        }, { threshold: 0.3 });
        observer.observe(section);
    }
});
</script>

<style>
.industry-hero { position: relative; overflow: hidden; background-size: cover; background-position: center; }
.hero-video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; }
.industry-hero .overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.4); z-index: 1; }
.industry-hero .container { position: relative; z-index: 2; }
.video-sound-btn { position: absolute; bottom: 20px; right: 20px; z-index: 10; background: rgba(0,0,0,0.6); color: #fff; padding: 10px; border-radius: 6px; cursor: pointer; border: 1px solid white; }
</style>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const video = document.getElementById("earthVideo");
    const btn = document.getElementById("soundToggle");
    const heroSection = document.querySelector(".hero");
    let sectionVisible = false;

    // 1. Initialize State
    const isSoundEnabled = localStorage.getItem("homesoundEnabled") === "true";
    video.muted = !isSoundEnabled;
    btn.textContent = isSoundEnabled ? "🔊 Sound On" : "🔇 Sound Off";

    // 2. Play Helper
    const attemptPlay = () => {
        if (sectionVisible && !document.hidden) {
            video.play().catch(e => console.warn("Autoplay blocked, user interaction required."));
        }
    };

    // 3. Toggle Logic
    btn.addEventListener("click", () => {
        video.muted = !video.muted;
        localStorage.setItem("homesoundEnabled", (!video.muted).toString());
        btn.textContent = video.muted ? "🔇 Sound Off" : "🔊 Sound On";
        attemptPlay();
    });

    // 4. Observer: Stop/Play on scroll
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            sectionVisible = entry.isIntersecting;
            sectionVisible ? attemptPlay() : video.pause();
        });
    }, { threshold: 0.3 });

    observer.observe(heroSection);

    // 5. Tab Visibility
    document.addEventListener("visibilitychange", () => {
        document.hidden ? video.pause() : attemptPlay();
    });
});
</script>

<style>
.hero { position: relative; overflow: hidden; height: 100vh; }
.hero-video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; }
.hero-overlay { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.4); z-index: 1; }
.hero-inner { position: relative; z-index: 2; height: 100%; display: flex; flex-direction: column; justify-content: center; }
.video-sound-btn { position: absolute; bottom: 20px; right: 20px; z-index: 10; background: rgba(0,0,0,0.6); color: #fff; border: 1px solid rgba(255,255,255,0.3); padding: 10px 14px; border-radius: 6px; cursor: pointer; }
</style>

<!-- Sticky Nav -->
<nav class="industry-sticky-nav">
    <a href="#overview">Overview</a>
    <a href="#deliverables">What We Deliver</a>
    <a href="#capabilities">Key Capabilities</a>
    <a href="#impact">Business Value</a>
    <a href="#why-lesys">Why LESYS</a>
    <a href="#related-services">Related Services</a>
</nav>

<section class="industry-section">
    <div class="container">
        <div class="industry-content-full">
            
           <!--<section class="overview-section" id="overview">
    <div class="container overview-grid">
        <div class="overview-content">
            <span class="section-label">Overview</span>
            <h3><?php echo esc_html($overview_heading);?></h3>
            <?php echo wpautop($overview_part1); ?>
        </div>
        <div class="overview-highlight">
            <p><?php echo wpautop($overview_part2); ?></p>
        </div>
    </div>
</section>-->

           <section class="overview-section" id="overview" style="background:url('http://localhost/wordpress/wp-content/uploads/2026/07/New-Project1.png');">
    <div class="container overview-grid">
        <div class="overview-content">
            <span class="section-label eyebrow">Overview</span>
            <!-- You can hardcode a headline here or use a secondary ACF field -->
            <?php echo wpautop($overview_part1); ?>
        </div>
        <div class="overview-highlight">
            <h3><?php echo esc_html($overview_heading);?></h3>
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
    <span class="section-label eyebrow">Key Capabilities</span>
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
    <span class="section-label eyebrow">Business Value</span>
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
        <span class="section-label eyebrow">Related Services</span>
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
<style>
    .overview-section{
    color: white;
    line-height: 1.6rem;
    border-radius: 22px;
    max-width: 90%;
    }
    .eyebrow {
    display: inline-block;
    padding: 7px 16px;
    border: 1px solid #d8dee5;
    background: #fff;
    border-radius: 999px;
    font-size: 18px;
    color: var(--text);
}
.overview-highlight {
    background: unset; 
    padding: unset;
    border-left: 4px solid var(--primary); */
    border-radius: unset; 
}
.overview-highlight p{
    color:#fff;
    padding-left: 40px;
}
.overview-grid {
    gap: 40px;
            }

.sub-item:hover .sub-content {
    transform: rotate(calc(-360deg / var(--total) * var(--i))) scale(1.1);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    background-color: var(--red);
    border-color: var(--primary);
    color: white;

}
/* 1. Add transition to the base element to make the zoom smooth */
.sub-content {
    transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
    /* other existing styles */
}

/* 2. Update the hover state */
.sub-item:hover .sub-content {
    transform: rotate(calc(-360deg / var(--total) * var(--i))) scale(1.2); /* Increased scale to 1.2 for a more noticeable zoom */
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3); /* Slightly larger shadow for depth */
    background-color: var(--red);
    border-color: var(--primary);
    color: white;
    z-index: 10; /* Ensures the zoomed item sits on top of neighbors */
}
.industry-block p ,.related-services-section p{
    line-height:1.9;
}
.industry-block ,.related-services-section{

    max-width: 90%;
}
.stepper-container {
    gap: 10px;
            }
            .value-check {
  color: var(--blue-d);}
.industry-block.highlight {
  padding: 30px;
  border-left: 4px solid var(--blue-d);
  border-radius: 20px;
  background: var(--blue-l);
}
    </style>
<?php endwhile; endif; get_footer(); ?>