Yii2 AdminLte Iframe Mode
=========================
Yii2 AdminLte Iframe Mode

Important
------------
for `V2.0`。 Not compatible for before !!

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require kriss/yii2-adminlte-iframe-mode -vvv
```

or add

```
"kriss/yii2-adminlte-iframe-mode": "^3.0"
```

to the require section of your `composer.json` file.

预览
-----
![Effect picture 1](https://github.com/krissss/yii2-adminlte-iframe-mode/blob/master/preview.gif "Effect picture 1")  

全局全部开启标签页模式
-----

1. 增加配置

```php
<?php
use kriss\iframeLayout\component\IframeMode;

return [
    'components' => [
        IframeMode::COMPONENT_NAME => [
            'class' => IframeMode::class,
            'enable' => true,
            'defaultSwitch' => true,
        ],
    ]
];

```

1. 在基础控制器中增加 `behavior`

```php
<?php
use kriss\iframeLayout\filter\IframeLinkFilter;

public function behaviors()
{
    $behaviors = parent::behaviors();

    $behaviors['iframe_layout'] = [
        'class' => IframeLinkFilter::className(),
        //'layout' => '@app/views/layouts/main-content', // 使用该参数自定义布局
    ];

    return $behaviors;
}
```

> 布局参考: [/views/main-content.php](https://github.com/krissss/yii2-adminlte-iframe-mode/blob/master/src/views/main-content.php)

2. 在默认的布局文件 `(main.php)` 中增加 `Asset`

```php
<?php
\kriss\iframeLayout\widget\IframeModeAssetWidget::widget();
```
 
用户动态可更改模式
-----
 
1. 在上面的操作基础上
 
2. 在某个控制器，比如 `SiteController` 中增加 `action`
 
```php
<?php
use kriss\iframeLayout\action\IframeModeSwitchAction;

public function actions()
{
    return [
        // 其他 actions
        'iframe-mode-switch' => [
            'class' => IframeModeSwitchAction::className(),
        ]
    ];
}
```
 
3. 增加切换模式的链接按钮

```php
<?= \kriss\iframeLayout\widget\IframeModeSwitchWidget::widget() ?>
```
