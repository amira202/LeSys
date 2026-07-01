<?php 
/**
 * Template Name: Strategic Partners
 */
get_header(); ?>

<main class="partners-page">
<!-- Improved Hero Section -->
    <section class="partners-hero">
        <div class="container hero-grid">
            <div class="hero-text">
                <h1>Strategic Partners</h1>
                <p class="hero-lead">Building Stronger Solutions Through Partnership</p>
                <div class="hero-cta">
                    <a href="#contact-form" class="btn-primary">Become a Partner</a>
                    <a href="#philosophy" class="btn-secondary">Learn More</a>
                </div>
            </div>
            <div class="hero-visual">
                <!-- Decorative element to match LE-SYS tech aesthetic -->
                <div class="tech-blob"></div>
            </div>
        </div>
                
        <!-- Breadcrumbs -->
        <?php if (shortcode_exists('lesys_breadcrumbs')) {
    echo do_shortcode('[lesys_breadcrumbs]');
} ?>
    </div>
    </section>

    <section class="partners-content">
        <div class="container">
            <div class="intro-block">
                <p class="lead">The most successful transformations are built on collaboration. LESYS works closely with leading global technology providers, industry specialists, and innovation partners to deliver comprehensive, future-ready solutions that address complex business and operational challenges.</p>
            </div>

            <h3 class="section-title">Our Partnership Philosophy</h3>
            <p class="philosophy-intro">We believe strategic partnerships create greater value by combining complementary strengths, expertise, and technologies.</p>
            
            <div class="benefits-grid">
                <?php 
                $benefits = [
                    'Best-in-class technologies', 'Proven industry solutions', 'Global innovation', 
                    'Local expertise', 'Integrated service delivery', 'Long-term support and evolution'
                ];
                foreach($benefits as $b): ?>
                    <div class="benefit-item">
                        <div class="icon-indicator"></div>
                        <span><?php echo esc_html($b); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="value-block">
                <h3>Delivering Greater Value</h3>
                <p>Our strategic alliances allow us to accelerate implementation, reduce risk, improve interoperability, and provide clients with access to world-class technologies supported by certified expertise.</p>
                <a href="#contact" class="btn-partner">Become a Partner</a>
            </div>
        </div>
    </section>
</main>
<?php get_template_part('template-parts/content', 'contact'); ?>
<style>
/* Modern LESYS Aesthetic */
:root { 
    --navy: #0b1f3a; 
    --electric-blue: #6ea3c5; 
    --white: #ffffff; 
    --gray-light: #f8fafc;
}

.partners-hero { background: var(--navy); color: var(--white); padding: 80px 0; text-align: center; }
.partners-hero h1 { font-size: 3rem; margin-bottom: 10px; }
.partners-hero .hero-sub { color: var(--electric-blue); font-size: 1.25rem; }

.partners-content { padding: 80px 0; background: var(--white); }
.intro-block { max-width: 800px; margin: 0 auto 60px; text-align: center; font-size: 1.1rem; line-height: 1.8; color: #4a5568; }

.section-title { color: var(--navy); text-align: center; margin-bottom: 15px; }
.philosophy-intro { text-align: center; margin-bottom: 40px; color: #667085; }

/* Refined Grid Cards */
.benefits-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px; margin-bottom: 80px; justify-items: center; }
.benefit-item { 
    display: flex; align-items: center; width: 100%; padding: 25px; 
    background: var(--white); border: 1px solid #e2e8f0; border-radius: 12px; 
    transition: 0.3s ease; box-shadow: 0 4px 6px rgba(0,0,0,0.02);
}
.benefit-item:hover { border-color: var(--electric-blue); box-shadow: 0 10px 20px rgba(110, 163, 197, 0.15); transform: translateY(-5px); }
.icon-indicator { width: 8px; height: 8px; background: var(--electric-blue); border-radius: 50%; margin-right: 15px; }

/* Call to Action Block */
.value-block { background: var(--navy); color: var(--white); padding: 60px; border-radius: 12px; text-align: center; }
.value-block h3 { color: var(--electric-blue); margin-bottom: 20px; }
.btn-partner { 
    display: inline-block; margin-top: 25px; padding: 12px 30px; 
    background: var(--electric-blue); color: var(--navy); font-weight: bold; 
    border-radius: 4px; text-decoration: none; transition: 0.3s;
}
.btn-partner:hover { background: #fff; }
/* Refined Hero Styles */
.hero-grid { display: grid; grid-template-columns: 1fr 1fr; align-items: center; gap: 40px; padding: 100px 0; }
.partners-hero { background: #0b1f3a; color: #fff; overflow: hidden; }
.hero-text h1 { font-size: 3.5rem; line-height: 1.1; margin-bottom: 20px; }
.hero-lead { font-size: 1.4rem; color: #6ea3c5; margin-bottom: 30px; }

/* CTA Buttons */
.btn-primary { 
    color: #fff; padding: 15px 30px; border-radius: 4px; font-weight: 700; text-decoration: none; 
}
.btn-secondary { 
    color: #fff; border: 1px solid #6ea3c5; padding: 15px 30px; margin-left: 15px; text-decoration: none; 
}

/* Decorative Tech Visual */
.tech-blob { 
    width: 300px; height: 300px; background: linear-gradient(135deg, #6ea3c5, #0b1f3a); 
    border-radius: 50px; transform: rotate(15deg); opacity: 0.8;
}

@media (max-width: 768px) {
    .hero-grid { grid-template-columns: 1fr; text-align: center; }
    .tech-blob { display: none; }
}
</style>

<?php get_footer(); ?>