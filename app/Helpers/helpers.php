<?php

use Spatie\Html\Html;
use Spatie\Html\Elements\Label;

if (! function_exists('styled_label')) {
    function styled_label($text, $for): Label
    {
        return Html::label($text, $for)
            ->class('block mb-2 text-lg font-medium text-gray-900 dark:text-white');
    }
}
