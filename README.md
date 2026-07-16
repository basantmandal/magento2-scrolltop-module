# HK2 Scroll Top

![Version](https://img.shields.io/badge/version-3.0.0-blue?style=flat-square)
![License](https://img.shields.io/badge/license-OSL--3.0-green?style=flat-square)
![Magento](https://img.shields.io/badge/Magento-2.4.4--2.4.9-f97316?style=flat-square&logo=magento&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1%20%7C%7C%208.2%20%7C%7C%208.3%20%7C%7C%208.4-7c3aed?style=flat-square&logo=php&logoColor=white)
[![Downloads](https://img.shields.io/packagist/dt/hk2/scrolltop?style=flat-square)](https://packagist.org/packages/hk2/scrolltop)

## Overview

HK2 Scroll Top is an uncomplicated free Open Source Magento Module that adds an intuitive back-to-top button at the corner of each page. It allows visitors to seamlessly navigate back to the top of lengthy web pages.

## 🎯 Use Cases

- **Enhanced UX**: Enhances storefront ergonomics on content-heavy pages like catalogs, blog indexes, or long details screens.
- **Mobile Usability**: Saves mobile users from tedious scrolling gestures.

## 🚀 Features

- ⚡ Seamless scroll animation on clicking the back-to-top button.
- ⚙️ Configurable button offset in pixels before it fades in.
- ⏱ Configurable scroll speed in milliseconds.
- 📍 Multiple position options (Bottom Right, Bottom Left, Top Right, Top Left).
- 🎨 Lightweight, native JS initialization utilizing Magento's standard `data-mage-init` system.

## 🏗 Architecture

- **Block**: `HK2\ScrollTop\Block\ScrollTop` encodes configuration as JSON for frontend integration.
- **Helper**: `HK2\ScrollTop\Helper\Data` reads configuration and handles scope fallbacks.

## 🧩 Magento Components

### Blocks

- `HK2\ScrollTop\Block\ScrollTop`

### Helpers

- `HK2\ScrollTop\Helper\Data`

### Layout XML

- `view/frontend/layout/default.xml` - Injects CSS stylesheet asset and template block.

## 📦 Requirements

- **Magento version**: 2.4.4 - 2.4.9
- **PHP requirements**: 8.1 || 8.2 || 8.3 || 8.4
- **Required Extension**: `HK2_Core`

## ⚙️ Installation

1. `composer require hk2/scrolltop`
2. `bin/magento module:enable HK2_ScrollTop`
3. `bin/magento setup:upgrade`
4. `bin/magento setup:di:compile`
5. `bin/magento cache:flush`

## 🔧 Configuration

Configure settings under **Stores > Configuration > HK2 > Scroll Top**:

| Field | Description |
|-------|-------------|
| **Enable ScrollTop Button** | Enable or disable the button on the storefront. |
| **Button Position** | Placement options: Bottom Right, Bottom Left, Top Right, Top Left. |
| **Scroll Offset (px)** | Vertically scrolled pixels before the button appears (default: `20`). |
| **Scroll Speed (ms)** | Duration of the scroll to top animation in milliseconds (default: `600`). |

## Usage

Once enabled, scroll down any frontend storefront page beyond your configured offset. Click the arrow button to slide back to the top of the page.

## 🗄 Database Changes

Not Applicable

## 📂 Module Structure

```text
Block/
└── ScrollTop.php
Helper/
└── Data.php
Model/
└── Config/
    └── Source/
        └── Position.php
etc/
├── adminhtml/
│   ├── menu.xml
│   └── system.xml
├── frontend/
│   └── di.xml
├── acl.xml
├── config.xml
└── module.xml
view/
└── frontend/
    ├── layout/
    │   └── default.xml
    ├── templates/
    │   └── scrolltop.phtml
    └── web/
        ├── css/
        │   └── scrollTop.css
        └── js/
            └── scroll-top.js
```

## 📈 Performance Considerations

The JS component executes outside layout recalculations, utilizing basic fade effects to keep storefront interaction fluid.

## 🔐 Security Considerations

- **Secure Config Paths**: Custom administrative ACL is defined under `HK2_ScrollTop::core_config` in `etc/acl.xml`.

## Compatibility

Reference: [docs/compatibility.md](docs/compatibility.md)

| Platform | Supported Versions |
|----------|-------------------|
| Magento  | 2.4.4 - 2.4.9     |
| PHP      | 8.1, 8.2, 8.3, 8.4 |

## 🛠 Troubleshooting

### Button does not appear on scroll

Ensure that you scroll past the offset value defined in configuration (default 20px). Verify that the cache is flushed: `bin/magento cache:flush`.

## 🤝 Contributing

Contributions are welcome! If you'd like to improve the installer:

- ⭐ **Star this repository** (Helps others find it!)
- 🍴 Fork the project
- 🐛 Report bugs
- 💡 Suggest new features
- 🤝 Contribute improvements

Every ⭐ helps increase the visibility of the project and motivates further development.

## ⚖️ Disclaimer

The author provides this installation script "as is" without any warranties. Users are responsible for ensuring that running this script complies with their internal security and software requirements.

## 🤝 Support

For bug reports, feature requests, and general support:

- **Author**: Basant Mandal
- **Email**: <support@basantmandal.in>
- **Website**: <https://www.basantmandal.in>

## License

This project is licensed under the OSL 3.0 License. See the [LICENSE.txt](LICENSE.txt) file for details.

---
