<?php
/**
 * @package     BlueAcorn\SavedItems
 * @version
 * @author      Blue Acorn, Inc. <code@blueacorn.com>
 * @copyright   Copyright © 2015 Blue Acorn, Inc.
 */

class BlueAcorn_AppTraining_Helper_Data extends Mage_Core_Helper_Abstract {

    /**
     * @return mixed
     * returns page title from admin
     * if blank, returns default from config.xml
     */
    public function getAppTrainingPageTitle()
    {
        $pageTitle = Mage::getStoreConfig('blueacorn_apptraining/general/page_title');
        $pageTitleReturn = ($pageTitle === '' ? $this->getDefaultSettings('page_title') : $pageTitle );
        return $pageTitle;
    }

    /**
     * @return mixed
     * check enabled
     */
    public function isEnabled()
    {
        return Mage::getStoreConfig('blueacorn_apptraining/general/enabled');
    }

    /**
     * @return string
     * returns the customer name for welcome message
     */
    public function getCustomerName() {
        if(Mage::getSingleton('customer/session')->isLoggedIn()) {
            $customer = Mage::getSingleton('customer/session')->getCustomer();
//           var_dump($customer->getData('firstname'));
            return $customer->getData('firstname');
        }
    }

    /**
     * @return string
     * url return
     */
    public function getWelcomeUrl() {
        return Mage::getBaseUrl().'apptraining/customer/welcome';
    }

    /**
     * @param $node
     * @return Varien_Simplexml_Element
     *
     */
    public function getDefaultSettings($node) {
        $nodePath = 'default/blueacorn_apptraining/general/'.$node;
        return Mage::getConfig()->loadModulesConfiguration('config.xml')->getNode($nodePath);
    }
}