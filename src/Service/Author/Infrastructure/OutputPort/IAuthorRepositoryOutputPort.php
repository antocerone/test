<?php

namespace App\Service\Author\Infrastructure\OutputPort;

interface IAuthorRepositoryOutputPort
{
    public function getAll();
    public function getAuthorById(int $id);
}
