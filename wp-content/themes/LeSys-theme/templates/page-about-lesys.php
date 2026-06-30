<?php
/**
 * Template Name: About LeSys Page
 */
get_header(); 

// Fetch Fields
$eyebrow   = get_field('ab_hero_eyebrow') ?: 'About LeSys';
$title     = get_field('ab_hero_title') ?: 'Transforming Vision into <br><span class="highlight">Operational Excellence</span>';
$hero_desc = get_field('ab_hero_desc') ?: 'LESYS is a technology and operations company dedicated to helping governments, municipalities, utilities, enterprises, and critical industries navigate the complexities of the digital era.';
$narrative = get_field('ab_narrative') ?: '<p>Our approach extends beyond traditional technology implementation. We focus on enabling measurable business outcomes, operational efficiency, service excellence, and sustainable growth through integrated solutions that connect people, processes, technology, and data.</p><p>From digital transformation initiatives and smart city programs to cybersecurity, cloud modernization, municipal operations, and mission-critical command centers, LESYS serves as a trusted partner throughout every stage of the transformation journey.</p>';
$vision    = get_field('ab_vision') ?: 'To lead the region in architecting intelligent, resilient, and interoperable digital systems that transform operations, strengthen institutional capability, and drive sustainable value creation.';
$mission   = get_field('ab_mission') ?: 'To deliver cutting-edge solutions, strategic intelligence, and operational excellence that empower organizations to modernize, optimize, secure, and transform their operations—driving measurable, technology-led impact and sustainable growth.';
$philosophy = get_field('ab_philosophy') ?: 'Technology alone does not create transformation. Success occurs when technology, operations, governance, and people work together toward a common objective. This ensures that our solutions deliver practical, measurable, and sustainable results.';
?>

<section class="section ab-hero">
    <div class="container">
        <div class="eyebrow" style="color: var(--blue); margin-bottom: 10px; text-transform: uppercase; font-weight: 600;">
            <?php echo esc_html($eyebrow); ?>
        </div>
        <h1 class="platform-title"><?php echo wp_kses_post($title); ?></h1>
        <div class="hero-content">
            <p><?php echo esc_html($hero_desc); ?></p>
        </div>
    </div>
</section>

<section class="section narrative-section">
    <div class="container">
        <div class="card-large">
            <?php echo wp_kses_post($narrative); ?>
        </div>
    </div>
</section>

<section class="section compass-grid">
    <div class="container">
        <div class="grid-three">
            <div class="compass-card">
                <h3>Our Vision</h3>
                <p><?php echo esc_html($vision); ?></p>
            </div>
            <div class="compass-card">
                <h3>Our Mission</h3>
                <p><?php echo esc_html($mission); ?></p>
            </div>
            <div class="compass-card">
                <h3>Our Philosophy</h3>
                <p><?php echo esc_html($philosophy); ?></p>
            </div>
        </div>
    </div>
</section>
<?php 
get_template_part('template-parts/content', 'successstory'); 
get_template_part('template-parts/content', 'trustedfoundations'); 
get_template_part('template-parts/content', 'contact'); ?>
<style>
/* Layout Spacing */
.section { padding: 60px 0; }
.narrative-section { padding-top: 20px; }

/* Hero Text Styling */
.platform-title { font-size: 2.5rem; font-weight: 800; color: var(--navy); margin-bottom: 20px; }
.highlight { color: var(--blue); }
.hero-content { font-size: 1.15rem; color: #475569; max-width: 850px; line-height: 1.7; }

/* Narrative Card */
.card-large { 
    background: #f8fafc; 
    padding: 50px; 
    border-radius: 16px; 
    border: 1px solid #e2e8f0; 
    line-height: 1.7;
    color: #334155;
}

/* Grid & Cards */
.grid-three { display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px; margin-top: 40px; }
.compass-card { 
    background: #0f172a; 
    color: #ffffff; 
    padding: 40px; 
    border-radius: 16px; 
}
.compass-card h3 { 
    color: var(--blue); 
    margin-bottom: 20px; 
    font-size: 1.4rem;
    font-weight: 700; /* Added boldness for title contrast */
}
.compass-card p { opacity: 0.9; line-height: 1.7; font-size: 0.95rem; }

@media (max-width: 768px) {
    .grid-three { grid-template-columns: 1fr; }
}
.ab-hero {
    /* Adjust this value based on your header height */
    padding-top: 140px !important; 
    padding-bottom: 60px;
}
</style>
<?php get_footer(); ?>