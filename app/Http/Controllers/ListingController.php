<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class ListingController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'auth', except: ['index', 'show']),
        ];
    }

    public function index(Request $request): \Inertia\Response|\Inertia\ResponseFactory
    {
        $query = DB::table('listings');

        if ($request->filled('priceFrom')) {
            $query->where('price', '>=', $request->input('priceFrom'));
        }

        if ($request->filled('priceTo')) {
            $query->where('price', '<=', $request->input('priceTo'));
        }

        if ($request->filled('beds')) {
            $query->where('beds', '=', $request->input('beds'));
        }

        if ($request->filled('baths')) {
            $query->where('baths', '=', $request->input('baths'));
        }

        if ($request->filled('areaFrom')) {
            $query->where('area', '>=', $request->input('areaFrom'));
        }

        if ($request->filled('areaTo')) {
            $query->where('area', '<=', $request->input('areaTo'));
        }

        $listings = $query->paginate(10);

        return Inertia::render('Listing/Index', [
            'listings' => $listings,
            'filters' => $request->all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response|\Inertia\ResponseFactory
    {

        return inertia(
            "Listing/Create"
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'area' => 'required|integer|min:1',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'street_nr' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
        ]);

        // Create the listing
        $request->user()->listings()->create($validated);

        // Redirect to the listing index page
        return redirect()->route('listing.index')
            ->with('success', 'Listing was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing): \Inertia\Response|\Inertia\ResponseFactory
    {
        //Use Policies
//        if (!Gate::allows('view', $listing)) {
//            abort(403);
//        }

        //Use inertia
        return inertia(
            'Listing/Show',
            [
                "listing" => $listing,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing)
    {
        // Validate the request
        $validated = $request->validate([
            'beds' => 'required|integer|min:1',
            'baths' => 'required|integer|min:1',
            'area' => 'required|integer|min:1',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'code' => 'required|string|max:10',
            'street_nr' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
        ]);

        // Create the listing
        $listing->update($validated);

        // Redirect to the listing index page
        return redirect()->route('listing.index')
            ->with('success', 'Listing was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing was deleted');
    }
}
