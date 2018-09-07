<?php

namespace kriss\iframeLayout\helper;

use kriss\iframeLayout\component\IframeMode;

class IframeModeHelper
{
    /**
     * @param $url
     * @return string
     */
    public static function getIframeLink($url)
    {
        $iframeMode = IframeMode::getComponent();
        $split = strpos($url, '?') !== false ? '&' : '?';
        // 追加的参数需要和 IframeLinkFilter 中保持一致
        return $url . $split . $iframeMode->queryTargetParam . '=' . $iframeMode->queryTargetValues[0];
    }
}
