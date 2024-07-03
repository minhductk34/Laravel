<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;

class IndexController extends Controller
{
    public function __construct()
    {
        // Listing::create([
        //     'beds' => 2, 'baths' => 2, 'area' => 100, 'city' => 'North', 'street' => 'Tinker st', 'street_nr' => 20, 'code' => 'TS', 'price' => 200_000
        // ])
        Listing::make([
            'beds' => 2,
            'baths' => 2,
            'area' => 100,
            'city' => 'North',
            'street' => 'Tinker st',
            'street_nr' => 20,
            'code' => 'TS',
            'price' => 200_000,
        ]);
        // dd(Auth::user());
        // dd(Auth::check());
    }

    public function index()
    {
        return inertia('Listing/Index'
        );
    }

    public function show()
    {

    }
}
