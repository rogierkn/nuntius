<?php


namespace Nuntius\Tests\Models;


use Nuntius\Interfaces\BlogAuthorization;

class User implements BlogAuthorization
{

    public function canCreateNuntiusPost(): bool
    {
        // TODO: Implement canCreateNuntiusPost() method.
    }

    public function canEditNuntiusPost(): bool
    {
        // TODO: Implement canEditNuntiusPost() method.
    }

    public function canViewNuntiusPost(): bool
    {
        // TODO: Implement canViewNuntiusPost() method.
    }

    public function canCommentOnNuntiusPost(): bool
    {
        // TODO: Implement canCommentOnNuntiusPost() method.
    }
}