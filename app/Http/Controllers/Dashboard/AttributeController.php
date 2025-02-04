<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AttributeRequest;
use App\Models\Attribute;

class AttributeController extends Controller
{

    public function index()
    {
        $attributes = Attribute::orderBy('id', 'DESC')->paginate(PAGINATE_COUNT);
        return view('dashboard.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('dashboard.attributes.create');
    }


    public function store(AttributeRequest $request)
    {
        Attribute::create($request->only('name'));

        return redirect()->route('admin.attributes')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($id)
    {

        $attribute = Attribute::find($id);

        if (!$attribute)
            return redirect()->route('admin.attributes')->with(['error' => 'هذا العنصر  غير موجود ']);

        return view('dashboard.attributes.edit', compact('attribute'));

    }


    public function update($id, AttributeRequest $request)
    {
        try {
            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('admin.attributes')->with(['error' => 'هذا العنصر غير موجود']);

            $attribute->update($request->only('name'));
            return redirect()->route('admin.attributes')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            return redirect()->route('admin.attributes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            //get specific categories and its translations
            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('admin.attributes')->with(['error' => 'هذا الخاصية غير موجود ']);

            $attribute->delete();

            return redirect()->route('admin.attributes')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.attributes')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
