<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Catalog_Model_Resource_Setup  $installer */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->addKey(
    $installer->getTable('catalog/product_attribute_tier_price'),
    'UNQ_CATALOG_PRODUCT_TIER_PRICE',
    ['entity_id', 'all_groups', 'customer_group_id', 'qty', 'website_id'],
    'unique'
);

$installer->endSetup();
