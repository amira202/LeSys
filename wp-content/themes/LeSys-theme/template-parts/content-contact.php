<!-- =================================================================
     CONTACT — left info + right form
     ================================================================= -->
<section class="section" id="contact">
  <div class="container">
    <div class="contact-grid">
      <div class="contact-left">
        <div class="eyebrow"><?php echo esc_html( get_theme_mod( 'global_title_setting') ); ?></div>
        <h2><?php echo esc_html( get_theme_mod( 'global_heading1_setting') ); ?><br><span class="ac"><?php echo esc_html( get_theme_mod( 'global_heading2_setting') ); ?></span></h2>
        <p class="lead"><?php echo esc_html( get_theme_mod( 'global_paragraph_setting' ) ); ?></p>
        <div class="cl-list">
          <?php
          // Retrieve feature items from Customizer settings  
          for ($i=1; $i < 4; $i++) { 
            $icon = get_theme_mod( "feature_{$i}_icon" );
            $title = get_theme_mod( "feature_{$i}_title");
            $desc = get_theme_mod( "feature_{$i}_desc" );

            // Output each feature item
            echo "<div class='cl-item feature-item-{$i}'>{$icon}<div><h6>{$title}</h6><p>{$desc}</p></div></div>";
          }
          ?>
      </div>
</div>
   <?php 
    // Get the saved form ID from the customizer
    $form_id = get_theme_mod( 'chosen_contact_form_id' );

    // Verify that a form has been chosen and that Contact Form 7 is active
    if ( ! empty( $form_id ) && shortcode_exists( 'contact-form-7' ) ) {
        echo do_shortcode( '[contact-form-7 id="' . absint( $form_id ) . '"]' );
    } else {
        echo '<p>' . __( 'Please select a contact form in the Customizer.', 'LeSys-theme' ) . '</p>';
    }
    ?>

    </div>
  </div>
</section>