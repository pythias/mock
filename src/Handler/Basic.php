<?php
namespace Mock\Handler;

class Basic {
    static public function handle($template, $count = null) {
        if (is_array($template)) {
            return BaseObject::handle($template, $count); // 只有array支持count类型
        } else if (is_numeric($template)) {
            return Number::handle($template, $count);
        } else if (is_string($template)) {
            return Text::handle($template, $count);
        }

        return array();
    }
}
