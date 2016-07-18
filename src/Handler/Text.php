<?php
namespace Mock\Handler;

define('RE_PLACEHOLDER', '/@[a-zA-Z0-9]+?\([^@]*\)/');

class Text {
    static public function handle($template) {
        $placeholders = array();
        preg_match_all(RE_PLACEHOLDER, $template, $placeholders);

        if (count($placeholders[0]) == 1 && $placeholders[0][0] == $template) {
            return Placeholder::handle($template);
        }

        $search = array();
        $replace = array();
        foreach ($placeholders[0] as $placeholder) {
            $search[] = $placeholder;
            $replace[] = Placeholder::handle($placeholder);
        }

        return str_replace($search, $replace, $template);
    }
}
