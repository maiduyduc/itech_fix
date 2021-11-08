<?php

namespace App\Http\Controllers;

use App\Category;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Components\Recursive;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;
use Symfony\Contracts\Translation\TranslatorTrait;

class CategoryController extends Controller
{
    use DeleteModelTrait;

    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = $this->category->paginate(5);
        return view('admin.category.category-list', compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.category.category-add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('categories.index');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recursive = new Recursive($data);
        $htmlOption = $recursive->CategoryRecursive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.category-edit', compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->category);
    }

    public function search(Request $request)
    {
        $input = $request->name;
        $names = $this->category::where('name', $input)
            ->orWhere('name', 'like', '%' . $input . '%')->paginate(5);
        return view('admin.category.category-search', compact('names', 'input'));
    }

    public function trash()
    {
        $categories = $this->category::onlyTrashed()->paginate(5);
        return view('admin.category.category-trash', compact('categories'));
    }
    public function restore($id)
    {
        $this->category::withTrashed()->find($id)->restore();
        alert()->success('Thành công', 'Đã khôi phục lại danh mục '. $this->category::withTrashed()->find($id)->name .'   ');
        return redirect()->route('categories.index');
    }

    public function forceDelete($id)
    {
        return $this->forceDeleteTrait($id, $this->category);
    }

}
