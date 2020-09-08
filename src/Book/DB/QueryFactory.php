<?php
declare(strict_types=1);

namespace App\Book\DB;

use stdClass;

class QueryFactory {

    const QUERY_ADAPTER = 'mysql';

    public function __construct()
    {
        $db = new stdClass();
        $db->adapter = self::QUERY_ADAPTER;
        return $db;
    }
}
