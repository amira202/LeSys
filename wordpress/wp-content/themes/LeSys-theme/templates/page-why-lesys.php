<?php
/**
 * Template Name: Why LeSys Page
 */

get_header();

// جلب حقول القسم الأول (Hero)
$hero_eyebrow = get_field('wl_hero_eyebrow') ?: 'Why LeSys';
$hero_title = get_field('wl_hero_title') ?: 'Engineered for Complete <br><span class="ac">Accountability</span>';
$hero_desc = get_field('wl_hero_desc') ?: 'We don’t just deliver software; we take full ownership of your entire technology stack from applications to managed operations.';

// جلب حقول القسم الثاني (Pillars)
$p1 = get_field('wl_pillar_1');
$p2 = get_field('wl_pillar_2');
$p3 = get_field('wl_pillar_3');
?>

<!-- 1. HERO SECTION (DARK & BOLD) -->
<section class="section dark wl-hero">
  <div class="container">
    <div class="sec-eyebrow-row">
      <div class="eyebrow on-dark"><?php echo esc_html($hero_eyebrow); ?></div>
    </div>
    <div class="sec-head">
      <h1 class="title huge"><?php echo wp_kses_post($hero_title); ?></h1>
      <div class="right">
        <p class="lead"><?php echo esc_html($hero_desc); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- 2. THREE PILLARS OF DIFFERENCE -->
<section class="section" id="why-pillars">
  <div class="container">
    <div class="sec-eyebrow-row">
      <div class="eyebrow">Our Core Paradigm</div>
    </div>
    
    <div class="pillars-grid">
      <!-- Pillar 1 -->
      <div class="pillar-card">
        <div class="num-icon">01</div>
        <h4><?php echo esc_html($p1['title'] ?: 'Single Accountable Partner'); ?></h4>
        <p><?php echo esc_html($p1['desc'] ?: 'No finger-pointing. We design, deploy, and support everything, eliminating vendor friction.'); ?></p>
      </div>

      <!-- Pillar 2 -->
      <div class="pillar-card">
        <div class="num-icon">02</div>
        <h4><?php echo esc_html($p2['title'] ?: 'Proprietary IP Assets'); ?></h4>
        <p><?php echo esc_html($p2['desc'] ?: 'Accelerate your deployment using our field-tested, in-house platforms built for critical operations.'); ?></p>
      </div>

      <!-- Pillar 3 -->
      <div class="pillar-card">
        <div class="num-icon">03</div>
        <h4><?php echo esc_html($p3['title'] ?: 'Vision 2030 Alignment'); ?></h4>
        <p><?php echo esc_html($p3['desc'] ?: 'Sovereign cloud infrastructure, defense-grade compliance, and advanced Arabic localized AI tooling.'); ?></p>
      </div>
    </div>
  </div>
</section>

<!-- 3. INTERACTIVE METHODOLOGY PREVIEW -->
<section class="section dark" id="methodology">
  <div class="container">
    <div class="sec-head">
      <h2 class="title">How We Flow: <br><span class="ac">The Continuous Loop</span></h2>
      <div class="right">
        <p>A unified delivery method where strategy seamlessly converts into non-stop operations.</p>
      </div>
    </div>

    <div class="method-interactive">
      <div class="method-steps">
        <button class="method-step active" data-target="m-strat">01. Strategy & Blueprint</button>
        <button class="method-step" data-target="m-build">02. Engineering & Scale</button>
        <button class="method-step" data-target="m-ops">03. Always-On Managed Ops</button>
      </div>

      <div class="method-pane" id="methodPane">
        <div class="pane-content active" id="m-strat">
          <h3>Architecting Future-Proof Systems</h3>
          <p>We audit your existing legacy nodes and map out an end-to-end connected stack layout tailored perfectly to protect your corporate business data.</p>
        </div>
        <div class="pane-content" id="m-build" style="display:none;">
          <h3>Rapid Engineering Deployment</h3>
          <p>Using our custom-built proprietary software platforms, we activate your workflows, tracking integrations, data pipelines, and intelligent AI frameworks.</p>
        </div>
        <div class="pane-content" id="m-ops" style="display:none;">
          <h3>Zero-Downtime Guarantee</h3>
          <p>Continuous monitoring via our advanced integrated operations command centers ensures protection against failures with a true defense-grade security stance.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 4. CTA BANNER -->
