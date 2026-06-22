<?php
/**
 * Template Name: About LeSys Page
 */

get_header();

// 1. Core Header Data Fetch
$about_eyebrow   = get_field('ab_hero_eyebrow') ?: 'About LeSys';
$about_title     = get_field('ab_hero_title') ?: 'Pioneering Dynamic <br><span class="ac">Sovereign Systems</span>';
$about_paragraph = get_field('ab_hero_desc') ?: 'LeSys designs, integrates, and anchors high-performance digital ecosystems for mission-critical operations and large-scale industrial matrices.';

// 2. Pillars / Values Setup
$v1 = get_field('ab_val_1');
$v2 = get_field('ab_val_2');
$v3 = get_field('ab_val_3');

// 3. Corporate Timeline Setup
$t1 = get_field('ab_time_1');
$t2 = get_field('ab_time_2');
$t3 = get_field('ab_time_3');
?>

<!-- =================================================================
     1. HERO BRAND INTRO
     ================================================================= -->
<section class="section dark ab-hero">
  <div class="container">
    <div class="sec-eyebrow-row">
      <div class="eyebrow on-dark"><?php echo esc_html($about_eyebrow); ?></div>
    </div>
    <div class="sec-head">
      <h1 class="title huge"><?php echo wp_kses_post($about_title); ?></h1>
      <div class="right">
        <p class="lead text-muted"><?php echo esc_html($about_paragraph); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- =================================================================
     2. MISSION CRITICAL VALUES (3 Columns Pattern)
     ================================================================= -->
<section class="section" id="about-values">
  <div class="container">
    <div class="sec-eyebrow-row"><div class="eyebrow">Our Operational Compass</div></div>
    
    <div class="values-grid">
      <div class="val-card">
        <div class="val-icon"><i class="fa-solid fa-microchip"></i></div>
        <h4><?php echo esc_html($v1['title'] ?: 'Absolute Accountability'); ?></h4>
        <p><?php echo esc_html($v1['desc'] ?: 'We bypass third-party fragmentation by engineering and directly maintaining every node in our integrated technology stack.'); ?></p>
      </div>

      <div class="val-card">
        <div class="val-icon"><i class="fa-solid fa-fingerprint"></i></div>
        <h4><?php echo esc_html($v2['title'] ?: 'Localized Sovereignty'); ?></h4>
        <p><?php echo esc_html($v2['desc'] ?: 'Built to respect and enforce local compliance frameworks, our platforms anchor secure native Arabic analytics.'); ?></p>
      </div>

      <div class="val-card">
        <div class="val-icon"><i class="fa-solid fa-chart-line"></i></div>
        <h4><?php echo esc_html($v3['title'] ?: 'Predictive Automation'); ?></h4>
        <p><?php echo esc_html($v3['desc'] ?: 'We transform historic data noise into real-time operational directives, keeping critical systems failure-proof.'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- =================================================================
     3. THE MILESTONE TIMELINE (Interactive Execution Track)
     ================================================================= -->
<section class="section dark" id="about-timeline">
  <div class="container">
    <div class="sec-head">
      <h2 class="title">Our Evolution: <br><span class="ac">Strategic Trajectory</span></h2>
      <div class="right">
        <p>How we systematically engineered a standard framework for cross-department data intelligence.</p>
      </div>
    </div>

    <div class="timeline-wrapper">
      <div class="timeline-bar"></div>
      
      <div class="timeline-nodes-grid">
        <!-- Node 1 -->
        <div class="timeline-node active">
          <div class="marker"></div>
          <span class="year"><?php echo esc_html($t1['year'] ?: '2022'); ?></span>
          <h4><?php echo esc_html($t1['title'] ?: 'Foundational Integration'); ?></h4>
          <p><?php echo esc_html($t1['desc'] ?: 'Launched specialized infrastructure kernels and enterprise connectivity gateways for smart waste frameworks.'); ?></p>
        </div>

        <!-- Node 2 -->
        <div class="timeline-node">
          <div class="marker"></div>
          <span class="year"><?php echo esc_html($t2['year'] ?: '2024'); ?></span>
          <h4><?php echo esc_html($t2['title'] ?: 'Proprietary Scaling'); ?></h4>
          <p><?php echo esc_html($t2['desc'] ?: 'Engineered five localized software platforms including CAGUAR and VISUAL to monitor 5M+ daily field nodes.'); ?></p>
        </div>

        <!-- Node 3 -->
        <div class="timeline-node">
          <div class="marker"></div>
          <span class="year"><?php echo esc_html($t3['year'] ?: '2026'); ?></span>
          <h4><?php echo esc_html($t3['title'] ?: 'The Unified Stack'); ?></h4>
          <p><?php echo esc_html($t3['desc'] ?: 'Achieved global defense-grade security protocols (ISO 27001) operating across complete city command spaces.'); ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =================================================================
     4. CALL TO ACTION BLOCK
     ================================================================= -->
<section class="section ab-cta">
  <div class="container">
    <div class="cta-dark-card">
      <h2>Let\'s align your technology footprint with absolute clarity.</h2>
      <p class="text-muted">Explore how our engineered models eliminate multi-vendor friction entirely.</p>
      <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary filled">Explore Our Connected Stack</a>
    </div>
  </div>
</section>
<style>
    /* =================================================================
   ABOUT LESYS SCENIC LAYOUT RULES
   ================================================================= */
.text-muted {
  color: #a4b3c6 !important;
}

/* Values Grid Design */
.values-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  margin-top: 50px;
}

