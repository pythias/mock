<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Random\Address::province());
var_dump(\Mock\Random\Address::city());
var_dump(\Mock\Random\Address::city(false));
var_dump(\Mock\Random\Address::country());
var_dump(\Mock\Random\Address::country(false));
var_dump(\Mock\Random\Address::zip());