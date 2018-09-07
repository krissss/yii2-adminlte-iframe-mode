<?php

namespace kriss\iframeLayout\component;

use yii\base\Exception;
use yii\web\Cookie;
use yii\web\CookieCollection;

class CookieStorage extends BaseStorage
{
    /**
     * @var CookieCollection
     */
    public $storage;

    public function __construct($component)
    {
        parent::__construct($component);
        if (!$this->storage instanceof CookieCollection) {
            throw new Exception('Must Be yii\web\CookieCollection');
        }
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->storage->getValue($key, $default);
    }

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value)
    {
        $this->storage->add(new Cookie([
            'name' => $key,
            'value' => $value,
        ]));
    }
}
