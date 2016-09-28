<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//后台  首页
Route::get('/admin/index/index','Admin\IndexController@index');

// //后台用户
// Route::get('/admin/User/userAdd','Admin\UserController@add');
	 
// Route::post('/admin/User/insert','Admin\UserController@insert');
// Route::get('/admin/User/index','Admin\UserController@index');

// Route::get('/admin/User/edit/{user_id}','Admin\UserController@edit');

// Route::post('/admin/User/update','Admin\UserController@update');
// Route::get('/admin/User/delete/{id}','Admin\UserController@delete');
// Route::post('/admin/User/ajaxUpdate','Admin\UserController@ajaxUpdate');
// Route::post('/admin/User/ajaxUsername','Admin\UserController@ajaxUsername');


//admin

Route::get('/admin/admin/add','Admin\AdminController@add');
Route::post('/admin/admin/insert','Admin\AdminController@insert');
Route::get('/admin/admin/index','Admin\AdminController@index');
Route::get('/admin/admin/edit/{id}','Admin\AdminController@edit');
Route::post('/admin/admin/update','Admin\AdminController@update');
Route::get('/admin/admin/delete/{id}','Admin\AdminController@delete');

//user
Route::get('/admin/user/add','Admin\UserController@add');
Route::post('/admin/user/insert','Admin\UserController@insert');
Route::get('/admin/user/index','Admin\UserController@index');
Route::get('/admin/user/edit/{id}','Admin\UserController@edit');
Route::get('/admin/user/delete/{id}','Admin\UserController@delete');
Route::post('/admin/user/update','Admin\UserController@update');
Route::post('/admin/user/ajaxUpdate','Admin\UserController@ajaxUpdate');
Route::post('/admin/user/ajaxUsername','Admin\UserController@ajaxUsername');

//login
Route::get('/admin/login','Admin\LoginController@login');
Route::post('/admin/dologin','Admin\LoginController@doLogin');
Route::get('/admin/logout','Admin\LoginController@logout');
Route::get('kit/captcha/{tmp}', 'Admin\KitController@captcha');

//找回密码
Route::get('/admin/reset/forget','Admin\ResetController@forget');
Route::post('/admin/reset/sendemail','Admin\ResetController@sendEmail');
Route::get('/admin/reset/newpass/id/{id}/token/{token}','Admin\ResetController@newPass');
Route::post('/admin/reset/renew','Admin\ResetController@renew');


//活动
Route::get('/admin/activity/add','Admin\ActivityController@add');
Route::post('/admin/activity/insert','Admin\ActivityController@insert');
Route::get('/admin/activity/index','Admin\ActivityController@index');
Route::get('/admin/activity/edit/{id}','Admin\ActivityController@edit');
Route::post('/admin/activity/update','Admin\ActivityController@update');
Route::get('/admin/activity/delete/{id}','Admin\ActivityController@delete');
Route::get('admin/activity/details/{id}','Admin\ActivityController@details');


//相亲大会管理
Route::get('admin/blind/add','Admin\BlindController@add');
Route::post('admin/blind/insert','Admin\BlindController@insert');
Route::get('admin/blind/details','Admin\BlindController@details');
Route::get('admin/blind/edit/{id}','Admin\BlindController@edit');
Route::post('/admin/blind/update','Admin\BlindController@update');
Route::get('/admin/blind/index','Admin\BlindController@index');

//任务
Route::get('/admin/task/add','Admin\TaskController@add');
Route::post('/admin/task/insert','Admin\TaskController@insert');
Route::get('/admin/task/index','Admin\TaskController@index');
Route::get('/admin/task/edit/{id}','Admin\TaskController@edit');
Route::post('/admin/task/update','Admin\TaskController@update');
Route::get('/admin/task/delete/{id}','Admin\TaskController@delete');

//礼物
Route::get('/admin/gift/add','Admin\GiftController@add');
Route::post('/admin/gift/insert','Admin\GiftController@insert');
Route::get('/admin/gift/index','Admin\GiftController@index');
Route::get('/admin/gift/edit/{id}','Admin\GiftController@edit');
Route::post('/admin/gift/update','Admin\GiftController@update');
Route::get('/admin/gift/delete/{id}','Admin\GiftController@delete');

//好友关系

Route::get('/admin/friend/add','Admin\FriendController@add');
Route::post('/admin/friend/insert','Admin\FriendController@insert');
Route::get('/admin/friend/index','Admin\FriendController@index');
Route::get('/admin/friend/edit/{id}/{t}','Admin\FriendController@edit');
Route::post('/admin/friend/update','Admin\FriendController@update');
Route::get('/admin/friend/delete/{id}','Admin\FriendController@delete');

