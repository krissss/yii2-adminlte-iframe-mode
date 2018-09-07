<?php

namespace kriss\iframeLayout;

use Yii;
use yii\base\ActionFilter;

class IframeLinkFilter extends ActionFilter
{
    /**
     * 是否启用
     * 在必须出现 target=iframe 这种后缀时，可以通过 IframeModeChangeAction::isIframeMode() 来确定是否需要启用
     * @var bool
     */
    public $enable = true;
    /**
     * @see iframe-layout.js iframeQueryParam
     * @var string
     */
    public $queryTargetParam = 'target';
    /**
     * @see iframe-layout.js iframeQueryValue
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
        if (!$this->enable) {
            return parent::beforeAction($action);
        }

        if ($this->layout === '') {
            Yii::setAlias('@krissIframeLayout', __DIR__);
            $this->layout = '@krissIframeLayout/example-views/main-content';
        }

        $request = Yii::$app->request;
        if ($request->isPost) {
            $target = $request->post($this->queryTargetParam);
        } else {
            $target = $request->get($this->queryTargetParam);
        }

        // 解决 由 iframe 内页 redirect 会导致多出 layout 的问题
        $referer = Yii::$app->request->referrer;
        if (!$target && $referer) {
            $target = $this->getUrlQuery($referer, $this->queryTargetParam);
        }

        if (in_array($target, $this->queryTargetValues)) {
            $action->controller->layout = $this->layout;
        }

        return parent::beforeAction($action);
    }

    protected function getUrlQuery($url, $queryParam)
    {
        $queryArr = $this->convertUrlQuery($url);
        return isset($queryArr[$queryParam]) ? $queryArr[$queryParam] : null;
    }

    protected function convertUrlQuery($url)
    {
        $queryParts = parse_url($url);
        if (!isset($queryParts['query'])) {
            return [];
        }
        $queryParts = $queryParts['query'];
        $queryParts = explode('&', $queryParts);
        $params = [];
        foreach ($queryParts as $param) {
            $item = explode('=', $param);
            $params[$item[0]] = $item[1];
        }
        return $params;
    }
}
