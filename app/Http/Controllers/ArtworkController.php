<?php

namespace App\Http\Controllers;

use App\Models\Artwork;
use App\Services\ArtworkService;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function __construct(
        private ArtworkService $artworkService
    ) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artworks = $this->artworkService->getAllArtworks();

        return view('artworks.index', compact('artworks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Artwork $artwork)
    {
        $artworks = $this->artworkService->getArtworkById($artwork->id);

        return view('artworks.show', compact('artworks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artwork $artwork)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artwork $artwork)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artwork $artwork)
    {
        //
    }
}
