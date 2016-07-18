<?php
namespace Mock\Handler;

class Http {
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
        } else {
            //TODO: HEADER失败的处理
        }
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
}
