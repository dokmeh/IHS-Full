<?php

	namespace App\Http\Controllers;

	use App\About;
	use App\Photo;
	use App\Project;
	use Illuminate\Http\Request;

	class AdminsController extends Controller {

		public function __construct()
		{
			$this->middleware('auth', ['except' => [
				'login',
				'register',
			]]);


		}

		public function index()
		{
			$projects = Project::sorted()->get();

			return view('admin.home', compact('projects'));
		}

		public function login()
		{
			return view('admin.login');
		}

		public function register()
		{
			return view('admin.register');
		}

		public function about()
		{
			$about = About::first();

			return view('admin.about', compact('about'));
		}

		public function CreateAbout(Request $request)
		{

			About::create($request->all());

			return back();
		}

		public function UpdateAbout(Request $request)
		{

			$about = About::first();
			$about->update($request->all());

			return back();
		}

		public function addPhotosForAbout(Request $request)
		{
			$about = About::first();
			$file  = $request->file('file');
			$name  = time() . $file->getClientOriginalName();
			$file->move('img/about/photos', $name);

			//			$project = Project::find($id);

			$about->photos()->create([
				                         'image' => "/img/about/photos/{$name}",
				                         'name'  => $name,
			                         ]);

			return back();
		}

		public function deletePhotosForAbout($id)
		{
			$photo = Photo::find($id);
			$path  = $photo->image;
			unlink(public_path($path));
			$photo->destroy($id);


			flash()->error('Deleted', 'The Photo Has been Deleted.');

			return back();
		}

	}
