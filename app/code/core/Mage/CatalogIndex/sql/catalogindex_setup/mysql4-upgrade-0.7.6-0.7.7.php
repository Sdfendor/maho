<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_CatalogIndex
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer  = $this;
$installer->startSetup();

$installer->run("
    ALTER TABLE {$installer->getTable('catalogindex_price')}
    ADD COLUMN `tax_class_id` smallint(6) NOT NULL DEFAULT 0;
");

$installer->run("
    ALTER TABLE {$installer->getTable('catalogindex_minimal_price')}
    ADD COLUMN `tax_class_id` smallint(6) NOT NULL DEFAULT 0;
");

$installer->endSetup();
