<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['namespace' => 'App\Http\Controllers\Api'], function ($api) {
        $api->get('/test','AdminApiController@test');
        $api->group(['middleware'=>['role:admin']], function ($api) {
        #管理员可用接口
            #用户列表api
            //$api->get('/test','AdminApiController@test');
            #添加用户api
            $api->post('/add_user','AdminApiController@addUser');
            #编辑用户api
            $api->post('/edit_user','AdminApiController@editUser');
            #删除用户api
            $api->post('/del_user','AdminApiController@delUser');
            #上传头像api
            $api->post('/upload_avatar','UserApiController@uploadAvatar');
            
        });
        
    });
});