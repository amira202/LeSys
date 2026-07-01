<!-- =================================================================
     FOOTER
     ================================================================= -->
<footer>
  <div class="container">
    <div class="foot-grid">
      <div class="fb">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand brandf">
          
          <?php 
          $footer_logo = get_theme_mod( 'lesys_footer_logo' );
          if ( ! empty( $footer_logo ) ) : 
          ?>
            <!-- Dynamic Customizer Uploaded Image Logo -->
            <span class="brand-logo uploaded-logo">
                <img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
            </span>
          <?php else : ?>
            <!-- Default SVG Logo fallback -->
            <span class="brand-logo">
              <svg viewBox="0 0 40 40" xmlns="http://w3.org">
                <g fill="none" stroke="#e2462b" stroke-width="2.6" stroke-linejoin="round" stroke-linecap="round">
                  <path d="M20 4 L36 20 L20 36 L4 20 Z"/>
                  <path d="M20 4 L20 36 M4 20 L36 20"/>
                  <path d="M11 11 L29 29 M29 11 L11 29" stroke-width="1.4"/>
                </g>
              </svg>
            </span>
            <span class="brand-text"><span class="lead">LEADER</span><span class="sub" style="color:#8b95a4">LEADER SYSTEMS</span></span>
          <?php endif; ?>
          
        </a>
        
        <!-- Dynamic Customizer Description -->
        <p><?php echo esc_html( get_theme_mod( 'lesys_footer_desc', 'One accountable partner across strategy, technology, implementation and operations — the systems that power enterprises, governments and critical infrastructure, engineered and operated end-to-end.' ) ); ?></p>
        
        <!-- Dynamic Customizer Social Icons -->
        <div class="fsoc">
          <?php if ( get_theme_mod( 'lesys_social_twitter' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'lesys_social_twitter' ) ); ?>" target="_blank" aria-label="X"><i class="fa-brands fa-x-twitter"></i></a>
          <?php endif; ?>
          <?php if ( get_theme_mod( 'lesys_social_instagram' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'lesys_social_instagram' ) ); ?>" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
          <?php endif; ?>
          <?php if ( get_theme_mod( 'lesys_social_linkedin' ) ) : ?>
            <a href="<?php echo esc_url( get_theme_mod( 'lesys_social_linkedin' ) ); ?>" target="_blank" aria-label="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a>
          <?php endif; ?>
        </div>
      </div>
      
      <!-- Dynamic Platforms Menu -->
      <div class="fcol">
        <h6><?php _e( 'PLATFORMS', 'lesys' ); ?></h6>
        <?php 
        wp_nav_menu( array(
            'theme_location' => 'footer-platforms',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'fallback_cb'    => false,
        ) ); 
        ?>
      </div>
      
      <!-- Dynamic Capabilities Menu -->
      <div class="fcol">
        <h6><?php _e( 'CAPABILITIES', 'lesys' ); ?></h6>
        <?php 
        wp_nav_menu( array(
            'theme_location' => 'footer-capabilities',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'fallback_cb'    => false,
        ) ); 
        ?>
      </div>
      
      <!-- Dynamic Company Menu -->
      <div class="fcol">
        <h6><?php _e( 'COMPANY', 'lesys' ); ?></h6>
        <?php 
        wp_nav_menu( array(
            'theme_location' => 'footer-company',
            'container'      => false,
            'items_wrap'     => '<ul>%3$s</ul>',
            'fallback_cb'    => false,
        ) ); 
        ?>
      </div>
    </div>

    <div class="fbot-row">
      <!-- Dynamic Customizer Copyright Line -->
      <div class="copy">
        © <?php echo date( 'Y' ); ?> <?php echo esc_html( get_theme_mod( 'lesys_footer_copyright', 'Leader Systems (LeSys). Engineered for secure, accountable execution.' ) ); ?>
      </div>
      
      <!-- Dynamic Customizer Compliance Badges -->
      <div class="compl">
        <?php 
        $badges_text = get_theme_mod( 'lesys_compliance_badges', 'NCA ECC 2.0, SAMA CSF, SDAIA PDPL, ISO 27001, SOC 2' );
        if ( ! empty( $badges_text ) ) {
            $badges_array = explode( ',', $badges_text );
            foreach ( $badges_array as $badge ) {
                echo '<span>' . esc_html( trim( $badge ) ) . '</span>';
            }
        }
        ?>
      </div>
    </div>
  </div>
