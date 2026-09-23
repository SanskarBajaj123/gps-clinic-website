<?php
/**
 * GPS Clinic - 404.php
 */
get_header();
?>
<section class="page-404">
  <div>
    <div class="num">404</div>
    <h1>Page Not Found</h1>
    <p>The page you're looking for doesn't exist or may have moved. Let's get you back on track.</p>
    <a href="<?php echo home_url('/'); ?>" class="btn btn--orange">Back to Home</a>
    &nbsp;
    <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--ghost-dark">Contact Us</a>
  </div>
</section>
<?php get_footer(); ?>
