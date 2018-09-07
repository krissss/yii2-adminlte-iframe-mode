<?php

namespace kriss\iframeLayout\action;

use kriss\iframeLayout\component\IframeMode;
use Yii;
use yii\base\Action;

class IframeModeSwitchAction extends Action
{
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
        IframeMode::getComponent()->changeSwitch();
        Yii::$app->session->setFlash('success', $this->successMsg);
        Yii::$app->response->redirect($this->successRedirect);
    }
}
