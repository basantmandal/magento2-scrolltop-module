<?php

declare(strict_types=1);

namespace HK2\ScrollTop\Block;

use HK2\ScrollTop\Helper\Config;
use Magento\Framework\Serialize\Serializer\Json;
use Magento\Framework\View\Element\Template;

class ScrollTop extends Template
{
    /**
     * @param Template\Context $context
     * @param Config $config
     * @param Json $serializer
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        private readonly Config $config,
        private readonly Json $serializer,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    /**
     * Returns Is Enabled Option Value
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->config->isEnabled();
    }

    /**
     * Returns Button Position Option Value
     *
     * @return string
     */
    public function getButtonPosition(): string
    {
        return $this->config->getButtonPosition();
    }

    /**
     * Returns Scroll Offset Option Value
     *
     * @return int
     */
    public function getScrollOffset(): int
    {
        return $this->config->getScrollOffset();
    }

    /**
     * Returns Scroll Speed Option Value
     *
     * @return int
     */
    public function getScrollSpeed(): int
    {
        return $this->config->getScrollSpeed();
    }

    /**
     * Returns JSON Config
     *
     * @return string
     */
    public function getJsonConfig(): string
    {
        return $this->serializer->serialize([
            'scrollOffset' => $this->getScrollOffset(),
            'scrollSpeed' => $this->getScrollSpeed(),
            'position' => $this->getButtonPosition(),
        ]);
    }
}
