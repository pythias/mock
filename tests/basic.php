<?php
require_once __DIR__ . '/boostrap.php';

var_dump(\Mock\Random\Basic::bool(10, false));
var_dump(\Mock\Random\Basic::natural());
var_dump(\Mock\Random\Basic::int());
var_dump(\Mock\Random\Basic::float());
var_dump(\Mock\Random\Basic::character());
var_dump(\Mock\Random\Basic::character('number'));
var_dump(\Mock\Random\Basic::character('upper'));
var_dump(\Mock\Random\Basic::character('symbol'));
var_dump(\Mock\Random\Basic::character('lower'));
var_dump(\Mock\Random\Basic::character('alpha'));
var_dump(\Mock\Random\Basic::string());
var_dump(\Mock\Random\Basic::string(1));
var_dump(\Mock\Random\Basic::string(1, 7));
var_dump(\Mock\Random\Basic::string('upper', 1, 7));
var_dump(\Mock\Random\Basic::str());
var_dump(\Mock\Random\Basic::str(1));
var_dump(\Mock\Random\Basic::str(1, 7));
var_dump(\Mock\Random\Basic::str('upper', 1, 7));
var_dump(\Mock\Random\Basic::range(10));
var_dump(\Mock\Random\Basic::range(3, 7));
var_dump(\Mock\Random\Basic::range(1, 10, 2));
var_dump(\Mock\Random\Basic::range(1, 10, 3));

var_dump(\Mock\Random\Basic::reg('/[a-z][A-Z][0-9]/'));
var_dump(\Mock\Random\Basic::reg('/\w\W\s\S\d\D/'));
var_dump(\Mock\Random\Basic::reg('/\d{5,10}/'));