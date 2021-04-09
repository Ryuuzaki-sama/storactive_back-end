<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use Illuminate\Http\Request;
use App\Http\Resources\StagiaireResource;

class StagiaireController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Stagiaire::class, 'stagiaire');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stagiaire = Stagiaire::where('user_id', auth()->user()->id)
            ->withCount('stages')
            ->paginate();

        return new ProjectCollection($stagiaire);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stagiaire = auth()->user()->stages()->create($request->all());
        return new StagiaireResource($stagiaire);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function show(Stagiaire $stagiaire)
    {
        $stages = $stagiaire->stages();
        return new StagiaireResource($stagiaire);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stagiaire $stagiaire)
    {
        $stagiaire->update($request->all());
        $stages = $stagiaire->stages;
        return new StagiaireResource($stagiaire);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stagiaire $stagiaire)
    {
        $stagiaire->delete();
        // $stagiaire->$table->softDeletes();
        return ['status' => 'Done'];
    }
}
