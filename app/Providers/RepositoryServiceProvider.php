<?php

namespace App\Providers;

use App\Repositories\Read\Sales\SaleReadRepository;
use App\Repositories\Read\Sales\SaleReadRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Read\Books\BookReadRepository;
use App\Repositories\Write\Sales\SaleWriteRepository;
use App\Repositories\Write\Books\BookWriteRepository;
use App\Repositories\Read\Authors\AuthorReadRepository;
use App\Repositories\Read\Books\BookReadRepositoryInterface;
use App\Repositories\Read\AuthorBook\AuthorBookReadRepository;
use App\Repositories\Write\Sales\SaleWriteRepositoryInterface;
use App\Repositories\Write\Books\BookWriteRepositoryInterface;
use App\Repositories\Read\Authors\AuthorReadRepositoryInterface;
use App\Repositories\Read\AuthorBook\AuthorBookReadRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            BookWriteRepositoryInterface::class,
            BookWriteRepository::class,
        );

        $this->app->bind(
            BookReadRepositoryInterface::class,
            BookReadRepository::class,
        );

        $this->app->bind(
            AuthorReadRepositoryInterface::class,
            AuthorReadRepository::class,
        );

        $this->app->bind(
            SaleWriteRepositoryInterface::class,
            SaleWriteRepository::class,
        );

        $this->app->bind(
            AuthorBookReadRepositoryInterface::class,
            AuthorBookReadRepository::class,
        );

        $this->app->bind(
            SaleReadRepositoryInterface::class,
            SaleReadRepository::class,
        );
    }
}
