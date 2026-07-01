<article class="lesys-card">
    <a href="<?php the_permalink(); ?>" class="card-image">
        <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); 
        else : ?> <div class="card-placeholder">LESYS</div> <?php endif; ?>
    </a>
    <div class="card-content">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <p><?php echo wp_trim_words(get_field('hero_section')['short_description'] ?? '', 20); ?></p>
        <a href="<?php the_permalink(); ?>" class="card-link">Explore →</a>
    </div>
</article>