<section class="section wl-cta">
  <div class="container">
    <div class="cta-banner-box">
      <h2>Ready to experience absolute engineering ownership?</h2>
      <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn btn-primary filled">Talk to Our Experts</a>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const steps = document.querySelectorAll('.method-step');
  const panes = document.querySelectorAll('.pane-content');

  steps.forEach(btn => {
    btn.addEventListener('click', () => {
      steps.forEach(s => s.classList.remove('active'));
      btn.classList.add('active');

      const targetId = btn.getAttribute('data-target');
      panes.forEach(pane => {
        if(pane.id === targetId) {
          pane.style.display = 'block';
          setTimeout(() => pane.style.opacity = '1', 20);
        } else {
          pane.style.display = 'none';
          pane.style.opacity = '0';
        }
      });
    });
  });
});
</script>
<style>
    /* Why LeSys Component Styles */
.title.huge {
  font-size: clamp(2.5rem, 5vw, 4rem);
  line-height: 1.15;
}

/* Pillars Layout */
.pillars-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  margin-top: 40px;
}

.pillar-card {
  background: #0f1d2a;
  border: 1px solid #1e2f41;
  padding: 40px 30px;
  border-radius: 8px;
  transition: all 400ms cubic-bezier(0.16, 1, 0.3, 1);
}

.pillar-card:hover {
  transform: translateY(-8px);
  border-color: #6ea3c5;
}

.pillar-card .num-icon {
  font-size: 2rem;
  font-weight: 700;
  color: #e2462b; /* اللون البرتقالي المميز */
  margin-bottom: 20px;
  font-family: monospace;
}

.pillar-card h4 {
  font-size: 1.35rem;
  color: #ffffff;
  margin-bottom: 15px;
}

.pillar-card p {
  color: #a4b3c6;
  font-size: 0.95rem;
  line-height: 1.6;
}

/* Interactive Loop Tabs */
.method-interactive {
  display: grid;
  grid-template-columns: 300px 1fr;
  gap: 50px;
  margin-top: 50px;
}

@media (max-width: 768px) {
  .method-interactive {
    grid-template-columns: 1fr;
    gap: 30px;
  }
}

.method-steps {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.method-step {
  background: transparent;
  border: none;
  border-left: 3px solid #1e2f41;
  color: #a4b3c6;
  text-align: left;
  padding: 15px 20px;
  font-size: 1.05rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 300ms ease;
}

.method-step.active {
  color: #ffffff;
  border-left-color: #e2462b;
  background: rgba(226, 70, 43, 0.05);
}

.method-pane {
  background: #0a141f;
  border: 1px solid #142435;
  border-radius: 8px;
  padding: 50px;
  min-height: 250px;
  display: flex;
  align-items: center;
}

.pane-content {
  transition: opacity 400ms ease;
  will-change: opacity;
}

.pane-content h3 {
  font-size: 1.75rem;
  color: #ffffff;
  margin-bottom: 20px;
}

.pane-content p {
  color: #a4b3c6;
  font-size: 1.1rem;
  line-height: 1.7;
}

/* CTA Box component */
.cta-banner-box {
  background: linear-gradient(135deg, #0f2133 0%, #07121c 100%);
  border: 1px solid #20354a;
  border-radius: 12px;
  padding: 60px 40px;
  text-align: center;
  margin-top: 50px;
}

.cta-banner-box h2 {
  font-size: 2rem;
  color: #ffffff;
  margin-bottom: 30px;
}

    </style>
<?php
get_footer();
