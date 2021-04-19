<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StagiaireResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,

            'sexe' => $this->sexe,
            'adresse' => $this->adresse,
            'tel' => $this->tel,

        ];
    }

    public function with($request)
    {
        return [
            'status' => 'Data has been fetched successfully'
        ];
    }
}

// 'email' => $this->user()->email,
//             'nom_utilisateur' => $this->user()->nom_utilisateur,
//             'isenabled' => true,'cin' => $this->user()->cin,
//             'nom' => $this->user()->nom,
