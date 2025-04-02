<?php

namespace App\Http\Controllers;

use App\Models\convidados;
use Illuminate\Http\Request;
use DataTables;
class PrimaryController extends Controller
{
    function addConvidadosView(Request $request){
        return view('addConvidados');
    }

    function createConvidado(Request $request){
        $id = convidados::create($request->all());
        if($id)
            return response()->json(["message" => "cadastrado com sucesso!"],200);
        return
            response()->json(["message" => "error!"],400);
    }

    function getAllConvidados(Request $request){
        $convidados = convidados::all();
        if(empty($convidados))
            $convidados =[];

        return DataTables::of($convidados)
            ->addIndexColumn()
            ->make(true);
    }
}
