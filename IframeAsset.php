<?php

namespace kriss\iframeLayout;

use yii\web\AssetBundle;

class IframeAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/static/1.1';

    public $css = [
        'iframe-layout.css',
    ];
    public $js = [
        'iframe-layout.js'
    ];

    public $depends = [
        'dmstr\web\AdminLteAsset'
    ];
}