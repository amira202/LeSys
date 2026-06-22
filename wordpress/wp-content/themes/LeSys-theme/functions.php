<?php
/**
 * ربط ملفات التنسيق (CSS) والجافاسكريبت (JS) الخاصة بالقالب
 */
function my_theme_enqueue_assets() {
    
    // 1. ربط ملف الـ CSS الخاص بالميجا منيو
    wp_enqueue_style(
        'mega-menu-style', // اسم تعريفي فريد للملف
        get_template_directory_uri() . '/Assets/css/mega-menu.css', // المسار الديناميكي للملف
        array(), // الملفات التي يعتمد عليها (إن وجدت)
        '1.0.0', // رقم إصدار الملف لمسح الكاش عند التحديث
        'all' // نوع الشاشات (all تعني المتصفحات والهواتف والطباعة)
    );
    wp_enqueue_style(
        'global-style', // اسم تعريفي فريد للملف
        get_template_directory_uri() . '/Assets/css/global.css', // المسار الديناميكي للملف
        array(), // الملفات التي يعتمد عليها (إن وجدت)
        '1.0.0', // رقم إصدار الملف لمسح الكاش عند التحديث
        'all' // نوع الشاشات (all تعني المتصفحات والهواتف والطباعة)
    );

    // 2. ربط ملف الـ JavaScript الخاص بالميجا منيو وحركة الأسهم
    wp_enqueue_script(
        'mega-menu-script', // اسم تعريفي فريد للملف
        get_template_directory_uri() . '/Assets/JS/mega-menu.js', // المسار الديناميكي للملف
        array(), // مصفوفة الاعتماديات (يمكنكِ وضع array('jquery') إذا كان الكود يعتمد على جي كويري)
        '1.0.0', // رقم الإصدار
        true // الأهم: true تعني تحميل الملف في الفوتر (Footer) لزيادة سرعة الموقع
    );
        wp_enqueue_script(
        'global-script', // اسم تعريفي فريد للملف
        get_template_directory_uri() . '/Assets/JS/global.js', // المسار الديناميكي للملف
        array(), // مصفوفة الاعتماديات (يمكنكِ وضع array('jquery') إذا كان الكود يعتمد على جي كويري)
        '1.0.0', // رقم الإصدار
        true // الأهم: true تعني تحميل الملف في الفوتر (Footer) لزيادة سرعة الموقع
    );
}
// تفعيل الدالة وربطها بخطاف التحميل الرسمي لووردبريس
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_assets' );

function my_theme_register_menus() {
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'LeSys-Theme'),
        'footer-platforms'    => __('Footer Platforms Menu', 'LeSys-Theme'),
        'footer-capabilities' => __('Footer Capabilities Menu', 'LeSys-Theme'),
        'footer-company'      => __('Footer Company Menu', 'LeSys-Theme'),
    ));
}
add_action('init', 'my_theme_register_menus');

function add_icon_to_menu_links( $title, $item, $args, $depth ) {
    // التحقق من أننا نقوم بالتعديل على القائمة الرئيسية فقط
    if ( $args->theme_location == 'primary-menu' ) {
         if ( isset( $item->classes ) && in_array( 'lang-item', $item->classes ) ) {
            return $title; // إرجاع العنوان الأصلي للغة دون إضافة السهم
        }
        // إضافة وسم i بجانب نص الرابط (يمكنك تعديل الكلاس الافتراضي هنا)
        $title = $title." ".'<i class="fa-solid fa-chevron-down"></i>';
    }
    return $title;
}
add_filter( 'nav_menu_item_title', 'add_icon_to_menu_links', 10, 4 );

