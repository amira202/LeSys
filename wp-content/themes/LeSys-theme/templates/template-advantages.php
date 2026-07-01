<?php 
/**
 * Template Name: Advantages & Partners
 */
get_header(); ?>

<main class="lesys-page">
<section class="partners-hero">
    <div class="container hero-grid">
        <div class="hero-text">
            <span class="hero-badge">Engineering Excellence</span>
            <h1>Advantage of LeSys</h1>
            <p class="hero-lead">Transforming complex challenges into seamless, future-ready digital ecosystems through strategic collaboration and engineering excellence.</p>
            <div class="hero-cta">
                <a href="/contact" class="btn-primary">Talk to an Expert</a>
            </div>
        </div>
        <div class="hero-visual">
            <div class="tech-accent">
                <div class="accent-glow"></div>
            </div>
        </div>
    </div>
</section>

<style>
/* Refined Hero Layout */
.partners-hero { background: #0b1f3a; color: #fff; position: relative; overflow: hidden; }
.hero-grid { display: grid; grid-template-columns: 1fr 450px; align-items: center; gap: 60px; padding: 120px 0; }

/* Typographic Polish */
.hero-badge { 
    display: inline-block; background: rgba(110, 163, 197, 0.1); 
    color: #6ea3c5; padding: 6px 14px; border-radius: 50px; 
    font-size: 0.85rem; font-weight: 600; text-transform: uppercase; 
    letter-spacing: 1px; margin-bottom: 20px; border: 1px solid #6ea3c5;
}
.hero-text h1 { font-size: 4rem; line-height: 1; margin-bottom: 25px; letter-spacing: -1px; }

/* Visual Accent Improvements */
.tech-accent { 
    width: 100%; height: 350px; background: rgba(110, 163, 197, 0.05); 
    border: 1px solid rgba(110, 163, 197, 0.3); border-radius: 20px;
    position: relative; backdrop-filter: blur(10px);
}
.accent-glow { 
    position: absolute; width: 150px; height: 150px; background: #6ea3c5;
    filter: blur(80px); top: 20%; left: 20%; opacity: 0.4;
}

/* CTA Polish */
.btn-primary { 
    padding: 18px 36px; 
    border-radius: 6px; font-weight: 700; transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(230, 81, 0, 0.3);
}
.btn-primary:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(230, 81, 0, 0.5); }

@media (max-width: 768px) {
    .hero-grid { grid-template-columns: 1fr; text-align: center; }
    .hero-text { display: flex; flex-direction: column; align-items: center; }
    .hero-visual { display: none; }
}
/* Adding a premium lift effect to advantage cards */
.advantage-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.advantage-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

/* Enhancing the Hero CTA button */
.partners-hero .btn-primary {
    border: none;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-size: 0.9rem;
}
</style>
    <!-- 2. Breadcrumb Navigation -->
    <?php if (is_singular('platform') && !is_post_type_archive('platform')) : ?>
    <section class="breadcrumb-nav">
        <div class="container">
            <nav class="breadcrumb-inner">
                <a href="<?php echo esc_url(get_post_type_archive_link('platform')); ?>">Platforms</a>
                <span>/</span>
                <span class="current"><?php echo esc_html(get_the_title()); ?></span>
            </nav>
        </div>
    </section>
    <?php endif; ?>

    <!-- 3. Advantage of LESYS Section -->
    <section class="advantages-section">
        <div class="container">
            <h2 class="section-title">Advantage of LESYS</h2>
            <div class="advantages-grid">
                <?php 
                $advs = [
                    ['Strategic Clarity', 'Helping organizations define the right vision, priorities, and transformation roadmap.'],
                    ['Engineered Innovation', 'Delivering advanced technologies and intelligent platforms tailored to operational needs.'],
                    ['Flawless Integration', 'Creating unified ecosystems that eliminate silos and improve visibility.'],
                    ['Perpetual Optimization', 'Continuously monitoring, improving, and evolving solutions to maximize long-term value.']
                ];
                foreach($advs as $a): ?>
                    <div class="advantage-card">
                        <h4><?php echo esc_html($a[0]); ?></h4>
                        <p><?php echo esc_html($a[1]); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- 4. Why Clients Choose LESYS Section -->
    <section class="why-choose-lesys">
        <div class="container">
            <h3 class="section-title">Why Clients Choose LESYS</h3>
            <ul class="check-list">
                <?php 
                $reasons = [
                    'Trusted advisor and long-term partner', 'Proven transformation methodologies', 
                    'Deep operational and industry expertise', 'Comprehensive technology capabilities', 
                    'Strong governance and accountability', 'Commitment to measurable outcomes'
                ];
                foreach($reasons as $r): ?>
                    <li><?php echo esc_html($r); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
