<?php namespace LoreSjoberg\L;

use Cocur\Slugify\Slugify;
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
        $error = $pdo->errorInfo()[2];
        return "Error in {$class}:{$line}: {$error}\n";
    }

    public function slugify($text) {
        $slugify = new Slugify();
        return $slugify->slugify($text);
    }

    public function findRowBySlug($array, $slug) {
        return array_search($slug, array_column($array, 'slug'));
    }
}