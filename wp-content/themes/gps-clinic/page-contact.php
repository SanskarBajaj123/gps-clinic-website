<?php
/**
 * GPS Clinic - page-contact.php
 * Template Name: Contact Page
 */
get_header();
gpsclinic_schema_organization();
?>

<section class="page-hero">
  <div class="container page-hero-inner">
    <nav class="breadcrumb" aria-label="Breadcrumb"><?php gpsclinic_breadcrumb(); ?></nav>
    <h1>Get in <span>Touch</span></h1>
    <p>Whether you need a quote, a demo, or on-site support - our team is ready to help. Reach us by phone, WhatsApp, or walk into our office.</p>
  </div>
</section>

<!-- Contact cards -->
<section style="background:var(--bg);padding:56px 24px 0;">
  <div class="container">
    <div class="g-4cols">

      <div style="background:var(--white);border:1px solid var(--border);border-radius:12px;padding:24px;transition:border-color 0.2s,box-shadow 0.2s;" onmouseover="this.style.borderColor='#F26419';this.style.boxShadow='0 4px 16px rgba(242,100,25,0.1)'" onmouseout="this.style.borderColor='var(--border)';this.style.boxShadow='none'">
        <div style="width:44px;height:44px;border-radius:10px;background:rgba(242,100,25,0.1);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#F26419" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.28h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.86a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <h4 style="font-family:'Outfit',sans-serif;font-size:15px;font-weight:700;color:var(--text);margin-bottom:4px;">Phone</h4>
        <p style="font-size:13px;color:var(--muted);margin-bottom:8px;">Mon – Sat, 9 AM – 7 PM</p>
        <a href="tel:+919260202020" style="font-size:15px;font-weight:600;color:var(--text);">+91 92602 02020</a>
      </div>

      <div style="background:var(--white);border:1px solid var(--border);border-radius:12px;padding:24px;transition:border-color 0.2s,box-shadow 0.2s;" onmouseover="this.style.borderColor='#F26419';this.style.boxShadow='0 4px 16px rgba(242,100,25,0.1)'" onmouseout="this.style.borderColor='var(--border)';this.style.boxShadow='none'">
        <div style="width:44px;height:44px;border-radius:10px;background:rgba(37,211,102,0.1);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="#25D366" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.998 2C6.476 2 2 6.478 2 12.002c0 1.97.56 3.807 1.533 5.367L2 22l4.784-1.525A9.942 9.942 0 0011.998 22c5.523 0 9.999-4.477 9.999-10.002C21.997 6.476 17.521 2 11.998 2z"/></svg>
        </div>
        <h4 style="font-family:'Outfit',sans-serif;font-size:15px;font-weight:700;color:var(--text);margin-bottom:4px;">
          WhatsApp
          <span style="display:inline-flex;align-items:center;gap:4px;font-size:10px;font-weight:700;color:#4ade80;background:rgba(74,222,128,0.1);border:1px solid rgba(74,222,128,0.25);border-radius:20px;padding:1px 7px;margin-left:6px;">
            <span style="width:5px;height:5px;border-radius:50%;background:#4ade80;animation:blink 2s infinite;"></span>Live
          </span>
        </h4>
        <p style="font-size:13px;color:var(--muted);margin-bottom:8px;">Quickest response</p>
        <a href="https://wa.me/919260202020" style="font-size:15px;font-weight:600;color:#25D366;" target="_blank" rel="noopener">+91 92602 02020</a>
      </div>

      <div style="background:var(--white);border:1px solid var(--border);border-radius:12px;padding:24px;transition:border-color 0.2s,box-shadow 0.2s;" onmouseover="this.style.borderColor='#F26419';this.style.boxShadow='0 4px 16px rgba(242,100,25,0.1)'" onmouseout="this.style.borderColor='var(--border)';this.style.boxShadow='none'">
        <div style="width:44px;height:44px;border-radius:10px;background:rgba(0,164,154,0.1);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#00A49A" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        </div>
        <h4 style="font-family:'Outfit',sans-serif;font-size:15px;font-weight:700;color:var(--text);margin-bottom:4px;">Sales Enquiry</h4>
        <p style="font-size:13px;color:var(--muted);margin-bottom:8px;">New products &amp; quotes</p>
        <a href="mailto:sales@gpsclinic.co.in" style="font-size:14px;font-weight:600;color:var(--text);">sales@gpsclinic.co.in</a>
      </div>

      <div style="background:var(--white);border:1px solid var(--border);border-radius:12px;padding:24px;transition:border-color 0.2s,box-shadow 0.2s;" onmouseover="this.style.borderColor='#F26419';this.style.boxShadow='0 4px 16px rgba(242,100,25,0.1)'" onmouseout="this.style.borderColor='var(--border)';this.style.boxShadow='none'">
        <div style="width:44px;height:44px;border-radius:10px;background:rgba(11,29,53,0.08);display:flex;align-items:center;justify-content:center;margin-bottom:14px;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg>
        </div>
        <h4 style="font-family:'Outfit',sans-serif;font-size:15px;font-weight:700;color:var(--text);margin-bottom:4px;">Technical Support</h4>
        <p style="font-size:13px;color:var(--muted);margin-bottom:8px;">Existing customers</p>
        <a href="mailto:support@gpsclinic.co.in" style="font-size:14px;font-weight:600;color:var(--text);">support@gpsclinic.co.in</a>
      </div>

    </div>
  </div>
