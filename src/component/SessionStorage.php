<?php

namespace kriss\iframeLayout\component;

use yii\base\Exception;
use yii\web\Session;

class SessionStorage extends BaseStorage
{
    /**
     * @var Session
     */
    public $storage;

    public function __construct($component)
    {
        parent::__construct($component);
        if (!$this->storage instanceof Session) {
            throw new Exception('Must Be yii\web\Session');
        }
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
