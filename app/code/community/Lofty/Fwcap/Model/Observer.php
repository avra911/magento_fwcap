<?php

/**
 * Class Lofty_Fwcap_Model_Observer
 */
class Lofty_Fwcap_Model_Observer {

    /**
     * Check if the Fwcap module is enabled
     *
     * @return bool
     */
    public function isEnabled()
    {
        return Mage::getStoreConfig('fwcap/general/fwcap_enable', Mage::app()->getStore()->getId()) === "1";
    }

    /**
     * Add fwcap xml block to the layout
     *
     * @param Varien_Event_Observer $observer
     * @return $this
     */
    public function addFwcapBlock(Varien_Event_Observer $observer) {
        if ($this->isEnabled()) {
            $addPixelId = Mage::getStoreConfig('fwcap/general/add_pixel_id', Mage::app()->getStore()->getId());
            $layout = $observer->getEvent()->getLayout();
            $block = '<reference name="before_body_end">
                          <block type="fwcap/code" name="fwcap_block">
                              <action method="setData">
                                  <key>addPixelId</key>
                                  <value>' . $addPixelId . '</value>
                              </action>
                          </block>
                      </reference>';
			
            $layout->getUpdate()->addUpdate($block);

            return $this;
        }
    }
}