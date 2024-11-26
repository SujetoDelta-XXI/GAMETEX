<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    // Métodos para la sección "Acerca"
    public function fNosotros()
    {
        return view('home.footer.acerca.nosotros');
    }

    public function fMetodosPago()
    {
        return view('home.footer.acerca.metodos_pago');
    }

    public function fTorneos()
    {
        return view('home.footer.acerca.torneos');
    }

    public function fEventos()
    {
        return view('home.footer.acerca.eventos');
    }


    // Métodos para la sección "Términos"
    public function fPoliticasPrivacidad()
    {
        return view('home.footer.terminos.politicas_privacidad');
    }

    public function fTerminosCondiciones()
    {
        return view('home.footer.terminos.terminos_condiciones');
    }

    public function fPoliticasReembolso()
    {
        return view('home.footer.terminos.politicas_reembolso');
    }

    public function fPoliticasCookies()
    {
        return view('home.footer.terminos.politicas_cookies');
    }
}