//合同管理
Route::get('/admin/contract/add','Admin\ContractController@add');
Route::get('/admin/contract/insert','Admin\ContractController@insert');
Route::get('/admin/contract/index','Admin\ContractController@index');
Route::get('/admin/contract/edit/{id}','Admin\ContractController@edit');
Route::post('/admin/contract/update','Admin\ContractController@update');
Route::get('/admin/contract/delete/{id}','Admin\ContractController@delete');
Route::post('/admin/contract/ajaxUpdate', 'Admin\ContractController@selectId');
Route::post('/admin/contract/ajaxselectHong', 'Admin\ContractController@selectHong');

//红娘
Route::get('/admin/hong/add','Admin\HongController@add');
Route::get('/admin/hong/insert','Admin\HongController@insert');
Route::get('/admin/hong/index','Admin\HongController@index');
Route::get('/admin/hong/edit/{id}','Admin\HongController@edit');
Route::get('/admin/hong/delete/{id}','Admin\HongController@delete');
Route::post('/admin/hong/update/','Admin\HongController@update');

//充值管理
Route::get('/admin/recharge/add','Admin\RechargeController@add');
Route::post('/admin/recharge/insert','Admin\RechargeController@insert');
Route::get('/admin/recharge/index','Admin\RechargeController@index');
Route::get('/admin/recharge/edit/{id}','Admin\RechargeController@edit');
Route::get('/admin/recharge/delete/{id}','Admin\RechargeController@delete');
Route::post('/admin/recharge/update/','Admin\RechargeController@update');
Route::post('/admin/recharge/getUser', 'Admin\RechargeController@getUser');


//站内信
Route::get('/admin/msg/add','Admin\MsgController@add');
Route::post('/admin/msg/insert','Admin\MsgController@insert');
Route::get('/admin/msg/index','Admin\MsgController@index');
Route::get('/admin/msg/edit/{id}','Admin\MsgController@edit');
Route::post('/admin/msg/update','Admin\MsgController@update');
Route::get('/admin/msg/delete/{id}','Admin\MsgController@delete');

//加盟
Route::get('/admin/join/add','Admin\JoinController@add');
Route::get('/admin/join/insert','Admin\JoinController@insert');
Route::get('/admin/join/index','Admin\JoinController@index');
Route::get('/admin/join/edit/{id}','Admin\JoinController@edit');
Route::post('/admin/join/update','Admin\JoinController@update');
Route::get('/admin/join/delete/{id}','Admin\JoinController@delete');

//后台话题管理   Topic
Route::get('/admin/topic/topicAdd/{user_id}','Admin\TopicController@add');
Route::post('/admin/topic/insert','Admin\TopicController@insert');
Route::get('/admin/topic/index','Admin\TopicController@index');
Route::get('/admin/topic/edit/{id}','Admin\TopicController@edit');
Route::post('/admin/topic/update','Admin\TopicController@update');
Route::get('/admin/topic/delete/{id}','Admin\TopicController@delete');
Route::post('/admin/User/ajaxtitle','Admin\UserController@ajaxTitle');
Route::get('/admin/topic/post/{id}','Admin\TopicController@post');
// Route::get('/admin/topic/post/{rid}');
//后台post管理
Route::post('/admin/topic/ajaxPostUpdate','Admin\TopicController@ajaxPostUpdate');
Route::get('/admin/topic/ajaxPostdelete/{id}','Admin\PostController@ajaxPostdelete');

//后台成功故事管理
Route::get('/admin/success/add','Admin\SuccessController@add');
Route::post('/admin/success/insert','Admin\SuccessController@insert');
Route::get('/admin/success/index','Admin\SuccessController@index');
Route::get('/admin/success/edit/{id}','Admin\SuccessController@edit');
Route::post('/admin/success/update','Admin\SuccessController@update');
Route::get('/admin/success/delete/{id}','Admin\SuccessController@delete');

//后台情感管理
Route::get('/admin/emotional/index','Admin\EmotionalController@index');
Route::get('/admin/emotional/edit/{id}','Admin\EmotionalController@edit');
Route::post('/admin/emotional/update','Admin\EmotionalController@update');
Route::get('/admin/emotional/delete/{id}','Admin\EmotionalController@delete');
//后台标签管理	
Route::get('/admin/types/add','Admin\TypesController@add');
Route::post('/admin/types/insert','Admin\TypesController@insert');
Route::get('/admin/types/index','Admin\TypesController@index');
Route::get('/admin/types/edit/{id}','Admin\TypesController@edit');
Route::post('/admin/types/update','Admin\TypesController@update');
Route::get('/admin/types/delete/{id}','Admin\TypesController@delete');


