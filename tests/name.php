<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Random\Name::first());
var_dump(\Mock\Random\Name::last());
var_dump(\Mock\Random\Name::name());
var_dump(\Mock\Random\Name::cfirst());
var_dump(\Mock\Random\Name::clast());
var_dump(\Mock\Random\Name::cname());
