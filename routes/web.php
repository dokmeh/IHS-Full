<?php


	Route::get('/home', 'PagesController@home');
	Route::get('/about', 'PagesController@about');
	Route::get('/projects', 'PagesController@projects');
	Route::get('/projects/{title}', 'PagesController@project');
	Route::get('/contact', 'PagesController@contact');
	Route::get('/awards', 'PagesController@awards');
	Route::get('/awards/{name}', 'PagesController@award');

	Route::group(['prefix' => '/fa'], function () {
		Route::get('/home', 'PagesController@home_fa');
		Route::get('/about', 'PagesController@about_fa');
		Route::get('/projects', 'PagesController@projects_fa');
		Route::get('/projects/{title_fa}', 'PagesController@project_fa');
		Route::get('/contact', 'PagesController@contact_fa');
		Route::get('/awards', 'PagesController@awards_fa');
		Route::get('/awards/{name_fa}', 'PagesController@award_fa');
	});


	Route::group(['prefix' => 'admin'], function () {
		//		Main Routes
		Route::get('/', 'AdminsController@index');
		Route::get('/register', 'AdminsController@register');
		Route::get('/login', 'AdminsController@login');
		Route::get('/about', 'AdminsController@about');
		Route::post('/about/create', 'AdminsController@CreateAbout');
		Route::patch('/about/update', 'AdminsController@UpdateAbout');
		Route::post('/about/photos', 'AdminsController@addPhotosForAbout');
		Route::get('/about/photo/{photo}/deletebtn', 'AdminsController@deletePhotosForAbout');


		//		Project Routes
		Route::group(['prefix' => 'project'], function () {
			Route::get('/', 'ProjectsController@projects');
			Route::get('/create', 'ProjectsController@create');
			Route::get('/create/fa/{project}', 'ProjectsController@createFa');
			Route::get('/sort', 'ProjectsController@sort');
			Route::get('/{project}', 'ProjectsController@show');
			Route::get('/{project}/edit', 'ProjectsController@edit');
			Route::get('/{project}/publications/create', 'PublicationsController@PublicationsCreate');
			Route::get('/{project}/awards/create', 'AwardsController@AwardsCreate');
			Route::get('/{project}/deletebtn', 'ProjectsController@destroy');
			Route::get('/photo/{photo}/deletebtn', 'ProjectsController@deletePhotos');
			Route::get('/award/photo/{photo}/deletebtn', 'AwardsController@deletePhoto');
			Route::get('/publications/file/{file}/deletebtn', 'PublicationsController@deleteFiles');
			Route::post('/create', 'ProjectsController@store');
			Route::patch('/{project}/edit', 'ProjectsController@update');
			Route::post('/{project}/awards', 'AwardsController@store');
			Route::post('/{project}/publications', 'PublicationsController@store');
			Route::post('/{project}/photos', 'ProjectsController@addPhotos');
			Route::post('/{project}/thumbnails', 'ProjectsController@addThumbnails');
			Route::delete('/{project}/delete', 'ProjectsController@destroy');
		});
		// Award Routes
		Route::group(['prefix' => 'awards'], function () {
			Route::get('/', 'AwardsController@awards');
			Route::get('/{award}/edit', 'AwardsController@AwardsEdit');
			Route::get('/{award}/deletebtn', 'AwardsController@destroy');
			Route::post('/{award}/update', 'AwardsController@update');
		});

		//      Category Routes
		Route::group(['prefix' => 'category'], function () {

			Route::get('/create', 'CategoriesController@category');
			Route::get('/{category}/deletebtn', 'CategoriesController@destroy');
			Route::post('/{category}/edit', 'CategoriesController@update');
			Route::post('/create', 'CategoriesController@store');
		});
		//		Status Routes
		Route::group(['prefix' => 'status'], function () {
			Route::get('/create', 'StatusesController@status');
			Route::get('/{status}/deletebtn', 'StatusesController@destroy');
			Route::post('/{status}/edit', 'StatusesController@update');
			Route::post('/create', 'StatusesController@store');
		});
	});


	Auth::routes();
	Route::get('/login', function () {
		return redirect('/admin/login');
	});
	Route::get('/register', function () {
		return redirect('/admin/register');
	});
	Route::get('/', function () {
		return redirect('/home');
	});

	Route::get('/fa', function () {
		return redirect('/fa/home');
	});

	Route::post('sort', '\Rutorika\Sortable\SortableController@sort');
