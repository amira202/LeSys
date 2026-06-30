<?php
/**
 * Template Name: CEO Message Corporate Expanded
 */
get_header(); ?>

<section class="ceo-talk-section">
    <div class="ceo-message-frame">
        <div class="ceo-portrait-wrapper">
            <?php 
            $image = get_field('ceo_image');
            if( $image ): ?>
                <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif; ?>
        </div>
        
        <h1 class="ceo-heading"><?php the_field('talk_heading'); ?></h1>
        
        <div class="ceo-content">
            <?php echo get_field('talk_body'); ?>
        </div>
        
        <div class="ceo-footer">
            <p><strong><?php the_field('ceo_name'); ?></strong></p>
            <p><em><?php the_field('closing_signature'); ?></em></p>
            
<div class="ceo-social-links">
    <p><strong>Connect with me:</strong></p>
    <div class="social-icons">
        <a href="https://majeedalsolime.com" target="_blank">
            <i class="fas fa-globe"></i> majeedalsolime.com
        </a>
        <a href="https://linkedin.com/in/majeedalsolime" target="_blank">
            <i class="fab fa-linkedin"></i> majeedalsolime
        </a>
        <a href="https://x.com/MajeedAlsolime" target="_blank">
            <i class="fab fa-x-twitter"></i> @majeedalsolime 
        </a>
    </div>
</div>
        </div>
    </div>
</section>

<style>
.ceo-talk-section {
    background-color: #0A192F; 
    padding: 80px 20px;
    display: flex;
    justify-content: center;
}

.ceo-message-frame {
    background: #0D2137;
    border: 2px solid #5A819D; 
    border-radius: 8px;
    padding: 60px;
    max-width: 900px;
    width: 100%;
    text-align: center;
}

.ceo-portrait-wrapper {
    display: flex;
    justify-content: center;
    margin-bottom: 30px;
}

.ceo-portrait-wrapper img {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    object-fit: cover;
    border: 4px solid #5A819D; 
}

.ceo-heading {
    color: #E2462B; 
    font-size: 2.2rem;
    margin-bottom: 30px;
    line-height: 1.2;
}

.ceo-content {
    color: #ffffff;
    font-size: 1.1rem;
    line-height: 1.6;
    text-align: left;
    margin-bottom: 40px;
}

.ceo-footer {
    border-top: 1px solid #5A819D;
    padding-top: 20px;
    text-align: left;
}

.ceo-footer p {
    color: #ffffff;
    margin: 5px 0;
}

.ceo-social-links {
    margin-top: 20px;
    border-top: 1px solid #5A819D;
    padding-top: 15px;
}

.ceo-social-links a {
    color: #E2462B;
    text-decoration: none;
    font-weight: bold;
}

.ceo-social-links a:hover {
    text-decoration: underline;
}
.social-icons {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-top: 15px;
}

.social-icons a {
    color: #ffffff !important;
    text-decoration: none;
    font-size: 1rem;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: color 0.3s ease;
}

.social-icons a:hover {
    color: #BC5534 !important; /* Orange hover effect */
}

/* Ensure icons are visible if using FontAwesome */
.social-icons i {
    font-size: 1.2rem;
    color: #BC5534;
}
</style>
    <?php 
get_template_part('template-parts/content', 'successstory'); 
get_template_part('template-parts/content', 'trustedfoundations'); 
get_template_part('template-parts/content', 'contact'); ?>
<?php get_footer(); ?>