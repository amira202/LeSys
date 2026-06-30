<?php get_header(); 
$bg          = get_option('lesys_archive_industry_hero_bg');
$subtitle    = get_option('industries_archive_subtitle');
$title       = get_option('industries_archive_title');
$description = get_option('industries_archive_description');
$cta_text    = get_option('industries_archive_cta_text');
$cta_url     = get_option('industries_archive_cta_url');


?>
<section class="industries-hero" style="background-image:url('<?php echo esc_url($bg); ?>');">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="hero-content">

            
            <span class="hero-subtitle"><?php echo esc_html($subtitle); ?></span>
            <h1><?php echo wp_kses_post($title); ?></h1>
            <p><?php echo esc_html($description); ?></p>
            
            <div class="hero-cta-wrapper">
                <a href="<?php echo esc_url($cta_url); ?>" class="btn-primary"><?php echo esc_html($cta_text); ?></a>
            </div>
                        <div class="hero-breadcrumbs">
                <?php echo do_shortcode('[lesys_breadcrumbs]'); ?>
            </div>
        </div>
    </div>
</section>

<section class="industries-grid-section">
    <div class="container">

        <div class="industries-grid">

            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php
                    $hero = get_field('hero_section');
                    $short_desc = $hero['short_description'] ?? '';
                    ?>

                    <article class="industry-card">

                        <a href="<?php the_permalink(); ?>" class="industry-card-image">

                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php else : ?>
                                <div class="industry-card-placeholder">
                                    Industry
                                </div>
                            <?php endif; ?>

                        </a>

                        <div class="industry-card-content">

                            <h3>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <?php if ($short_desc) : ?>
                                <p>
                                    <?php echo wp_trim_words($short_desc, 22); ?>
                                </p>
                            <?php endif; ?>

                            <a href="<?php the_permalink(); ?>" class="industry-link">
                                Explore Industry →
                            </a>

                        </div>

                    </article>

                <?php endwhile; ?>

            <?php endif; ?>

        </div>

    </div>
</section>

<section class="industries-cta">
    <div class="container">

        <div class="cta-box">

            <h2>Need a tailored industry solution?</h2>

            <p>
                Speak with our experts to discuss your operational,
                technology, and transformation objectives.
            </p>

            <a href="<?php echo esc_url(home_url('/contact')); ?>"
               class="cta-btn">
                Talk to an Expert
            </a>

        </div>

    </div>
</section>
<style>
.industries-hero {
    position: relative;
    min-height: 600px;
    display: flex; /* Forces layout stability */
    align-items: center; /* Aligns content vertically */
    background-size: cover;
    background-position: center;
    padding: 120px 0;
    color: #fff;
}

.hero-content {
    max-width: 650px;
    text-align: left; /* Ensures the "Start the Conversation" text hits the left margin */
    z-index: 2;
    position: relative;
}

.hero-content h1 {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    line-height: 1.1;
    margin-bottom: 25px;
}

/* GRID */
.industries-grid-section{
    padding:100px 0;
}

.industries-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:30px;
}

.industry-card{
    background:#fff;
    border-radius:18px;
    overflow:hidden;
    box-shadow:0 12px 35px rgba(0,0,0,.06);
    transition:.3s;
}

.industry-card:hover{
    transform:translateY(-8px);
}

.industry-card-image{
    display:block;
    height:240px;
}

.industry-card-image img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.industry-card-content{
    padding:30px;
}

.industry-card-content h3{
    margin-bottom:15px;
    font-size:24px;
}

.industry-card-content h3 a{
    color:#0b1f3a;
    text-decoration:none;
}

.industry-card-content p{
    color:#667085;
    line-height:1.7;
    margin-bottom:20px;
}

.industry-link{
    color:var(--red);
    font-weight:600;
    text-decoration:none;
}

/* CTA */
.industries-cta{
    padding:100px 0;
}

.cta-box{
    background:linear-gradient(
        135deg,
        #0b1f3a,
        #1f4f82
    );

    color:#fff;
    text-align:center;
    padding:70px;
    border-radius:24px;
}

.cta-box h2{
    font-size:38px;
    margin-bottom:15px;
}

.cta-box p{
    max-width:700px;
    margin:0 auto 30px;
    color:#d7e0ea;
}

.cta-btn{
    display:inline-block;
    background:#e2462b;
    color:#fff;
    text-decoration:none;
    padding:14px 28px;
    border-radius:8px;
    font-weight:600;
}

@media(max-width:992px){

    .industries-grid{
        grid-template-columns:1fr;
    }

    .industries-hero h1{
        font-size:40px;
    }
}
.industries-hero{
    position:relative;

    min-height:550px;

    display:flex;
    align-items:center;

    background-size:cover;
    background-position:center;

    padding-top:120px;

    color:#fff;
}

.hero-overlay{
    position:absolute;
    inset:0;

    background:
    linear-gradient(
        90deg,
        rgba(11,31,58,.88) 0%,
        rgba(11,31,58,.70) 45%,
        rgba(11,31,58,.50) 100%
    );
}

.industries-hero .container{
    position:relative;
    z-index:2;
}

.hero-content{
    max-width:700px;
}

.hero-subtitle{
    display:inline-block;

    font-size:13px;
    font-weight:600;

    letter-spacing:2px;
    text-transform:uppercase;

    color:#d7e0ea;

    margin-bottom:20px;
}

.hero-content h1{
    font-size:64px;
    line-height:1.1;
    margin-bottom:25px;
}

.hero-content p{
    font-size:18px;
    line-height:1.8;

    color:#d7e0ea;

    margin-bottom:30px;
}

/* Breadcrumbs */
.hero-breadcrumbs{
    margin-top:25px;
}

.hero-breadcrumbs a{
    color:#fff;
    opacity:.8;
    text-decoration:none;
}

.hero-breadcrumbs a:hover{
    opacity:1;
}

.hero-breadcrumbs .current{
    color:#fff;
    font-weight:600;
}

@media(max-width:992px){

    .industries-hero{
        min-height:450px;
    }

    .hero-content h1{
        font-size:42px;
    }

    .hero-content p{
        font-size:16px;
    }
}
</style>
<?php
get_template_part('template-parts/content', 'successstory');
get_template_part('template-parts/content', 'trustedfoundations');
get_template_part('template-parts/content', 'contact');

get_footer();
?>