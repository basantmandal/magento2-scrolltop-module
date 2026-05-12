
<p align="center">
<img src="https://img.shields.io/badge/version-1.0.0-blue?style=flat-square" alt="Version">
<img src="https://img.shields.io/badge/Magento-2.4.x-f97316?style=flat-square&logo=magento&logoColor=white" alt="Magento">
<img src="https://img.shields.io/badge/PHP-8.2%2B-7c3aed?style=flat-square&logo=php&logoColor=white" alt="PHP">
<img src="https://img.shields.io/badge/license-OSL--3.0-green?style=flat-square" alt="License">
<a href="https://packagist.org/packages/hk2/scrolltop"><img src="https://img.shields.io/packagist/dt/hk2/scrolltop?style=flat-square" alt="Packagist"></a>
<br>
<a href="https://www.basantmandal.in/"><img src="https://img.shields.io/badge/Website-000?style=flat-square&logo=ko-fi&logoColor=white" alt="Website"></a>
<a href="https://www.linkedin.com/in/basantmandal/"><img src="https://img.shields.io/badge/LinkedIn-0A66C2?style=flat-square&logo=linkedin&logoColor=white" alt="LinkedIn"></a>
<a href="mailto:support@basantmandal.in"><img src="https://img.shields.io/badge/Email-support%40basantmandal.in-blue?style=flat-square&logo=gmail" alt="Email"></a>
</p>

---

## Overview

**HK2 ScrollTop** is a lightweight, pure-frontend Magento 2 module that adds a smooth "back to top" button to your storefront. Visitors can return to the top of long pages with a single click — no dragging, no fuss. Built entirely with CSS and JavaScript, it has zero backend PHP class overhead.

---

## Problem Statement

Long product pages, category listings, and CMS pages force users to manually scroll back to the top — or reach for the scrollbar — every time they want to access the main navigation, search bar, or header links. This friction degrades the user experience, especially on mobile devices where scrolling long distances is cumbersome.

---

## Solution Approach

HK2_ScrollTop injects a fixed-position button at the bottom-right corner of every page. After the user scrolls past 20px, the button fades in. Clicking it triggers a smooth jQuery animation that scrolls the viewport to the top. The module requires no PHP Blocks or Models — it uses only layout XML, a CSS file, and a JavaScript file, all gated behind a single admin configuration toggle.

---

## Who is this for?

- Magento 2 store owners who want a simple, unobtrusive scroll-to-top button
- Developers looking for a zero-configuration, no-PHP-backend module
- Shops with long product descriptions, tall category pages, or extensive CMS content

---

## Use Cases

- **Long product pages** — After reading a detailed description, users can jump back to the Add to Cart button and header
- **Extended category listings** — Infinite-scroll or paginated lists where the top navigation is far away
- **CMS pages** — About Us, Terms & Conditions, FAQ, and blog posts benefit from quick top-of-page access
- **Mobile storefronts** — Eliminates tedious thumb-scrolling on tall mobile layouts

---

## Key Features

- **One-click scroll-to-top** — Smooth jQuery animation back to the page top
- **Lightweight, no-PHP design** — Zero Block/Model classes; only CSS, JS, and layout XML
- **Responsive fixed-position** — Stays at the bottom-right corner across all viewports
- **Smooth animation** — Fade-in/fade-out based on scroll position, with animated scroll
- **Configurable enable/disable** — Toggle on/off via admin configuration (enabled by default)

---

## Architecture Overview

```
Layout XML (default_head_blocks.xml)
├── head.additional → header.phtml → scrollTop.css (injected into <head>)
└── before.body.end → footer.phtml → button HTML + scrollTop.js (injected before </body>)

Configuration
└── Stores → Configuration → HK2 → ScrollTop_Configuration
    └── Enable/Disable toggle (ifconfig gating both layout blocks)
```

The module has **no PHP Block or Model classes**. All frontend behaviour is driven by:

- `view/frontend/layout/default_head_blocks.xml` — Layout handle with `ifconfig`-gated blocks
- `view/frontend/templates/header.phtml` — CSS link injection
- `view/frontend/templates/footer.phtml` — SVG button markup and JS script tag
- `view/frontend/web/css/scrollTop.css` — Fixed-position styling (41x41px, dark background, yellow icon)
- `view/frontend/web/js/scrollTop.js` — jQuery-based scroll detection and animation

---

## System Requirements

| Requirement | Version |
|---|---|
| Magento | Open Source 2.4.x / Commerce 2.4.x |
| PHP | ^8.1 \|\| ^8.2 \|\| ^8.3 \|\| ^8.4 |
| Composer | 2.x |
| Dependencies | `hk2/core ^1.0`, `magento/framework ^103.0.0` |

---

## Installation

```bash
composer require hk2/scrolltop
php bin/magento module:enable HK2_ScrollTop
php bin/magento setup:upgrade
php bin/magento cache:clean
```

See [docs/installation.md](docs/installation.md) for detailed setup instructions.

---

## Configuration

1. Navigate to **Stores → Configuration → HK2 → ScrollTop_Configuration**
2. Set **Enable ScrollTop** to **Yes** (default)
3. Save configuration and clear the cache

Alternatively, use the menu shortcut at **Content → HK2 - Scroll Top**.

The enable/disable toggle controls both the CSS and JS injection via the `ifconfig` attribute in the layout XML. When disabled, no markup, styles, or scripts are added to the page.

---

## Content Security Policy (CSP)

The module loads its CSS and JS from local Magento static files (`HK2_ScrollTop::css/scrollTop.css` and `HK2_ScrollTop::js/scrollTop.js`). No external resources, CDN scripts, or inline styles/scripts are injected, making the module fully CSP-compatible out of the box.

No CSP whitelist entries are required.

---

## Privacy & GDPR

HK2_ScrollTop does **not**:

- Collect, store, or transmit any personal data
- Set cookies or use local/session storage
- Track user behaviour or page views
- Send data to any third-party service

The module is fully GDPR-compliant. No consent notices or privacy policy updates are needed.

---

## Documentation

- [Installation Guide](docs/installation.md)
- [Usage Guide](docs/usage.md)
- [Compatibility Information](docs/compatibility.md)
- [Changelog](CHANGELOG.md)
- [Security Policy](SECURITY.md)

---

## Known Limitations

- **No custom styling options in admin** — Button colours, size, and position cannot be changed via the admin panel; CSS overrides from a custom theme are required for visual customisation
- **Always bottom-right** — The button is fixed to the bottom-right corner (right: 15px, bottom: 6px) and cannot be repositioned via configuration
- **jQuery dependency** — Requires jQuery (bundled with Magento); not available as a vanilla JS implementation

---

## Contributing

Contributions are welcome. Please open an issue or pull request on the [GitHub repository](https://github.com/anomalyco/opencode). For bug reports, use the provided issue template.

---

## License

This software is licensed under the Open Software License (OSL 3.0). See [LICENCE.txt](LICENCE.txt) for the full license text.

---

## Disclaimer

THIS SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES, OR OTHER LIABILITY.
