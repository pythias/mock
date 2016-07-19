<?php
namespace Mock\Http;

class Request {
    /**
     * 经过指定毫秒数以后302到特定地址
     * @param  [type]  $url [description]
     * @param  integer $ms  [description]
     * @return [type]       [description]
     */
    static public function redirect($url, $ms = 100) {
        if (headers_sent() == false) {
            usleep($ms * 1000);
            header("Location: {$url}");
            exit;
        } else {
            //TODO: HEADER失败的处理
        }
    }

    /**
     * 控制请求耗时，单位毫秒
     * @param  integer $ms [description]
     * @return [type]      [description]
     */
    static public function sleep($ms = 100) {
        usleep($ms * 1000);
    }

    /**
     * 方法 'alleria_after' 录入异步回调的请求
     * 使用第三方的服务来实现异步回调
     */
    static public function callback($url, $ms = array(1000, 4000, 7000)) {
        if (function_exists('alleria_after')) {
            foreach ($ms as $after) {
                call_user_func_array('alleria_after', array($url, $after));
            }
        }
    }

    /**
     * 请求的参数获取
     * @param  [type] $key     [description]
     * @param  string $default [description]
     * @return [type]          [description]
     */
    static public function request($key, $default = '') {
        return isset($_REQUEST[$key]) ? $_REQUEST[$key] : $default;
    }
}