<?php
declare(strict_types=1);

namespace HK2\ScrollTop\Model\Config;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class SupportLink extends Field
{
    protected function _getElementHtml(AbstractElement $element): string
    {
        $supportUrl = 'https://www.basantmandal.in/support';

        $html = '<div style="padding: 10px; background-color: #fff3cd; border: 1px solid #ffecb5; border-radius: 4px;">';
        $html .= '<strong>Support:</strong><br/>';
        $html .= '<a href="' . $this->escapeHtml($supportUrl) . '" target="_blank" style="color: #664d03;">' . $this->escapeHtml($supportUrl) . '</a>';
        $html .= '<p style="margin: 5px 0 0 0; color: #666; font-size: 12px;">Get help with installation, configuration, and troubleshooting</p>';
        $html .= '</div>';

        return $html;
    }
}