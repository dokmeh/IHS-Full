<?php

	namespace App\Http\Controllers;

	use App\Category;
	use App\Photo;
	use App\Project;
	use App\Status;
	use Illuminate\Http\Request;

	class ProjectsController extends Controller {

		public function store(Request $request)
		{

			$project = Project::create($request->all());
			flash()->overlay('Success', 'Your Project Has Been Created Successfully, Now Upload the photos');


			return redirect('admin/project/' . $project->id);
		}

		public function addPhotos(Request $request, $id)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/project/photos', $name);

			$project = Project::find($id);

			$project->photos()->create(['image' => "/img/project/photos/{$name}"]);

			return redirect('admin/project/' . $project->id);

		}

		public function addThumbnails(Request $request, $id)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/project/photos/thumbnails/', $name);

			$project = Project::find($id);

			$project->thumbnail()->create(['thumbnail_path' => "/img/project/photos/thumbnails/{$name}"]);

			return redirect('admin/project/' . $project->id);

		}

		public function show($id)
		{
			$project = Project::find($id);

			return view('project', compact('project'));
		}

		public function edit($id)
		{
			$project = Project::find($id);

			return view('admin.project.edit', compact('project'));
		}

		public function update(Request $request, $id)
		{
			$project = Project::find($id);
			$project->update($request->all());
			flash()->success('Done', 'The Project has been Updated.');

			return redirect('admin/project/' . $project->id);
		}

		public function destroy($id)
		{
			$project = Project::find($id);
			$project->destroy($id);
			flash()->error('Deleted', 'The Project Has been Deleted.');

			return redirect('/admin');
		}

		public function deletePhotos($id)
		{
			$photo = Photo::find($id);
			$photo->destroy($id);
			flash()->error('Deleted', 'The Photo Has been Deleted.');
			return back();
		}
	}