function global_section_customizer( $wp_customize ) {
    $wp_customize->add_section( 'talktoexpert_section_panel', array(
        'title'    => 'Talk to an Expert Section',
        'priority' => 30,
    ) );

    // Title Setting
    $wp_customize->add_setting( 'global_title_setting', array( 'default' => 'Get in Touch' ) );
    $wp_customize->add_control( 'global_title_control', array(
        'label'    => 'Section Title',
        'section'  => 'talktoexpert_section_panel',
        'settings' => 'global_title_setting',
        'type'     => 'text',
    ) );
        $wp_customize->add_setting( 'global_heading1_setting', array( 'default' => 'Talk to One of Our' ) );
        $wp_customize->add_setting( 'global_heading2_setting', array( 'default' => 'Experts.' ) );
        $wp_customize->add_setting( 'global_paragraph_setting', array( 'default' => 'Every request routes to a dedicated solution owner. You\'ll get a tailored walkthrough, a solution brief and a booking link — within one business day.' ) );
        $wp_customize->add_control( 'global_heading1_control', array(
        'label'    => 'Heading 1',
        'section'  => 'talktoexpert_section_panel',
        'settings' => 'global_heading1_setting',
        'type'     => 'text',
    ) );
        $wp_customize->add_control( 'global_heading2_control', array(
        'label'    => 'Heading 2',
        'section'  => 'talktoexpert_section_panel',
        'settings' => 'global_heading2_setting',
        'type'     => 'text',
    ) );
        $wp_customize->add_control( 'global_paragraph_control', array(
        'label'    => 'Paragraph',
        'section'  => 'talktoexpert_section_panel',
        'settings' => 'global_paragraph_setting',
        'type'     => 'textarea',
    ) );


    // --- ROW 1 ---
    $wp_customize->add_setting( 'feature_1_icon', array( 'default' => '<i class="fa-solid fa-check"></i>' ) );
        $wp_customize->add_control( 'feature_1_icon_ctrl', array(
        'label'   => 'Row 1 Icon',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_1_icon',
        'type'    => 'text',
    ) );
    $wp_customize->add_setting( 'feature_1_title', array( 'default' => 'Mapped to your goal' ) );
    $wp_customize->add_control( 'feature_1_title_ctrl', array(
        'label'   => 'Row 1 Title',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_1_title',
        'type'    => 'text',
    ) );
    $wp_customize->add_setting( 'feature_1_desc', array( 'default' => 'We map your challenge to the exact platforms before we meet.' ) );
    $wp_customize->add_control( 'feature_1_desc_ctrl', array(
        'label'   => 'Row 1 Description',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_1_desc',
        'type'    => 'textarea',
    ) );

    // --- ROW 2 ---
    $wp_customize->add_setting( 'feature_2_icon', array( 'default' => '<i class="fa-regular fa-calendar"></i>' ) );
    $wp_customize->add_control( 'feature_2_icon_ctrl', array(
        'label'   => 'Row 2 Icon',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_2_icon',
        'type'    => 'text',
    ) );
    $wp_customize->add_setting( 'feature_2_title', array( 'default' => 'Calendar booking included' ) );
    $wp_customize->add_control( 'feature_2_title_ctrl', array(
        'label'   => 'Row 2 Title',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_2_title',
        'type'    => 'text',
    ) );
    $wp_customize->add_setting( 'feature_2_desc', array( 'default' => 'Pick a time on the confirmation page — no back-and-forth.' ) );
    $wp_customize->add_control( 'feature_2_desc_ctrl', array(
        'label'   => 'Row 2 Description',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_2_desc',
        'type'    => 'textarea',
    ) );

    // --- ROW 3 ---
    $wp_customize->add_setting( 'feature_3_icon', array( 'default' => '<i class="fa-solid fa-shield-halved"></i>' ) );
    $wp_customize->add_control( 'feature_3_icon_ctrl', array(
        'label'   => 'Row 3 Icon',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_3_icon',
        'type'    => 'text',
    ) );
    $wp_customize->add_setting( 'feature_3_title', array( 'default' => 'Defense-grade & compliant' ) );
    $wp_customize->add_control( 'feature_3_title_ctrl', array(
        'label'   => 'Row 3 Title',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_3_title',
        'type'    => 'text',
    ) );
    $wp_customize->add_setting( 'feature_3_desc', array( 'default' => 'NCA ECC 2.0 · SDAIA PDPL · ISO 27001 · SOC 2.' ) );
    $wp_customize->add_control( 'feature_3_desc_ctrl', array(
        'label'   => 'Row 3 Description',
        'section' => 'talktoexpert_section_panel',
        'settings'=> 'feature_3_desc',
        'type'    => 'textarea',
    ) );

$cf7_options = array( '' => __( 'Select a form...', 'my-theme' ) );
    
    if ( class_exists( 'WPCF7_ContactForm' ) ) {
        $forms = get_posts( array(
            'post_type'      => 'wpcf7_contact_form',
            'posts_per_page' => -1,
        ) );

        if ( ! empty( $forms ) ) {
            foreach ( $forms as $form ) {
                $cf7_options[$form->ID] = $form->post_title;
            }
        }
    }


    // 3. Add Customizer Setting
    $wp_customize->add_setting( 'chosen_contact_form_id', array(
        'default'           => '',
        'sanitize_callback' => 'absint', // Ensures it saves as an integer ID
    ) );

    // 4. Add Customizer Select Control
    $wp_customize->add_control( 'chosen_contact_form_ctrl', array(
        'label'    => __( 'Choose Contact Form', 'LeSys-theme' ),
        'section'  => 'talktoexpert_section_panel',
        'settings' => 'chosen_contact_form_id',
        'type'     => 'select',
        'choices'  => $cf7_options,
    ) );
   
}
add_action( 'customize_register', 'global_section_customizer' );


// 1. Correctly append the custom class to the string
function custom_cf7_form_class( $class_string ) {
    // $class_string is a raw string like "wpcf7-form init"
    $class_string .= ' cform';
    return $class_string;
}
add_filter( 'wpcf7_form_class_attr', 'custom_cf7_form_class' );

// 2. Inject the ID and novalidate attribute safely into the opening <form> tag
function custom_cf7_form_tag_attributes( $content ) {
    // Replaces '<form ' with '<form id="contactForm" novalidate ' inside the HTML output
    $content = str_replace( '<form ', '<form id="contactForm" novalidate ', $content );
    return $content;
}
add_filter( 'wpcf7_form_response_output', 'custom_cf7_form_tag_attributes' );