.val-card {
  background: #0f1d2a;
  border: 1px solid #1e2f41;
  border-radius: 8px;
  padding: 40px 30px;
  transition: all 400ms cubic-bezier(0.16, 1, 0.3, 1);
}

.val-card:hover {
  transform: translateY(-6px);
  border-color: #6ea3c5;
}

.val-card .val-icon {
  margin-bottom: 25px;
}

.val-card .val-icon i {
  font-size: 2rem;
  color: #6ea3c5;
  transition: color 300ms ease;
}

.val-card:hover .val-icon i {
  color: #e2462b; /* Matches signature orange accents */
}

.val-card h4 {
  font-size: 1.25rem;
  color: #ffffff;
  margin-bottom: 15px;
}

.val-card p {
  color: #a4b3c6;
  font-size: 0.95rem;
  line-height: 1.6;
}

/* Timeline Components */
.timeline-wrapper {
  position: relative;
  margin-top: 60px;
  padding: 20px 0;
}

.timeline-bar {
  position: absolute;
  top: 25px;
  left: 0;
  width: 100%;
  height: 2px;
  background: #142435;
  z-index: 1;
}

.timeline-nodes-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 40px;
  position: relative;
  z-index: 2;
}

.timeline-node {
  position: relative;
  padding-top: 45px;
}

.timeline-node .marker {
  position: absolute;
  top: -1px;
  left: 0;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  background: #142435;
  border: 2px solid #06101e;
  transition: all 400ms ease;
}

.timeline-node:hover .marker,
.timeline-node.active .marker {
  background: #e2462b;
  box-shadow: 0 0 12px rgba(226, 70, 43, 0.6);
}

.timeline-node .year {
  display: block;
  font-family: monospace;
  font-size: 1.5rem;
  font-weight: 700;
  color: #6ea3c5;
  margin-bottom: 15px;
}

.timeline-node h4 {
  font-size: 1.2rem;
  color: #ffffff;
  margin-bottom: 10px;
}

.timeline-node p {
  color: #a4b3c6;
  font-size: 0.9rem;
  line-height: 1.6;
}

/* CTA Card */
.cta-dark-card {
  background: linear-gradient(135deg, #0f2133 0%, #07121c 100%);
  border: 1px solid #1e3146;
  border-radius: 12px;
  padding: 60px 40px;
  text-align: center;
  margin-top: 40px;
}

.cta-dark-card h2 {
  font-size: 2rem;
  color: #ffffff;
  margin-bottom: 15px;
}

.cta-dark-card p {
  margin-bottom: 30px;
  font-size: 1.05rem;
}

/* Mobile Responsiveness Viewports */
@media (max-width: 768px) {
  .timeline-bar {
    display: none;
  }
  .timeline-nodes-grid {
    grid-template-columns: 1fr;
    gap: 30px;
  }
  .timeline-node {
    padding-top: 0;
    padding-left: 25px;
    border-left: 2px solid #142435;
  }
  .timeline-node .marker {
    top: 6px;
    left: -7px;
  }
}

    </style>
<?php
get_footer();
