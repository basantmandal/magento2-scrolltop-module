<?php
declare(strict_types=1);

namespace HK2\ScrollTop\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Data
{
    const XML_PATH_ENABLE = 'hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_enable';
    const XML_PATH_POSITION = 'hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_position';
    const XML_PATH_OFFSET = 'hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_offset';
    const XML_PATH_SPEED = 'hk2_scrollTop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_speed';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @param int|null $storeId
     * @return bool
     */
    public function isEnabled($storeId = null): bool
    {
        return (bool)$this->scopeConfig->getValue(
            self::XML_PATH_ENABLE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * @param int|null $storeId
     * @return string
     */
    public function getButtonPosition($storeId = null): string
    {
        return (string)$this->scopeConfig->getValue(
            self::XML_PATH_POSITION,
            ScopeInterface::SCOPE_STORE,
            $storeId
        ) ?: 'bottom-right';
    }

    /**
     * @param int|null $storeId
     * @return int
     */
    public function getScrollOffset($storeId = null): int
    {
        $offset = $this->scopeConfig->getValue(
            self::XML_PATH_OFFSET,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        
        return $offset ? (int)$offset : 20;
    }

    /**
     * @param int|null $storeId
     * @return int
     */
    public function getScrollSpeed($storeId = null): int
    {
        $speed = $this->scopeConfig->getValue(
            self::XML_PATH_SPEED,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
        
        return $speed ? (int)$speed : 600;
    }
}