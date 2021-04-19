<?php

namespace App\Http\Controllers;

use App\Models\StagePiece;
use Illuminate\Http\Request;

class StagePieceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stagePiece = StagePiece::where('user_id', auth()->user()->id)
            ->withCount('stages')
            ->paginate();
        return $stagePiece;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StagePiece  $stagePiece
     * @return \Illuminate\Http\Response
     */
    public function show(StagePiece $stagePiece)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StagePiece  $stagePiece
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StagePiece $stagePiece)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StagePiece  $stagePiece
     * @return \Illuminate\Http\Response
     */
    public function destroy(StagePiece $stagePiece)
    {
        $stagePiece->softDeletes();
        return [
            'status' => "It's have been deleted successfully"
        ];
    }
}
