<?php

declare(strict_types=1);

namespace HK2\ScrollTop\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    private const XML_PATH_ENABLE = 'hk2_scrolltop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_enable';
    private const XML_PATH_POSITION = 'hk2_scrolltop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_position';
    private const XML_PATH_OFFSET = 'hk2_scrolltop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_offset';
    private const XML_PATH_SPEED = 'hk2_scrolltop_section1/hk2_scrolltop_section1_group1/hk2_scrolltop_speed';

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        private readonly ScopeConfigInterface $scopeConfig
    ) {
    }

    /**
     * Returns Is Enabled Option Value
     *
     * @param int|null $storeId
     * @return bool
     */
    public function isEnabled(?int $storeId = null): bool
    {
        return $this->scopeConfig->isSetFlag(
            self::XML_PATH_ENABLE,
            ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }

    /**
     * Returns Button Position Option Value
     *
     * @param int|null $storeId
     * @return string
     */
    public function getButtonPosition(?int $storeId = null): string
    {
        return (string)(
        $this->scopeConfig->getValue(
            self::XML_PATH_POSITION,
            ScopeInterface::SCOPE_STORE,
            $storeId
        ) ?: 'bottom-right'
        );
    }

    /**
     * Returns Scroll Offset Option Value
     *
     * @param int|null $storeId
     * @return int
     */
    public function getScrollOffset(?int $storeId = null): int
    {
        return (int)(
        $this->scopeConfig->getValue(
            self::XML_PATH_OFFSET,
            ScopeInterface::SCOPE_STORE,
            $storeId
        ) ?: 20
        );
    }

    /**
     * Returns Scroll Speed Option Value
     *
     * @param int|null $storeId
     * @return int
     */
    public function getScrollSpeed(?int $storeId = null): int
    {
        return (int)(
        $this->scopeConfig->getValue(
            self::XML_PATH_SPEED,
            ScopeInterface::SCOPE_STORE,
            $storeId
        ) ?: 600
        );
    }
}