</section>

<!-- Full contact form + map -->
<section class="contact-page-form">
  <div class="container split-flex">

    <div class="contact-info-col" style="flex:0 0 360px;">
      <h2>Send Us a Message</h2>
      <p>Fill in the form and we'll call you back within 24 hours.</p>

      <div class="contact-info-item">
        <div class="contact-info-icon contact-info-icon--orange">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div class="contact-info-text">
          <strong>Visit Our Office</strong>
          <span>Shop No. 110, Kailash Market, Padampura Circle, Railway Station Road, Chhatrapati Sambhajinagar - 431005</span>
        </div>
      </div>
      <div class="contact-info-item">
        <div class="contact-info-icon contact-info-icon--teal">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.6 1.28h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L7.91 8.86a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <div class="contact-info-text">
          <strong>+91 92602 02020</strong>
          <span>Mon – Sat, 9 AM – 7 PM</span>
        </div>
      </div>
      <div class="contact-info-item">
        <div class="contact-info-icon contact-info-icon--green">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M11.998 2C6.476 2 2 6.478 2 12.002c0 1.97.56 3.807 1.533 5.367L2 22l4.784-1.525A9.942 9.942 0 0011.998 22c5.523 0 9.999-4.477 9.999-10.002C21.997 6.476 17.521 2 11.998 2z"/></svg>
        </div>
        <div class="contact-info-text">
          <strong>WhatsApp (Fastest)</strong>
          <span>+91 92602 02020</span>
        </div>
      </div>

      <div class="map-wrap">
        <iframe
          loading="lazy"
          allowfullscreen
          referrerpolicy="no-referrer-when-downgrade"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3752.5!2d75.3433!3d19.8762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sKailash+Market+Chhatrapati+Sambhajinagar!5e0!3m2!1sen!2sin!4v1"
          title="GPS Clinic office location"
        ></iframe>
      </div>
    </div>

    <div style="flex:1;">
      <div class="enquiry-form-card">
        <h3>Enquiry Form</h3>
        <p class="form-sub">Tell us about your requirements and we'll recommend the right solution.</p>
        <form class="js-contact-form" novalidate>
          <div class="form-row">
            <div class="form-group">
              <label for="ct-name">Full Name *</label>
              <input type="text" id="ct-name" name="name" required placeholder="Your full name">
            </div>
            <div class="form-group">
              <label for="ct-mobile">Mobile Number *</label>
              <input type="tel" id="ct-mobile" name="mobile" required placeholder="+91 98765 43210">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="ct-email">Email Address</label>
              <input type="email" id="ct-email" name="email" placeholder="you@example.com">
            </div>
            <div class="form-group">
              <label for="ct-city">City</label>
              <input type="text" id="ct-city" name="city" placeholder="Your city">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label for="ct-product">Product / Solution Interest</label>
              <select id="ct-product" name="product">
                <option value="">Select…</option>
                <optgroup label="Hardware">
                  <option>Basic GPS Tracker</option>
                  <option>4G GPS Tracker</option>
                  <option>AIS 140 Certified Device</option>
                  <option>OBD Port Tracker</option>
                  <option>Solar GPS Tracker</option>
                  <option>Bike Tracker</option>
                </optgroup>
                <optgroup label="Software">
                  <option>Fleet Management System</option>
                  <option>School Bus Tracking</option>
                  <option>Employee Field Tracking</option>
                  <option>Ambulance Tracking</option>
                  <option>Fuel Monitoring</option>
                  <option>Other / Custom</option>
                </optgroup>
              </select>
            </div>
            <div class="form-group">
              <label for="ct-vehicles">Number of Vehicles</label>
              <input type="number" id="ct-vehicles" name="vehicles" min="1" placeholder="e.g. 10">
            </div>
          </div>
          <div class="form-group">
            <label for="ct-msg">Message</label>
            <textarea id="ct-msg" name="message" placeholder="Describe your requirements, industry, any specific needs…" rows="4"></textarea>
          </div>
          <div class="form-consent">
            <input type="checkbox" id="ct-consent" name="consent" required>
            <label for="ct-consent">I consent to GPS Clinic contacting me via phone or WhatsApp regarding my enquiry. My details will not be shared with third parties. See our <a href="<?php echo home_url('/privacy-policy/'); ?>">Privacy Policy</a>.</label>
          </div>
          <div class="form-success"></div>
          <button type="submit" class="btn btn--orange js-submit-btn" style="width:100%;justify-content:center;padding:14px;">Send Enquiry</button>
        </form>
      </div>
    </div>

  </div>
</section>

<?php get_footer(); ?>
