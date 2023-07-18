<?php

namespace App\Service\Post;

use Exception;

final class commonVars
{
    static private ?commonVars $instance = null;
    static $path = [];

    static public function getInstance(): commonVars
    {
        if (self::$instance === null) {
            self::$instance = new self();
            self::$instance::$path['jph'] = 'https://jsonplaceholder.typicode.com/';
        }

        return self::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new Exception("Cannot unserialize commonVars");
    }
}
