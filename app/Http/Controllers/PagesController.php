<?php

	namespace App\Http\Controllers;

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
		public function projects(Request $request)
    {
      $page       = 'projects';
      $projects   = Project::sorted()->get();
      $categories = Category::all();
      $content    = view('projects', compact('projects', 'categories'));
      if ($request->ajax()) {
        return $content;
      } else {
        return view('layout', compact('page', 'content'));
      }
    }
    public function project(Request $request, Project $project)
        {
          $page    = 'project';

          $content = view('project', compact('project'));
          if ($request->ajax()) {
            return $content;
          } else {
            return view('layout', compact('page', 'content'));
          }
        }

        public function awards(Request $request)
            {
              $page    = 'awards';
              $awards = Award::all();
              $content = view('awards', compact('awards'));
              if ($request->ajax()) {
                return $content;
              } else {
                return view('layout', compact('content', 'page'));
              }
            }
            public function award(Request $request, Award $award)
                {
                  $page    = 'award';
                  $content = view('award', compact('award'));
                  if ($request->ajax()) {
                    return $content;
                  } else {
                    return view('layout', compact('content', 'page'));
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

    public function about(Request $request)
{
  $page    = 'about';
  $content = view('about');


  if ($request->ajax()) {
    return $content;
  } else {
    return view('layout', compact('content', 'page'));
  }
}
	}