</footer>
<div id="siteSearchModal" class="search-overlay-modal">
  <!-- Close Button Element Trigger -->
  <button id="closeSearchBtn" aria-label="Close Search">
      <i class="fa-solid fa-xmark"></i>
  </button>
  
  <div class="search-modal-inner">
    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
      <input type="search" class="search-field" placeholder="Search platforms, capabilities..." value="<?php echo get_search_query(); ?>" name="s" autocomplete="off" />
      
      <?php if ( function_exists('pll_current_language') ) : ?>
        <input type="hidden" name="lang" value="<?php echo pll_current_language(); ?>" />
      <?php endif; ?>
    </form>
  </div>
</div>

<button id="scrollTopBtn" class="scroll-top-btn" aria-label="Scroll to top">
    ↑
</button>
<style>
.scroll-top-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    border: none;
    background: var(--red);
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    display: none;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    transition: 0.3s ease;
    z-index: 9999;
}

.scroll-top-btn:hover {
    background: #163a63;
    transform: translateY(-3px);
}
.talk-to-expert-btn {
    position: fixed;
    right: 25px;
    bottom: 90px; /* above scroll-to-top button */
    z-index: 9998;

    display: flex;
    align-items: center;
    gap: 12px;

    background: var(--red);
    color: #fff;

    padding: 14px 20px;
    border-radius: 50px;

    text-decoration: none;
    font-weight: 600;
    font-size: 14px;

    box-shadow: 0 12px 35px rgba(226,70,43,.35);

    transition: all .3s ease;
}

.talk-to-expert-btn:hover {
    transform: translateY(-3px);
    background: var(--red-d);
    color: #fff;
} 

.expert-icon i {
    font-size: 15px;
}

@media(max-width:768px){

    .talk-to-expert-btn {
        right: 15px;
        bottom: 80px;
        padding: 12px 16px;
    }

    .expert-text {
        display: none;
    }

    .talk-to-expert-btn {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        justify-content: center;
        padding: 0;
    }

    .expert-icon {
        background: transparent;
    }
}
.talk-to-expert-btn {
    transition: all .3s ease;
}

.talk-to-expert-btn.hidden {
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
    pointer-events: none;
}
.talk-to-expert-btn {
    position: fixed;
    right: 25px;
    bottom: 90px;
    z-index: 9998;

    width: 58px;
    height: 58px;

    display: flex;
    align-items: center;

    overflow: hidden;

    background: var(--red);
    color: #fff;

    border-radius: 50px;
    text-decoration: none;

    box-shadow: 0 12px 35px rgba(226,70,43,.3);

    transition: all .35s ease;
}

/* Expand on hover */
.talk-to-expert-btn:hover {
    width: 220px;
}


.expert-text {
    white-space: nowrap;

    opacity: 0;
    transform: translateX(10px);

    font-size: 14px;
    font-weight: 600;

    transition: all .25s ease;
}

.talk-to-expert-btn:hover .expert-text {
    opacity: 1;
    transform: translateX(0);
}

/* hide state from your contact observer */
.talk-to-expert-btn.hidden {
    opacity: 0;
    visibility: hidden;
    transform: translateY(20px);
}

/* Mobile */
@media(max-width:768px) {

    .talk-to-expert-btn {
        width: 56px !important;
        height: 56px;
        right: 15px;
    }

    .expert-text {
        display: none;
    }
}
.talk-to-expert-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 50px;
    background: rgba(226,70,43,.4);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); opacity:.6; }
    70% { transform: scale(1.3); opacity:0; }
    100% { opacity:0; }
}

.talk-to-expert-btn > * {
    position: relative;
    z-index: 2;
}
  </style>
  <script>
document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("scrollTopBtn");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
            btn.style.display = "flex";
        } else {
            btn.style.display = "none";
        }
    });

    btn.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {

    const btn = document.getElementById('talkToExpert');
    const contact = document.getElementById('contact');

    if (!btn || !contact) return;

    const observer = new IntersectionObserver(
        function(entries) {

            entries.forEach(function(entry) {

                if (entry.isIntersecting) {
                    btn.classList.add('hidden');
                } else {
                    btn.classList.remove('hidden');
                }

            });

        },
        {
            threshold: 0.2
        }
    );

    observer.observe(contact);

});
</script>

<a href="#contact" class="talk-to-expert-btn" id="talkToExpert">
    
    <span class="expert-icon">
        <i class="fa-solid fa-comments"></i>
    </span>

    <span class="expert-text">
        Talk to an Expert
    </span>

</a>
<?php wp_footer(); ?>

</body>
</html>
