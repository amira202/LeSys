<?php
$section_title = get_field('industry_eyebrow');
$industry_title = get_field('industry_title');
$industry_subtitle = get_field('industry_subtitle');

$industries = new WP_Query([
    'post_type' => 'industry',
    'posts_per_page' => 6,
    'post_status' => 'publish'
]);

$items = [];

if ($industries->have_posts()) {
    while ($industries->have_posts()) {
        $industries->the_post();

        $items[] = [
            'title' => get_the_title(),
            'content' => get_the_content(),
            'img' => get_field('industry_image'),
            'tags' => get_the_tags()
        ];
    }
    wp_reset_postdata();
}
$items = array_reverse($items);
$chunks = array_chunk($items, 3);
?>

<section class="section dark" id="sectors">
  <div class="container">

    <div class="sec-eyebrow-row">
      <div class="eyebrow on-dark"><?php echo esc_html($section_title); ?></div>
    </div>

    <div class="sec-head">
      <h2 class="title"><?php echo $industry_title; ?></h2>
      <div class="right">
        <p><?php echo esc_html($industry_subtitle); ?></p>
      </div>
    </div>

    <!-- SLIDER WRAPPER -->
    <div class="sector-slider">

      <?php foreach ($chunks as $i => $chunk) : ?>

        <div class="sector-slide <?php echo $i === 0 ? 'active' : ''; ?>">

          <div class="sector-grid">
            <?php $num=0;?>
            <?php foreach ($chunk as $index => $item) : ?>

              <div class="sector">

                <!-- IMAGE -->
                <?php if (!empty($item['img'])) : ?>
                  <img class="bg" src="<?php echo esc_url($item['img']['url']); ?>" alt="">
                <?php 
              else:
              if($num==0||$num==3):?>
        <svg class="bg" viewBox="0 0 400 430" xmlns="http://www.w3.org/2000/svg">
          <defs><linearGradient id="sg1" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#6ea3c5"/><stop offset="1" stop-color="#1b3a55"/></linearGradient></defs>
          <g fill="url(#sg1)">
            <rect x="40" y="220" width="60" height="200"/>
            <rect x="110" y="180" width="70" height="240"/>
            <rect x="190" y="140" width="65" height="280"/>
            <rect x="265" y="200" width="55" height="220"/>
            <rect x="325" y="170" width="60" height="250"/>
          </g>
        </svg>
                      <?php endif; 
                      if($num==1||$num==4): ?>
                              <svg class="bg" viewBox="0 0 400 430" xmlns="http://www.w3.org/2000/svg">
          <g fill="none" stroke="#6ea3c5" stroke-width="2" opacity=".7">
            <path d="M200,80 L260,120 L260,240 Q260,310 200,350 Q140,310 140,240 L140,120 Z"/>
            <circle cx="200" cy="220" r="34"/>
            <rect x="190" y="210" width="20" height="30" rx="3"/>
          </g>
        </svg>
                      <?php endif; 
                      if($num==2||$num==5): ?>
                                 <svg class="bg" viewBox="0 0 400 430" xmlns="http://www.w3.org/2000/svg">
          <g stroke="#6ea3c5" stroke-width="1.5" fill="none" opacity=".6">
            <path d="M0,300 Q100,250 200,280 T400,260"/>
            <path d="M0,330 Q100,290 200,310 T400,300"/>
            <path d="M0,360 Q100,330 200,340 T400,340"/>
          </g>
          <g fill="#6ea3c5" opacity=".7">
            <circle cx="60" cy="180" r="3"/><circle cx="120" cy="160" r="3"/>
            <circle cx="180" cy="190" r="3"/><circle cx="240" cy="170" r="3"/>
            <circle cx="300" cy="200" r="3"/><circle cx="360" cy="180" r="3"/>
          </g>
        </svg>
                      <?php endif; endif;?>
                <!-- TAG -->
                <?php if (!empty($item['tags'][0])) : ?>
                  <span class="tag">
                    <?php echo esc_html($item['tags'][0]->name); ?>
                  </span>
                <?php endif; ?>

                <div class="over"></div>

                <div class="body">
                  <h4><?php echo esc_html($item['title']); ?></h4>
                  <p><?php echo esc_html(wp_strip_all_tags($item['content'])); ?></p>
                </div>

              </div>

            <?php  $num++; endforeach; ?>

          </div>

        </div>

      <?php endforeach; ?>

    </div>

    <!-- NAV BUTTONS -->
    <div class="sector-nav">
      <button class="round prev" aria-label="Previous" id="sectorPrev">
        <i class="fa-solid fa-arrow-left"></i>
      </button>
      <button class="round next filled" aria-label="Next" id="sectorNext">
        <i class="fa-solid fa-arrow-right"></i>
      </button>
    </div>

  </div>
