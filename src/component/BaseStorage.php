<?php

namespace kriss\iframeLayout\component;

abstract class BaseStorage implements StorageInterface
{
    public $storage;

    public function __construct($component)
    {
        $this->storage = $component;
    }
}
