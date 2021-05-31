<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
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
use App\Contracts\UserContract;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        LandmarkContract::class            =>          LandmarkRepository::class,
        AccommodationContract::class            =>          AccommodationRepository::class,
        TransportContract::class            =>          TransportRepository::class,
        RouteContract::class            =>          RouteRepository::class,
        JourneyContract::class            =>          JourneyRepository::class,
        UserContract::class            =>          UserRepository::class,
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