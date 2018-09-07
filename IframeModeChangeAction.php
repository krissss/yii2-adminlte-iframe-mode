<?php

namespace kriss\iframeLayout;

use Yii;
use yii\base\Action;
use yii\web\Cookie;

class IframeModeChangeAction extends Action
{
    const IFRAME_MODE_KEY = 'iframe-mode';

    /**
     * 默认是否开启
     * @var bool
     */
    public static $defaultSwitch = true;

    /**
     * 成功的消息
     * @var string
     */
    public $successMsg = '切换成功';
    /**
     * 成功跳转的地址
     * @var array
     */
    public $successRedirect = ['site/index'];

    public function run()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove(static::IFRAME_MODE_KEY);
        $cookies->add(new Cookie([
            'name' => static::IFRAME_MODE_KEY,
            'value' => !static::isIframeMode(),
        ]));
        Yii::$app->session->setFlash('success', $this->successMsg);
        Yii::$app->response->redirect($this->successRedirect);
    }

    /**
     * 判断是否是 iframe 的模式
     * @return bool
     */
    public static function isIframeMode()
    {
        $cookies = Yii::$app->request->cookies;
        return (bool)$cookies->getValue(static::IFRAME_MODE_KEY, static::$defaultSwitch);
    }
}
