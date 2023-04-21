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
    public function listarDispositivosPorBodega($bodega)
    {
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where bodega.id = ?', [$bodega]);

        return response()->json($dispositivos);
    }
    public function listarDispositivosPorMarca($marca)
    {
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where marca.id = ?', [$marca]);

        return response()->json($dispositivos);
    }
    public function listarDispositivosPorModelo($modelo)
    {
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where modelo.id = ?', [$modelo]);

        return response()->json($dispositivos);
    }
    //------------------------------------------------------------------------------------------
    public function listarDispositivosPorMarcayModelo($marca, $modelo)
    {
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where marca.id = ? and modelo.id = ?', [$marca, $modelo]);

        return response()->json($dispositivos);
    }
    public function listarDispositivosPorBodegayModelo($bodega, $modelo)
    {
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where bodega.id = ? and modelo.id = ?', [$bodega, $modelo]);

        return response()->json($dispositivos);
    }
    public function listarDispositivosPorBodegayMarca($marca, $bodega)
    {
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where marca.id = ? and bodega.id = ?', [$marca, $bodega]);

        return response()->json($dispositivos);
    }
    public function listarDispositivosFilter($modelo, $marca, $bodega)
    {
        
        if ($marca == 0 && $modelo == 0) {
            return $this->listarDispositivosPorBodega($bodega);
        };
        if ($bodega == 0 && $modelo == 0) {
            return $this->listarDispositivosPorMarca($marca);
        };
        if ($marca == 0 && $bodega == 0) {
            return $this->listarDispositivosPorModelo($modelo);
        };
        if ($marca != 0 && $modelo != 0 && $bodega == 0) {
            return $this->listarDispositivosPorMarcayModelo($marca, $modelo);
        };
        if ($bodega != 0 && $modelo != 0 && $marca == 0) {
            return $this->listarDispositivosPorBodegayModelo($bodega, $modelo);
        };
        if ($marca != 0 && $bodega != 0 && $modelo == 0) {
            return $this->listarDispositivosPorBodegayMarca($marca, $bodega);
        };
        $dispositivos = DB::select('SELECT dispositivo.id, dispositivo.nombre, marca.nombre as marca, modelo.nombre as modelo, bodega.nombre as bodega
        from dispositivo join modelo on dispositivo.id_modelo = modelo.id join marca on modelo.id_marca = marca.id join bodega on dispositivo.id_bodega = bodega.id
        where modelo.id = ? and marca.id = ? and bodega.id = ?', [$modelo, $marca, $bodega]);

        return response()->json($dispositivos);
    }
}

