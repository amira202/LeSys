<?php 
/**
 * Archive Template: Service
 */
get_header(); 

// 1. Setup Query Arguments
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type'      => 'service', 
    'posts_per_page' => 9,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC'
];

if (!empty($_GET['category'])) {
    $args['tax_query'] = [['taxonomy' => 'category', 'field' => 'slug', 'terms' => sanitize_text_field($_GET['category'])]];
}
$query = new WP_Query($args);
?>

<section class="archive-hero">
    <div class="container">
        
        <div class="hero-content">
            <span class="hero-label">Engineering Excellence</span>
            <h1>Our Services</h1>
            <p>Driving operational success through intelligent platforms, continuous monitoring, and tailored innovation.</p>
            <div class="hero-cta-container">
                <a href="/contact" class="btn-primary">Talk to an Expert</a>
            </div>
        </div>
                <!-- Breadcrumbs -->
        <nav class="breadcrumb">
            <a href="<?php echo home_url(); ?>">Home</a> <span>/</span> Services
        </nav>
    </div>
</section>

<section class="archive-main">
    <div class="container">
        <!-- Optimized Filter Tabs -->
        <div class="filter-tabs">
            <a href="?" class="<?php echo empty($_GET['category']) ? 'active' : ''; ?>">All</a>
            <?php
            // Get IDs of all services to filter relevant categories
            $service_ids = get_posts(['post_type' => 'service', 'posts_per_page' => -1, 'fields' => 'ids']);
            $terms = get_terms(['taxonomy' => 'category', 'hide_empty' => true, 'object_ids' => $service_ids]);

            if (!is_wp_error($terms) && !empty($terms)) {
                foreach ($terms as $term) {
                    $active = (isset($_GET['category']) && $_GET['category'] == $term->slug) ? 'active' : '';
                    echo '<a href="?category='.esc_attr($term->slug).'" class="'.$active.'">'.esc_html($term->name).'</a>';
                }
            }
            ?>
        </div>

        <div class="archive-grid">
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <article class="lesys-card">
                    <div class="card-image"><?php if (has_post_thumbnail()) { the_post_thumbnail('medium'); } ?></div>
                    <div class="card-content">
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        <a href="<?php the_permalink(); ?>" class="card-link">Explore Service →</a>
                    </div>
                </article>
            <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
    </div>
</section>

<style>
/* Hero Section */
.archive-hero { background: #0b1f3a; color: #ffffff; padding: 120px 0; }
.breadcrumb { font-size: 0.85rem; color: #6ea3c5;text-align: left;
  margin-top: 20px;}
.breadcrumb a { color: #ffffff; text-decoration: none; }
.hero-content { text-align: left; max-width: 800px; }
.hero-label { color: #6ea3c5; text-transform: uppercase; letter-spacing: 2px; font-size: 0.85rem; margin-bottom: 20px; display: block; }
.btn-primary { display: inline-block; color: #ffffff; padding: 16px 32px; border-radius: 4px; font-weight: 700; text-decoration: none; transition: 0.3s; margin-top: 20px; }
.btn-primary:hover { background: #c24400; }

/* Filter Tabs */
.filter-tabs { display: flex; gap: 15px; margin-bottom: 40px; flex-wrap: wrap; }
.filter-tabs a { padding: 10px 20px; border-radius: 25px; background: #e2e8f0; color: #475569; text-decoration: none; font-weight: 600; transition: 0.3s; }
.filter-tabs a.active, .filter-tabs a:hover { background: var(--red); color: #ffffff; }

/* Grid & Cards */
.archive-main { padding: 80px 0; background: #f8fafc; }
.archive-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; }
.lesys-card { background: #fff; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden; transition: 0.3s; }
.lesys-card:hover { transform: translateY(-5px); border-color: #6ea3c5; box-shadow: 0 10px 20px rgba(0,0,0,0.05); }
.card-image { height: 160px; overflow: hidden; }
.card-image img { width: 100%; height: 100%; object-fit: cover; }
.card-link { color: var(--red); font-weight: 700; text-decoration: none; }
.card-content { 
    padding: 25px; 
    display: flex;
    flex-direction: column;
}

/* Remove default margins that cause excessive spacing */
.card-content h3 { 
    margin: 0 0 8px 0; /* Tightened space below title */
    line-height: 1.2;
}

.card-content p { 
    margin: 0 0 12px 0; /* Tightened space below excerpt */
    line-height: 1.5;
}

.card-link { 
    margin-top: auto; /* Keeps the link aligned if cards have different heights */
    display: inline-block;
}
@media(max-width:992px){ .archive-grid { grid-template-columns: 1fr; } }
.hero-content h1{
    margin-bottom:20px;
}
</style>

<?php
get_template_part('template-parts/content', 'successstory');
get_template_part('template-parts/content', 'trustedfoundations');
get_template_part('template-parts/content', 'contact');
get_footer(); 
?>