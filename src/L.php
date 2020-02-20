<?php namespace LoreSjoberg\L;

use PDO;

/**
 *  A sample class
 *
 *  An idiosyncratic collection of utilities
 *
 * @author Lore Sjoberg
 */
class L
{

    public static function pdoError(PDO $pdo): string
    {
        $trace = debug_backtrace();
        $class = $trace[0]['class'];
        $line = $trace[0]['line'];
//
//        $class = __CLASS__;
//        $line = __LINE__;
        $error = $pdo->errorInfo()[2];
        return "Error in {$class}:{$line}: {$error}\n";
    }
}