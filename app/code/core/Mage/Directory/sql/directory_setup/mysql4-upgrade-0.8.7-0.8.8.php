<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Directory
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

//Entries for 'Newfoundland' should be corrected because of the province changed its name and code

$installer->run("
    UPDATE {$installer->getTable('directory/country_region')}
    SET code = 'NL', default_name = 'Newfoundland and Labrador'
    WHERE region_id = 69
");

$installer->run("
    UPDATE {$installer->getTable('directory/country_region_name')}
    SET `name` = 'Newfoundland and Labrador'
    WHERE `region_id` = 69 AND `name` = 'Newfoundland'
");

$installer->endSetup();
