<?php

namespace kriss\iframeLayout\filter;

use kriss\iframeLayout\component\IframeMode;
use Yii;
use yii\base\ActionFilter;

class IframeLinkFilter extends ActionFilter
{
    /**
     * layout name
     * @var string
     */
    public $layout = '';

    public function beforeAction($action)
    {
        $iframeMode = IframeMode::getComponent();
        if (!$iframeMode->enable) {
            return parent::beforeAction($action);
        }

        if ($this->layout === '') {
            Yii::setAlias('@krissIframeLayout', __DIR__ . '/../');
            $this->layout = '@krissIframeLayout/views/main-content';
        }

        $request = Yii::$app->request;
        if ($request->isPost) {
            $target = $request->post($iframeMode->queryTargetParam);
        } else {
            $target = $request->get($iframeMode->queryTargetParam);
        }

        // 解决 由 iframe 内页 redirect 会导致多出 layout 的问题
        $referer = Yii::$app->request->referrer;
        if (!$target && $referer) {
            $target = $this->getUrlQuery($referer, $iframeMode->queryTargetParam);
        }

        if (in_array($target, $iframeMode->queryTargetValues)) {
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
