<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use Illuminate\Http\Request;
use App\Http\Resources\StageResource;

class StageController extends Controller
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
        $stage = Stage::where('user_id', auth()->user()->id)
            ->withCount('stages')
            ->paginate();

        return new ProjectCollection($stage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stage = auth()->user()->stages()->create($request->all());
        return new StageResource($stage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function show(Stage $stage)
    {
        $stages = $stage->stages();
        return new StageResource($stage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stage $stage)
    {
        $stage->update($request->all());
        $stages = $stage->stages;
        return new StageResource($stage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stage  $stage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stage $stage)
    {
         $stage->delete();
        // $stage->$table->softDeletes();
        return ['status' => 'Done'];
    }
}
