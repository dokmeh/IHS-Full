<?php

	namespace App\Http\Controllers;

	use App\About;
	use App\Project;
	use App\Award;
	use App\Category;
	use Illuminate\Http\Request;

	class PagesController extends Controller {

		public function home(Request $request)
		{
			$page    = 'home';
			$content = view('home');
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}
		}

		public function home_fa(Request $request)
		{
			$page    = 'home';
			$content = view('home_fa');
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}

		public function projects(Request $request)
		{

			$page       = 'projects';
			$projects   = Project::where('visible', 1)->sorted()->get();
			$categories = Category::all();
			$content    = view('projects', compact('projects', 'categories'));

			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('page', 'content'));
			}
		}

		public function projects_fa(Request $request)
		{

			$page       = 'projects';
			$projects   = Project::where('visible', 1)->sorted()->get();
			$categories = Category::all();
			$content    = view('projects_fa', compact('projects', 'categories'));

			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('page', 'content'));
			}
		}

		public function project(Request $request, $title)
		{
			$page    = 'project';
			$title   = str_replace('-', ' ', $title);
			$project = Project::where(compact('title'))->first();
			$content = view('project', compact('project'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('page', 'content'));
			}
		}

		public function project_fa(Request $request, $title_fa)
		{
			$page     = 'project';
			$title_fa = str_replace('-', ' ', $title_fa);
			$project  = Project::where(compact('title_fa'))->first();
			$content  = view('project_fa', compact('project'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('page', 'content'));
			}
		}

		public function awards(Request $request)
		{
			$page    = 'awards';
			$awards  = Award::where('visible', 1)->sorted()->get();
			$content = view('awards', compact('awards'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}
		}

		public function awards_fa(Request $request)
		{
			$page    = 'awards';
			$awards  = Award::where('visible', 1)->sorted()->get();
			$content = view('awards_fa', compact('awards'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}

		public function award(Request $request, $name)
		{
			$page    = 'award';
			$name    = str_replace('-', ' ', $name);
			$award   = Award::where(compact('name'))->first();
			$content = view('award', compact('award'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}
		}

		public function award_fa(Request $request, $name_fa)
		{
			$page    = 'award';
			$name_fa = str_replace('-', ' ', $name_fa);
			$award   = Award::where(compact('name_fa'))->first();
			$content = view('award_fa', compact('award'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}

		public function contact(Request $request)
		{
			$page    = 'contact';
			$content = view('contact');
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}

		}

		public function contact_fa(Request $request)
		{
			$page    = 'contact';
			$content = view('contact_fa');
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}

		}

		public function about(Request $request)
		{
			$page    = 'about';
			$about   = About::first();
			$content = view('about', compact('about'));

			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}
		}

		public function about_fa(Request $request)
		{
			$page    = 'about';
			$about   = About::first();
			$content = view('about_fa', compact('about'));

			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}
	}
