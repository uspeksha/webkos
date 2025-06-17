<?php

namespace App\Interfaces;

Interface CategoryRepositoryInterface
{
    public function getAllCategories();

    public function getCategoryBySlug($slug);
}