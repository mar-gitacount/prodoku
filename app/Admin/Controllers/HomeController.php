<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(Dashboard::title())
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::environment());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::extensions());
                });

                $row->column(4, function (Column $column) {
                    $column->append(Dashboard::dependencies());
                });
            });
    }
    // タレコミ一覧
    public function checktarekomis()
    {
        $tarekomis = DB::select('SELECT id , title from tarekomis');
        return view("checktarekomis", ["tarekomis" => $tarekomis]);
    }

    //タレコミ本文
    public function article_tarekomi(Request $request)
    {
        //$title = $request->$title;
    }
}
