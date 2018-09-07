<?php

namespace kriss\iframeLayout;

class IframeModeHelper
{
    /**
     * @param $url
     * @return string
     */
    public static function getIframeLink($url)
    {
        $split = strpos($url, '?') !== false ? '&' : '?';
        // 追加的参数需要和 IframeLinkFilter 中保持一致
        return $url . $split . 'target=iframe';
    }
}
