<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarcasController extends Controller
{
    public function listarMarcas()
    {
        $marcas = DB::table('marca')->get();

        return response()->json($marcas);
    }

    public function listarBodegas()
    {
        $bodegas = DB::table('bodega')->get();

        return response()->json($bodegas);
    }

    public function listarModelos($request)
    {
        $modelos = DB::select('SELECT id, nombre, id_marca from modelo where id_marca = ?', [$request]);

        return response()->json($modelos);
    }
    public function listarDispositivos($bodega)
    {
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where bodega.id = ?', [$bodega]);

        return response()->json($dispositivos);
    }
    public function listarDispositivosFilter($modelo, $marca, $bodega)
    {
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where modelo.id = ? or marca.id = ? and bodega.id = ?', [$modelo, $marca, $bodega]);

        return response()->json($dispositivos);
    }
}

