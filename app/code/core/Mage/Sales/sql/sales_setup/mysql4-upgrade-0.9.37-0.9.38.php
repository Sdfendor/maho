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
$installer->startSetup();

$installer->run("
UPDATE `{$installer->getTable('sales_order')}` AS `s`
    LEFT JOIN `{$installer->getTable('customer_entity')}` AS `c`
        ON `s`.`customer_id`=`c`.`entity_id`
    SET `s`.`customer_id`=NULL
WHERE `c`.`entity_id` IS NULL;
");
$installer->getConnection()->modifyColumn($installer->getTable('sales_order'), 'customer_id', 'INT UNSIGNED NULL DEFAULT NULL');
$installer->getConnection()->addConstraint(
    'FK_SALES_ORDER_CUSTOMER',
    $installer->getTable('sales_order'),
    'customer_id',
    $installer->getTable('customer_entity'),
    'entity_id',
    'set null',
    'cascade'
);

$installer->endSetup();
