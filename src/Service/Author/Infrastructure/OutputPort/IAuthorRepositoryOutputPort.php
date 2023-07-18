<?php

namespace App\Service\Author\Infrastructure\outputPort;

interface IAuthorRepositoryOutputPort
{
    public function getAll();
    public function getAuthorById(int $id);
}
