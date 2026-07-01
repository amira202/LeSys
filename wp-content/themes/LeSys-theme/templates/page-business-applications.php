<?php
/**
 * Template Name: Solution Category Template
 */
get_header(); 

// Get the current category term
$term = get_queried_object(); 
$bg_media = get_field('bg_media', $term);
$intro = get_field('intro_text', $term);
$t_head = get_field('transform_heading', $term);
$t_desc = get_field('transform_desc', $term);
?>

<section class="solution-hero" style="position:relative; overflow:hidden;">
    <?php if($bg_media): ?>
        <div class="hero-bg" style="position:absolute; top:0; left:0; width:100%; height:100%; z-index:0;">
            <?php if(pathinfo($bg_media['url'], PATHINFO_EXTENSION) === 'mp4'): ?>
                <video autoplay muted loop playsinline style="width:100%; height:100%; object-fit:cover;"><source src="<?php echo esc_url($bg_media['url']); ?>" type="video/mp4"></video>
            <?php else: ?>
                <img src="<?php echo esc_url($bg_media['url']); ?>" style="width:100%; height:100%; object-fit:cover;">
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="container" style="position:relative; z-index:1; padding: 100px 0;">
        <h1><?php echo esc_html($term->name); ?></h1>
        <p><?php echo esc_html($intro); ?></p>
    </div>
</section>

<section class="transform-section" style="padding: 80px 0; background: #f8fafc;">
    <div class="container">
        <h2><?php echo esc_html($t_head); ?></h2>
        
        <!-- Transformation Description and List -->
        <div class="transform-content" style="margin-bottom: 40px; font-size: 1.1rem; color: #4a5568;">
            <p><?php echo esc_html($t_desc); ?></p>
            <p style="margin-top: 20px; font-weight: bold;">Our solutions are designed to:</p>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: 8px;">• Improve operational efficiency</li>
                <li style="margin-bottom: 8px;">• Increase organizational agility</li>
                <li style="margin-bottom: 8px;">• Enhance customer satisfaction</li>
                <li style="margin-bottom: 8px;">• Enable data-driven decision making</li>
                <li style="margin-bottom: 8px;">• Reduce operational costs</li>
                <li style="margin-bottom: 8px;">• Accelerate digital transformation initiatives</li>
            </ul>
        </div>
    </div>
</section>

<section class="solutions-explorer" style="padding: 80px 0;">
    <div class="container">
        <?php 
        $args = [
            'post_type' => 'solution',
            'tax_query' => [['taxonomy' => 'solution_category', 'terms' => $term->term_id]]
        ];
        $query = new WP_Query($args);
        while($query->have_posts()) : $query->the_post(); ?>
            <div class="sub-solution-card" id="<?php echo sanitize_title(get_the_title()); ?>" style="margin-bottom: 40px; padding: 40px; border-radius: 12px; border: 1px solid #e2e8f0; background: #fff;">
                <h3><?php the_title(); ?></h3>
                <div class="card-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 20px;">
                    <div class="caps">
                        <h4>Capabilities</h4>
                        <ul><?php foreach(explode("\n", get_field('capabilities')) as $c) echo "<li>$c</li>"; ?></ul>
                    </div>
                    <div class="bens">
                        <h4>Benefits</h4>
                        <ul><?php foreach(explode("\n", get_field('benefits')) as $b) echo "<li>$b</li>"; ?></ul>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>

<?php get_footer(); ?>