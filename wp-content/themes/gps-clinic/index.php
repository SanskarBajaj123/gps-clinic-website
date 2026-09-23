<?php
/**
 * GPS Clinic - index.php (fallback)
 */
get_header();
?>
<section class="archive-section">
  <div class="container">
    <?php if (have_posts()) : ?>
      <div class="blog-grid">
        <?php while (have_posts()) : the_post(); ?>
        <article class="blog-card">
          <div class="blog-card-thumb">
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('card-thumb', ['loading' => 'lazy', 'alt' => get_the_title()]); ?></a>
            <?php endif; ?>
          </div>
          <div class="blog-card-body">
            <div class="blog-meta"><?php echo get_the_date(); ?> &middot; <?php echo get_the_category_list(', '); ?></div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php the_permalink(); ?>" class="read-more">Read more →</a>
          </div>
        </article>
        <?php endwhile; ?>
      </div>
      <div class="pagination"><?php the_posts_pagination(['mid_size' => 2]); ?></div>
    <?php else : ?>
      <p style="text-align:center;padding:60px 0;color:var(--muted);">No posts found. <a href="<?php echo home_url('/'); ?>">Go back home</a>.</p>
    <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
