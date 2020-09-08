<?php
declare(strict_types=1);

namespace Tests\Unit\Book\Models;

use App\Book\Models\Roster;
use App\Book\Models\Transaction;
use Prophecy\PhpUnit\ProphecyTrait;

require __DIR__ . '/../../../../src/Book/Models/Roster.php';
require __DIR__ . '/../../../../src/Book/Models/Transaction.php';

class TransactionsTest extends \PHPUnit\Framework\TestCase
{

    use ProphecyTrait;

    /**
     * @test
     * @covers
     */
    public function it_generates_proper_transaction_infor_for_a_trade_test(): void
    {
        /**
         * Given I have an array that contains players
         * When I submit a list of players
         * And I submit a transaction description
         * Then I should get a one-line transaction being generated */

        $expected = 'Trades Moe, Larry, Curly to TESTMORE';
        $tradePartner = 'TESTMORE';
        $tradeComment = 'Trade TESTMORE 01/01';
        $data = ['team1_1', 'team1_2', 'team1_3'];
        $playerIds = [1, 2, 3];

        $rm = $this->prophesize(Roster::class);

        $rm->getById(1)->willReturn(
            ['ibl_team' => 'TEST', 'display_name' => 'Moe']
        );

        $rm->getById(2)->willReturn(
            ['ibl_team' => 'TEST', 'display_name' => 'Larry']
        );

        $rm->getById(3)->willReturn(
            ['ibl_team' => 'TEST', 'display_name' => 'Curly']
        );

        $rm->updatePlayerTeam(
            $tradePartner,
            $playerIds[0],
            $tradeComment
        )->shouldBeCalled();

        $rm->updatePlayerTeam(
            $tradePartner,
            $playerIds[1],
            $tradeComment
        )->shouldBeCalled();

        $rm->updatePlayerTeam(
            $tradePartner,
            $playerIds[2],
            $tradeComment
        )->shouldBeCalled();

        $rm->makeInactive($playerIds[0])->shouldBeCalled();
        $rm->makeInactive($playerIds[1])->shouldBeCalled();
        $rm->makeInactive($playerIds[2])->shouldBeCalled();

        $tm = new Transaction($rm->reveal());
        $tm->transactionDate = '01/01';

        $response = $tm->generateTradeLog( $data, $tradePartner);

        $this->assertEquals($expected, $response);
    }

}