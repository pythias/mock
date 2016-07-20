<?php
namespace Mock\Random;

use Mock\Dictionary\Web as Dictionary;

class Web {
    static public function domain($tld = '') {
        $tld = $tld ? $tld : Dictionary::getTLD();
        return Text::word() . '.' . $tld;
    }

    static public function email($domain = '') {
        $domain = $domain ? $domain : self::domain();
        return Text::word() . '@' . $domain;
    }

    static public function ip() {
        return Basic::int(0, 255) . '.' . Basic::int(0, 255) . '.' . Basic::int(0, 255) . '.' . Basic::int(0, 255);
    }
}