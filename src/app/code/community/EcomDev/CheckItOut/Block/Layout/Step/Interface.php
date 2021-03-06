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
 * Interface for all checkout blocks
 *
 * @method setStepName(string $name) sets name of the block, e.g. step header
 * @method setStepNumber(int $number) sets number of step, block number
 * @method setIsVisibleForVirtual(boolean $flag)
 * $method boolean getIsVisibleForVirtual() returns flag for block is visible depending on type of shopping cart (is virtual or not)
 */
interface EcomDev_CheckItOut_Block_Layout_Step_Interface
{
    /**
     * Returns block name text
     *
     * @return string
     */
    public function getStepName();

    /**
     * Returns block number in checkout
     *
     * @return int
     */
    public function getStepNumber();

    /**
     * Returns redendered content of the step block
     * or its child blocks
     *
     * @return string
     */
    public function getStepContent();

    /**
     * Adds class name to the list of css
     *
     * @param string $className
     * @return EcomDev_CheckItOut_Block_Layout_Step_Interface
     */
    public function addClassName($className);

    /**
     * Remove class name from the list of css
     *
     * @param string $className
     * @return EcomDev_CheckItOut_Block_Layout_Step_Interface
     */
    public function removeClassName($className);

    /**
     * Returns class names of the block
     *
     * @return string
     */
    public function getClassName();

    /**
     * Check if this block is visible
     *
     * @return boolean
     */
    public function isVisible();

}
