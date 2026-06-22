<?php
/**
 * Template Name: Contact Us Page
 */

get_header();

// 1. Structural Text Data Fields Fetch
$contact_eyebrow   = get_field('ct_hero_eyebrow') ?: 'Get In Touch';
$contact_title     = get_field('ct_hero_title') ?: 'TALK TO ONE OF<br><span class="ac">OUR EXPERTS</span>';
$contact_paragraph = get_field('ct_hero_desc') ?: 'Whether you want to launch a smart city node, audit integration logic, or request architecture models — our engineers respond with absolute clarity.';

// 2. Form Shortcode Field Fetch
$cf7_shortcode     = get_field('ct_cf7_shortcode') ?: '[contact-form-7 id="0a86d51" title="Contact form 1"]';

// 3. Office Metadata Details Group Fetch
$info_phone   = get_field('ct_info_phone') ?: '+966 11 000 0000';
$info_email   = get_field('ct_info_email') ?: 'ops@lesys.com';
$info_address = get_field('ct_info_address') ?: 'Olaya District, Riyadh, Kingdom of Saudi Arabia';
$info_hours   = get_field('ct_info_hours') ?: 'Sunday – Thursday: 8:00 AM – 5:00 PM';
?>

<!-- =================================================================
     CONTACT US — 2-Column Split Architecture
     ================================================================= -->
<section class="section dark" id="contact-page">
  <div class="container">
    
    <!-- Header Title Row -->
    <div class="sec-eyebrow-row">
      <div class="eyebrow on-dark"><?php echo esc_html($contact_eyebrow); ?></div>
    </div>
    <div class="sec-head contact-page-head">
      <h1 class="title"><?php echo wp_kses_post($contact_title); ?></h1>
      <p class="lead text-muted"><?php echo esc_html($contact_paragraph); ?></p>
    </div>

    <!-- Main Content Grid Columns Split -->
    <div class="contact-split-grid">
      
      <!-- LEFT COLUMN: Corporate Metadata Channels -->
      <div class="contact-meta-sidebar">
        
        <div class="meta-item-box">
          <div class="icon-bubble"><i class="fa-solid fa-phone"></i></div>
          <div class="text-group">
            <span class="lbl">Direct Operations Line</span>
            <a href="tel:<?php echo esc_attr(str_replace(' ', '', $info_phone)); ?>" class="val"><?php echo esc_html($info_phone); ?></a>
          </div>
        </div>

        <div class="meta-item-box">
          <div class="icon-bubble"><i class="fa-solid fa-envelope"></i></div>
          <div class="text-group">
            <span class="lbl">Secure Messaging Hub</span>
            <a href="mailto:<?php echo esc_attr($info_email); ?>" class="val"><?php echo esc_html($info_email); ?></a>
          </div>
        </div>

        <div class="meta-item-box">
          <div class="icon-bubble"><i class="fa-solid fa-location-dot"></i></div>
          <div class="text-group">
            <span class="lbl">Headquarters Location</span>
            <span class="val txt-block"><?php echo esc_html($info_address); ?></span>
          </div>
        </div>

        <div class="meta-item-box">
          <div class="icon-bubble"><i class="fa-solid fa-clock"></i></div>
          <div class="text-group">
            <span class="lbl">Operational Support Hours</span>
            <span class="val txt-block"><?php echo esc_html($info_hours); ?></span>
          </div>
        </div>

      </div>

      <!-- RIGHT COLUMN: Contact Form 7 Wrapper Canvas -->
      <div class="contact-form-canvas">
        <div class="form-card-box">
          <?php 
          // Executing shortcode markup processing engine cleanly on server block
          echo do_shortcode($cf7_shortcode); 
          ?>
        </div>
      </div>

    </div>

  </div>
</section>
<style>
/* =================================================================
   CONTACT US SECTION STYLING
   ================================================================= */
.contact-page-head {
  margin-bottom: 60px !important;
  /**display: flex;**/
  flex-direction: column;
  gap: 20px;
}

.contact-page-head .title {
  font-size: clamp(2.2rem, 4vw, 3.5rem);
  line-height: 1.15;
}

/* 2-Column Responsive Layout */
.contact-split-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 50px;
  align-items: start;
}

@media (min-width: 992px) {
  .contact-split-grid {
    grid-template-columns: 400px 1fr; /* Sidebar widths locked on desktop */
  }
}

/* Left Sidebar Metadata Boxes */
.contact-meta-sidebar {
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.meta-item-box {
  background: #0c1a26;
  border: 1px solid #142435;
  border-radius: 8px;
  padding: 24px;
  display: flex;
  align-items: center;
  gap: 20px;
  transition: border-color 300ms ease;
}

.meta-item-box:hover {
  border-color: #6ea3c5;
}

.meta-item-box .icon-bubble {
  width: 48px;
  height: 48px;
  background: rgba(110, 163, 197, 0.08);
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.meta-item-box .icon-bubble i {
  font-size: 1.25rem;
  color: #6ea3c5;
}

.meta-item-box .text-group {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.meta-item-box .text-group .lbl {
  font-size: 0.8rem;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  color: #a4b3c6;
  opacity: 0.7;
}

.meta-item-box .text-group .val {
  font-size: 1.05rem;
  font-weight: 600;
  color: #ffffff;
  text-decoration: none;
  line-height: 1.4;
  transition: color 200ms ease;
}

.meta-item-box .text-group a.val:hover {
  color: #e2462b; /* Highlights signature orange on anchors hover */
}

.meta-item-box .text-group .val.txt-block {
  font-weight: 400;
  font-size: 0.95rem;
  color: #e2e8f0;
}

/* Right Side Form Box Elements */
.contact-form-canvas .form-card-box {
  background: #0f1d2a;
  border: 1px solid #1e2f41;
  border-radius: 12px;
  padding: 40px;
}

/* General Styling overrides targeting Contact Form 7 rendered tags */
.form-card-box form p {
  margin-bottom: 20px;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.form-card-box label {
  font-size: 0.95rem;
  font-weight: 500;
  color: #ffffff;
}

.form-card-box input[type="text"],
.form-card-box input[type="email"],
.form-card-box input[type="tel"],
.form-card-box textarea {
  width: 100%;
  background: #06101e;
  border: 1px solid #142435;
  border-radius: 6px;
  padding: 14px 18px;
  color: #ffffff;
  font-size: 1rem;
  box-sizing: border-box;
  transition: all 300ms ease;
}

.form-card-box input:focus,
.form-card-box textarea:focus {
  outline: none;
  border-color: #6ea3c5;
  box-shadow: 0 0 8px rgba(110, 163, 197, 0.15);
}

.form-card-box input[type="submit"] {
  background: #e2462b;
  color: #ffffff;
  border: none;
  border-radius: 6px;
  padding: 16px 32px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: background 200ms ease;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  margin-top: 10px;
  display: inline-block;
}

.form-card-box input[type="submit"]:hover {
  background: #b8321b;
}

/* Target ajax status loading states containers inside CF7 */
.wpcf7-spinner {
  background-color: #6ea3c5 !important;
}
.wpcf7-not-valid-tip {
  color: #e2462b !important;
  font-size: 0.85rem;
}
.wpcf7-response-output {
  border-radius: 6px;
  padding: 15px !important;
  margin: 20px 0 0 0 !important;
  color: #ffffff !important;
  background: #0c1a26;
  border: 1px solid #142435 !important;
}

</style>
<?php
get_footer();
