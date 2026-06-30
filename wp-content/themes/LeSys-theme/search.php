<?php get_header(); ?>

<!-- Clean, structurally isolated main container block -->
<main class="search-main-content-layout">
    <div class="search-premium-container">
        
        <!-- Header Section -->
        <header class="search-premium-header">
            <div class="search-badge-pill">
                <span class="pulse-dot"></span>
                <span class="badge-pill-text">
                    <?php 
                    if ( function_exists('pll_current_language') && pll_current_language() == 'ar' ) {
                        echo 'نتائج الفحص الذكي للأنظمة';
                    } else {
                        echo 'INTELLIGENT SYSTEM SEARCH';
                    }
                    ?>
                </span>
            </div>
            <h1 class="search-premium-title">
                <?php 
                if ( function_exists('pll_current_language') && pll_current_language() == 'ar' ) {
                    echo 'نتائج البحث عن ';
                } else {
                    echo 'Showing results for ';
                }
                ?>
                <span class="search-premium-keyword">“<?php echo esc_html( get_search_query() ); ?>”</span>
            </h1>
        </header>

        <!-- Results Grid Layout -->
        <div class="search-premium-grid">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <?php 
                // Capture the current content item's post type slug name dynamically
                $current_post_type = get_post_type(); 
                ?>
                
                <article class="search-premium-card">
                    <div class="premium-card-meta">
                        <span class="premium-type-tag"><?php echo strtoupper($current_post_type); ?></span>
                        <span class="premium-read-time"><i class="fa-regular fa-clock"></i> 2 min read</span>
                    </div>
                    
                    <div class="premium-card-body">
                        <h2 class="premium-card-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="premium-card-excerpt">
                            <?php echo wp_trim_words( get_the_excerpt(), 24, '...' ); ?>
                        </p>
                    </div>

                    <div class="premium-card-footer">
                        <a href="<?php the_permalink(); ?>" class="premium-action-link">
                            <span class="link-text">
                                <?php 
                                if ( function_exists('pll_current_language') && pll_current_language() == 'ar' ) {
                                    echo 'استكشاف الـ ' . esc_html($current_post_type);
                                } else {
                                    echo 'Explore ' . ucfirst(esc_html($current_post_type));
                                }
                                ?>
                            </span>
                            <span class="link-icon">
                                <?php if ( function_exists('pll_current_language') && pll_current_language() == 'ar' ) : ?>
                                    <i class="fa-solid fa-arrow-left"></i>
                                <?php else : ?>
                                    <i class="fa-solid fa-arrow-right"></i>
                                <?php endif; ?>
                            </span>
                        </a>
                    </div>
                </article>

            <?php endwhile; else : ?>
                
                <!-- Premium No Results State -->
                <div class="premium-no-results">
                    <div class="no-results-illustration">
                        <div class="icon-ring">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                    <h3>
                        <?php 
                        if ( function_exists('pll_current_language') && pll_current_language() == 'ar' ) {
                            echo 'لا توجد سجلات مطابقة';
                        } else {
                            echo 'No Records Found';
                        }
                        ?>
                    </h3>
                    <p>
                        <?php 
                        if ( function_exists('pll_current_language') && pll_current_language() == 'ar' ) {
                            echo 'عذراً، لم نتمكن من العثور على أي بيانات تطابق استعلامك. يرجى مراجعة التهجئة أو المحاولة مرة أخرى.';
                        } else {
                            echo 'We couldn\'t discover any platform databases matching your query parameters. Verify syntax benchmarks or refine your text input.';
                        }
                        ?>
                    </p>
                </div>
                
            <?php endif; ?>
        </div>

    </div>
</main>

<?php get_footer(); ?>
