<?php

function curry(\Closure $f, $params = []) {
    return function() use($f, $params) {
        $refl = new ReflectionFunction($f);
        $arity = $refl->getNumberOfParameters();
        $args = array_merge($params, func_get_args());

        return (count($args) >= $arity) ? call_user_func_array($f, $args) : curry($f, $args);
    };
};

// ==================================================

$abc = function($a, $b, $c) {
    return [$a, $b ,$c];
};

$cur = curry($abc);

 // works only at php v7 or hhvm 3.10+
 // $res = $cur(1)(2)(3);
 // var_dump($res);

$res1 = $cur (1);
$res2 = $res1(2);
$res3 = $res2(3);

var_dump($res3);
