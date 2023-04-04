<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::with('parent')->get();
            $allCategories = $categories->map(function ($category){
                return [
                    'id'            => $category->id,
                    'title'         => $category->title,
                    'parent'     => $category->parent != null ? $category->parent->title : '',
                ];
            })->all();
            return datatables()->of($allCategories)
                ->addColumn('action', function ($row) {
                    $html = '<div class="d-flex justify-content-around">';
                    $html .= '<a href="'.route('admin.category.edit', $row['id']).'" class="btn btn-sm btn-warning btn-edit">Edit</a> ';
                    $html .= '<button data-rowid="' . $row['id'] . '" class="btn btn-sm btn-danger btn-delete">Delete</button>';
                    $html .= '</div>';
                    return $html;
                })->rawColumns(['action'])->toJson();
        }

        return view('categories.index');
    }

    public function create()
    {
        $categories = Category::get();
        return view('categories.create', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('status', 'Category added successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $id)->get();
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, $id)
    {
        Category::find($id)->update($request->all());
        return redirect()->route('admin.category.index')->with('status', 'Category updated successfully');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return ['success' => true];
    }
}
