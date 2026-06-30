<?php
$section_title = get_field('industry_eyebrow');
$industry_title = get_field('industry_title');
$industry_subtitle = get_field('industry_subtitle');

$industries = new WP_Query([
    'post_type' => 'industry',
    'posts_per_page' =>12,
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
            'tags' => get_the_tags(),
            'url' => get_permalink()
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

                <div class="over"></div><div class="shine"></div>

                <div class="body">
                  <h4><?php echo esc_html($item['title']); ?></h4>
                  <p><?php echo esc_html(wp_strip_all_tags($item['content'])); ?></p>
                </div>
<a href="<?php echo esc_url($item['url']); ?>" class="sector-btn">
    Learn More
    <i class="fa-solid fa-arrow-right"></i>
</a>
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
/* CARD */
.sector{
  overflow:hidden;
}

/* OVERLAY */
/** 
/*.over{
  position:absolute;
  inset:0;
  background:rgba(0,0,0,0);
  transition:.35s ease;
  z-index:2;
}
**/
.over{
    position:absolute;
    inset:0;
    z-index:1;

    background:
        linear-gradient(
            180deg,
            rgba(8,18,32,0.05) 0%,
            rgba(8,18,32,0.15) 45%,
            rgba(8,18,32,0.65) 100%
        );

    opacity:0;
    transition:all .45s ease;
}
.sector-btn{
    position:absolute;
    left:32px;
    bottom:32px;

    display:inline-flex;
    align-items:center;
    gap:10px;

    height:48px;
    padding:0 20px;

    background:#fff;
    color:#0b1726;

    border-radius:999px;
    text-decoration:none;
    font-size:14px;
    font-weight:600;
    line-height:1;

    opacity:0;
    transform:translateY(12px);
    transition:all .3s ease;

    z-index:5;
    white-space:nowrap;
}

/* reveal */
.sector:hover .sector-btn{
    opacity:1;
    transform:translateY(0);
}

/* HOVER EFFECT */
.sector:hover .over{
  background: var(--red);
}

.sector:hover .sector-btn{
  opacity:1;
  visibility:visible;
  transform:translate(-50%, -50%);
}

.sector:hover .bg{
  transform:scale(1.05);
}

.sector .bg{
  transition:transform .6s ease;
}
/* CARD */
.sector{
    position:relative;
    overflow:hidden;
    border-radius:24px;
}

/* OVERLAY */
.sector .over{
    position:absolute;
    inset:0;
    background:linear-gradient(
        180deg,
        rgba(0,0,0,0) 0%,
        rgba(0,0,0,.15) 55%,
        rgba(0,0,0,.45) 100%
    );
    opacity:0;
    transition:.35s ease;
    z-index:1;
}

/* CTA */
.sector-btn{
    position:absolute;
    left:32px;
    bottom:32px;

    display:flex;
    align-items:center;
    gap:10px;

    padding:12px 20px;
    border-radius:999px;

    background:#fff;
    color:#09131f;
    text-decoration:none;
    font-weight:600;
    font-size:14px;

    opacity:0;
    transform:translateY(12px);

    transition:.35s ease;
    z-index:4;
}

/* IMAGE */
.bg{
    transition:transform .6s cubic-bezier(.16,1,.3,1);
}

/* HOVER */
.sector:hover{
    transform:translateY(-8px);
    box-shadow:0 30px 60px rgba(0,0,0,.18);
}

.sector:hover .bg{
    transform:scale(1.04);
}

.sector:hover .over{
    opacity:1;
     background: color-mix(in srgb, var(--red) 20%, transparent);
}

.sector:hover .sector-btn{
    opacity:1;
    transform:translateY(0);
}
.sector{
    position:relative;
    overflow:hidden;
}

/* content block */
.sector .body{
    position:absolute;
    left:32px;
    right:32px;
    bottom:32px;
    z-index:3;
    transition:transform .35s ease;
}

/* button hidden initially */
.sector-btn{
    position:absolute;
    left:32px;
    bottom:32px;

    display:inline-flex;
    align-items:center;
    gap:10px;

    padding:12px 20px;
    height:48px;

    background:#fff;
    color:#09131f;
    border-radius:999px;
    text-decoration:none;
    font-weight:600;

    opacity:0;
    transform:translateY(20px);
    transition:all .35s ease;

    z-index:4;
}

/* hover */
.sector:hover .body{
    transform:translateY(-70px);
}

.sector:hover .sector-btn{
    opacity:1;
    transform:translateY(0);
}
.sector::before{
    content:"";
    position:absolute;
    inset:0;
    z-index:0;

    background:
      radial-gradient(
        circle at top right,
        rgba(70,130,255,.35),
        transparent 45%
      );

    opacity:0;
    transition:opacity .45s ease;
}
.sector::after{
    content:"";
    position:absolute;
    inset:0;
    border-radius:inherit;
    z-index:2;

    border:1px solid rgba(255,255,255,.08);
    transition:all .4s ease;
}

.sector:hover::after{
    border-color:rgba(255,255,255,.25);
}
.sector:hover{
    transform:translateY(-8px);
    box-shadow:
        0 20px 50px rgba(0,0,0,.25),
        0 0 0 1px rgba(255,255,255,.05);
}

.sector:hover::before{
    opacity:1;
}
.sector:hover .bg{
    transform:scale(1.05);
}
.sector .shine{
    position:absolute;
    inset:0;
    z-index:2;
    overflow:hidden;
    pointer-events:none;
}

.sector .shine::before{
    content:"";
    position:absolute;
    top:-50%;
    left:-120%;

    width:60%;
    height:200%;

    background:linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.12),
        transparent
    );

    transform:rotate(20deg);
    transition:left .8s ease;
}

.sector:hover .shine::before{
    left:150%;
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