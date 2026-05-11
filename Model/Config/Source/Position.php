<?php
namespace HK2\ScrollTop\Model\Config\Source;

class Position implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'bottom-right', 'label' => __('Bottom Right')],
            ['value' => 'bottom-left', 'label' => __('Bottom Left')],
            ['value' => 'top-right', 'label' => __('Top Right')],
            ['value' => 'top-left', 'label' => __('Top Left')]
        ];
    }
}