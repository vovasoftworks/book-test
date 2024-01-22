<?php

namespace App\Services\Actions;

use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Read\Books\BookReadRepositoryInterface;
use App\Repositories\Read\Authors\AuthorReadRepositoryInterface;
use App\Repositories\Read\AuthorBook\AuthorBookReadRepositoryInterface;

class GetAuthorWithAvatarsBooksAction
{
    public function __construct(
        protected BookReadRepositoryInterface $bookReadRepository,
        protected AuthorReadRepositoryInterface $authorReadRepository,
        protected AuthorBookReadRepositoryInterface $authorBookReadRepository,
    ) {
    }

    public function run(): Collection
    {
        $authorsWithAvatars = $this->authorReadRepository->getOnlyWithAvatars();
        $authorIds = $authorsWithAvatars->pluck('id')->toArray();

        $authorBooks = $this->authorBookReadRepository->getByAuthorIds($authorIds);
        $bookIds = $authorBooks->pluck('book_id')->toArray();

        return $this->bookReadRepository->getByIds($bookIds);
    }
}
