<?php

namespace kriss\iframeLayout;

use Yii;
use yii\base\Action;
use yii\web\Cookie;

class IframeModeChangeAction extends Action
{
    const IFRAME_MODE_KEY = 'iframe-mode';

    public function run()
    {
        $cookies = Yii::$app->response->cookies;
        $cookies->remove(static::IFRAME_MODE_KEY);
        $cookies->add(new Cookie([
            'name' => static::IFRAME_MODE_KEY,
            'value' => !static::isIframeMode()
        ]));
        Yii::$app->session->setFlash('success', '切换成功');
        Yii::$app->response->redirect(['site/index']);
    }

    /**
     * 判断是否是 iframe 的模式
     * @return bool
     */
    public static function isIframeMode()
    {
        $cookies = Yii::$app->request->cookies;
        return (bool)$cookies->getValue(static::IFRAME_MODE_KEY, false);
    }
}