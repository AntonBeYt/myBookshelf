<?php

declare(strict_types=1);
function reverseStringWords(string $input): string
{
    $input = str_replace(",", "", $input);
    $input = explode(" ", $input);
    $input = array_reverse($input);
    $input = implode(" ", $input);
    return $input;
}
