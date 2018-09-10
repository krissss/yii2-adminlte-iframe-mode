<?php

namespace kriss\iframeLayout\component;

use Yii;
use yii\base\BaseObject;
use yii\base\Exception;

class IframeMode extends BaseObject
{
    const COMPONENT_NAME = 'iframe_mode';

    /**
     * 是否启用
     * @var boolean
     */
    public $enable = true;
    /**
     * 默认开关
     * @var bool
     */
    public $defaultSwitch = true;
    /**
     * session|cookie
     * @var string
     */
    public $storage = 'cookie';
    /**
     * 用于存储的key
     * @var string
     */
    public $storageKey = 'iframe-mode-key';
    /**
     * 该参数一般不可更改
     * @see iframe-layout.js iframeQueryParam
     * @var string
     */
    public $queryTargetParam = 'target';
    /**
     * 该参数一般不可更改
     * @see iframe-layout.js iframeQueryValue
     * @var array
     */
    public $queryTargetValues = ['iframe'];

    /**
     * @var StorageInterface
     */
    protected $storageComponent;

    /**
     * 是否启用
     * @return bool
     */
    public function isSwitch()
    {
        if (!$this->enable) {
            return false;
        }
        return (bool)$this->getStorage()->get($this->storageKey, $this->defaultSwitch);
    }

    /**
     * 修改启用
     * @param $isUse
     */
    public function changeSwitch($isUse = 'auto')
    {
        if ($isUse === 'auto') {
            $isUse = !$this->isSwitch();
        }
        $this->getStorage()->set($this->storageKey, $isUse);
    }

    /**
     * 存储方式
     * @return CookieStorage|SessionStorage|StorageInterface
     * @throws Exception
     */
    protected function getStorage()
    {
        if ($this->storageComponent) {
            return $this->storageComponent;
        }
        if ($this->storage == 'cookie') {
            $this->storageComponent = new CookieStorage();
        } elseif ($this->storage == 'session') {
            $this->storageComponent = new SessionStorage();
        } else {
            throw new Exception('Unknown storage');
        }
        return $this->storageComponent;
    }

    /**
     * @return null|object|static
     * @throws \yii\base\InvalidConfigException
     */
    public static function getComponent()
    {
        return Yii::$app->get(static::COMPONENT_NAME);
    }
}
