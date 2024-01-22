<?php

namespace App\Repositories\Read\Authors;

use App\Models\Author;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class AuthorReadRepository implements AuthorReadRepositoryInterface
{
    private function query(): Builder
    {
        return Author::query();
    }

    public function searchByFullName(string $fullName): Collection
    {
        return $this->query()
            ->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%$fullName%"])
            ->get();
    }

    public function getOnlyWithAvatars(): Collection
    {
        return $this->query()
            ->whereNotNull('avatar_url')
            ->get();
    }
}
