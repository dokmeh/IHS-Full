<?php


	Route::get('/', 'PagesController@home');
	Route::get('/about', 'PagesController@about');
	Route::get('/projects', 'PagesController@projects');
	Route::get('/projects/{project}', 'PagesController@project');
	Route::get('/contact', 'PagesController@contact');
	Route::get('/awards', 'PagesController@awards');
	Route::get('/awards/{award}', 'PagesController@award');


	Route::get('/admin', 'AdminsController@index');
	Route::get('/admin/project/create', 'AdminsController@create');
	Route::get('/admin/project/sort', 'AdminsController@sort');
	Route::get('/admin/category/create', 'AdminsController@category');
	Route::get('/admin/status/create', 'AdminsController@status');
	Route::get('/admin/project/{project}', 'AdminsController@show');
	Route::get('/admin/project/{project}/edit', 'AdminsController@edit');
	Route::get('/admin/login', 'AdminsController@login');
	Route::get('/admin/project/{project}/deletebtn', 'ProjectsController@destroy');
	Route::get('/admin/photo/{photo}/deletebtn', 'ProjectsController@deletePhotos');
	Route::get('/admin/award/{award}/deletebtn', 'AwardsController@destroy');
	Route::get('/admin/category/{category}/deletebtn', 'CategoriesController@destroy');
	Route::get('/admin/status/{status}/deletebtn', 'StatusesController@destroy');
	Route::get('/admin/register', 'AdminsController@register');


	Route::post('/admin/project/create', 'ProjectsController@store');
	Route::patch('/admin/project/{project}/edit', 'ProjectsController@update');
	Route::post('/admin/project/{project}/awards', 'AwardsController@store');
	Route::post('/admin/awards/{award}/edit', 'AwardsController@update');
	Route::post('/admin/category/{category}/edit', 'CategoriesController@update');
	Route::post('/admin/status/{status}/edit', 'StatusesController@update');
	Route::post('/admin/category/create', 'CategoriesController@store');
	Route::post('/admin/status/create', 'StatusesController@store');
	Route::post('/admin/project/{project}/photos', 'ProjectsController@addPhotos');
	Route::post('/admin/project/{project}/thumbnails', 'ProjectsController@addThumbnails');
	Route::delete('/admin/project/{project}/delete', 'ProjectsController@destroy');
	Auth::routes();
	Route::get('/login', function () {
		return redirect('/admin/login');
	});
	Route::get('/register', function () {
		return redirect('/admin/register');
	});
	Route::get('/home', function () {
		return redirect('/');
	});

	Route::post('sort', '\Rutorika\Sortable\SortableController@sort');
