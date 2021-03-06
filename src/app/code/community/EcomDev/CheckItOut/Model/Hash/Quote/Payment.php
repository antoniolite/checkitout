<?php
/**
 * CheckItOut extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 *
 * @category   EcomDev
 * @package    EcomDev_CheckItOut
 * @copyright  Copyright (c) 2016 EcomDev BV (http://www.ecomdev.org)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @author     Ivan Chepurnyi <ivan.chepurnyi@ecomdev.org>
 */

/**
 * Model for hashing of payment method related information
 *
 *
 */
class EcomDev_CheckItOut_Model_Hash_Quote_Payment extends EcomDev_CheckItOut_Model_Hash_Quote_Abstract
{
    /**
     * Returns array of sensative data for payment method availablity
     * (non-PHPdoc)
     * @see EcomDev_CheckItOut_Model_Hash_Quote_Abstract::getDataForHash()
     */
    public function getDataForHash()
    {
        $data = array();
        $data[] = $this->getQuote()->getBillingAddress()->getCountryId();

        if (!$this->getQuote()->isVirtual()) {
            $data[] = $this->getQuote()->getShippingAddress()->getShippingMethod();
        }

        $proxy = new Varien_Object();
        $proxy->setDataForHash($data);
        // If some payment method requries custom logic for sensative data
        Mage::dispatchEvent('ecomdev_checkitout_hash_quote_payment', array('proxy' => $data));
        $data = $proxy->getDataForHash();

        return $data;
    }
}
