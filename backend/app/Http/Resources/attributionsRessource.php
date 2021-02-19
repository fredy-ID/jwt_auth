<?php

namespace App\Http\Resources;

use App\Models\Clients;
use App\Models\Ordis;
use Illuminate\Http\Resources\Json\JsonResource;

class attributionsRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'date' => $this->date,
            'horaire' => $this->horaire,
            'client' => (new clientsRessource(Clients::find($this->clients_id)))
        ];      
    }
}
