<?php
namespace Mock\Handler;

define('KEY_MOCK_DEFINE', '_DEFINE_');

class Define {
    static public function handle(&$template) {
        if (isset($template[KEY_MOCK_DEFINE]) == false || is_array($template[KEY_MOCK_DEFINE]) == false) {
            return;
        }

        foreach ($template[KEY_MOCK_DEFINE] as $key => $value) {
            \Mock\Random\Define::set($key, Basic::handle($value));
        }

        unset($template[KEY_MOCK_DEFINE]);
    }
}
