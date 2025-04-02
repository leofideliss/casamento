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

    function alterarStatus(Request $request){
        $convidado = convidados::find($request->id);
        $status = $request->action == "confirmar" ? 1 : 2;
        $convidado->status = $status;
        $convidado->data_confirmacao = date("Y-m-d H:i:s");
        $convidado->qtd_convidados = $status == 1 ? $request->qtd : 0;

        $rows = $convidado->update();
        if($rows > 0)
            return response()->json(["message" => "atualizado com sucesso!"],200);
        return response()->json(["message" => "error!"],400);
    }
}
