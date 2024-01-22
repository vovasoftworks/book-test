<?php

namespace App\Repositories\Read\Authors;

use Illuminate\Database\Eloquent\Collection;

interface AuthorReadRepositoryInterface
{
    public function searchByFullName(string $fullName): Collection;
    public function getOnlyWithAvatars(): Collection;
}
