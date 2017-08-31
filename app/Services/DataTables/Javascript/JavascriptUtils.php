<?php 

namespace App\Services\DataTables\Javascript;

trait JavascriptUtils {
    protected function renderJavascript($string)
    {
        return str_replace("\n", '\n', str_replace('"', '\"', addcslashes(str_replace("\r", '', (string)$string), "\0..\37'\\")));
    }
}