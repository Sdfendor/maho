<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Sales
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Sales_Model_Resource_Setup $installer */
$installer = $this;

$installer->addAttribute('quote_item', 'base_tax_before_discount', ['type' => 'decimal']);
$installer->addAttribute('quote_item', 'tax_before_discount', ['type' => 'decimal']);

$installer->addAttribute('order_item', 'base_tax_before_discount', ['type' => 'decimal']);
$installer->addAttribute('order_item', 'tax_before_discount', ['type' => 'decimal']);
