<?php
declare(strict_types=1);

namespace App\Book\Models;

class Transaction
{
    /**
     * @var Roster
     */
    protected Roster $rosterModel;

    public string $transactionDate;

    /**
     * @param Roster $rosterModel
     */
    public function __construct(Roster $rosterModel)
    {
        $this->rosterModel = $rosterModel;
        $this->transactionDate = date('m/y');
    }

    /**
     * @param array $data
     * @param string $tradePartner
     */
    public function generateTradeLog(array $data, string $tradePartner)
    {
        $tradedPlayers = [];

        foreach ($data as $playerInfo) {

            [$tmp, $playerId] = explode('_', $playerInfo);
            $playerInfo = $this->rosterModel->getById($playerId);
            $comment = "Trade {$tradePartner} {$this->transactionDate}";

            if ($playerInfo['ibl_team'] !== $tradePartner) {
                $tradedPlayers[] = trim($playerInfo['display_name']);
                $this->rosterModel->updatePlayerTeam($tradePartner, $playerId, $comment);
                $this->rosterModel->makeInactive($playerId);
            }
        }

        return 'Trades '.implode(', ', $tradedPlayers).' to '.$tradePartner;
    }

}