<?php

$root = $_SERVER['DOCUMENT_ROOT'];
function cat_link($get, $root)
{
    if (isset($get))
    {
        $path_arr = explode('/', $get);
        if (count($path_arr) === 1)
        {
            return $root . '/' . $path_arr[0] . '.php';
        } elseif (count($path_arr) === 2)
        {
            return $root . '/index.php';
        }
    }
}

if (file_exists(cat_link(key($_GET), $root)))
{
    require cat_link(key($_GET), $root);
} else
{
    var_dump(cat_link(key($_GET), $root));
}

die();