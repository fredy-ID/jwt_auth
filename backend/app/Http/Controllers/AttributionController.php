<?php

namespace App\Http\Controllers;

use App\Http\Resources\attributionsRessource;
use App\Models\Attribution;
use App\Models\Clients;
use App\Models\Ordis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributionController extends Controller
{
    //

    function remove(Request $request,$id){
        
        $attribution = Attribution::where('id', $id)
            ->delete();

        return $attribution;
    }

    function add(Request $request)
    {
        $data = Validator::make(
            $request->input(),
            [
                'id_ordinateur' => 'required',
                'date' => 'required',
                'horaire' => 'required',
                'id_client' => '',
                'firstname' => '',
                'name' => '',
            ]
        )->validate();

        if (isset($data['id_client']) && !empty($data['id_client'])) {
            $client = Clients::find($data['id_client']);
        } else {
            $client = $this->createClient($data['name'], $data['firstname']);
        }

        $ordi = Ordis::find($data['id_ordinateur']);

        if (isset($client) && isset($ordi)) {

            $attribution = new Attribution();
            $attribution->horaire = $data['horaire'];
            $attribution->date = $data['date'];
            $attribution->client()->associate($client);
            $attribution->ordinateur()->associate($ordi);
            $attribution->save();

            return new attributionsRessource($attribution);
        } else {
            //TODO ThrowException panier not exist
        }
    }

    private function createClient($name, $firstname)
    {
        $client = new Clients();
        $client->name = $name;
        $client->firstname = $firstname;
        $client->save();
        return $client;
    }
}