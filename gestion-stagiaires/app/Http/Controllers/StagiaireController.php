<?php

namespace App\Http\Controllers;

use App\Models\Stagiaire;
use App\Models\User;
use App\Http\Requests\Stagiaire as StagiaireRequest;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Http\Resources\StagiaireResource;
use App\Http\Resources\StagiaireCollection;

class StagiaireController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(Stagiaire::class, 'stagiaire');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stagiaire = Stagiaire::where('user_id', auth()->user()->id)
            ->paginate();

        return new StagiaireCollection($stagiaire);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StagiaireRequest $request, User $user, Stagiaire $stagiaire)
    {

        $user->cin = $request->cin;
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->nom_utilisateur = $request->nom_utilisateur;
        $user->password = Hash::make($request->cin);
        $user->save();

        $stagiaire->sexe = $request->sexe;
        $stagiaire->tel = $request->tel;
        $stagiaire->adresse = $request->adresse;
        $stagiaire->user_id = $user->id;
        $stagiaire->save();


        // $user->stagiare()->create($request->only('tel','sexe','adresse',$user->id));

        return ['message'=> `Le Stagiaire {$user->nom} a bien été ajouté `];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function show(Stagiaire $stagiaire)
    {
        // $stages = $stagiaire->stages();
        return new StagiaireResource($stagiaire);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stagiaire  $stagiaire
     * @return \Illuminate\Http\Response
     */
    public function update(StagiaireRequest $request, User $user, Stagiaire $stagiaire)
    {
        $user->cin = $request->cin ;
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->nom_utilisateur = $request->nom_utilisateur;
        $user->save();

        $user->stagiare()->update($request->only(['nom', 'nom_utilisateur', 'tel','adresse']));
        // $stages = $stagiaire->stages;
        return ['message' => `Les informations du Stagiaire {$user->nom} ont bien été mise a jour `];
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
