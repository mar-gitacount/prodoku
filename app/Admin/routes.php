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
    $router->post('/checktarekomis', 'HomeController@upload')->name('upload');
    $router->post('/checktarekomis/{id}','HomeController@edit')->name('edit');
    $router->delete('/checktarekomis/delete/{id}','HomeController@delete')->name('delete');
});
