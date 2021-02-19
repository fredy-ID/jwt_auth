<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\DB;
use App\Models\Ordis;
use App\Http\Resources\ordisResource;
use Illuminate\Http\Request;

class OrdisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "test controller";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ordi = new Ordis;

        $ordi->nom = $request->input('nom');

        $ordi->save();

        // $ordi = DB::table('ordis')->insert(
        //     [ 'nom' => $request->input('nom')]
        // );
        return new ordisResource($ordi);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Get list attribution par ordi
     *
     * @param  Request  $request
     * @return Response
     */
    public function listOrdis(Request $request)
    {
        $date = $request->date;
        $listOrdi =  Ordis::with(array('attribution' => function($query) use ($date){
            $query -> where('date',$date);
        }))
        ->get();
        return ordisResource::collection($listOrdi);
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
