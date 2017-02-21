<?php


namespace Nuntius\Interfaces;


interface BlogAuthorization
{
    public function canCreateNuntiusPost(): bool;

    public function canEditNuntiusPost(): bool;

    public function canViewNuntiusPost(): bool;

    public function canCommentOnNuntiusPost(): bool;
}