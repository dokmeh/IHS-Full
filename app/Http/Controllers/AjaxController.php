<?php

	namespace App\Http\Controllers;

	use App\Project;
	use Illuminate\Http\Request;

	class AjaxController extends Controller {
		public function home()
		{
			$data = $this->home_ajax();

			return view('layout', compact('data'));
		}

		public function home_ajax()
		{
			$data = ['title' => 'IRANIAN HEALTH SYSTEM', 'page' => 'home', 'content' => ''];

			return $data;
		}

		public function projects()
		{
			$data = $this->projects_ajax();

			return view('layout', compact('data'));
		}

		public function projects_ajax()
		{
			$projects = Project::sorted()->get();


			$data = ['title' => 'IHS', 'page' => 'projects', 'content' => view('projects', compact('projects'))->render()];

			return $data;
		}

		public function project($id)
		{
			$data = $this->project_ajax($id);

			return view('layout', compact('data'));
		}

		public function project_ajax($id)
		{
			$project = Project::find($id);

			return view('project', compact('project'));

			$data = ['title' => 'IHS', 'page' => 'project', 'content' => view('project', compact('project'))->render()];


			return $data;
		}

		public function about()
		{
			$data = $this->about_ajax();

			return view('layout', compact('data'));
		}

		public function about_ajax()
		{
			$data = ['title' => 'Manzoomeh', 'page' => 'about', 'content' => view('about')->render()];

			return $data;
		}

		public function contact()
		{
			$data = $this->contact_ajax();

			return view('master', compact('data'));
		}

		public function contact_ajax()
		{
			$data = ['title' => 'Manzoomeh', 'page' => 'contact', 'content' => view('contact')->render()];

			return $data;
		}

		public function awards()
		{
			$data = $this->awards_ajax();

			return view('master', compact('data'));
		}

		public function awards_ajax()
		{
			$awards = Awards::orderBy('awa_sort', 'desc')->get();
			for ($i = 0; $i < count($awards); $i++) {
				$thumb = glob('img/awards/' . $awards[ $i ][ 'awa_id' ] . '.{jpg,png,bmp,gif,svg}', GLOB_BRACE);
				if (count($thumb) > 0) {
					$awards[ $i ][ 'awa_thumb' ] = $thumb[ 0 ];
				} else {
					$awards[ $i ][ 'awa_thumb' ] = '';
				}
			}
			$data = ['title' => 'Manzoomeh', 'page' => 'awards', 'content' => view('awards', compact('awards'))->render()];

			return $data;
		}
	}
