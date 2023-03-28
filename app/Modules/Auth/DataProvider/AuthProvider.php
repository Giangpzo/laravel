<?php

namespace App\Modules\Auth\DataProvider;

use App\Models\User;
use App\Modules\Common\DataProvider\DatabaseProvider;

class AuthProvider extends DatabaseProvider
{
    public $model = User::class;
}