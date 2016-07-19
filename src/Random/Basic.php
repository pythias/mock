<?php
namespace Mock\Random;

class Basic {
    static public function boolean($seed = 2.0, $value = null) {
        if ($value === null) {
            $value = true;
        }

        if ($seed <= 1) {
            return $value;
        }

        return self::natural(0, $seed) == 1 ? (bool)($value) : !$value;
    }

    static public function bool($seed = 2.0, $value = null) {
        return self::boolean($seed, $value);
    }

    static public function natural($min = 0, $max = PHP_INT_MAX) {
        if ($min < 0) {
            $min = 0;
        }

        return self::integer($min, $max);
    }

    static public function integer($min = PHP_INT_MIN, $max = PHP_INT_MAX) {
        return rand($min, $max);
    }

    static public function int($min = PHP_INT_MIN, $max = PHP_INT_MAX) {
        return self::integer($min, $max);
    }

    static public function float($min = PHP_INT_MIN, $max = PHP_INT_MAX, $dmin = 0, $dmax = 0) {
        $dmin = min(intval($dmin), 17);
        $dmax = min(intval($dmax), 17);
        $ret = self::integer($min, $max) . ".";
        $count = self::natural($dmin, $dmax);
        for ($i = 0; $i < $count; $i++) {
            $ret .= ($i < ($count - 1)) ? rand(0, 9) : rand(1, 9);
        }

        return floatval($ret);
    }

    static public function character($pool = '') {
        $pool = \Mock\Dictionary\Text::getPool($pool);

        return Helper::pick($pool);
    }

    static public function char($pool = '') {
        return self::character($pool);
    }

    static public function string($pool = '', $min = 3, $max = 7) {
        $argsNum = func_num_args();
        switch ($argsNum) {
            case 0: // ()
                $len = self::natural(3, 7);
                break;

            case 1: // (length)
                $len = intval($pool);
                $pool = '';
                break;

            case 2:
                if (is_string($pool)) { // (pool, length)
                    $len = $min;
                } else { // (min, max)
                    $len = self::natural($pool, $min); 
                    $pool = '';
                }
                break;

            case 3:
                $len = self::natural($min, $max);
                break;
            
            default:
                $len = self::natural($min, $max);
                break;
        }

        $text = '';
        for ($i = 0; $i < $len; $i++) { 
            $text .= self::character($pool);
        }

        return $text;
    }

    static public function str($pool = '', $min = 3, $max = 7) {
        return call_user_func_array(array(__NAMESPACE__ . '\Basic', 'string'), func_get_args());
    }

    /**
     * Random.range(stop)
     * Random.range(start, stop)
     * Random.range(start, stop, step)
     * @param  [type] $start [description]
     * @param  [type] $stop  [description]
     * @param  [type] $step  [description]
     * @return [type]        [description]
     */
    static public function range($start = 1, $stop = 1, $step = 1) {
        $argsNum = func_num_args();
        $args = func_get_args();

        if ($argsNum <= 1) {
            $stop = isset($args[0]) ? $args[0] : 0;
            $start = 0;
        }

        $step = isset($args[2]) ? $args[2] : 1;

        $start = intval($start);
        $stop = intval($stop);
        $step = intval($step);

        $range = array();
        while (1) {
            $range[] = $start;
            $start += $step;
            if ($start >= $stop) {
                break;
            }
        }

        return $range;
    }

    /**
     * 生成符合正则表达式的字符串
     * @param  [type] $exp [description]
     * @return [type]      [description]
     */
    static public function reg($pattern) {
        return '';
    }
}