</main>
<?php get_template_part('template-parts/content', 'contact'); ?>

<style>
/* Global LESYS Palette */
:root { --navy: #0b1f3a; --electric-blue: #6ea3c5; --white: #ffffff; --light-bg: #f8fafc; }

/* Hero */
.partners-hero { background: var(--navy); color: var(--white); padding: 100px 0; text-align: center; }
.partners-hero h1 { font-size: 3.5rem; margin-bottom: 15px; }
.hero-lead { color: var(--electric-blue); font-size: 1.4rem; }

/* Breadcrumbs */
.breadcrumb-nav { background: var(--white); padding: 20px 0; border-bottom: 1px solid #e2e8f0; }
.breadcrumb-inner { display: flex; gap: 10px; font-size: 0.9rem; }
.breadcrumb-inner a { color: #667085; text-decoration: none; }
.breadcrumb-inner .current { color: var(--navy); font-weight: 600; }

/* Advantages Grid */
.advantages-section { padding: 80px 0; background: var(--light-bg); }
.advantages-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px; }
.advantage-card { padding: 30px; background: var(--white); border-radius: 8px; border-bottom: 4px solid var(--electric-blue); transition: 0.3s; }
.advantage-card:hover { transform: translateY(-10px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
.advantage-card h4 { color: var(--navy); margin-bottom: 15px; }

/* Why Choose Section */
.why-choose-lesys { background: var(--navy); color: var(--white); padding: 60px 0; }
.why-choose-lesys .section-title { color: var(--electric-blue); text-align: center; margin-bottom: 40px; }
.check-list { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; list-style: none; padding: 0; max-width: 900px; margin: 0 auto; }
.check-list li { padding-left: 30px; position: relative; }
.check-list li::before { content: '✓'; color: var(--electric-blue); position: absolute; left: 0; font-weight: bold; }
<style>
/* Hero Layout Improvements */
.partners-hero { 
    background: #0b1f3a; 
    color: #fff; 
    position: relative;
    /* Forces a consistent height regardless of screen content */
    min-height: 500px; 
    display: flex;
    align-items: center; /* Vertically centers the grid */
    padding: 60px 0;    /* Provides breathing room on all sides */
}

.hero-grid { 
    display: grid; 
    grid-template-columns: 1fr 1fr; 
    align-items: center; 
    gap: 60px; 
    width: 100%;
}

.hero-text {
    /* Ensures text doesn't hit the edges */
    padding-right: 20px;
}

.hero-text h1 { 
    font-size: 3.5rem; 
    line-height: 1.1; 
    margin-bottom: 20px; 
}

.hero-lead { 
    font-size: 1.25rem; 
    color: #6ea3c5; 
    margin-bottom: 30px; 
    line-height: 1.6; 
}

/* Orange CTA Button */
.btn-primary { 
    display: inline-block; 
    padding: 16px 32px; 
    border-radius: 4px; 
    font-weight: 700; 
    text-decoration: none; 
    transition: 0.3s;
}

@media (max-width: 768px) {
    .partners-hero { min-height: auto; padding: 40px 0; }
    .hero-grid { grid-template-columns: 1fr; text-align: center; }
    .hero-visual { display: none; }
}
</style>


<?php get_footer(); ?>