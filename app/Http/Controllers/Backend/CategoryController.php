<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\DataTables\CategoryDataTable;

use DB;

class CategoryController extends Controller
{
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    public function create()
    {
        $category = new Category();
        $category = Category::orderBy('name')->get();
        return view('admin.categories.create', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->save();

        toastr('Created Successfully!', 'success');

        return redirect()->route('admin.categories.index');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string']
        ]);

        $category->name = $request->name;
        $category->save();

        toastr('Updated Successfully!', 'success');

        return redirect()->route('admin.categories.index');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response(['status'=>'success', 'message'=> 'Deleted Successfully']);
    }
    


}
