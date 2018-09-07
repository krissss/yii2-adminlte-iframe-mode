<?php

namespace kriss\iframeLayout\widget;

use kriss\iframeLayout\component\IframeMode;
use yii\base\Widget;
use yii\helpers\Html;

class IframeModeSwitchWidget extends Widget
{
    public $action = ['site/iframe-mode-switch'];

    public function run()
    {
        $iframeMode = IframeMode::getComponent();
        if (!$iframeMode->enable) {
            return;
        }
        echo Html::a(($iframeMode->isSwitch() ? '关闭' : '开启') . '标签页模式', $this->action, [
            'data-method' => 'post',
            'class' => 'dropdown-menu-item',
        ]);
    }
}
