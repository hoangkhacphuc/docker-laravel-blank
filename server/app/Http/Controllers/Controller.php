<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $log = "";
        try {
            DB::connection()->getPdo();
            $log =  "Connected successfully to database " . DB::connection()->getDatabaseName();
        } catch (\Exception $e) {
            $log = "Could not connect to the database.";
        }
        return view('welcome', [
            'log' => $log
        ]);
    }   
}
