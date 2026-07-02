<?php
/**
 * Template Name: Why LeSys Page
 */

get_header(); 

// Fetch Fields
$hero_title = get_field('why_hero_title') ?: 'More Than a <br><span class="ac">Technology Provider</span>';
$hero_desc  = get_field('why_hero_desc') ?: '<p>Organizations today require more than products and platforms. They need a strategic partner capable of understanding their challenges, aligning with their objectives, and delivering measurable outcomes.</p><p style="margin-top: 15px;">LESYS combines consulting expertise, technology innovation, operational excellence, and long-term partnership to help organizations achieve their goals with confidence.</p>';

// Features Data Array
$features = [
    ['icon' => 'fa-bullseye', 'title' => get_field('feat_1_title') ?: 'Outcome-Driven', 'desc' => get_field('feat_1_desc') ?: 'Every initiative begins with a clear understanding of the business outcome we aim to achieve. Our focus is operational and strategic value.'],
    ['icon' => 'fa-link', 'title' => get_field('feat_2_title') ?: 'End-to-End', 'desc' => get_field('feat_2_desc') ?: 'From advisory and strategy to implementation and managed services, we provide a single accountable partner throughout the entire lifecycle.'],
    ['icon' => 'fa-building-columns', 'title' => get_field('feat_3_title') ?: 'Industry Expertise', 'desc' => get_field('feat_3_desc') ?: 'We understand the unique challenges facing governments, municipalities, utilities, and critical infrastructure operators.'],
    ['icon' => 'fa-gear', 'title' => get_field('feat_4_title') ?: 'Operational Excellence', 'desc' => get_field('feat_4_desc') ?: 'Our solutions are designed not only to function technically but also to improve how organizations perform and deliver services.'],
    ['icon' => 'fa-microchip', 'title' => get_field('feat_5_title') ?: 'Innovation with Purpose', 'desc' => get_field('feat_5_desc') ?: 'We leverage AI, IoT, automation, cloud, and cybersecurity to solve real-world operational challenges.']
];
?>

<!-- 1. HERO BRAND INTRO -->
<section class="section dark ab-hero">
    <div class="container">
        <div class="left-side">
            <div class="eyebrow on-dark">Why LESYS</div>
            <h1 class="title huge"><?php echo wp_kses_post($hero_title); ?></h1>
        </div>
        <div class="right-side hero-text-side">
            <?php echo wp_kses_post($hero_desc); ?>
        </div>
    </div>
</section>

<!-- 2. DIFFERENTIATORS GRID -->
<section class="section" id="why-diff">
    <div class="container">
        <div class="sec-head text-center">
            <h2 class="title">What Makes Us Different</h2>
        </div>
        <div class="diff-grid">
            <?php foreach ($features as $f) : ?>
                <div class="diff-card">
                    <div class="diff-icon"><i class="fa-solid <?php echo esc_attr($f['icon']); ?>"></i></div>
                    <h4><?php echo esc_html($f['title']); ?></h4>
                    <p><?php echo esc_html($f['desc']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php
get_template_part('template-parts/content', 'successstory'); 
get_template_part('template-parts/content', 'trustedfoundations'); 
get_template_part('template-parts/content', 'contact'); ?>
<style>
  /* Differentiators Grid */
.diff-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
}

.diff-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    padding: 40px;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.diff-card:hover {
    box-shadow: 0 15px 30px rgba(0,0,0,0.05);
    border-color: var(--blue);
}

.diff-icon {
    font-size: 2rem;
    color: var(--blue);
    margin-bottom: 20px;
}

.diff-card h4 {
    color: #0f172a;
    margin-bottom: 15px;
}

.diff-card p {
    color: #64748b;
    line-height: 1.6;
    font-size: 0.95rem;
}

/* Section Centering */
.text-center { text-align: center; }
/* Update the grid to be more flexible */
.diff-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 columns on large screens */
    gap: 30px;
    margin-top: 50px;
}

/* Ensure the last two cards center themselves if they don't fill the row */
@media (min-width: 992px) {
    .diff-grid .diff-card:nth-child(4),
    .diff-grid .diff-card:nth-child(5) {
        grid-column: span 1;
    }
}

/* Responsive adjustment */
@media (max-width: 991px) {
    .diff-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 768px) {
    .diff-grid { grid-template-columns: 1fr; }
}
.ab-hero .container {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Split hero into two sides */
    gap: 40px;
    align-items: center;
}

.ab-hero .title.huge { margin: 0; }
.ab-hero .hero-text-side { padding-left: 20px; border-left: 2px solid var(--blue); }
/* Increase space between the Hero and the "What Makes Us Different" section */
#why-diff {
    padding-top: 100px;
    padding-bottom: 80px;
}

/* Ensure the heading has proper breathing room */
.sec-head.text-center {
    margin-bottom: 60px !important;
}
.diff-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* Default 3 columns */
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
}

/* For smaller screens, drop to 2 columns */
@media (max-width: 992px) {
    .diff-grid { grid-template-columns: repeat(2, 1fr); }
}

/* For mobile, 1 column */
@media (max-width: 768px) {
    .diff-grid { grid-template-columns: 1fr; }
}
.sec-head h2.title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--navy); /* Match your site's navy blue */
    text-transform: uppercase;
    letter-spacing: -0.5px;
}
.ab-hero {
    /* Increase this value to create more space between the menu and the text */
    padding-top: 180px !important; 
    padding-bottom: 60px;
}
.eyebrow {
    /* Increase this value to create more space below the badge */
    margin-bottom: 25px !important; 
    display: inline-block; /* Ensures the margin is respected */
}
.ac{
  color: #3c6481;
}
.right-side.hero-text-side{
    line-height:33px;
}
  </style>
<?php get_footer(); ?>