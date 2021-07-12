<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Tarekomipost;
use App\Models\Tarekomi;

class tarekomiController extends Controller
{
    //
    public function index()
    {
        return view('tarekomi');
    }


    public function store(Tarekomipost $request)
    {
        if (null == $request->name) {
            $name = "匿名希望";
        } else {
            $name = $request->name;
        }
        $savedate = [
            'name' => $name,
            'title' => $request->title,
            'gunle' => $request->gunle,
            'message' => $request->message
        ];
        $tarekomi = new Tarekomi();
        $tarekomi->fill($savedate);
        return redirect('/');
    }
}
