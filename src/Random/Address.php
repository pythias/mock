<?php
namespace Mock\Random;

use Mock\Dictionary\Address as Dictionary;

class Address {
    /**
     * 随机生成一个大区。
     * @return [type] [description]
     */
    static public function region() {
        return Helper::pick(Dictionary::getRegion());
    }

    /**
     * 随机生成一个（中国）省（或直辖市、自治区、特别行政区）。
     */
    static public function province() {
        $province = Helper::pick(Dictionary::getProvince());
        return $province['name'];
    }

    /**
     * 随机生成一个（中国）市。
     * @param  boolean $prefix [description]
     * @return [type]          [description]
     */
    static public function city($prefix = true) {
        $province = Helper::pick(Dictionary::getProvince());
        $city = Helper::pick($province['children']);
        return $prefix ? "{$province['name']} {$city['name']}" : $city['name'];
    }
    
    /**
     * 随机生成一个（中国）县。
     */
    static public function country($prefix = true) {
        $province = Helper::pick(Dictionary::getProvince());
        $city = Helper::pick($province['children']);
        $country = empty($city['children']) ? array('name' => '-') : Helper::pick($city['children']);

        return $prefix ? "{$province['name']} {$city['name']} {$country['name']}" : $country['name'];
    }

    /**
     * 随机生成一个邮政编码（六位数字）。
     */
    static public function zip($len = 6) {
        $zip = '';
        for ($i = 0; $i < $len; $i++) { 
            $zip .= Basic::natural(0, 9);
        }

        return $zip;
    }
}