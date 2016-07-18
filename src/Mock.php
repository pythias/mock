<?php
namespace Mock;

class Mock {
    static public function mock($template = "") {
        if (is_string($template)) {
            $json = json_decode($template, true);
            if ($json) {
                $template = $json;
            }
        }

        //处理定义
        Handler\Define::handle($template);

        //处理回调
        Handler\Callback::handle($template);

        //处理返回
        return Handler\Basic::handle($template);
    }
}