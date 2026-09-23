<?php
/**
 * Reusable CTA band - included near the bottom of every inner page.
 * Usage: get_template_part( 'template-parts/cta-band', null, $args );
 * $args: title (string), subtitle (string), cta_label (string)
 */
$title     = isset($args['title'])     ? $args['title']     : 'Ready to Track Your Fleet?';
$subtitle  = isset($args['subtitle'])  ? $args['subtitle']  : 'Get a free demo, site visit, or same-day quote from our local team.';
$cta_label = isset($args['cta_label']) ? $args['cta_label'] : 'Get a Free Quote';
?>

<section class="contact-cta" aria-labelledby="cta-heading">
  <div class="cta-band-glow" aria-hidden="true"></div>
  <div class="container cta-band-inner">

    <div class="cta-band-text">
      <h2 id="cta-heading"><?php echo esc_html($title); ?></h2>
      <p><?php echo esc_html($subtitle); ?></p>
    </div>

    <div class="cta-band-actions">
      <a href="<?php echo home_url('/contact/'); ?>" class="btn btn--orange btn--lg">
        <?php echo esc_html($cta_label); ?>
      </a>
      <a href="https://wa.me/919260202020" class="btn btn--green btn--lg" target="_blank" rel="noopener">
        <svg width="17" height="17" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
          <path d="M11.998 2C6.476 2 2 6.478 2 12.002c0 1.97.56 3.807 1.533 5.367L2 22l4.784-1.525A9.942 9.942 0 0011.998 22c5.523 0 9.999-4.477 9.999-10.002C21.997 6.476 17.521 2 11.998 2z"/>
        </svg>
        WhatsApp Us
      </a>
      <a href="tel:+919260202020" class="btn btn--ghost btn--lg">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.28h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.86a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
        </svg>
        +91 92602 02020
      </a>
    </div>

  </div>
</section>
