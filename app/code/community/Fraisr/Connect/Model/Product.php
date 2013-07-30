<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Fraisr
 * @package    Fraisr_Connect
 * @copyright  Copyright (c) 2013 das MedienKombinat Gmbh <kontakt@das-medienkombinat.de>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     André Herrn <andre.herrn@das-medienkombinat.de>
 */

/**
 * Product Sync Model
 * 
 * @category   Fraisr
 * @package    Fraisr_Connect
 * @author     André Herrn <andre.herrn@das-medienkombinat.de>
 */
class Fraisr_Connect_Model_Product extends Mage_Core_Model_Abstract
{
    /**
     * Synchronize cause data - retrieve by API and save them in the local database
     * 
     * @return void
     */
    public function synchronize()
    {
        $helper = Mage::helper('fraisrconnect/adminhtml_data');

        try {

        } catch (Fraisr_Connect_Model_Api_Exception $e) {
            $helper->logAndAdminOutputException(
                $helper->__(
                    'Cause synchronisation failed during API request with message: "%s".',
                    $e->getMessage()
                ),
                Fraisr_Connect_Model_Log::LOG_TASK_CAUSE_SYNC
            );
        } catch (Fraisr_Connect_Exception $e) {
            $helper->logAndAdminOutputException(
                $helper->__(
                    'Cause synchronisation failed with message: "%s".',
                    $e->getMessage()
                ),
                Fraisr_Connect_Model_Log::LOG_TASK_CAUSE_SYNC
            );
        } catch (Exception $e) {
            $helper->logAndAdminOutputException(
                $helper->__(
                    'An unknown error during cause synchronisation happened with message: "%s"',
                    $e->getMessage()
                ),
                Fraisr_Connect_Model_Log::LOG_TASK_CAUSE_SYNC
            );
        }
    }
}