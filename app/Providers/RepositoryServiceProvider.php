<?php

namespace App\Providers;

use App\Contracts\CategoryContract;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Contracts\AttributeContract;
use App\Repositories\AttributeRepository;
use App\Contracts\BrandContract;
use App\Repositories\BrandRepository;
use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;
use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;
use App\Contracts\LandmarkContract;
use App\Repositories\LandmarkRepository;
use App\Contracts\AccommodationContract;
use App\Repositories\AccommodationRepository;
use App\Contracts\TransportContract;
use App\Repositories\TransportRepository;
use App\Contracts\RouteContract;
use App\Repositories\RouteRepository;
use App\Contracts\JourneyContract;
use App\Repositories\JourneyRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        CategoryContract::class         =>          CategoryRepository::class,
        AttributeContract::class        =>          AttributeRepository::class,
        BrandContract::class            =>          BrandRepository::class,
        ProductContract::class          =>          ProductRepository::class,
        OrderContract::class            =>          OrderRepository::class,
        LandmarkContract::class            =>          LandmarkRepository::class,
        AccommodationContract::class            =>          AccommodationRepository::class,
        TransportContract::class            =>          TransportRepository::class,
        RouteContract::class            =>          RouteRepository::class,
        JourneyContract::class            =>          JourneyRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }
}