<?php 
/*
 * Template Name: Careers Page
 */
get_header(); ?>


<section class="careers-hero">
    <div class="container">
        <h1>Build the<br><span class="ac">Future with LESYS</span></h1>
        <p class="lead">At LESYS, we believe that exceptional people create exceptional outcomes. We are always looking for talented, ambitious, and innovative professionals.</p>
    </div>
</section>

<section class="careers-content">
    <div class="container">
        <div class="intro-text">
            <p>Joining LESYS means becoming part of a team that is shaping the future of digital transformation, smart cities, cybersecurity, infrastructure, and operational excellence.</p>
        </div>

        <h3 class="section-title">Why Join Us</h3>
        <div class="features-grid">
            <?php 
            $features = [
                ['Meaningful Work', 'Contribute to projects that improve organizations, communities, and public services.'],
                ['Professional Growth', 'Access continuous learning, certifications, mentorship, and career development.'],
                ['Innovation Culture', 'Work with emerging technologies and innovative solutions.'],
                ['Collaborative Environment', 'Join a team that values expertise, diversity, and teamwork.'],
                ['Long-Term Opportunities', 'Build a rewarding career within a growing organization.']
            ];
            foreach($features as $f): ?>
                <div class="feat-card">
                    <h6><?php echo esc_html($f[0]); ?></h6>
                    <p><?php echo esc_html($f[1]); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="careers-jobs">
    <div class="container">
        <h3 class="section-title">Explore Opportunities</h3>
        <p class="section-sub">Discover how your skills can contribute to shaping the future with LESYS.</p>
        
<div class="job-board-wrap">
    <?php 
    $args = array(
        'post_type'      => 'jobpost',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
    );
    $job_query = new WP_Query($args);

    if ($job_query->have_posts()) :
        while ($job_query->have_posts()) : $job_query->the_post(); ?>
            <div class="single-job-listing">
                <div class="job-info">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="job-short-desc">
                        <?php 
                        // Displays the excerpt (short description)
                        // If no excerpt is set, it pulls the first 20 words of the content
                        echo wp_trim_words(get_the_excerpt(), 20, '...'); 
                        ?>
                    </div>
                </div>
                <div class="job-actions">
                    <a href="<?php the_permalink(); ?>" class="btn-apply">View Details</a>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata();
    else :
        echo '<p style="text-align:center; padding: 20px;">No open opportunities at this time.</p>';
    endif;
    ?>
</div>
</section>
<style>
/* Reset Section Padding - Shrinking vertical space */
.careers-hero { padding: 60px 0; background: #0b1f3a; color: #fff; text-align: center; }
.careers-content { padding: 40px 0; background: #f8fafc; }
.careers-jobs { padding: 40px 0; background: #fff; }

/* Hero adjustments */
.careers-hero h1 { font-size: clamp(2rem, 4vw, 3rem); margin-bottom: 10px; }
.careers-hero .lead { margin-top: 0; opacity: 0.9; }

/* Tighten Grid & Sections */
.section-title { font-size: 1.75rem; margin-bottom: 25px; color: #0b1f3a; }
.intro-text { max-width: 800px; margin: 0 auto 30px; }

/* Shrink Features Grid */
.features-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; }
.feat-card { padding: 25px; background: #ffffff; border-radius: 8px; border-top: 3px solid #0b1f3a; }

/* Tighten Job Listing Cards */
.single-job-listing { 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    background: #ffffff; 
    border: 1px solid #e2e8f0; 
    padding: 15px 20px; 
    margin-bottom: 10px; /* Reduced space between jobs */
    border-radius: 6px; 
}

.job-short-desc { font-size: 0.9rem; margin-top: 4px; color: #667085; }
.btn-apply { padding: 8px 16px; font-size: 0.85rem; }

/* Responsive */
@media (max-width: 768px) {
    .careers-hero { padding: 50px 0; }
    .careers-content, .careers-jobs { padding: 30px 0; }
}
.section-sub{
margin-bottom:50px;
}
</style>

<?php get_footer(); ?>