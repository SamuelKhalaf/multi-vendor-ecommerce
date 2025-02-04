<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\admin\admin\admin\TagsRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use \Illuminate\Contracts\View\View;

class TagsController extends Controller
{

    public function index(): View
    {
        $tags = Tag::orderBy('id','DESC')->paginate(PAGINATE_COUNT);

        return view('dashboard.tags.index',compact('tags'));
    }

    public function create(): View
    {
        return view('dashboard.tags.create');
    }

    public function store(TagsRequest $request): RedirectResponse
    {
        try {
            Tag::create($request->only('name','slug'));
            return redirect()->route('admin.index.tags')->with(['success' => 'تم حفظ البيانات بنجاح']);

        } catch (\Exception $exception) {

            return redirect()->route('admin.create.tags')->with(['error' => 'حدث خطأ اثناء حفظ البيانات']);
        }
    }


    public function edit($id): View|RedirectResponse
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return redirect()->route('admin.index.tags')->with(['error' => 'هذه العلامة غير موجودة']);
        }
        return view('dashboard.tags.edit',compact('tag'));
    }

    public function update(TagsRequest $request,$id): RedirectResponse
    {
        try {

            $tag = Tag::find($id);
            if (!$tag){
                return redirect()->route('admin.edit.tags',['id' => $id])->with(['error' => 'هذه العلامة غير موجودة']);
            }

            $tag -> update($request->only('name','slug'));

            return redirect()->route('admin.index.tags')->with(['success' => 'تم تحديث البيانات بنجاح']);

        } catch (\Exception $exception) {
            // Log the error for debugging
            Log::error('Error updating tags: ' . $exception->getMessage());
            return redirect()->route('admin.edit.tags',['id' => $id])->with(['error' => 'حدث خطأ اثناء تحديث البيانات']);

        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $tag = Tag::find($id);
            if (!$tag){
                return redirect()->route('admin.index.tags')->with(['error' => 'هذه العلامة غير موجودة']);
            }

            $tag -> delete();

            return redirect()->route('admin.index.tags')->with(['success' => 'تم حذف البيانات بنجاح']);

        } catch (\Exception $exception) {
            // Log the error for debugging
            Log::error('Error deleting tag: ' . $exception->getMessage());
            return redirect()->route('admin.edit.tags',['id' => $id])->with(['error' => 'حدث خطأ اثناء حذف البيانات']);
        }
    }
}