//轮播图的添加和管理

Route::get('/admin/carousel/add','Admin\CarouselController@add');
Route::post('/admin/carousel/insert','Admin\CarouselController@insert');
Route::get('/admin/carousel/index','Admin\CarouselController@index');
Route::get('/admin/carousel/edit/{id}','Admin\CarouselController@edit');
Route::post('/admin/carousel/ajaxUpdate','Admin\CarouselController@ajaxUpdate');


//后台用户详情表
Route::get('/admin/userdetail/add','Admin\UserdetailController@add');
Route::post('/admin/userdetail/insert','Admin\UserdetailController@insert');
Route::get('/admin/userdetail/index','Admin\UserdetailController@index');
Route::get('/admin/userdetail/edit/{id}','Admin\UserdetailController@edit');
Route::post('/admin/userdetail/update','Admin\UserdetailController@update');
Route::get('/admin/userdetail/delete/{id}','Admin\UserdetailController@delete');

//前台首页
Route::get('/home/index/index','Home\indexController@index');
Route::get('/home/index/ajaxSuccess','Home\indexController@ajaxSuccess');
Route::get('/home/index/ajaxSearch','Home\indexController@ajaxSearch');
Route::post('/home/index/select','Home\indexController@select');
// Route::get('/home/index/ajaxSearch','Home\indexController@ajaxSearch');


//前台成功故事管理
Route::get('/home/success/index','Home\SuccessController@index');
Route::get('/home/success/detail/{id}','Home\SuccessController@detail');

//前台我的牵元

Route::get('/home/myqianyuan/index', 'Home\MyqianyuanController@index');
Route::get('/home/myqianyuan/match', 'Home\MyqianyuanController@match');
Route::get('/home/myqianyuan/more', 'Home\MyqianyuanController@more');
// 用户详细信息
Route::get('/home/myqianyuan/details/{id}', 'Home\MyqianyuanController@details');
// 付款界面  聚光灯  充心值
Route::get('/home/myqianyuan/recharge', 'Home\MyqianyuanController@recharge');
// 身份认证
Route::get('/home/myqianyuan/identity', 'Home\MyqianyuanController@identity');
// 邮箱验证
Route::get('/home/myqianyuan/email/{id}', 'Home\MyqianyuanController@email');

//这是前台的登录模块
Route::get('/home/login','Home\LoginController@login');
Route::post('/home/dologin','Home\LoginController@doLogin');

//这是前台的注册模块
Route::get('/home/register','Home\RegisterController@register');
Route::post('/home/doregister','Home\RegisterController@doRegister');


//这是前台找回密码
Route::get('/home/reset/forget','Home\ResetController@forget');
Route::post('/home/reset/sendemail','Home\ResetController@sendEmail');
Route::get('/home/reset/newpasss/id/{id}/token/{token}','Home\ResetController@newPasss');
Route::post('/home/reset/donew','Home\ResetController@donew');


//前台个人中心
Route::get('/home/user/index','Home\UserController@index');
Route::post('/home/user/insert','Home\UserController@insert');
Route::get('/home/user/update','Home\UserController@update');
Route::post('/home/user/doupdate','Home\UserController@doUpdate');
Route::get('/home/user/password/{id}','Home\UserController@password');
Route::post('/home/user/updatepass','Home\UserController@updatepass');
Route::get('/home/user/wanshan','Home\UserController@wanshan');
//前台的活动页面
Route::get('/home/activity/index','Home\ActivityController@index');

//消息
Route::get('/home/msg/index', 'Home\MsgController@index');
// 已读
Route::get('/home/msg/inbox', 'Home\MsgController@inbox');
// 已发信
Route::get('/home/msg/outbox', 'Home\MsgController@outbox');
// 管理员消息
Route::get('/home/msg/admin', 'Home\MsgController@admin');
// 反馈信息
Route::get('/home/msg/post', 'Home\MsgController@post');
// send msg
Route::get('/home/msg/send', 'Home\MsgController@send');
Route::post('/home/msg/ajaxSend', 'Home\MsgController@ajaxSend');
Route::get('/home/msg/dopost', 'Home\MsgController@dopost');

// 谁看过我
Route::get('/home/msg/seeme/{id}', 'Home\MsgController@seeme');
// 查看详情，先充值
Route::get('/home/msg/detail', 'Home\MsgController@detail');
//会员搜索
Route::get('/home/search/index', 'Home\SearchController@index');
// 搜索
Route::get('/home/search/search', 'Home\SearchController@search');
// ajax
Route::get('/home/search/getdata', 'Home\SearchController@getdata');
Route::get('/home/search/getdataa', 'Home\SearchController@getdataa');
