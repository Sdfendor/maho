<?php

/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2022-2024 The OpenMage Contributors (https://openmage.org)
 * @copyright  Copyright (c) 2024 Maho (https://mahocommerce.com)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Adminhtml newsletter template preview block
 *
 * @category   Mage
 * @package    Mage_Adminhtml
 */
class Mage_Adminhtml_Block_Newsletter_Queue_Preview extends Mage_Adminhtml_Block_Widget
{
    #[\Override]
    protected function _toHtml()
    {
        /** @var Mage_Newsletter_Model_Template $template */
        $template = Mage::getModel('newsletter/template');

        if ($id = (int) $this->getRequest()->getParam('id')) {
            $queue = Mage::getModel('newsletter/queue');
            $queue->load($id);
            $template->setTemplateType($queue->getNewsletterType());
            $template->setTemplateText($queue->getNewsletterText());
            $template->setTemplateStyles($queue->getNewsletterStyles());
        } else {
            $template->setTemplateType($this->getRequest()->getParam('type'));
            $template->setTemplateText($this->getRequest()->getParam('text'));
            $template->setTemplateStyles($this->getRequest()->getParam('styles'));
        }
        $template->setTemplateStyles(
            $this->maliciousCodeFilter($template->getTemplateStyles()),
        );
        $template->setTemplateText(
            $this->maliciousCodeFilter($template->getTemplateText()),
        );

        $storeId = (int) $this->getRequest()->getParam('store_id');
        if (!$storeId) {
            $storeId = Mage::app()->getAnyStoreView()->getId();
        }

        Varien_Profiler::start('newsletter_queue_proccessing');
        $vars = [];

        $vars['subscriber'] = Mage::getModel('newsletter/subscriber');

        $template->emulateDesign($storeId);
        $templateProcessed = $template->getProcessedTemplate($vars, true);
        $template->revertDesign();

        if ($template->isPlain()) {
            $templateProcessed = '<pre>' . htmlspecialchars($templateProcessed) . '</pre>';
        }

        $templateProcessed = Mage::getSingleton('core/input_filter_maliciousCode')
            ->linkFilter($templateProcessed);

        Varien_Profiler::stop('newsletter_queue_proccessing');

        return $templateProcessed;
    }
}
