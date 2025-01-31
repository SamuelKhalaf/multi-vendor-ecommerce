<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoriesController extends Controller
{
    public function index(string $type): View|RedirectResponse
    {
        if ($type === 'main'){
            $categories = Category::parent()->paginate(PAGINATE_COUNT);
        }elseif ($type === 'sub'){
            $categories = Category::child()->paginate(PAGINATE_COUNT);
        }else{
            return redirect()->back()->with(['error' => 'حدث خطأ غير متوقع , الرجاء المحاولة فى وقت لاحق']);
        }

        return view('dashboard.categories.index' , compact('categories','type'));
    }

    public function create(string $type): View
    {
        $mainCategories = Category::parent()->get();

        return view('dashboard.categories.create',compact('mainCategories','type'));
    }

    public function store(CategoryRequest $request , string $type): RedirectResponse
    {

        try {
            $data  = $request->only('name','slug');
            $data['is_active'] = $this->setStatus($request);
            $data['parent_id'] = $this->setParentId($request);
            Category::create($data);
            return redirect()->route('admin.index.categories',$type)->with(['success' => 'تم حفظ البيانات بنجاح']);

        } catch (\Exception $exception) {

            return redirect()->route('admin.create.categories',$type)->with(['error' => 'حدث خطأ اثناء حفظ البيانات']);

        }
    }

    public function edit(string $type,string $id):View|RedirectResponse
    {
        if ($type === 'main' || $type === 'sub') {
            $categoryScope = ($type === 'main') ? 'parent' : 'child'; // Decide scope based on type
            $category = Category::$categoryScope()->find($id);

            if (!$category) {
                return redirect()->route('admin.index.categories', $type)->with(['error' => 'هذا القسم غير موجود']);
            }
        } else {
            return redirect()->back()->with(['error' => 'حدث خطأ غير متوقع , الرجاء المحاولة فى وقت لاحق']);
        }
        $mainCategories = Category::parent()->get();
        return view('dashboard.categories.edit',compact('category','mainCategories','type'));
    }

    public function update(CategoryRequest $request, string $type , string $id): RedirectResponse
    {

        try {

            $category = Category::find($id);
            if (!$category){
                return redirect()->route('admin.edit.categories',['type' => $type, 'id' => $id])->with(['error' => 'هذا القسم غير موجود']);
            }
            $data  = $request->only('name','slug');
            $data['is_active'] = $this->setStatus($request);
            $data['parent_id'] = $this->setParentId($request);

            $category -> update($data);

            return redirect()->route('admin.index.categories',['type' => $type])->with(['success' => 'تم تحديث البيانات بنجاح']);

        } catch (\Exception $exception) {

            return redirect()->route('admin.edit.categories',['type' => $type, 'id' => $id])->with(['error' => 'حدث خطأ اثناء تحديث البيانات']);

        }
    }

    public function delete(string $type, string $id): RedirectResponse
    {
        try {
            $category = Category::find($id);
            if (!$category){
                return redirect()->route('admin.index.categories',['type' => $type])->with(['error' => 'هذا القسم غير موجود']);
            }
            $category -> delete();

            return redirect()->route('admin.index.categories',['type' => $type])->with(['success' => 'تم حذف البيانات بنجاح']);

        } catch (\Exception $exception) {

            return redirect()->route('admin.edit.categories',['type' => $type, 'id' => $id])->with(['error' => 'حدث خطأ اثناء حذف البيانات']);

        }
    }

    public function setStatus($request): int
    {
        return $request->filled('is_active') ? 1 : 0;
    }

    public function setParentId($request): ?int
    {
        return $request->filled('parent_id') ? $request->parent_id : null;
    }

}
