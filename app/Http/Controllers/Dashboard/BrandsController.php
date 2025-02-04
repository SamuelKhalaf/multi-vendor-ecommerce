<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\admin\admin\admin\BrandsRequest;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->paginate(PAGINATE_COUNT);

        return view('dashboard.brands.index',compact('brands'));
    }

    public function create()
    {
        return view('dashboard.brands.create');
    }

    public function store(BrandsRequest $request)
    {
        try {
            $data  = $request->only('name');
            $data['is_active'] = $this->setStatus($request);
            if ($request->has('photo')){
                $data['photo'] = uploadImage('brands',$request->file('photo'));
            }
            Brand::create($data);
            return redirect()->route('admin.index.brands')->with(['success' => 'تم حفظ البيانات بنجاح']);

        } catch (\Exception $exception) {

            return redirect()->route('admin.create.brands')->with(['error' => 'حدث خطأ اثناء حفظ البيانات']);
        }
    }


    public function edit(string $id)
    {
        $brand = Brand::find($id);

        if (!$brand) {
            return redirect()->route('admin.index.brands')->with(['error' => 'هذه الماركة التجارية غير موجودة']);
        }
        return view('dashboard.brands.edit',compact('brand'));
    }


    public function update(BrandsRequest $request, string $id)
    {
        try {

            $brand = Brand::find($id);
            if (!$brand){
                return redirect()->route('admin.edit.brands',['id' => $id])->with(['error' => 'هذه الماركة التجارية غير موجودة']);
            }
            $oldPhoto = basename($brand->photo);

            $data  = $request->only('name');
            $data['is_active'] = $this->setStatus($request);
            if ($request->has('photo')) {
                $data['photo'] = uploadImage('brands', $request->file('photo'));
            }
            $brand -> update($data);

            // Delete the photo from storage if it exists
            if ($oldPhoto && Storage::disk('brands')->exists($oldPhoto)) {
                Storage::disk('brands')->delete($oldPhoto);
            }

            return redirect()->route('admin.index.brands')->with(['success' => 'تم تحديث البيانات بنجاح']);

        } catch (\Exception $exception) {
            // Log the error for debugging
            Log::error('Error updating brand: ' . $exception->getMessage());
            return redirect()->route('admin.edit.brands',['id' => $id])->with(['error' => 'حدث خطأ اثناء تحديث البيانات']);

        }
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $brand = Brand::find($id);
            if (!$brand){
                return redirect()->route('admin.index.brands')->with(['error' => 'هذه الماركة التجارية غير موجودة']);
            }
            $photo = basename($brand->photo);

            $brand -> delete();

            // Delete the photo from storage if it exists
            if ($photo && Storage::disk('brands')->exists($photo)) {
                Storage::disk('brands')->delete($photo);
            }
            return redirect()->route('admin.index.brands')->with(['success' => 'تم حذف البيانات بنجاح']);

        } catch (\Exception $exception) {
            // Log the error for debugging
            Log::error('Error deleting brand: ' . $exception->getMessage());
            return redirect()->route('admin.edit.brands',['id' => $id])->with(['error' => 'حدث خطأ اثناء حذف البيانات']);
        }
    }

    public function setStatus($request): int
    {
        return $request->filled('is_active') ? 1 : 0;
    }
}
