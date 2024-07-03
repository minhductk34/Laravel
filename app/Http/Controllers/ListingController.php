<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia(
            'Listing/Index',
            [
                "listings" => Listing::all(),
            ]
        );
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
        Listing::create($validated);

        // Redirect to the listing index page
        return redirect()->route('listing.index')
            ->with('success', 'Listing was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing): \Inertia\Response|\Inertia\ResponseFactory
    {
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
