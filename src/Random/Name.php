<?php
namespace Mock\Random;

use Mock\Dictionary\Name as Dictionary;

class Name {
    /**
     * 随机生成一个常见的英文名。
     * @return [type] [description]
     */
    static public function first() {
        return Helper::pick(Dictionary::$firstNames);
    }

    /**
     * 随机生成一个常见的英文姓。
     * @return [type] [description]
     */
    static public function last() {
        return Helper::pick(Dictionary::$lastNames);
    }
    
    /**
     * 随机生成一个常见的英文姓名。
     */
    static public function name($middle = '') {
        return self::first() . ' ' . ($middle ? self::first() . ' ' : '') . self::last();
    }

    /**
     * 随机生成一个常见的中文姓。
     */
    static public function cfirst() {
        return Helper::pick(Dictionary::$firstCNames);
    }

    /**
     * 随机生成一个常见的中文名。
     */
    static public function clast() {
        return Helper::pick(Dictionary::$lastCNames);
    }
    
    /**
     * 随机生成一个常见的中文姓名。
     */
    static public function cname() {
        return self::cfirst() . self::clast();
    }
}