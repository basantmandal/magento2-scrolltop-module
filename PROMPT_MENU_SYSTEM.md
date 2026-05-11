# Sanity Check: Adminhtml XML Format Consistency Across All HK2 Modules

Check all 5 Magento 2 modules against the **bootstrap5 module's adminhtml format** (the reference standard at `magento2-bootstrap5-module/etc/adminhtml/`).

## Reference Standard (bootstrap5 module)

- `etc/adminhtml/system.xml` — full declaration, CDATA labels, module info group via `ModuleHeader` frontend model, no `type="text"` on groups, `translate="label comment"` on fields, `showInWebsite` and `showInStore` on groups
- `etc/adminhtml/menu.xml` — `<?xml version="1.0"?>` declaration, `parent="HK2::root"` on child menu items, proper `resource` attribute
- `etc/adminhtml/routes.xml` — `<?xml version="1.0"?>` declaration, `before="Magento_Backend"` on module node (if present)

## Checklist per module

### 1. HK2_AddBootstrap5 (`magento2-bootstrap5-module`) — REFERENCE

| File | Check |
|------|-------|
| `menu.xml` | ✅ Has `<?xml version="1.0"?>`, `parent="HK2::root"`, `resource`, properly formatted |
| `routes.xml` | ✅ Has `<?xml version="1.0"?>`, `before="Magento_Backend"` |
| `system.xml` | ✅ Has declaration, CDATA labels, module info group with `ModuleHeader`, no `type="text"` on groups, `showInWebsite`/`showInStore` attributes |

### 2. HK2_CspWhitelisting (`magento2-csp-whitelisting-module`)

| File | Check |
|------|-------|
| `menu.xml` | Has `parent="HK2::root"`? Format matches reference? |
| `routes.xml` | Has `<?xml version="1.0"?>`? Uses `before="Magento_Backend"`? |
| `system.xml` | Groups have `type="text"` (reference does NOT). Should it be removed? Module info group present? CDATA on all labels/comments? |

### 3. HK2_SanitizeSearch (`magento2-hk2-search-sanitizer`)

| File | Check |
|------|-------|
| `menu.xml` | **Missing `parent="HK2::root"`** — should be added. Format matches reference? |
| `system.xml` | Defines duplicate `<tab>hk2_options_tab</tab>` — core already does this. Module info group missing. CDATA on all labels? |

### 4. HK2_ScrollTop (`magento2-scrolltop-module`)

| File | Check |
|------|-------|
| `menu.xml` | **Missing `<?xml version="1.0"?>` declaration**. **Missing `parent="HK2::root"`**. Should match reference. |
| `system.xml` | **Missing `<?xml version="1.0"?>` declaration**. Groups have `type="text"` (reference does NOT). Labels use non-descriptive keys like `ScrollTop_Configuration` instead of user-friendly text. Missing `showInWebsite`/`showInStore` on group. |

## Summary of expected format

### `system.xml` (per module with admin config)

```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Config:etc/system_file.xsd">
    <system>
        <section id="..." translate="label" sortOrder="2" showInDefault="1" showInWebsite="1"
                 showInStore="1">
            <label><![CDATA[User Friendly Name]]></label>
            <tab>hk2_options_tab</tab>
            <resource>Vendor_Module::core_config</resource>

            <!-- Module Information Header (required for all modules with config) -->
            <group id="..._module_info" showInDefault="1" showInWebsite="0" showInStore="0" sortOrder="0"
                   translate="label">
                <label><![CDATA[About HK2 Extensions]]></label>
                <field id="..._module_header" type="note" sortOrder="0" showInDefault="1"
                       showInWebsite="0" showInStore="0">
                    <frontend_model>HK2\Core\Block\Adminhtml\System\Config\ModuleHeader</frontend_model>
                </field>
            </group>

            <!-- Settings groups (NO type="text" attribute) -->
            <group id="..._group2" showInDefault="1" showInWebsite="0" showInStore="0"
                   sortOrder="1" translate="label">
                <label><![CDATA[General Settings]]></label>
                <field id="..." showInDefault="1" showInWebsite="0" showInStore="0" type="select"
                       sortOrder="0" translate="label comment">
                    <label><![CDATA[Enable Extension]]></label>
                    <source_model>Magento\Config\Model\Config\Source\Yesno</source_model>
                    <comment><![CDATA[Description text]]></comment>
                </field>
            </group>
        </section>
    </system>
</config>
```

### `menu.xml` (child menu items)

```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:module:Magento_Backend:etc/menu.xsd">
    <menu>
        <add id="Vendor_Module::settings" title="Display Name" module="Vendor_Module" sortOrder="39"
             action="adminhtml/system_config/edit/section/..."
             resource="Magento_Backend::content" parent="HK2::root"/>
    </menu>
</config>
```

### `routes.xml` (if admin routes needed)

```xml
<?xml version="1.0"?>
<config xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:noNamespaceSchemaLocation="urn:magento:framework:App/etc/routes.xsd">
    <router id="admin">
        <route id="route_id" frontName="route_id">
            <module name="Vendor_Module" before="Magento_Backend"/>
        </route>
    </router>
</config>
```

## Automated check commands

```bash
# Check for missing XML declarations
for f in $(find . -path "*/etc/adminhtml/*.xml" -type f); do
    if ! head -1 "$f" | grep -q '<?xml'; then
        echo "MISSING XML DECL: $f"
    fi
done

# Check for menu items missing parent="HK2::root" (exclude core itself)
for f in $(find . -path "*/etc/adminhtml/menu.xml" -type f); do
    if ! grep -q 'parent="HK2::root"' "$f" && ! grep -q 'id="HK2::root"' "$f"; then
        echo "MISSING parent=HK2::root: $f"
    fi
done

# Check for type="text" on groups in system.xml
grep -rn 'type="text"' --include="system.xml" .
```
