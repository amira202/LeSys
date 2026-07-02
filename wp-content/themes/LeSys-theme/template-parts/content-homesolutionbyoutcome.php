<?php
$section_title = get_field('solutions_eyebrow');
$solutions_title = get_field('solutions_title');
$solutions_description = get_field('solutions_description');

$solutions = new WP_Query([
    'post_type'      => 'service',
    'posts_per_page' => 12, 
    'post_status'    => 'publish'
]);

$items = [];

if ($solutions->have_posts()) {
    while ($solutions->have_posts()) {
        $solutions->the_post();

        // Safely fetch tags
        $post_tags = get_the_tags();
        $tags_array = [];
        if ($post_tags) {
            foreach($post_tags as $tag) {
                $tags_array[] = $tag->name;
            }
        }

        // Get the first assigned category instead of the custom field badge
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            $top_badge = $categories[0]->name; // Accesses first category array element
        } else {
            $top_badge = 'Operations'; // Dynamic safe fallback string
        }

        $items[] = [
            'title'   => get_the_title(),
            'content' => get_the_excerpt(), 
            'img'     => get_the_post_thumbnail(get_the_ID()),
            'badge'   => $top_badge,
            'platforms'    => get_field('platforms_for_service'),
            'url'     => get_permalink()
        ];
    }
    wp_reset_postdata();
}

$items = array_reverse($items);
?>
<!-- =================================================================
     SOLUTIONS — Smooth Animated Slider Carousel 
     ================================================================= -->
