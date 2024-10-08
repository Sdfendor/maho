<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Core
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$installer->run("
CREATE TABLE {$this->getTable('core_flag')} (
  `flag_id` smallint(5) unsigned NOT NULL auto_increment,
  `flag_code` varchar(255) NOT NULL,
  `state` smallint(5) unsigned NOT NULL default '0',
  `flag_data` text,
  `last_update` datetime NOT NULL,
  PRIMARY KEY  (`flag_id`),
  KEY (`last_update`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();
