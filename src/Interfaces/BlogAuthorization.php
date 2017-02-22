<?php


namespace Nuntius\Interfaces;


interface BlogAuthorization
{
    public function canAdminNuntius(): bool;

}