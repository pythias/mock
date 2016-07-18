<?php
namespace Mock\Random;

class Http {
    /**
     * 请求的参数获取
     * @param  [type] $key     [description]
     * @param  string $default [description]
     * @return [type]          [description]
     */
    static public function request($key, $default = '') {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }

    static public function email() {
        return '';
    }
}