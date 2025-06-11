<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        if ($city) {
            $query->whereHas('city', function (EloquentBuilder $query) use ($city) {
                $query->where('slug', $city);
            });
        }

        if ($category) {
            $query->whereHas('category', function (EloquentBuilder $query) use ($category) {
                $query->where('slug', $category);
            });
        }

        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')
            ->orderBy('transactions_count', 'desc')
            ->take($limit)
            ->get();
    }

    public function getBoardingHouseByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function (EloquentBuilder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->first();
    }

    public function getBoardingHouseByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function (EloquentBuilder $query) use ($slug) {
            $query->where('slug', $slug);
        })->get();
    }
}
