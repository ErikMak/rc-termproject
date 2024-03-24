<?php

if(!function_exists('camel_case')) {
    function camel_case($string, $dontStrip = []) {
        return lcfirst(str_replace(' ', '', ucwords(preg_replace('/[^a-z0-9'.implode('',$dontStrip).']+/', ' ',$string))));
    }
}
