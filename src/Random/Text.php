<?php
namespace Mock\Random;

use Mock\Dictionary\Text as Dictionary;

class Text {
    static private function _range($defaultMin, $defaultMax, $min, $max) {
        if ($min === null) {
            return Basic::natural($defaultMin, $defaultMax);
        }

        if ($max === null) {
            return intval($min);
        }

        return Basic::natural($min, $max);
    }

    /**
     * 随机生成一段文本
     * @param  [type] $min [description]
     * @param  [type] $max [description]
     * @return [type]      [description]
     */
    static public function paragraph($min = null, $max = null) {
        $len = self::_range(3, 7, $min, $max);
        $result = array();
        for ($i = 0; $i < $len; $i++) { 
            $result[] = self::sentence();
        }
        return implode(' ', $result);
    }

    static public function cparagraph($min = null, $max = null) {
        $len = self::_range(3, 7, $min, $max);
        $result = array();
        for ($i = 0; $i < $len; $i++) { 
            $result[] = self::csentence();
        }
        return implode('', $result);
    }
    
    /**
     * 随机生成一个句子，第一个单词的首字母大写。
     * @param  [type] $min [description]
     * @param  [type] $max [description]
     * @return [type]      [description]
     */
    static public function sentence($min = null, $max = null) {
        $len = self::_range(12, 18, $min, $max);
        $result = array();
        for ($i = 0; $i < $len; $i++) { 
            $result[] = self::word();
        }

        return ucfirst(implode(' ', $result)) . '.';
    }
    
    /**
     * 随机生成一个中文句子。
     * @param  [type] $min [description]
     * @param  [type] $max [description]
     * @return [type]      [description]
     */
    static public function csentence($min = null, $max = null) {
        $len = self::_range(12, 18, $min, $max);
        $result = array();
        for ($i = 0; $i < $len; $i++) { 
            $result[] = self::cword();
        }

        return implode('', $result) . '。';
    }
    
    /**
     * 随机生成一个单词。
     * @param  [type] $min [description]
     * @param  [type] $max [description]
     * @return [type]      [description]
     */
    static public function word($min = null, $max = null) {
        $len = self::_range(3, 10, $min, $max);
        $result = '';
        for ($i = 0; $i < $len; $i++) { 
            $result .= Basic::character('lower');
        }

        return $result;
    }
    
    /**
     * 随机生成一个或多个汉字。
     * @param  [type] $pool [description]
     * @param  [type] $min  [description]
     * @param  [type] $max  [description]
     * @return [type]       [description]
     */
    static public function cword($pool = null, $min = null, $max = null) {
        $argsNum = func_num_args();
        $args = func_get_args();

        switch ($argsNum) {
            case 0: // ()
                $pool = Dictionary::getHanzi();
                $len = 1;
                break;
            case 1: // ( pool )
                if (is_string($args[0])) {
                    $len = 1;
                } else {
                    // ( length )
                    $len = $pool;
                    $pool = Dictionary::getHanzi();
                }
                break;
            case 2:
                // ( pool, length )
                if (is_string($args[0])) {
                    $len = $min;
                } else {
                    // ( min, max )
                    $len = Basic::natural($pool, $min);
                    $pool = Dictionary::getHanzi();
                }
                break;
            case 3:
                $len = Basic::natural($min, $max);
                break;
        }

        $poolLength = mb_strlen($pool);
        $result = '';
        for ($i = 0; $i < $len; $i++) { 
            $result .= mb_substr($pool, Basic::natural(0, $poolLength - 1), 1);
        }

        return $result;
    }

    /**
     * 随机生成一句标题，其中每个单词的首字母大写。
     * @param  [type] $min [description]
     * @param  [type] $max [description]
     * @return [type]      [description]
     */
    static public function title($min = null, $max = null) {
        $len = self::_range(3, 7, $min, $max);
        $result = array();
        for ($i = 0; $i < $len; $i++) { 
            $result[] = ucfirst(self::word());
        }

        return implode(' ', $result);
    }

    /**
     * 随机生成一句中文标题。
     * @param  [type] $min [description]
     * @param  [type] $max [description]
     * @return [type]      [description]
     */
    static public function ctitle($min = null, $max = null) {
        $len = self::_range(3, 7, $min, $max);
        $result = '';
        for ($i = 0; $i < $len; $i++) { 
            $result .= self::cword();
        }

        return $result;
    }
}
