<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Reports
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2023 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Report events SQL
 *
 * @category   Mage
 * @package    Mage_Reports
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->run("
ALTER TABLE {$this->getTable('report_event')} CHANGE `sybtype` `subtype` tinyint(3) unsigned NOT NULL default '0' AFTER `subject_id`;
ALTER TABLE {$this->getTable('report_event')} DROP INDEX `sybtype`, ADD INDEX (`subtype`);
");

$installer->endSetup();
