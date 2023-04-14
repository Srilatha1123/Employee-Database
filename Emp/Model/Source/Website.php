<?php 
  
namespace Codilar\Emp\Model\Source;  
class Website implements \Magento\Framework\Option\ArrayInterface
    {
    /**
     * {@inheritdoc}
     *
     * @codeCoverageIgnore
     */
    public function toOptionArray()
    {
        return [
            ['value' => 'Website', 'label' => __('Main Website')],
            ['value' => 'Default', 'label' => __('Default Website')],
            ['value' => 'Test Website', 'label' => __('Test Website')],
            ['value' => 'US', 'label' => __('US')],
            ['value' => 'UAE', 'label' => __('UAE')],
        ];
    } 
    } 
  
?>
