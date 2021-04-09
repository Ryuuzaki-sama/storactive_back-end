<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
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
        $historique = Stage::where('user_id', auth()->user()->id)
            ->withCount('stages')
            ->paginate();

        return new ProjectCollection($historique);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $historique = auth()->user()->stages()->create($request->all());
        return new StageResource($historique);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function show(Historique $historique)
    {
        $historique = $stage->stages();
        return new StageResource($historique);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historique $historique)
    {
        $historique->update($request->all());
        $stages = $historique->stages;
        return new StageResource($historique);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historique $historique)
    {
        $historique->delete();
        // $stage->$table->softDeletes();
        return ['status' => 'Done'];
    }
    }
}
