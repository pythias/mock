<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Mock::mock("@province()"));
var_dump(\Mock\Mock::mock("@city()"));
var_dump(\Mock\Mock::mock("@country()"));
var_dump(\Mock\Mock::mock("@zip()"));

var_dump(\Mock\Mock::mock('{"rows|2":{"v":"@int(1,100)"}}'));
var_dump(\Mock\Mock::mock('{"rows|@int(1,10)":{"v":"@int(1,100)"}}'));
var_dump(\Mock\Mock::mock('{"rows|@define(\'count\')":{"v":"@int(1,100)"},"_DEFINE_":{"count":"@int(1, 5)"}}'));

var_dump(\Mock\Mock::mock("@bool(10, false)"));
var_dump(\Mock\Mock::mock("@natural()"));
var_dump(\Mock\Mock::mock("@int()"));
var_dump(\Mock\Mock::mock("@float()"));
var_dump(\Mock\Mock::mock("@character()"));
var_dump(\Mock\Mock::mock("@character('number')"));
var_dump(\Mock\Mock::mock("@character('upper')"));
var_dump(\Mock\Mock::mock("@character('symbol')"));
var_dump(\Mock\Mock::mock("@character('lower')"));
var_dump(\Mock\Mock::mock("@character('alpha')"));
var_dump(\Mock\Mock::mock("@string()"));
var_dump(\Mock\Mock::mock("@string(1)"));
var_dump(\Mock\Mock::mock("@string(1, 7)"));
var_dump(\Mock\Mock::mock("@string('upper', 1, 7)"));
var_dump(\Mock\Mock::mock("@str()"));
var_dump(\Mock\Mock::mock("@str(1)"));
var_dump(\Mock\Mock::mock("@str(1, 7)"));
var_dump(\Mock\Mock::mock("@str('upper', 1, 7)"));
var_dump(\Mock\Mock::mock("@range(10)"));
var_dump(\Mock\Mock::mock("@range(3, 7)"));
var_dump(\Mock\Mock::mock("@range(1, 10, 2)"));
var_dump(\Mock\Mock::mock("@range(1, 10, 3)"));

var_dump(\Mock\Mock::mock("@date()"));
var_dump(\Mock\Mock::mock("@date('Y-m-d')"));
var_dump(\Mock\Mock::mock("@date('Y-m-d H:i:s')"));
var_dump(\Mock\Mock::mock("@time()"));
var_dump(\Mock\Mock::mock("@time('A H:i:s')"));
var_dump(\Mock\Mock::mock("@time('a H:i:s')"));
var_dump(\Mock\Mock::mock("@now('year')"));
var_dump(\Mock\Mock::mock("@now('month')"));
var_dump(\Mock\Mock::mock("@now('week')"));
var_dump(\Mock\Mock::mock("@now('day')"));
var_dump(\Mock\Mock::mock("@now('day', 'Y/m/d')"));
var_dump(\Mock\Mock::mock("@now('hour')"));
var_dump(\Mock\Mock::mock("@now('minute')"));
var_dump(\Mock\Mock::mock("@now('second')"));
var_dump(\Mock\Mock::mock("@now()"));
var_dump(\Mock\Mock::mock("@past()"));
var_dump(\Mock\Mock::mock("@future()"));

var_dump(\Mock\Mock::mock('{"rows|@define(\'count\')":{"v":"@int(1,100)"},"_DEFINE_":{"count":"@int(1, 5)"}}'));

var_dump(\Mock\Mock::mock('@urlencode(\'AAA\')'));
var_dump(\Mock\Mock::mock('@urlencode("AAA\'")'));
var_dump(\Mock\Mock::mock('@pick("T10|T11|T12|T21|T22|T31", 1, 5, ".")'));
var_dump(\Mock\Mock::mock('@pick("ABCDE")'));
var_dump(\Mock\Mock::mock('@pick("AB|BC|DE")'));

var_dump(\Mock\Mock::mock('@request("id")'));

var_dump(\Mock\Mock::mock("@image('')"));
var_dump(\Mock\Mock::mock("@image('')"));
var_dump(\Mock\Mock::mock("@image('', '#fafafa')"));
var_dump(\Mock\Mock::mock("@image('', '#dfdfdf', 'Foobar')"));
var_dump(\Mock\Mock::mock("@image('', '', '#adadad', 'Foobar')"));
var_dump(\Mock\Mock::mock("@image('', '#dfdfdf', '', 'png', 'Help!!')"));

var_dump(\Mock\Mock::mock("@guid()"));
var_dump(\Mock\Mock::mock("@uuid()"));
var_dump(\Mock\Mock::mock("@id()"));
var_dump(\Mock\Mock::mock("@inc(1)"));
var_dump(\Mock\Mock::mock("@inc(10)"));

var_dump(\Mock\Mock::mock("@first()"));
var_dump(\Mock\Mock::mock("@last()"));
var_dump(\Mock\Mock::mock("@name()"));
var_dump(\Mock\Mock::mock("@cfirst()"));
var_dump(\Mock\Mock::mock("@clast()"));
var_dump(\Mock\Mock::mock("@cname()"));

var_dump(\Mock\Mock::mock("@paragraph()"));
var_dump(\Mock\Mock::mock("@paragraph(3)"));
var_dump(\Mock\Mock::mock("@paragraph(1, 3)"));
var_dump(\Mock\Mock::mock("@cparagraph()"));
var_dump(\Mock\Mock::mock("@cparagraph(2)"));
var_dump(\Mock\Mock::mock("@cparagraph(1, 3)"));
var_dump(\Mock\Mock::mock("@sentence()"));
var_dump(\Mock\Mock::mock("@sentence(5)"));
var_dump(\Mock\Mock::mock("@sentence(3, 5)"));
var_dump(\Mock\Mock::mock("@csentence()"));
var_dump(\Mock\Mock::mock("@csentence(5)"));
var_dump(\Mock\Mock::mock("@csentence(3, 5)"));
var_dump(\Mock\Mock::mock("@word()"));
var_dump(\Mock\Mock::mock("@word(5)"));
var_dump(\Mock\Mock::mock("@word(3, 5)"));
var_dump(\Mock\Mock::mock("@cword()"));
var_dump(\Mock\Mock::mock("@cword(5)"));
var_dump(\Mock\Mock::mock("@cword(3, 5)"));
var_dump(\Mock\Mock::mock("@title()"));
var_dump(\Mock\Mock::mock("@title(5)"));
var_dump(\Mock\Mock::mock("@title(3, 5)"));
var_dump(\Mock\Mock::mock("@ctitle()"));
var_dump(\Mock\Mock::mock("@ctitle(5)"));
var_dump(\Mock\Mock::mock("@ctitle(3, 5)"));