//footer customizer
function lesys_customize_register( $wp_customize ) {
    // 1. Add Footer Section
    $wp_customize->add_section( 'lesys_footer_section', array(
        'title'    => __( 'Footer Settings', 'lesys' ),
        'priority' => 120,
    ) );

    // [NEW] 2. Setting for Logo Upload
    $wp_customize->add_setting( 'lesys_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lesys_footer_logo_control', array(
        'label'    => __( 'Footer Logo', 'lesys' ),
        'section'  => 'lesys_footer_section',
        'settings' => 'lesys_footer_logo',
        'description' => __( 'Upload an image logo. Leaving this empty defaults to the native inline SVG icon.', 'lesys' ),
    ) ) );

    // 3. Setting for Brand Description Text
    $wp_customize->add_setting( 'lesys_footer_desc', array(
        'default'           => 'One accountable partner across strategy, technology, implementation and operations — the systems that power enterprises, governments and critical infrastructure, engineered and operated end-to-end.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lesys_footer_desc_control', array(
        'label'    => __( 'Brand Description', 'lesys' ),
        'section'  => 'lesys_footer_section',
        'settings' => 'lesys_footer_desc',
        'type'     => 'textarea',
    ) );

    // 4. Settings for Social Links
    $socials = array( 'twitter' => 'X (Twitter) URL', 'instagram' => 'Instagram URL', 'linkedin' => 'LinkedIn URL' );
    foreach ( $socials as $key => $label ) {
        $wp_customize->add_setting( "lesys_social_{$key}", array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( "lesys_social_{$key}_control", array(
            'label'    => __( $label, 'lesys' ),
            'section'  => 'lesys_footer_section',
            'settings' => "lesys_social_{$key}",
            'type'     => 'url',
        ) );
    }

    // 5. Setting for Compliance Badges (Comma Separated)
    $wp_customize->add_setting( 'lesys_compliance_badges', array(
        'default'           => 'NCA ECC 2.0, SAMA CSF, SDAIA PDPL, ISO 27001, SOC 2',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lesys_compliance_badges_control', array(
        'label'       => __( 'Compliance Badges (Separate with commas)', 'lesys' ),
        'description' => __( 'Example: NCA ECC 2.0, SAMA CSF, SOC 2', 'lesys' ),
        'section'     => 'lesys_footer_section',
        'settings'    => 'lesys_compliance_badges',
        'type'        => 'text',
    ) );

    // [NEW] 6. Setting for Copyright Text
    $wp_customize->add_setting( 'lesys_footer_copyright', array(
        'default'           => 'Leader Systems (LeSys). Engineered for secure, accountable execution.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lesys_footer_copyright_control', array(
        'label'    => __( 'Copyright Text', 'lesys' ),
        'section'  => 'lesys_footer_section',
        'settings' => 'lesys_footer_copyright',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'lesys_customize_register' );

//header customizer
function lesys_header_customize_register( $wp_customize ) {
    // 1. Add Header Section
    $wp_customize->add_section( 'lesys_header_section', array(
        'title'    => __( 'Header Settings', 'lesys' ),
        'priority' => 110,
    ) );

    // 2. Shared Logo Control (linked to the same setting)
    $wp_customize->add_setting( 'lesys_footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lesys_header_logo_control', array(
        'label'       => __( 'Website Logo', 'lesys' ),
        'section'     => 'lesys_header_section',
        'settings'    => 'lesys_footer_logo',
        'description' => __( 'Upload your logo. If left blank, your default custom inline SVG is generated.', 'lesys' ),
    ) ) );

    // 3. Header CTA Button Text
    $wp_customize->add_setting( 'lesys_header_cta_text', array(
        'default'           => 'Talk to an Expert',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lesys_header_cta_text_control', array(
        'label'    => __( 'CTA Button Text', 'lesys' ),
        'section'  => 'lesys_header_section',
        'settings' => 'lesys_header_cta_text',
        'type'     => 'text',
    ) );

    // 4. Header CTA Button URL
    $wp_customize->add_setting( 'lesys_header_cta_url', array(
        'default'           => '#contact',
        'sanitize_callback' => 'sanitize_text_field', // Allows anchors like #contact
    ) );
    $wp_customize->add_control( 'lesys_header_cta_url_control', array(
        'label'    => __( 'CTA Button Link (URL or Anchor)', 'lesys' ),
        'section'  => 'lesys_header_section',
        'settings' => 'lesys_header_cta_url',
        'type'     => 'text',
    ) );
}
add_action( 'customize_register', 'lesys_header_customize_register' );

//search function
function lesys_native_polylang_search_filter( $query ) {
    // Run this only on frontend search queries
    if ( $query->is_search && ! is_admin() ) {
        
        // Ensure Polylang is active and check the user's active language
        if ( function_exists( 'pll_current_language' ) ) {
            $current_lang = pll_current_language(); // Returns 'en', 'ar', etc.
            
            // Inject the strict language taxonomy filter into the query
            $query->set( 'lang', $current_lang );
        }
        
        // Restrict search targets to pages and standard post types
        $query->set( 'post_type', array( 'post', 'page' ) );
    }
    return $query;
}
add_filter( 'pre_get_posts', 'lesys_native_polylang_search_filter' );






