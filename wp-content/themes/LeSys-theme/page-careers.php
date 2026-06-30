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
    <?php echo do_shortcode('[jobpost layout="grid"]'); ?>
</div>
    </div>
</section>

<style>
/* Hero - Matches Enterprise Style */
.careers-hero { padding: 120px 0; background: #0b1f3a; color: #fff; }
.careers-hero h1 { font-size: clamp(2.5rem, 5vw, 3.5rem); line-height: 1.1; margin-bottom: 20px; }
.careers-hero h1 span.ac { color: #6ea3c5; }

/* Content Section - Dark Theme Consistency */
.careers-content { padding: 80px 0; }
.section-title { font-size: 2rem; margin-bottom: 40px; color: #0b1f3a; }
.intro-text { max-width: 800px; margin: 0 auto 60px; text-align: center; font-size: 1.1rem; line-height: 1.7; color: #667085; }

/* Grid Cards - Updated to Darker Palette */
.features-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
.feat-card { padding: 35px; background: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; transition: 0.3s; }
.feat-card:hover { border-color: #6ea3c5; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
.feat-card h6 { color: #0b1f3a; margin-bottom: 12px; font-weight: 700; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.5px; }
.feat-card p { color: #667085; line-height: 1.6; font-size: 0.95rem; margin: 0; }

/* Job Board Styling */
.careers-jobs { padding: 80px 0; background: #f8fafc; }
.job-board-wrap { max-width: 1000px; margin: 0 auto; }

/* Responsive adjustments */
@media (max-width: 768px) {
    .careers-hero { padding: 80px 0; }
}
</style>

<?php get_footer(); ?>