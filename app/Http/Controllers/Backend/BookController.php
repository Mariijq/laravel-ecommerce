<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;
use App\Models\Author;
use App\DataTables\BookDataTable;

use File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookDataTable $dataTable)
    {
        return $dataTable->render('admin.books.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        
        $categories = Category::orderBy('name')->get();
        $authors = Author::orderBy('name')->get();
        return view('admin.books.create', compact('book', 'authors','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'image' => ['required', 'image'],
            'title' => ['required', 'max:255'],
            'description' => 'required',
            'author_id' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'publishing_year' => ['required','numeric'],
            'init_price' => ['required', 'numeric'],
            'quantity' =>[ 'required']

        ]);

        $book = new Book();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = 'uploads/books/';
            $file->move($path, $fileName);
            $book->image = $path . $fileName;
        }

        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publishing_year = $request->publishing_year;
        $book->description = $request->description;
        $book->init_price = $request->init_price;
        $book->quantity = $request->quantity;


        $book->save();

        toastr('Book created successfully!', 'success');

        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);

        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);

        $categories = Category::orderBy('name')->get();

        $authors = Author::orderBy('name')->get();
        return view('admin.books.edit', compact('book', 'authors','categories'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'image' => ['required', 'image'],
            'title' => ['required', 'max:255'],
            'description' => 'required',
            'author_id' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'publishing_year' => ['required', 'integer'],
            'init_price' => ['required','numeric'],
            'quantity' => ['required']
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = 'uploads/books/';
            $file->move($path, $fileName);
            $book->image = $path . $fileName;
        }

        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publishing_year = $request->publishing_year;
        $book->description = $request->description;
        $book->init_price = $request->init_price;
        $book->quantity = $request->quantity;


        $book->save();

        toastr('Book updated successfully!', 'success');


        return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        
        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
    }


    public function booksByCategory($categoryId)
    {

       // Get the category details
    $category = Category::find($categoryId);

    // Get the books for the specified category using the correct foreign key column
    $books = Book::where('category_id', $categoryId)->get();

    // Pass the data to the view
    return view('frontend.pages.booksByCategory', ['books' => $books, 'category' => $category]);
    }

    public function bookDetails(string $id)
{
    $book = Book::findOrFail($id);
    $author = $book->author; // Assuming "author" is the relationship method in your Book model
    $category = $book->category;

    return view('frontend.pages.book-detail', compact('book', 'author', 'category'));
}


   
    
  
}

