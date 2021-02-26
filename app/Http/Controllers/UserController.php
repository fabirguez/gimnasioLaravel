<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function index()
    {
        return 'Index user controller';
    }

    public function create()
    {
        return 'Create en user controller';
    }

    public function show($id)
    {
        return 'Show user en user controller';
    }
}
