<?php
namespace HK2\ScrollTop\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const XML_PATH_ENABLE = 'hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_enable';
    const XML_PATH_POSITION = 'hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_position';
    const XML_PATH_OFFSET = 'hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_offset';
    const XML_PATH_SPEED = 'hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_speed';

    public function isEnabled($storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ENABLE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    public function getButtonPosition($storeId = null)
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_POSITION,
            ScopeInterface::SCOPE_STORE,
            $storeId
        ) ?: 'bottom-right';
    }

    public function getScrollOffset($storeId = null)
    {
        $offset = $this->scopeConfig->getValue(
            self::XML_PATH_OFFSET,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        
        return $offset ? (int)$offset : 20;
    }

    public function getScrollSpeed($storeId = null)
    {
        $speed = $this->scopeConfig->getValue(
            self::XML_PATH_SPEED,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        
        return $speed ? (int)$speed : 600;
    }
}