<?php
namespace App\DataTables;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BookDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $editBtn = "<a href='" . route('admin.books.edit', $query->ISBN) . "' class='btn btn-primary'><i class='far fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.books.destroy', $query->ISBN)."' class='btn btn-danger ml-2 delete-item'><i class='far fa-trash-alt'></i></a>";
                $moreBtn = "<a href='".route('admin.books.show', $query->ISBN)."' class='btn btn-info'><i class='fas fa-search'></i></a>";

                
                return $editBtn . $deleteBtn . $moreBtn;
            })
            ->addColumn('image', function ($query) {
                return '<img src="' . asset($query->image) . '" alt="Book Image" style="max-width: 100px;">';
            })
            ->addColumn('author', function($query){
                return $query->author->name . ' ' . $query->author->surname;

            })
            ->addColumn('category', function ($query) {
                return $query->category->name;
            })
            ->rawColumns(['image', 'action'])
            ->setRowId('id');


    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Book $model): QueryBuilder
    {
        return $model->newQuery()->with(['author', 'category']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('books-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('ISBN')->width('100px'),
            Column::make('image')->width('150px'),
            Column::make('title'),
            Column::make('author', 'Author')->width('150px'), 
            Column::make('category', 'Category')->width('150px'),
            Column::make('publishing_year')->width('100px'),
            Column::make('init_price')->width('100px'),
            Column::make('quantity')->width('100px'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width('200px')
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Book_' . date('YmdHis');
    }
}

