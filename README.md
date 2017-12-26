Yii2 AdminLte Iframe Mode
=========================
Yii2 AdminLte Iframe Mode

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require kriss/yii2-adminlte-iframe-mode -vvv
```

or add

```
"kriss/yii2-adminlte-iframe-mode": "*"
```

to the require section of your `composer.json` file.

预览
-----
![Effect picture 1](https://github.com/krissss/yii2-adminlte-iframe-mode/blob/master/preview.gif "Effect picture 1")  

全局全部开启标签页模式
-----

1. 在基础控制器中增加 `behavior`

```php
public function behaviors()
{
    $behaviors = parent::behaviors();

    $behaviors['iframe_layout'] = [
        'class' => IframeLinkFilter::className(),
        //'layout' => 'main-content' // 使用该参数自定义布局
    ];

    return $behaviors;
}
```

> 布局参考: [/example-views/main-content.php](https://github.com/krissss/yii2-adminlte-iframe-mode/blob/master/example-views/main-content.php)

2. 在默认的布局文件 `(main.php)` 中增加 `Asset`

```php
\kriss\iframeLayout\IframeAsset::register($this);
```
 
用户动态可更改模式
-----
 
1. 在上面的操作基础上
 
2. 在某个控制器，比如 `SiteController` 中增加 `action`
 
```php
public function actions()
{
    return [
        // 其他 actions
        'iframe-mode-change' => [
            'class' => IframeModeChangeAction::className(),
        ]
    ];
}
```
 
3. 增加切换模式的链接按钮

```php
<?= Html::a((IframeModeChangeAction::isIframeMode() ? '关闭' : '开启') . '标签页模式',
    ['/site/iframe-mode-change'], [
        'data-method' => 'post',
        'class' => 'dropdown-menu-item'
    ]) ?>
```
 
4. 修改原 `Asset` 引入方式

```php
if (IframeModeChangeAction::isIframeMode()) {
    IframeAsset::register($this);
}
```