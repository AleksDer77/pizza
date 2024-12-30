<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;

use function PHPUnit\Framework\assertFalse;
use function Symfony\Component\Translation\t;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
}
