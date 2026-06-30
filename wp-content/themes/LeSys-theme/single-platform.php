<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 
$terms = get_the_terms(get_the_ID(), 'category');
    $term = ($terms && !is_wp_error($terms)) ? $terms[0] : null;
    $category_name = $term ? $term->name : 'Platform';
    $term_ids = $terms ? wp_list_pluck($terms, 'term_id') : [];
    $query = new WP_Query([
        'post_type' => 'platform',
        'posts_per_page' => -1,
        'tax_query' => [['taxonomy' => 'category', 'field' => 'term_id', 'terms' => $term_ids]]
    ]);
?>
<section class="industry-hero" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
    <div class="container hero-content">
        <span class="hero-subtitle"><?php echo esc_html($category_name); ?></span>
        <h1 class="hero-title"><?php the_title(); ?></h1>
        <?php // Display the category short description (term description)
                if(category_description($term->term_id)){
                    echo '<p class="hero-description">' . category_description($term->term_id) . '</p>';
                }
?>
        <!-- ✅ CTA BUTTONS -->
        <div class="hero-cta">

            <a href="#contact" class="btn-primary">
                Talk To Expert
            </a>

            <a href="<?php echo "/platforms" ?>" class="btn-secondary">
                Explore All Platforms
            </a>

        </div>
        
        <!-- Breadcrumbs -->
        <?php if (shortcode_exists('lesys_breadcrumbs')) {
    echo do_shortcode('[lesys_breadcrumbs]');
} ?>
    </div>
</section>

<nav id="platform-nav" class="platform-tabs">
    <div class="container">
        <?php while ($query->have_posts()): $query->the_post(); 
            $active = (get_the_ID() == get_queried_object_id()) ? 'active' : '';
            echo '<button class="tab-link '.$active.'" onclick="window.location.href=\''.get_permalink().'\'">'.get_the_title().'</button>';
        endwhile; wp_reset_postdata(); ?>
    </div>
</nav>

<main class="container platform-main">
    <div class="platform-hero-grid">
<?php 
// Define the names of your 3 sub-groups
$sub_title = get_field('platform_subtitle');

?>

<div class="platform-details">
    <!-- Visual Accent Line -->
    <div class="header-accent"></div>
    
    <h2 class="platform-title"><?php the_title(); ?></h2>
    <span class="platform-subtitle"><?php echo $sub_title;?></span>
    
    <div class="platform-content-body">
        <?php the_content(); ?>
    </div>
<?php 
// Define the names of your 3 sub-groups
$groups = get_field('platform_benchmarks');
?>

<div class="benchmark-container">
    <?php foreach ($groups as $group): 
        // Get the specific group
       
        // Only display if the group exists and has data
        if ($group && !empty($group['value'])):
        ?>
            <div class="benchmark-item">
                <span class="benchmark-value"><?php echo esc_html($group['value']); ?></span>
                <span class="benchmark-label"><?php echo esc_html($group['label']); ?></span>
            </div>
        <?php endif; 
    endforeach; ?>
</div>
<div class="platform-more-details">
    <?php if(get_field("more_details_highlight-title")){?>
    <div class="details-card">
        <h3 class="highlight-title"><?php echo get_field("more_details_highlight-title");?></h3>
        <p><?php echo esc_html(get_field("more_details_p_1"));?></p>
    </div>
<?php } if(get_field("more_details_card-title")){?>
    <div class="details-card primary-bg">
        <h3 class="card-title"><?php echo get_field("more_details_card-title");?></h3>
        <p><?php echo esc_html(get_field("more_details_p_2"));?></p>
    </div>
    <?php }?>
</div>
<?php if ($b = get_field('benefits')): ?>
<div class="modern-card">
    <h3 class="card-title">Key Benefits</h3>
    <div class="benefits-grid">
        <?php 
        // We explode the content by line breaks to treat each benefit as an item
        $benefits = explode("\n", strip_tags($b));
        foreach ($benefits as $benefit): 
            if (trim($benefit)): ?>
                <div class="benefit-item">
                    <span class="benefit-icon">✓</span>
                    <span class="benefit-text"><?php echo trim($benefit); ?></span>
                </div>
            <?php endif; 
        endforeach; ?>
    </div>
</div>
<?php endif; ?>            
<?php 
// Assuming $c is your raw text from ACF
if ($c = get_field('capabilities')): 
    // Split the text into an array based on line breaks
    $caps = explode("\n", strip_tags($c));
?>
<section class="capabilities-section">
    <h3 class="section-title">Technical Capabilities</h3>
    <p class="section-subtitle">Advanced feature set designed for high-velocity enterprise operations.</p>
    
    <div class="capabilities-icon-grid">
        <?php foreach ($caps as $cap): 
            $trimmed_cap = trim($cap);
            if ($trimmed_cap): ?>
                <div class="cap-card">
                    <span class="cap-badge"><?php echo strtoupper(substr($trimmed_cap, 0, 1)); ?></span>
                    <h4 class="cap-title"><?php echo esc_html($trimmed_cap); ?></h4>
                </div>
        <?php endif; endforeach; ?>
    </div>
</section>
<?php endif; ?>
        </div>
<div class="platform-right-column">
            <div class="platform-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <?php if(get_field('ideal_for')||get_field('brochure_url')){?>
<aside class="overview-sidebar">
    <!-- This container is the one that will "stick" -->
    <div class="sticky-sidebar-container">
        <?php if ($i_for = get_field('ideal_for')): ?>
            <div class="strip-card">
                <h4>Ideal For</h4>
                <p><?php echo nl2br(esc_html($i_for)); ?></p>
            </div>
        <?php endif; ?>
                <?php if ($url = get_field('brochure_url')): ?>
            <a href="<?php echo esc_url($url); ?>" class="btn-download-sticky" target="_blank">Download Brochure</a>
        <?php endif; ?>
    </div>
</aside>
<?php }?>
        </div>
        <?php if(get_field("the_result")){?>
        <div class="result-section">
    <div class="result-content">
        <h3 class="result-title">The Result</h3>
        <p><?php echo esc_html(get_field("the_result"));?></p>
    </div>
</div>
<?php }?>
    </div>
</main>

<?php endwhile; endif; ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const currentPageTitle = "<?php echo esc_js(get_the_title()); ?>";
    const buttons = document.querySelectorAll('.tab-link');
    buttons.forEach(btn => {
        if (btn.innerText.trim() === currentPageTitle) {
            btn.classList.add('active');
            const targetId = Array.from(buttons).indexOf(btn);
            document.querySelectorAll('.platform-content').forEach(c => c.classList.remove('active'));
            document.getElementById('p-' + targetId).classList.add('active');
            if (targetId !== 0) buttons[0].classList.remove('active');
        }
    });
});

function openPlatform(evt, id, permalink) {
    document.querySelectorAll('.platform-content').forEach(c => c.classList.remove('active'));
    document.querySelectorAll('.tab-link').forEach(b => b.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    evt.currentTarget.classList.add('active');
    if (permalink) { history.pushState(null, null, permalink); }
}
// Add this inside your <script> tag
const observer2 = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.opacity = 1;
            entry.target.style.transform = 'translateY(0)';
        }
    });
});

document.querySelectorAll('.overview-highlight').forEach(el => {
    el.style.opacity = 0;
    el.style.transition = 'all 0.8s ease-out';
    observer2.observe(el);
});

    </script>
    <?php 
get_template_part('template-parts/content', 'successstory'); 
get_template_part('template-parts/content', 'trustedfoundations'); 
get_template_part('template-parts/content', 'contact'); ?>
<?php get_footer(); ?>