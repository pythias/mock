<?php
namespace Mock\Handler;

class Placeholder {
    static private $_handlers = array();

    static private function _initHandlers() {
        if (empty(self::$_handlers) == false) {
            return;
        }

        self::$_handlers = array();
        $classes = array(
            'Mock\Random\Address',
            'Mock\Random\Basic',
            'Mock\Random\Date',
            'Mock\Random\Define',
            'Mock\Random\Helper',
            'Mock\Random\Http',
            'Mock\Random\Image',
            'Mock\Random\Misc',
            'Mock\Random\Name',
            'Mock\Random\Text',
        );

        foreach ($classes as $class) {
            $methods = get_class_methods($class);
            self::$_handlers = array_merge(self::$_handlers, array_fill_keys($methods, $class));
        }
    }

    /**
     * 处理占位符
     *
     * @todo 处理特殊字符
     * @param  [type] $template [description]
     * @return [type]           [description]
     */
    static public function handle($template) {
        self::_initHandlers();

        $pos = strpos($template, '(');
        $function = substr($template, 1, $pos - 1);
        $params = trim(substr($template, $pos + 1, -1));
        $formated = array();

        if (empty($params) == false) {
            $formated = array();
            $params = explode(',', $params);
            foreach ($params as $value) {
                $value = trim($value);
                if ($value[0] == "'" && $value[strlen($value) - 1] == "'") {
                    $formated[] = substr($value, 1, strlen($value) - 2);
                } else if ($value[0] == '"' && $value[strlen($value) - 1] == '"') {
                    $formated[] = substr($value, 1, strlen($value) - 2);
                } else {
                    $formated[] = $value;
                }
            }
        }

        return call_user_func_array(array(self::$_handlers[$function], $function), $formated);
    }
}
