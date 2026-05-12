<?php
declare(strict_types=1);

namespace HK2\ScrollTop\Block;

use Magento\Framework\View\Element\Template;
use HK2\ScrollTop\Helper\Data;

class ScrollTop extends Template
{
    /**
     * @var Data
     */
    private $helper;

    /**
     * @param Template\Context $context
     * @param Data $helper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data $helper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->helper = $helper;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->helper->isEnabled();
    }

    /**
     * @return string
     */
    public function getButtonPosition(): string
    {
        return $this->helper->getButtonPosition();
    }

    /**
     * @return int
     */
    public function getScrollOffset(): int
    {
        return $this->helper->getScrollOffset();
    }

    /**
     * @return int
     */
    public function getScrollSpeed(): int
    {
        return $this->helper->getScrollSpeed();
    }

    /**
     * @return string
     */
    public function getJsonConfig(): string
    {
        $config = json_encode([
            'scrollOffset' => $this->getScrollOffset(),
            'scrollSpeed' => $this->getScrollSpeed(),
            'position' => $this->getButtonPosition()
        ]);
        return $config !== false ? $config : '{}';
    }
}
