<?php
/**
 * Maho
 *
 * @category   Mage
 * @package    Mage_Checkout
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (https://magento.com)
 * @copyright  Copyright (c) 2017-2022 The OpenMage Contributors (https://openmage.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/** @var Mage_Checkout_Model_Resource_Setup $installer */
$installer = $this;
$installer->startSetup();

$connection = $installer->getConnection();
$table = $installer->getTable('core/config_data');

$select = $connection->select()
    ->from($table, ['config_id', 'value'])
    ->where('path = ?', 'checkout/options/onepage_checkout_disabled');

$data = $connection->fetchAll($select);

if ($data) {
    try {
        $connection->beginTransaction();

        foreach ($data as $value) {
            $bind = [
                'path'  => 'checkout/options/onepage_checkout_enabled',
                'value' => !((bool)$value['value'])
            ];
            $where = 'config_id = ' . $value['config_id'];
            $connection->update($table, $bind, $where);
        }

        $connection->commit();
    } catch (Exception $e) {
        $installer->getConnection()->rollBack();
        throw $e;
    }
}
$installer->endSetup();
