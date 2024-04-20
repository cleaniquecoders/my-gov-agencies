<?php

if (! function_exists('decode_json_file')) {
    function decode_json_file($path)
    {
        return json_decode(
            file_get_contents(
                $path
            ),
            JSON_OBJECT_AS_ARRAY);
    }
}
