<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_SalesRule
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Sales_Model_Resource_Setup $installer */
$installer = $this;

/**
 * add attributes discount_description, shipping_discount_amount, base_shipping_discount_amount
 */
$installer->addAttribute('quote_address', 'discount_description', ['type' => 'varchar']);
$installer->addAttribute('quote_address', 'shipping_discount_amount', ['type' => 'decimal']);
$installer->addAttribute('quote_address', 'base_shipping_discount_amount', ['type' => 'decimal']);

$installer->addAttribute('order', 'discount_description', ['type' => 'varchar']);
$installer->addAttribute('order', 'shipping_discount_amount', ['type' => 'decimal']);
$installer->addAttribute('order', 'base_shipping_discount_amount', ['type' => 'decimal']);
