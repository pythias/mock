<?php
namespace Mock\Random;

class Helper {
    static public function json($pool) {
        $object = json_decode($pool, true);
        return empty($object) ? $pool : $object;
    }

    static public function urlencode($string) {
        return urlencode($string);
    }

    static public function pick($pool, $min = null, $max = null, $glue = null) {
        if ($min == null) {
            return self::_simplePick($pool);            
        }

        $len = Basic::natural($min, $max);
        return self::_arrayPick($pool, $len, $glue);
    }

    static private function _simplePick($pool) {
        if (is_array($pool)) {
            return $pool[array_rand($pool)];
        }

        if (is_string($pool)) {
            $tmp = explode('|', $pool);
            if (count($tmp) > 1) {
                return $tmp[array_rand($tmp)];
            }

            return mb_substr($pool, Basic::natural(0, mb_strlen($pool) - 1), 1);
        }

        return Basic::natural(0, $pool);
    }

    static private function _arrayPick($pool, $len, $glue) {
        $pool = self::json($pool);
        if (is_string($pool)) {
            $tmp = explode('|', $pool);
            if (count($tmp) > 1) {
                $pool = $tmp;
            }
        }
        
        $size = is_array($pool) ? count($pool) : mb_strlen($pool);
        $indexes = array();
        while (1) {
            $index = Basic::natural(0, $size - 1);
            $indexes[$index] = $index;

            if (count($indexes) == $len) {
                break;
            }
        }

        $values = array();
        foreach ($indexes as $index) {
            $values[] = is_array($pool) ? $pool[$index] : mb_substr($pool, $index, 1);
        }

        if ($glue == null) {
            return $values;
        }

        return implode($glue, $values);
    }
}