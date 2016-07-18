<?php
namespace Mock\Handler;

define('KEY_MOCK_FUNCTION', '_MOCK_');

class Callback {
    /**
     * 添加函数处理
     * @param [type] $callbacks [description]
     */
    static public function handle(&$template) {
        if (isset($template[KEY_MOCK_FUNCTION]) == false || is_array($template[KEY_MOCK_FUNCTION]) == false) {
            return;
        }

        foreach ($template[KEY_MOCK_FUNCTION] as $callback) {
            if (isset($callback['function']) == false) {
                continue;
            }

            if (method_exists(__NAMESPACE__ . '\Callback', "_{$callback['function']}") == false) {
                continue;
            }

            call_user_func_array(array(__NAMESPACE__ . '\Callback', "_{$callback['function']}"), array($callback));
        }

        unset($template[KEY_MOCK_FUNCTION]);
    }

    static private function _sleep($values) {
        if (isset($values['ms']) == false) {
            return false;
        }
        
        return Misc::sleep(Basic::handle($values['ms']));
    }

    static private function _redirect($values) {
        if (isset($values['url']) == false) {
            return false;
        }

        $url = Basic::handle($values['url']);
        if (isset($values['ms'])) {
            $ms = Basic::handle($values['ms']);
            return Http::redirect($url, $ms);
        }

        return Http::redirect($url);
    }

    static private function _callback($values) {
        if (isset($values['url']) == false) {
            return false;
        }

        $url = Basic::handle($values['url']);
        if (isset($values['ms'])) {
            $ms = Basic::handle($values['ms']);
            return Http::callback($url, $ms);
        }

        return Http::callback($url);
    }
}
