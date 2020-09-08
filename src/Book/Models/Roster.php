<?php
declare(strict_types=1);

namespace App\Book\Models;


use App\Book\DB\QueryFactory;
use stdClass;

class Roster {

    public object $_db;
    public $pdo;
    public $previous_session;
    public $current_session;

    public function __construct(object $db)
    {
        $this->_db = $db;
        $this->pdo = new QueryFactory();
    }

    /**
     * @param int $id
     */
    public function getById($id)
    {

    }

    /**
     * @param string $tradePartner
     * @param $playerId
     * @param string $comment
     */
    public function updatePlayerTeam(string $tradePartner, $playerId, string $comment)
    {

    }

    /**
     * @param int $id
     */
    public function makeInactive($id)
    {

    }
}