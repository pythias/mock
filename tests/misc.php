<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Random\Misc::guid());
var_dump(\Mock\Random\Misc::uuid());
var_dump(\Mock\Random\Misc::id());
var_dump(\Mock\Random\Misc::inc(1));
var_dump(\Mock\Random\Misc::inc(10));