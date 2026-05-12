# Usage

## How It Works

HK2_ScrollTop adds a fixed-position "back to top" button to every storefront page. The button is injected via layout XML and is controlled entirely through the admin configuration.

## Admin Configuration

Navigate to **Stores → Configuration → HK2 → ScrollTop_Configuration** (or use the shortcut at **Content → HK2 - Scroll Top**).

| Setting | Path | Default | Description |
|---|---|---|---|
| Enable ScrollTop | `hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_enable` | Yes | Toggles the scroll-to-top button on/off across the entire storefront |

When **disabled**, the layout blocks are not rendered — no CSS, no HTML markup, and no JavaScript are injected into the page.

## Frontend Behaviour

1. **Scroll detection** — As soon as the user scrolls past **20px** (`document.body.scrollTop > 20 || document.documentElement.scrollTop > 20`), the button fades in
2. **Button appearance** — A 41x41px dark grey button (`#404040`) with a yellow chevron-up icon (`#fecc0b`) appears at the **bottom-right corner** of the viewport (right: 15px, bottom: 6px, z-index: 9999)
3. **Hover effect** — A pink border (`#f6948a`) appears on hover
4. **Click action** — Clicking the button triggers `jQuery('html, body').animate({ scrollTop: 0 }, 'slow')`, smoothly scrolling to the top of the page
5. **Fade out** — Once the user scrolls back to the top (≤20px), the button fades out

## Visual Customisation

The module does not expose styling options in the admin. To customise appearance, override the CSS in your custom theme:

```css
/* Example: change button colour to match your brand */
.scrollTop_div {
    background-color: #yourColor !important;
    color: #yourIconColor !important;
}

/* Example: reposition to bottom-left */
.scrollTop_div {
    right: auto !important;
    left: 15px !important;
}
```

## Troubleshooting

| Symptom | Cause | Fix |
|---|---|---|
| Button does not appear | Module disabled in config | Enable in Stores → Configuration → HK2 → ScrollTop_Configuration |
| Button does not appear | Static content not deployed | Run `php bin/magento setup:static-content:deploy -f` |
| Button appears but does not scroll | jQuery conflict | Check browser console for JavaScript errors; ensure no other script removes the `#scrollTop_HK2` element |
