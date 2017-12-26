<?php

namespace kriss\iframeLayout;

use Yii;
use yii\base\ActionFilter;

class LinkFilterAction extends ActionFilter
{
    /**
     * @var string
     */
    public $queryTargetParam = 'target';
    /**
     * @var array
     */
    public $queryTargetValues = ['iframe'];
    /**
     * layout name
     * @var string
     */
    public $layout = '';

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if ($this->layout === '') {
            $this->layout = __DIR__ . '/example-views/main-content';
        }

        $request = Yii::$app->request;
        if ($request->isPost) {
            $target = $request->post($this->queryTargetParam);
        } else {
            $target = $request->get($this->queryTargetParam);
        }
        if (in_array($target, $this->queryTargetValues)) {
            $action->controller->layout = $this->layout;
        }
        return parent::beforeAction($action);
    }
}