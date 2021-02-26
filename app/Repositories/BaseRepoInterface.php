<?php


namespace App\Repositories;


use Illuminate\Support\Collection;

interface BaseRepoInterface
{
    public function getAll(): Collection;
}
