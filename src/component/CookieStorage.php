<?php

namespace kriss\iframeLayout\component;

use Yii;
use yii\web\Cookie;

class CookieStorage extends BaseStorage
{
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return Yii::$app->request->cookies->getValue($key, $default);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        Yii::$app->response->cookies->add(new Cookie([
            'name' => $key,
            'value' => $value,
        ]));
    }
}
