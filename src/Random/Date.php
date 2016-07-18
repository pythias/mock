<?php
namespace Mock\Random;

class Date {
    static private function _randomTime($min = false, $max = false) { // min, max
        if ($min == false) {
            $min = 0;
        }

        if ($max == false) {
            $max = time();
        }

        return Basic::natural($min, $max);
    }

    /**
     * 返回一个随机的日期字符串。
     * @param  [type] $format [description]
     * @return [type]         [description]
     */
    static public function date($format = false, $min = false, $max = false) {
        if ($format == false) {
            $format = 'Y-m-d';
        }

        $min = ($min != false ? strtotime($min) : 0);
        $max = ($max != false ? strtotime($max) : time());

        return date($format, self::_randomTime($min, $max));
    }

    /**
     * 返回一个随机的时间字符串。
     * @param  [type] $format [description]
     * @return [type]         [description]
     */
    static public function time($format = false) {
        if ($format == false) {
            $format = 'H:i:s';
        }

        return date($format, self::_randomTime());
    }

    /**
     * 返回一个随机的日期和时间字符串。
     * @param  [type] $format [description]
     * @return [type]         [description]
     */
    static public function datetime($format = false, $min = false, $max = false) {
        if ($format == false) {
            $format = 'Y-m-d H:i:s';
        }

        $min = ($min != false ? strtotime($min) : 0);
        $max = ($max != false ? strtotime($max) : time());

        return date($format, self::_randomTime($min, $max));
    }

    /**
     * 返回一个过去的日期和时间字符串。
     * @param  [type] $format [description]
     * @return [type]         [description]
     */
    static public function past($format = false) {
        return self::datetime($format);
    }

    /**
     * 返回一个未来的日期和时间字符串。
     * @param  [type] $format [description]
     * @return [type]         [description]
     */
    static public function future($format = false) {
        if ($format == false) {
            $format = 'Y-m-d H:i:s';
        }

        return date($format, self::_randomTime(time(), strtotime('+10 years')));
    }

    /**
     * 返回当前的日期和时间字符串。
     * @param  [type] $unit   [description]
     * @param  [type] $format [description]
     * @return [type]         [description]
     */
    static public function now($unit = false, $format = false) {
        if ($format == false) {
            $format = 'Y-m-d H:i:s';
        }

        if (func_num_args() == 1) {
            if (preg_match('/year|month|day|hour|minute|second|week/', $unit) == false) {
                $format = $unit;
                $unit = null;
            } else {
                $unit = strtolower($unit);
            }
        }

        $time = time();
        $unitFormat = 'Y-m-d H:i:s';

        switch ($unit) {
            case 'year':
                $unitFormat = 'Y-01-01 00:00:00';
                break;
                
            case 'month':
                $unitFormat = 'Y-m-01 00:00:00';
                break;
            
            case 'week':
                $unitFormat = 'Y-m-d 00:00:00';
                $time -= (date('N') - 1) * 86400;
                break;
            
            case 'day':
                $unitFormat = 'Y-m-d 00:00:00';
                break;
                
            case 'hour':
                $unitFormat = 'Y-m-d H:00:00';
                break;
                
            case 'minute':
                $unitFormat = 'Y-m-d H:i:00';
                break;
                
            case 'second':
                $unitFormat = 'Y-m-d H:i:s';
                break;
        }

        return date($format, strtotime(date($unitFormat, $time)));
    }
}