<?php
namespace Mock\Handler;

class Object {
    static public function handle($template, $count = null) {
        if ($count == null) {
            return self::_handle($template);
        }

        $count = Basic::handle($count);

        $values = array();

        for ($i = 0; $i < $count; $i++) {
            $values[] = self::_handle($template);
        }

        return $values;
    }

    static private function _handle($template) {
        $values = array();
        foreach ($template as $key => $value) {
            if (strpos($key, '|')) {
                list($key, $count) = explode('|', $key);
                $values[$key] = Basic::handle($value, $count);
            } else {
                $values[$key] = Basic::handle($value);
            }
        }

        return $values;
    }
}

