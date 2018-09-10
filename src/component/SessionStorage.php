<?php

namespace kriss\iframeLayout\component;

use Yii;
use yii\web\Session;

class SessionStorage extends BaseStorage
{
    /**
     * @var Session
     */
    public $storage;

    public function __construct()
    {
        $this->storage = Yii::$app->session;
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->storage->get($key, $default);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->storage->set($key, $value);
    }
}
