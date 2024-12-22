<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = 'cr:user';

    protected $description = 'Command description';

    public function handle(): void
    {
        $user = new User;
        $user->name = $this->ask('What is your name?');
        $user->email = $this->ask('What is your email?');
        $user->password = $this->secret('What is your password?');
        $user->save();
    }
}
