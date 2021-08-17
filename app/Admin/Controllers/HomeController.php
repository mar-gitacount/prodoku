<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
//use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $tarekomis = DB::select('SELECT id, title from tarekomis');
        return view("checktarekomis", ["tarekomis" => $tarekomis]);
    }

    //タレコミ本文
    public function article_tarekomi($id)
    {
        $tarekomis_all = DB::select("SELECT * from tarekomis where id = '" . $id . "' ");
        return view("tarecomi_all", ["tarecomi_all" => $tarekomis_all]);
        //$title = $request->$title;
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image'
        ], [
            'file.required' => '画像が選択されていません',
            'file.image' => '画像ファイルではありません',
        ]);
        $file = $request->file('file');
        //dd($file);
        $list = Storage::disk('s3')->files('');
        //dd($list);
        $path = Storage::disk('s3')->put('/', $file, 'public');
        //dd($path);
        return redirect("/");
    }

    // タレコミを編集する。
    public function edit(Request $request){
        $name = $request -> name;
        $id = $request -> id;
        dd($id);
        return redirect("/admin/checktarekomis".$id);
    }
    // タレコミを削除。
    public function delete($id){
        // deleteのsql文を書くよ
        DB::select("DELETE from tarekomis where id = '" . $id . "' ");
        return redirect("/admin/checktarekomis");
    }

}
