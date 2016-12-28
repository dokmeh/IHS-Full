<?php

	namespace App\Http\Controllers;

	use App\Category;
	use Illuminate\Http\Request;

	class CategoriesController extends Controller {
		public function index()
		{

		}

		public function create()
		{
			//
		}

		public function store(Request $request)
		{
			Category::create($request->all());
//			flash()->success('Done', 'New Category Has been added.');

			return redirect('admin/category/create');
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
			$category = Category::find($id);
			$category->update($request->all());
//			flash()->success('Done', 'The Category Has been Updated.');

			return back();

		}

		public function destroy($id)
		{
			$category = Category::find($id);
			$category->destroy($id);
//			flash()->error('Deleted', 'The Category Has been Deleted.');

			return back();
		}
	}
