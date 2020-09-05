<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use SweetAlert;//Paquete para el SweetAlert
use DB;
use App\Producto;//BD 


class GraficaController extends Controller
{
    public function index()
    {
        $consultaTop3ProductosStock = Producto::Top3ProductosStock();
        return view('Grafica.IndexGrafica',compact('consultaTop3ProductosStock'));
    }


    public function listaProducto()
    {
        $consultaProductoCt = Producto::ProductoCt();
        return view('Grafica.listaProducto',compact('consultaProductoCt'));
    }

}
