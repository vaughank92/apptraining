<?php
/**
 * @package     BlueAcorn\AppTraining
 * @version     0.1.0
 * @author      Blue Acorn, Inc. <code@blueacorn.com>
 * @copyright   Copyright © 2016 Blue Acorn, Inc.
 */

class BlueAcorn_AppTraining_CustomerController extends Mage_Core_Controller_Front_Action {
    public function welcomeAction() {
        /**
         * checks if the module is enabled in admin, if not 404page
         */
        if(Mage::helper('blueacorn_apptraining')->isEnabled()) {
            $this->enabledAction();
        }
        else {
            $this->norouteAction();
        }
    }

    public function enabledAction() {
            $this->loadLayout();
            $this->renderLayout();
    }
}