<section class="section" id="services">
  <div class="container">
    <div class="sec-eyebrow-row"><div class="eyebrow"><?php echo esc_html($section_title); ?></div></div>
    <div class="sec-head">
      <h2 class="title"><?php echo wp_kses_post($solutions_title); ?></h2>
      <div class="right">
        <p><?php echo esc_html($solutions_description); ?></p>
        <?php if (count($items) > 1) : ?>
          <div class="nav" id="solNav">
            <button class="round" id="solPrev" aria-label="Previous"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="round filled" id="solNext" aria-label="Next"><i class="fa-solid fa-arrow-right"></i></button>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Viewport Mask Wrapper -->
    <div class="sol-slider-overflow">
      <!-- Continuous Animated Slider Track -->
      <div class="sol-track" id="solTrack">
        <?php $i=0;foreach ($items as $item) : ?>
          <article class="sol">
            <div class="imgwrap">
              <span class="tag"><?php echo esc_html($item['badge']); ?></span>

              <a href="<?php echo esc_url($item['url']); ?>" aria-label="View <?php echo esc_attr($item['title']); ?>">
               <span class="open" ><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
              </a>
              <?php if (!empty($item['img'])) : ?>
                  <?php echo $item['img']; ?>
              <?php else : 
                if($i==0 || $i==3){?>
<svg viewBox="0 0 400 220" xmlns="http://www.w3.org/2000/svg">
            <defs><linearGradient id="g1" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0c2236"></stop><stop offset="1" stop-color="#1b3a55"></stop></linearGradient></defs>
            <rect width="400" height="220" fill="url(#g1)"></rect>
            <g fill="none" stroke="#6ea3c5" stroke-width="1" opacity=".6">
              <rect x="30" y="30" width="140" height="80" rx="6"></rect>
              <rect x="180" y="30" width="190" height="40" rx="6"></rect>
              <rect x="180" y="80" width="90" height="30" rx="6"></rect>
              <rect x="280" y="80" width="90" height="30" rx="6"></rect>
              <rect x="30" y="120" width="340" height="70" rx="6"></rect>
            </g>
            <g fill="#e2462b"><circle cx="50" cy="50" r="3"></circle><circle cx="65" cy="50" r="3"></circle></g>
            <path d="M50,160 L100,140 L150,150 L200,130 L260,145 L320,125 L360,140" stroke="#6ea3c5" stroke-width="2" fill="none"></path>
          </svg>
                <?php } 
                if($i==1 || $i==4){?>
                <svg viewBox="0 0 400 220" xmlns="http://www.w3.org/2000/svg">
            <defs><linearGradient id="g2" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0c2236"></stop><stop offset="1" stop-color="#1b3a55"></stop></linearGradient></defs>
            <rect width="400" height="220" fill="url(#g2)"></rect>
            <g stroke="#6ea3c5" stroke-width="1" fill="none" opacity=".7">
              <circle cx="200" cy="110" r="60"></circle>
              <circle cx="200" cy="110" r="40"></circle>
              <circle cx="200" cy="110" r="20"></circle>
            </g>
            <g fill="#6ea3c5">
              <circle cx="140" cy="110" r="4"></circle><circle cx="260" cy="110" r="4"></circle>
              <circle cx="200" cy="50" r="4"></circle><circle cx="200" cy="170" r="4"></circle>
            </g>
            <g fill="#e2462b"><circle cx="200" cy="110" r="6"></circle></g>
          </svg>
                <?php } 
                if($i==2 || $i==5){?>
<svg viewBox="0 0 400 220" xmlns="http://www.w3.org/2000/svg">
            <defs><linearGradient id="g3" x1="0" y1="0" x2="1" y2="1"><stop offset="0" stop-color="#0c2236"></stop><stop offset="1" stop-color="#1b3a55"></stop></linearGradient></defs>
            <rect width="400" height="220" fill="url(#g3)"></rect>
            <g fill="#6ea3c5" opacity=".75">
              <rect x="40" y="120" width="40" height="70"></rect>
              <rect x="90" y="90" width="50" height="100"></rect>
              <rect x="150" y="60" width="55" height="130"></rect>
              <rect x="215" y="100" width="45" height="90"></rect>
              <rect x="270" y="80" width="50" height="110"></rect>
              <rect x="330" y="110" width="40" height="80"></rect>
            </g>
            <g fill="#e2462b">
              <circle cx="60" cy="40" r="3"></circle><circle cx="115" cy="55" r="3"></circle>
              <circle cx="180" cy="30" r="3"></circle><circle cx="240" cy="50" r="3"></circle>
              <circle cx="295" cy="40" r="3"></circle><circle cx="350" cy="55" r="3"></circle>
            </g>
          </svg>
          <?php } endif; ?>
            </div>
            <div class="body">
              <h4><?php echo esc_html($item['title']); ?></h4>
              <p><?php echo esc_html($item['content']); ?></p>
              
              <?php if (!empty($item['platforms'])) : ?>
                <div class="chips">
                  <?php foreach ($item['platforms'] as $tag_name) : ?>
                   
                    <a href="<?php echo get_permalink($tag_name->ID); ?>" class="platform-link">
                <span class="chip">
                    <?php echo esc_html($tag_name->post_title); ?>
                </span>
            </a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </article>
        <?php $i++; endforeach; ?>
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const track = document.getElementById('solTrack');
  const prevBtn = document.getElementById('solPrev');
  const nextBtn = document.getElementById('solNext');
  const cards = document.querySelectorAll('#solTrack .sol');
  
  if (!track || cards.length === 0) return;

  let currentIndex = 0;

  function getItemsPerPage() {
    return window.innerWidth < 992 ? 1 : 3;
  }

  function updateSlider() {
    const itemsPerPage = getItemsPerPage();
    const totalSteps = cards.length - itemsPerPage;
    
    if (currentIndex > totalSteps) currentIndex = totalSteps;
    if (currentIndex < 0) currentIndex = 0;

    const cardWidthPercentage = 100 / itemsPerPage;
    const offset = currentIndex * cardWidthPercentage;
    
    track.style.transform = `translateX(-${offset}%)`;

    if (prevBtn && nextBtn) {
      if (currentIndex === 0) {
        prevBtn.classList.remove('filled');
      } else {
        prevBtn.classList.add('filled');
      }

      if (currentIndex >= totalSteps) {
        nextBtn.classList.remove('filled');
      } else {
        nextBtn.classList.add('filled');
      }
    }
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', function() {
      const itemsPerPage = getItemsPerPage();
      if (currentIndex < cards.length - itemsPerPage) {
        currentIndex++;
      } else {
        currentIndex = 0; 
      }
      updateSlider();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', function() {
      const itemsPerPage = getItemsPerPage();
      if (currentIndex > 0) {
        currentIndex--;
      } else {
        currentIndex = cards.length - itemsPerPage; 
      }
      updateSlider();
    });
  }

  window.addEventListener('resize', updateSlider);
  updateSlider();
});
</script>

<style>
  /* Container mask blocking element overflow leaks */
.sol-slider-overflow {
  width: 100%;
  overflow: hidden;
  padding: 10px 0;
}

/* Horizontal flex track with high-performance CSS transition animations */
.sol-track {
  display: flex;
  gap: 20; /* Keep gap at 0; widths are calculated as clean fractional values */
  transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1);
  will-change: transform;
  width: 100%;
}

/* Default responsive item sizing rules */
#solTrack .sol {
  flex: 0 0 100%; /* Show 1 item at a time on mobile screens */
  max-width: 100%;
  box-sizing: border-box;
  padding: 0 15px; /* Side padding forms card spacing gaps cleanly */
}

/* Desktop media adjustments */
@media (min-width: 992px) {
  #solTrack .sol {
    flex: 0 0 33.3333%; /* Show exactly 3 items at a time on desktop views */
    max-width: 33.3333%;
  }
}
.img{
  height: stretch;
}
</style>