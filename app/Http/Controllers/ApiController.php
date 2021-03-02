<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {
        $api = Http::get('https://www.thecocktaildb.com/api/json/v1/1/random.php');
        // https://www.thecocktaildb.com/api/json/v1/1/list.php?c=list
        $cocktails = json_decode($api->getBody());

        $cocktail = $cocktails->drinks;

        return view('api', compact('cocktail'));
    }
}
