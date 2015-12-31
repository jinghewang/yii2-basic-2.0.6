<?php

/**
 * Global Function
 * @param $expression
 * @param null $expression2
 */


/**
 * var_dump and die
 * @param $expression
 * @param null $expression2
 */
function var_dump_die ($expression, $expression2 = null) {
    echo '<pre>';
    if (empty($expression2))
        var_dump($expression);
    else
        var_dump($expression,$expression2);
    echo '</pre>';
    die;
}