<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Downloadable
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Catalog_Model_Resource_Setup  $installer */
$installer = $this;
$installer->startSetup();

// Remove sales foreign keys
$installer->getConnection()->dropForeignKey(
    $installer->getTable('downloadable_link_purchased'),
    'FK_DOWNLOADABLE_ORDER_ID'
);

$installer->getConnection()->dropForeignKey(
    $installer->getTable('downloadable_link_purchased'),
    'FK_DOWNLOADABLE_PURCHASED_ORDER_ITEM_ID'
);

$installer->getConnection()->dropForeignKey(
    $installer->getTable('downloadable_link_purchased_item'),
    'FK_DOWNLOADABLE_ORDER_ITEM_ID'
);

$installer->endSetup();
