<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_SalesRule
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2020-2024 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$conn = $installer->getConnection();
$websites = $conn->fetchPairs("SELECT store_id, website_id FROM {$this->getTable('core_store')}");

$conn->addColumn($this->getTable('salesrule'), 'website_ids', 'text');

$select = $conn->select()
    ->from($this->getTable('salesrule'), ['rule_id', 'store_ids']);
$rows = $conn->fetchAll($select);

foreach ($rows as $r) {
    $websiteIds = [];
    foreach (explode(',', $r['store_ids']) as $storeId) {
        if ($storeId !== '') {
            $websiteIds[$websites[$storeId]] = true;
        }
    }
    $conn->update(
        $this->getTable('salesrule'),
        ['website_ids' => implode(',', array_keys($websiteIds))],
        'rule_id=' . $r['rule_id']
    );
}
$conn->dropColumn($this->getTable('salesrule'), 'store_ids');

$installer->endSetup();
