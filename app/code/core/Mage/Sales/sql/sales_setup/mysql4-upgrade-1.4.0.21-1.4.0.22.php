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

/** @var Mage_Sales_Model_Entity_Setup $installer */
$installer = $this;

foreach ([
        'sales/order', 'sales/order_grid', 'sales/creditmemo', 'sales/creditmemo_grid',
        'sales/invoice', 'sales/invoice_grid', 'sales/shipment','sales/shipment_grid',
         ] as $table
) {
    $tableName = $installer->getTable($table);
    $installer->getConnection()->dropKey($tableName, 'IDX_INCREMENT_ID');
    $installer->getConnection()->addKey($tableName, 'UNQ_INCREMENT_ID', 'increment_id', 'unique');
}
