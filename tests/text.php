<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Random\Text::paragraph());
var_dump(\Mock\Random\Text::paragraph(3));
var_dump(\Mock\Random\Text::paragraph(1, 3));
var_dump(\Mock\Random\Text::cparagraph());
var_dump(\Mock\Random\Text::cparagraph(2));
var_dump(\Mock\Random\Text::cparagraph(1, 3));
var_dump(\Mock\Random\Text::sentence());
var_dump(\Mock\Random\Text::sentence(5));
var_dump(\Mock\Random\Text::sentence(3, 5));
var_dump(\Mock\Random\Text::csentence());
var_dump(\Mock\Random\Text::csentence(5));
var_dump(\Mock\Random\Text::csentence(3, 5));
var_dump(\Mock\Random\Text::word());
var_dump(\Mock\Random\Text::word(5));
var_dump(\Mock\Random\Text::word(3, 5));
var_dump(\Mock\Random\Text::cword());
var_dump(\Mock\Random\Text::cword(5));
var_dump(\Mock\Random\Text::cword(3, 5));
var_dump(\Mock\Random\Text::title());
var_dump(\Mock\Random\Text::title(5));
var_dump(\Mock\Random\Text::title(3, 5));
var_dump(\Mock\Random\Text::ctitle());
var_dump(\Mock\Random\Text::ctitle(5));
var_dump(\Mock\Random\Text::ctitle(3, 5));
