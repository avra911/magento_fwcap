<?php

/**
 * Class Lofty_Fwcap_Block_Code
 */
class Lofty_Fwcap_Block_Code extends Mage_Core_Block_Abstract {

    protected function _toHtml()
    {
        $addPixelId = $this->getData('addPixelId');
        $js = PHP_EOL .
            "<script>(function() {" . PHP_EOL .
            "  var _fbq = window._fbq || (window._fbq = []);" . PHP_EOL .
            "  if (!_fbq.loaded) {" . PHP_EOL .
            "    var fbds = document.createElement('script');" . PHP_EOL .
            "    fbds.async = true;" . PHP_EOL .
            "    fbds.src = '//connect.facebook.net/en_US/fbds.js';" . PHP_EOL .
            "    var s = document.getElementsByTagName('script')[0];" . PHP_EOL .
            "    s.parentNode.insertBefore(fbds, s);" . PHP_EOL .
            "    _fbq.loaded = true;" . PHP_EOL .
            "  }" . PHP_EOL .
            "_fbq.push(['addPixelId', '{$addPixelId}']);" . PHP_EOL .
            "})();" . PHP_EOL .
            "window._fbq = window._fbq || [];" . PHP_EOL .
            "window._fbq.push(['track', 'PixelInitialized', {}]);" . PHP_EOL .
            "</script>" . PHP_EOL .
            "<noscript><img height=\"1\" width=\"1\" alt=\"\" style=\"display:none\" src=\"https://www.facebook.com/tr?id={$addPixelId}&amp;ev=NoScript\" /></noscript>" . PHP_EOL;
        
        return $js;
    }
}
