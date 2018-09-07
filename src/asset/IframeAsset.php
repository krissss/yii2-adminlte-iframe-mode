<?php

namespace kriss\iframeLayout\asset;

use yii\web\AssetBundle;

class IframeAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/../../assets';

    public $css = [
        'iframe-layout.1.3.css',
    ];
    public $js = [
        'iframe-layout.1.3.js',
    ];

    public $depends = [
        'dmstr\web\AdminLteAsset'
    ];
}
