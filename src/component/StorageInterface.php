<?php

namespace kriss\iframeLayout\component;

interface StorageInterface
{
    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null);

    /**
     * @param $key
     * @param $value
     */
    public function set($key, $value);
}
