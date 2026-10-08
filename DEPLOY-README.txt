ANKATE CONSULTING - DEPLOYMENT NOTES (redesign, 8 Oct 2026)

UPLOAD
1. In cPanel File Manager, open public_html and upload this zip, then Extract. The files (index.html, .htaccess, assets/, etc.)
   must sit directly in public_html, not in a sub-folder. Show hidden files to confirm .htaccess and data/.htaccess are there.
2. Make sure the data/ folder is writable by PHP (permissions 755; 775 if the host requires it). It stores enquiries.log and subscribers.csv
   and is blocked from web access by data/.htaccess. Better still, move it above public_html and change the paths in the two .php files.
3. .htaccess forces https://www.ankateconsulting.co.ke. If the site will use the bare domain, edit the two rewrite rules, and the BASE
   value in your generator/canonical tags. Install the SSL certificate (AutoSSL) first or the redirect will fail.

BEFORE GO-LIVE CHECKLIST
- Send a test through the contact form and the newsletter form. Check delivery to info@ankateconsulting.co.ke and the spam folder.
  If mail() is disabled or lands in spam, switch to authenticated SMTP (PHPMailer) and add SPF + DKIM for the domain in cPanel > Email Deliverability.
- FOUNDER PROFILE (about.html and the "Meet the founder" band on index.html) contains SAMPLE content that must be verified or replaced:
    * Certificate no. "CHRP-XXXX-XXXX" and IHRM membership no. "IHRM-XXXXX" are placeholders. Insert the real numbers.
    * The ten-year career summary, the pull quote / Q&As and the expertise list are drafts, not AnnMary's record. Edit to what is true.
    * Portrait: the "AK" tile is a stand-in. Upload a photo to assets/img/founder.jpg (about 760x950px, under 150 KB) and replace each
      <div class="portrait" ...>AK</div> in about.html and index.html with:
      <img class="portrait-img" src="assets/img/founder.jpg" alt="CHRP AnnMary Kananu" width="760" height="950">
      (in about.html this is the only place the tile appears once; in index.html once).
    * The structured data for her (JSON-LD "Person" block in about.html) repeats the CHRP credential and IHRM membership. Keep it consistent with the page.
- COVERAGE: the site says Ankate serves all of Kenya, remotely and on site by agreement. Towns named on about.html are examples; edit freely.
- Have the privacy policy reviewed (Kenya Data Protection Act 2019). Register with the Office of the Data Protection Commissioner if required.
- The site promises a reply within one business day. Keep that promise or change the wording.
- Scenarios on how-we-help.html are illustrative. Replace with named case studies only with written client approval.
- Submit https://www.ankateconsulting.co.ke/sitemap.xml in Google Search Console and create a Google Business Profile with the same name, address and phone.
- If you add analytics or a tag manager, update the Content-Security-Policy line in .htaccess and the cookie wording in privacy.html.

WHAT CHANGED vs THE PREVIOUS BUILD
- Both forms now post to working PHP handlers with success/error messages, honeypot spam trap, consent checkbox and a visible privacy policy.
- admin.html removed. Case-study stubs replaced by clearly labelled illustrative scenarios.
- One shared header/footer on every page, working mobile menu, WhatsApp button, skip link, visible focus, 16px base text, higher-contrast gold text.
- SEO/AI: canonical tags, Open Graph + Twitter tags, favicon, JSON-LD (ProfessionalService, Service, FAQPage, Article, BreadcrumbList, ContactPage),
  FAQ content, "Ankate in brief" fact block, sitemap with lastmod, robots.txt, llms.txt, custom 404.
- Performance: 1.9 MB hero PNG and 521 KB logo removed; unused images dropped; lazy loading and image dimensions added; gzip and caching in .htaccess.
- Headings use DM Serif Display and Public Sans loaded from Google Fonts (falls back to Georgia/system fonts offline).
