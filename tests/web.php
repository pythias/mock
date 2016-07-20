<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Random\Web::email('staff.weibo.com'));
var_dump(\Mock\Random\Web::email());
var_dump(\Mock\Random\Web::domain('weibo'));
var_dump(\Mock\Random\Web::domain());
var_dump(\Mock\Random\Web::ip());
