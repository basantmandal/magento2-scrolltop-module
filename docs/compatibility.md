# Compatibility

## Magento Versions

| Edition | Versions |
|---|---|
| Magento Open Source | 2.4.x |
| Adobe Commerce | 2.4.x |

The module sequences on `Magento_Theme` and `HK2_Core` via `etc/module.xml`.

## PHP Versions

| PHP Version | Supported |
|---|---|
| 8.1 | Yes |
| 8.2 | Yes |
| 8.3 | Yes |
| 8.4 | Yes |

## Browser Support

The frontend button and animations rely on jQuery (bundled with Magento) and standard CSS. Supported browsers:

| Browser | Supported |
|---|---|
| Google Chrome | Yes (latest 2 major versions) |
| Mozilla Firefox | Yes (latest 2 major versions) |
| Apple Safari | Yes (latest 2 major versions) |
| Microsoft Edge | Yes (latest 2 major versions) |
| Opera | Yes (latest 2 major versions) |
| Mobile Safari (iOS) | Yes |
| Android Browser | Yes |

## Dependency Graph

```
HK2_ScrollTop
├── HK2_Core (^1.0)
└── Magento_Theme (implicit via layout handles)
    └── Magento_Framework (^103.0.0)
```

## Known Incompatibilities

- **Magento 2.3.x and below** — Not supported. The module targets Magento 2.4.x and requires `magento/framework ^103.0.0`.
- **PHP 8.0 and below** — Not supported. Minimum PHP requirement is 8.1.
