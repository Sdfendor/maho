<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Log
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->run("
    ALTER TABLE `{$installer->getTable('log/customer')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/quote_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/summary_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/summary_type_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/url_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/url_info_table')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/visitor')}` ENGINE INNODB;
    ALTER TABLE `{$installer->getTable('log/visitor_info')}` ENGINE INNODB;
");

$installer->endSetup();
