<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\DataTables\AuthorDataTable;
use File;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AuthorDatatable $dataTable)
    {
        return $dataTable->render('admin.authors.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = new Author();
        return view('admin.authors.create', compact('author'));
    

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'image' => ['required', 'image'], // Adjust the max size as needed
        'name' => ['required', 'max:255'],
        'surname' => ['required', 'max:255'],
        'bio' => ['required'],
    ]);

    $author = new Author();
    $author->name = $request->name;
    $author->surname = $request->surname;
    $author->bio = $request->bio;

    if ($request->has('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $extension;
        $path = 'uploads/authors/';
        $file->move($path, $fileName);

        $author->image = $path . $fileName;
    }

    $author->save();

    return redirect()->route('admin.authors.index')->with('success', 'Author created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $author = Author::findOrFail($id);

        return view('admin.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $author = Author::findOrFail($id);
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['required', 'image'], // Adjust the max size as needed
            'name' => ['required', 'max:255'],
            'surname' => ['required', 'max:255'],
            'bio' => ['required'],
        ]);
    
        $author = Author::findOrFail($id);
    
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
    
            $path = 'uploads/authors/';
            $file->move($path, $fileName);
    
            if (File::exists($author->image)) {
                File::delete($author->image);
            }
    
            $author->image = $path . $fileName;
        }
    
        $author->name = $request->name;
        $author->surname = $request->surname;
        $author->bio = $request->bio;
        $author->save();
    
        return redirect()->route('admin.authors.index')->with('success', 'Author updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $author = Author::findOrFail($id);
        $author->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }

  
}
