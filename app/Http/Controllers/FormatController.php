<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class FormatController extends Controller
{
    //
    public function index(){
        if (App::environment(['production'])) {
            return redirect("/");
        }
        return view("format");
    }
}
