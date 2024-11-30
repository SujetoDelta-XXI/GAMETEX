<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    public function showLoadingScreen()
    {
        echo "<script>showLoadingScreen();</script>";
    }

    public function hideLoadingScreen()
    
    {
        echo "<script>hideLoadingScreen();</script>";
    }   
    
};