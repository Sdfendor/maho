<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Customer
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Customer_Model_Entity_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->getConnection()->addKey($installer->getTable('customer_address_entity_datetime'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_address_entity_decimal'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_address_entity_int'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_address_entity_text'), 'IDX_VALUE', ['entity_id', 'attribute_id']);
$installer->getConnection()->addKey($installer->getTable('customer_address_entity_varchar'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);

$installer->getConnection()->addKey($installer->getTable('customer_entity_datetime'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_entity_decimal'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_entity_int'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);
$installer->getConnection()->addKey($installer->getTable('customer_entity_text'), 'IDX_VALUE', ['entity_id', 'attribute_id']);
$installer->getConnection()->addKey($installer->getTable('customer_entity_varchar'), 'IDX_VALUE', ['entity_id', 'attribute_id', 'value']);

$installer->endSetup();