</section>

<style>
.sector-slider {
  position: relative;
  overflow: hidden;
}

/* STACK SLIDES ON TOP OF EACH OTHER */
.sector-slide {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;

  opacity: 0;
  transform: translateX(80px);
  transition: all 0.6s ease;
  pointer-events: none;
}

/* ACTIVE SLIDE */
.sector-slide.active {
  opacity: 1;
  transform: translateX(0);
  pointer-events: auto;
  position: relative;
}

/* GRID */
.sector-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

.sector-slider {
  position: relative;
  overflow: hidden;
}

/* BASE SLIDE STATE */
.sector-slide {
  position: absolute;
  inset: 0;

  opacity: 0;
  transform: translate3d(40px, 0, 0) scale(0.98);
  filter: blur(6px);

  transition: all 700ms cubic-bezier(0.16, 1, 0.3, 1);
  pointer-events: none;
  will-change: transform, opacity, filter;
}

/* ACTIVE SLIDE */
.sector-slide.active {
  opacity: 1;
  transform: translate3d(0, 0, 0) scale(1);
  filter: blur(0);
  pointer-events: auto;
  z-index: 2;
}

/* GRID */
.sector-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 26px;
}

/* CARD BASE */
.sector {
  position: relative;
  transform: translateY(18px);
  opacity: 0;
  transition: all 600ms cubic-bezier(0.16, 1, 0.3, 1);
}

/* STAGGERED ENTER (enterprise feel) */
.sector-slide.active .sector {
  opacity: 1;
  transform: translateY(0);
}

/* stagger effect */
.sector-slide.active .sector:nth-child(1) { transition-delay: 120ms; }
.sector-slide.active .sector:nth-child(2) { transition-delay: 220ms; }
.sector-slide.active .sector:nth-child(3) { transition-delay: 320ms; }

/* HOVER = subtle elevation (no flashy UI) */
.sector:hover {
  transform: translateY(-6px);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const slides = document.querySelectorAll('.sector-slide');
  const prevBtn = document.getElementById('sectorPrev');
  const nextBtn = document.getElementById('sectorNext');
  
  let current = 0;

  function showSlide(index) {
    // 1. Toggle the active slide visibility state
    slides.forEach((slide, i) => {
      slide.classList.toggle('active', i === index);
    });

    // 2. Dynamic 'filled' UI switching based on current page step
    if (index === 0) {
      prevBtn.classList.remove('filled');
    } else {
      prevBtn.classList.add('filled');
    }

    if (index === slides.length - 1) {
      nextBtn.classList.remove('filled');
    } else {
      nextBtn.classList.add('filled');
    }
  }

  if (nextBtn) {
    nextBtn.addEventListener('click', function () {
      current = (current + 1) % slides.length;
      showSlide(current);
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', function () {
      current = (current - 1 + slides.length) % slides.length;
      showSlide(current);
    });
  }

  // Run calculation immediately on load to sync initial state
  showSlide(current);
});
</script>