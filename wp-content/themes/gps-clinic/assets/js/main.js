/* GPS Clinic — main.js */

document.addEventListener('DOMContentLoaded', function () {

  // ── Scrolled navbar shrink ────────────────────────────────────
  const siteHeader = document.querySelector('.site-header');
  if (siteHeader) {
    const onScroll = function () {
      siteHeader.classList.toggle('scrolled', window.scrollY > 30);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // run once on load in case page is already scrolled
  }

  // ── Mobile nav toggle ──────────────────────────────────────────
  const burger = document.getElementById('nav-burger');
  const mobileNav = document.getElementById('mobile-nav');

  if (burger && mobileNav) {
    burger.addEventListener('click', function () {
      const open = mobileNav.classList.toggle('open');
      burger.setAttribute('aria-expanded', open);
    });
  }

  // Mark active nav link
  const currentPath = window.location.pathname;
  document.querySelectorAll('.nav-links a, .mobile-nav a').forEach(function (a) {
    if (a.getAttribute('href') === currentPath ||
        (a.getAttribute('href') !== '/' && currentPath.startsWith(a.getAttribute('href')))) {
      a.classList.add('active');
    }
  });

  // ── FAQ accordion ─────────────────────────────────────────────
  document.querySelectorAll('.faq-question').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const item = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      // Close all
      document.querySelectorAll('.faq-item.open').forEach(function (el) {
        el.classList.remove('open');
      });
      // Open clicked if it was closed
      if (!isOpen) {
        item.classList.add('open');
      }
    });
  });

  // ── Contact / Enquiry Form AJAX ───────────────────────────────
  const forms = document.querySelectorAll('.js-contact-form');
  forms.forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const btn = form.querySelector('.js-submit-btn');
      const successMsg = form.querySelector('.form-success');
      const formData = new FormData(form);
      formData.append('action', 'gpsclinic_contact');
      formData.append('nonce', (window.gpsclinicAjax || {}).nonce || '');

      if (btn) {
        btn.disabled = true;
        btn.textContent = 'Sending…';
      }

      fetch((window.gpsclinicAjax || {}).ajaxurl || '/wp-admin/admin-ajax.php', {
        method: 'POST',
        body: formData,
      })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (data.success) {
            form.reset();
            if (successMsg) {
              successMsg.textContent = data.data.message;
              successMsg.style.display = 'block';
            }
            if (btn) btn.style.display = 'none';
          } else {
            alert(data.data ? data.data.message : 'Something went wrong. Please try again.');
            if (btn) { btn.disabled = false; btn.textContent = 'Send Enquiry'; }
          }
        })
        .catch(function () {
          alert('Network error. Please call us on +91 9260202020.');
          if (btn) { btn.disabled = false; btn.textContent = 'Send Enquiry'; }
        });
    });
  });

  // ── Smooth scroll for anchor links ───────────────────────────
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

});
