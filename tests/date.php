<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Random\Date::date());
var_dump(\Mock\Random\Date::date('Y-m-d'));
var_dump(\Mock\Random\Date::date('Y-m-d H:i:s'));
var_dump(\Mock\Random\Date::time());
var_dump(\Mock\Random\Date::time('A H:i:s'));
var_dump(\Mock\Random\Date::time('a H:i:s'));
var_dump(\Mock\Random\Date::now('year'));
var_dump(\Mock\Random\Date::now('month'));
var_dump(\Mock\Random\Date::now('week'));
var_dump(\Mock\Random\Date::now('day'));
var_dump(\Mock\Random\Date::now('day', 'Y/m/d'));
var_dump(\Mock\Random\Date::now('hour'));
var_dump(\Mock\Random\Date::now('minute'));
var_dump(\Mock\Random\Date::now('second'));
var_dump(\Mock\Random\Date::now());
var_dump(\Mock\Random\Date::past());
var_dump(\Mock\Random\Date::future());
