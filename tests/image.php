<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Random\Image::image(''));
var_dump(\Mock\Random\Image::image(''));
var_dump(\Mock\Random\Image::image('', '#fafafa'));
var_dump(\Mock\Random\Image::image('', '#dfdfdf', 'Foobar'));
var_dump(\Mock\Random\Image::image('', '', '#adadad', 'Foobar'));
var_dump(\Mock\Random\Image::image('', '#dfdfdf', '', 'png', 'Help!!'));
