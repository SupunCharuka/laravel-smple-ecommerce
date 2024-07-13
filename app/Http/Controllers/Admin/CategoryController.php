<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('category.manage'), Response::HTTP_FORBIDDEN);
        if ($request->ajax()) {
            $categories = Category::orderBy('name', 'asc')->get();
            return DataTables::of($categories)
                ->addColumn('actions', function ($category) {
                    return view('backend.admin.category.includes.actions', compact('category'))->render();
                })
                ->addColumn('id', function ($category) {
                    return $category->id;
                })
                ->addColumn('name', function ($category) {
                    return $category->name;
                })
                ->addColumn('slug', function ($category) {
                    return $category->slug;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('backend.admin.category.index');
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('category.update'), Response::HTTP_FORBIDDEN);
        return view('backend.admin.category.edit', compact('category'));
    }

    public function destroy(Category $category)
    {
        abort_if(Gate::denies('category.delete'), Response::HTTP_FORBIDDEN);
        if (!$category) {
            $json['status'] = 'error';
            $json['code'] = '404';
            $json['message'] = 'category not found';
            $json['icon'] = 'error';
            return response()->json($json, 404);
        }
        $category->delete();
        $json['status'] = 'deleted';
        $json['message'] = 'Category record deleted successfully';
        $json['icon'] = 'success';
        $json['data'] = $category;
        return response()->json($json);
    }

}
