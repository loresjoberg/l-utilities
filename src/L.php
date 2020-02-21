<?php namespace LoreSjoberg\L;

use Cocur\Slugify\Slugify;
use PDO;
use PDOStatement;

/**
 *  A sample class
 *
 *  An idiosyncratic collection of utilities
 *
 * @author Lore Sjoberg
 */
class L
{

    /**
     * @param PDO|PDOStatement $pdo
     * @return string
     */
    public static function pdoError($pdo): string
    {
        $trace = debug_backtrace();
        $class = $trace[0]['class'];
        $line = $trace[0]['line'];
        $error = $pdo->errorInfo()[2];
        return "Error in {$class}:{$line}: {$error}\n";
    }

    public static function slugify($text) {
        $slugify = new Slugify();
        return $slugify->slugify($text);
    }

    public static function findRowBySlug($array, $slug) {
        $index = array_search($slug, array_column($array, 'slug'));
        if ($index === false){
            return false;
        }
        return $array[$index];
    }
}