<?php

namespace Brime\Core\Helpers;

class Config
{
    public $config;

    public function get($key)
    {
        if (!$this->config) {

            $config_file = '../Application/Config/config.php';

            if (!file_exists($config_file)) {
                return false;
            }

            $this->config = require $config_file;
        }

        return $this->config[$key];
    }
}