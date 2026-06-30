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
      <p class="lead text-muted"><?php echo ($contact_paragraph); ?></p>
    </div>

    <!-- Main Content Grid Columns Split -->
    <div class="contact-split-grid">
      
      <!-- LEFT COLUMN: Corporate Metadata Channels -->
      <div class="contact-meta-sidebar">
        <div class="help-services-box">
            <h3 class="help-title">How We Can Help</h3>
            <ul class="help-list">
                <li><strong>Strategic Advisory</strong><span>Discuss your business objectives and transformation priorities with our experts.</span></li>
                <li><strong>Solution Consultation</strong><span>Explore technologies and solutions that address your operational challenges.</span></li>
                <li><strong>Project Engagement</strong><span>Collaborate with our specialists on implementation, integration, and modernization initiatives.</span></li>
                <li><strong>Managed Services</strong><span>Learn how LESYS can support and optimize your technology and operational environments.</span></li>
                <li><strong>Partnership Opportunities</strong><span>Explore strategic alliances, technology partnerships, and collaboration opportunities.</span></li>
            </ul>
        </div>
        <!-- LEFT COLUMN: Corporate Metadata Channels & Help Services -->
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

     

    </div>

  </div>
</section>
<style>
/* =================================================================
   CONTACT US SECTION STYLING
   ================================================================= */
.contact-page-head { margin-bottom: 60px !important; flex-direction: column; gap: 20px; }
.contact-page-head .title { font-size: clamp(2.2rem, 4vw, 3.5rem); line-height: 1.15; }

/* 2-Column Responsive Layout */
.contact-split-grid { display: grid; grid-template-columns: 1fr; gap: 50px; align-items: start; }

@media (min-width: 992px) {
    .contact-split-grid { grid-template-columns: 380px 1fr; gap: 60px; }
}

/* Sidebar: Metadata & Help Combined */
.contact-meta-sidebar { display: flex; flex-direction: column; gap: 20px; }

.meta-item-box { background: #0c1a26; border: 1px solid #142435; border-radius: 8px; padding: 24px; display: flex; align-items: center; gap: 20px; transition: border-color 300ms ease; }
.meta-item-box:hover { border-color: #6ea3c5; }
.meta-item-box .icon-bubble { width: 48px; height: 48px; background: rgba(110, 163, 197, 0.08); border-radius: 6px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
.meta-item-box .icon-bubble i { font-size: 1.25rem; color: #6ea3c5; }
.meta-item-box .text-group { display: flex; flex-direction: column; gap: 4px; }
.meta-item-box .text-group .lbl { font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.8px; color: #a4b3c6; opacity: 0.7; }
.meta-item-box .text-group .val { font-size: 1.05rem; font-weight: 600; color: #ffffff; text-decoration: none; line-height: 1.4; }
.meta-item-box .text-group a.val:hover { color: #e2462b; }
.meta-item-box .text-group .val.txt-block { font-weight: 400; font-size: 0.95rem; color: #e2e8f0; }

/* Help Services Box */
.help-services-box { background: #0c1a26; border: 1px solid #142435; border-radius: 8px; padding: 30px; }
.help-title { color: #ffffff; font-size: 1.25rem; margin-bottom: 20px; }
.help-list { list-style: none; padding: 0; margin: 0; }
.help-list li { color: #a4b3c6; margin-bottom: 18px; font-size: 0.95rem; list-style: none; }
.help-list li strong { color: #6ea3c5; display: block; margin-bottom: 4px; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px; }

/* Form Canvas */
.contact-form-canvas .form-card-box { background: #0f1d2a; border: 1px solid #1e2f41; border-radius: 12px; padding: 40px; }
.form-card-box form p { margin-bottom: 20px; display: flex; flex-direction: column; gap: 8px; }
.form-card-box input[type="text"], .form-card-box input[type="email"], .form-card-box input[type="tel"], .form-card-box textarea { width: 100%; background: #06101e; border: 1px solid #142435; border-radius: 6px; padding: 14px 18px; color: #ffffff; font-size: 1rem; box-sizing: border-box; }
.form-card-box input:focus, .form-card-box textarea:focus { outline: none; border-color: #6ea3c5; }
.form-card-box input[type="submit"] { background: #e2462b; color: #ffffff; border: none; border-radius: 6px; padding: 16px 32px; font-weight: 600; cursor: pointer; text-transform: uppercase; margin-top: 10px; }
@media (min-width: 992px) {
    .contact-split-grid {
        display: grid;
        grid-template-columns: 380px 1fr; /* Defines the 2 columns */
        gap: 60px;
        align-items: start; /* Ensures they align at the top */
    }
}
</style>
<?php
get_footer();
