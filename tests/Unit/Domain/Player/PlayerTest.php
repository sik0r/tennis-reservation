<?php
declare(strict_types=1);

namespace App\Tests\Unit\Domain\Player;

use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;
use Sik0r\TennisReservation\Application\Services\PasswordEncoder;
use Sik0r\TennisReservation\Domain\Player\Player;

class PlayerTest extends TestCase
{
    public function test_playerShouldBeCreated(): void
    {
        $id = Uuid::uuid4();
        $password = 'password';
        $player = Player::create(
            $id,
            'player@example.com',
            'player',
            PasswordEncoder::encode($password)
        );

        $this->assertEquals($id->toString(), $player->id());
        $this->assertTrue(PasswordEncoder::verify($password, $player->password()));
    }
}
