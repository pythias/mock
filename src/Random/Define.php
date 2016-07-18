<?php
namespace Mock\Random;

class Define {
    static private $_defineValues = array();

    /**
     * 获取变量
     * @param  [type] $key     [description]
     * @param  string $default [description]
     * @return [type]          [description]
     */
    static public function define($key, $default = '') {
        return isset(self::$_defineValues[$key]) ? self::$_defineValues[$key] : $default;
    }

    /**
     * 保存变量
     * @param [type] $key   [description]
     * @param [type] $value [description]
     */
    static public function set($key, $value) {
        self::$_defineValues[$key] = $value;
    }
}