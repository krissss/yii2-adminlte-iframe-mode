<?php

namespace kriss\iframeLayout;

use yii\web\AssetBundle;

class IframeAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/static';

    public $css = [
        'iframe-layout.1.3.css',
    ];
    public $js = [
        'iframe-layout.1.3.js'
    ];

    public $depends = [
        'dmstr\web\AdminLteAsset'
    ];
}
