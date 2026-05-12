# Installation

## Prerequisites

- Magento 2.4.x (Open Source or Commerce)
- PHP 8.1–8.4
- Composer 2.x
- `hk2/core` metapackage (automatically required)

## Install via Composer

```bash
composer require hk2/scrolltop
```

## Enable the Module

```bash
php bin/magento module:enable HK2_ScrollTop
```

## Run Upgrade

```bash
php bin/magento setup:upgrade
```

## Compile & Deploy (Production Mode)

If your store runs in production mode:

```bash
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
```

## Clear Cache

```bash
php bin/magento cache:clean
```

## Verify Installation

1. Log in to the Magento Admin
2. Navigate to **Stores → Configuration → HK2 → ScrollTop_Configuration**
3. Confirm **Enable ScrollTop** is set to **Yes** (default)
4. Visit any frontend page and scroll down — the scroll-to-top button should appear at the bottom-right corner

## Uninstall

```bash
php bin/magento module:disable HK2_ScrollTop
php bin/magento setup:upgrade
```

Remove the package:

```bash
composer remove hk2/scrolltop
```
