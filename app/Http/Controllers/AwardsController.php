<?php

	namespace App\Http\Controllers;

	use App\Award;
	use App\Project;
	use Illuminate\Http\Request;

	class AwardsController extends Controller {
		public function index()
		{
			//
		}

		public function create()
		{
			//
		}

		public function store(Request $request, $project)
		{

			//			$project = Project::find($id);

			$award = Award::create([
				                       'name'        => $request->input('name'),
				                       'description' => $request->input('description'),
				                       'date'        => $request->input('date'),
				                       'project_id'  => $project,
			                       ]);

			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/awards/photos', $name);

			$award->photo()->create(['image' => "/img/awards/photos/{$name}"]);
			flash()->success('Done', 'Award has been added to Project');

			return redirect('admin/project/' . $project);
		}

		public function show($id)
		{
			//
		}

		public function edit($id)
		{
			//
		}

		public function update(Request $request, $id)
		{
			$award = Award::find($id);
			$award->update($request->all());
			flash()->success('Done', 'The Award Has been Updated.');


			return back();
		}

		public function destroy($id)
		{
			$award = Award::find($id);
			$award->destroy($id);
			flash()->error('Deleted', 'The Award Has been Deleted.');

			return back();
		}
	}
