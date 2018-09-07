<?php

namespace kriss\iframeLayout\widget;

use kriss\iframeLayout\asset\IframeAsset;
use kriss\iframeLayout\component\IframeMode;
use yii\base\Widget;

class IframeModeAssetWidget extends Widget
{
    public function run()
    {
        if (IframeMode::getComponent()->isSwitch()) {
            IframeAsset::register($this->view);
        }
    }
}
