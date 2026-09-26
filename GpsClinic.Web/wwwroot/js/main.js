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

    // Close the mobile menu once any actual destination link is tapped
    // (but not the "Login" dropdown toggle, which only opens its submenu).
    mobileNav.addEventListener('click', function (e) {
      const link = e.target.closest('a');
      if (!link || link.getAttribute('role') === 'button') return;
      mobileNav.classList.remove('open');
      burger.setAttribute('aria-expanded', 'false');
    });
  }

  // ── Login nav dropdown (click/tap toggle; hover still works via CSS) ──
  document.querySelectorAll('.nav-dropdown').forEach(function (dropdown) {
    const trigger = dropdown.querySelector('a[role="button"]');
    if (!trigger) return;
    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      const open = dropdown.classList.toggle('open');
      trigger.setAttribute('aria-expanded', open);
      document.querySelectorAll('.nav-dropdown.open').forEach(function (other) {
        if (other !== dropdown) { other.classList.remove('open'); }
      });
    });
  });
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.nav-dropdown')) {
      document.querySelectorAll('.nav-dropdown.open').forEach(function (d) { d.classList.remove('open'); });
    }
  });

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
      const originalLabel = btn ? btn.textContent : '';

      if (btn) {
        btn.disabled = true;
        btn.textContent = 'Sending…';
      }

      fetch('/contact/submit', {
        method: 'POST',
        body: formData,
      })
        .then(function (r) { return r.json(); })
        .then(function (data) {
          if (data.success) {
            form.reset();
            if (successMsg) {
              successMsg.textContent = data.message;
              successMsg.style.display = 'block';
            }
            if (btn) btn.style.display = 'none';
          } else {
            alert(data.message || 'Something went wrong. Please try again.');
            if (btn) { btn.disabled = false; btn.textContent = originalLabel; }
          }
        })
        .catch(function () {
          alert('Network error. Please call us on +91 9260202020.');
          if (btn) { btn.disabled = false; btn.textContent = originalLabel; }
        });
    });
  });

  // ── Scroll-reveal animation ───────────────────────────────────
  const revealTargets = document.querySelectorAll(
    '.product-card, .sol-tile, .industry-card, .card, .testimonial-card, .benefit-item, .section-header'
  );
  revealTargets.forEach(function (el) { el.classList.add('reveal'); });

  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.05, rootMargin: '0px 0px 80px 0px' });

    revealTargets.forEach(function (el) { observer.observe(el); });

    // Safety net: never leave content permanently invisible (e.g. programmatic
    // scroll, reduced-motion edge cases, or an observer that never fires).
    setTimeout(function () {
      revealTargets.forEach(function (el) { el.classList.add('in-view'); });
    }, 1500);
  } else {
    revealTargets.forEach(function (el) { el.classList.add('in-view'); });
  }

  // ── Smooth scroll for anchor links ───────────────────────────
  document.querySelectorAll('a[href^="#"]').forEach(function (a) {
    a.addEventListener('click', function (e) {
      const href = a.getAttribute('href');
      if (!href || href.length < 2) return; // ignore bare "#" links (e.g. dropdown triggers)
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

});
