<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_GiftMessage
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2019-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_GiftMessage_Model_Resource_Setup $this */
$installer = $this;

$installer->updateAttribute(
    'catalog_product',
    'gift_message_available',
    'frontend_input_renderer',
    'giftmessage/adminhtml_product_helper_form_config'
);
