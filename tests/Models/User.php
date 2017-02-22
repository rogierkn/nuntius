<?php


namespace Nuntius\Tests\Models;


use Nuntius\Interfaces\BlogAuthorization;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements BlogAuthorization
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function canAdminNuntius(): bool
    {
        return true;
    }
}