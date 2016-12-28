<?php

	namespace App\Http\Controllers;

	use App\Status;
	use Illuminate\Http\Request;

	class StatusesController extends Controller {
		public function index()
		{
			//
		}

		public function create()
		{
			//
		}

		public function store(Request $request)
		{
			Status::create($request->all());

			//			flash()->success('Done', 'New Status Has been added');

			return redirect('admin/status/create');
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
			$status = Status::find($id);
			$status->update($request->all());

			//			flash()->success('Done', 'The Category Has been Updated.');

			return back();
		}

		public function destroy($id)
		{
			$status = Status::find($id);
			$status->destroy($id);

			//			flash()->error('Deleted', 'The Status Has been Deleted.');

			return back();
		}
	}
