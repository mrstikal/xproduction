<?php

namespace app\common\formatters;

class JsonEncode
{
    public static function formatJson($data)
    {
        $flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT;

        return json_encode($data, $flags);
    }
}