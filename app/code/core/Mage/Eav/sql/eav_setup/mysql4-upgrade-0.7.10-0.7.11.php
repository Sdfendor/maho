<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Eav
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2024 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Eav_Model_Entity_Setup $installer */
$installer = $this;
$installer->startSetup();

$table = $installer->getTable('eav/attribute');
$installer->getConnection()->addColumn(
    $table,
    'is_filterable_in_search',
    "TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT '1'"
);
$installer->run("
    UPDATE `{$table}` SET is_filterable_in_search=(is_filterable!=0)
");

$installer->endSetup();
