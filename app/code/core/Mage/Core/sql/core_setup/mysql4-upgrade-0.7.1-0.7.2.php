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
drop table if exists {$this->getTable('design_change')};
CREATE TABLE {$this->getTable('design_change')} (
`design_change_id` INT NOT NULL AUTO_INCREMENT,
`store_id` smallint(5) unsigned NOT NULL ,
`package` VARCHAR( 255 ) NOT NULL ,
`theme` VARCHAR( 255 ) NOT NULL ,
`date_from` DATE NOT NULL ,
`date_to` DATE NOT NULL,
KEY `FK_DESIGN_CHANGE_STORE` (`store_id`),
PRIMARY KEY  (`design_change_id`)
) ENGINE = innodb;

ALTER TABLE {$this->getTable('design_change')}
  ADD
  CONSTRAINT `FK_DESIGN_CHANGE_STORE`
   FOREIGN KEY (`store_id`)
   REFERENCES {$this->getTable('core_store')} (`store_id`);
");

$installer->endSetup();
