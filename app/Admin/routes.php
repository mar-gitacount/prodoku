<?php

use Illuminate\Routing\Router;
//use Illuminate\Routing\Route;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->get('/checktarekomis', 'HomeController@checktarekomis')->name('checktarekomis');
    $router->get('/checktarekomis/{tarekomi}', 'HomeController@article_tarekomi')->name('article_tarekomi');
    $router->get('/storepageadmin', 'HomeController@storepageadmin')->name('storepageadmin');
    $router->post('/storepageadmin', 'HomeController@store')->name('store');
    $router->post('/checktarekomis/{id}','HomeController@edit')->name('edit');
    $router->delete('/checktarekomis/delete/{id}','HomeController@delete')->name('delete');
    // 全て削除する。
    $router->delete('/checktarekomis','HomeController@alldelete')->name('alldelete');
     // 画像
    $router->post('/checktarekomis', 'HomeController@upload')->name('upload');
});
