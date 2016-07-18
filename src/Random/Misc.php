<?php
namespace Mock\Random;

class Misc {
    static private $_ids = array('default' => 0);

    // Dice
    static public function d4() {
        return Basic::natural(1, 4);
    }

    static public function d6() {
        return Basic::natural(1, 6);
    }

    static public function d8() {
        return Basic::natural(1, 8);
    }

    static public function d12() {
        return Basic::natural(1, 12);
    }

    static public function d20() {
        return Basic::natural(1, 20);
    }

    static public function d100() {
        return Basic::natural(1, 100);
    }

    /**
     * 随机生成一个 GUID。
     * @return [type] [description]
     */
    static public function guid() {
        $pool = "abcdefABCDEF1234567890";
        return Basic::string($pool, 8) . '-' .
            Basic::string($pool, 4) . '-' .
            Basic::string($pool, 4) . '-' .
            Basic::string($pool, 4) . '-' .
            Basic::string($pool, 12);
    }

    static public function uuid() {
        return self::guid();
    }

    /**
     * 随机生成一个 18 位身份证。
     * @link http://baike.baidu.com/view/1697.htm#4 [<description>]
     * @link http://zhidao.baidu.com/question/1954561.html [<description>]
     * @return [type] [description]
     */
    static public function id() {
        $addressId = Helper::pick(array_keys(\Mock\Dictionary\Address::getDictionay()));

        $sum = 0;
        $rank = array("7", "9", "10", "5", "8", "4", "2", "1", "6", "3", "7", "9", "10", "5", "8", "4", "2");
        $last = array("1", "0", "X", "9", "8", "7", "6", "5", "4", "3", "2");

        $id = $addressId . Date::date('Ymd') . Basic::string('number', 3);

        for ($i = 0; $i < strlen($id); $i++) { 
            $sum += $id[$i] * $rank[$i];
        }

        $id .= $last[$sum % 11];

        return $id;
    }

    /**
     * 生成一个全局的自增整数。
     * @return [type] [description]
     */
    static public function increment($key = 1, $step = 1) {
        if (func_num_args() == 1 && is_int($key)) {
            $step = intval($key);
            $key = 'default';
        } else {
            $step = intval($step);
        }

        if (isset(self::$_ids[$key]) == false) {
            self::$_ids[$key] = 0;
        }
        
        self::$_ids[$key] += $step;
        return self::$_ids[$key];
    }

    static public function inc($key = 1, $step = 1) {
        return call_user_func_array(array(__NAMESPACE__ . '\Misc', 'increment'), func_get_args());
    }
}