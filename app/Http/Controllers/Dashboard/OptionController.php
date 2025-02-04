<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\OptionsRequest;
use App\Models\Attribute;
use App\Models\Option;
use App\Models\Product;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::with(['product' => function ($prod) {
            $prod->select('id');
        }, 'attribute' => function ($attr) {
            $attr->select('id');
        }])->select('id', 'product_id', 'attribute_id', 'price')->paginate(PAGINATE_COUNT);

        return view('dashboard.options.index', compact('options'));
    }

    public function create()
    {
        $data = [];
        $data['products'] = Product::active()->select('id')->get();
        $data['attributes'] = Attribute::select('id')->get();

        return view('dashboard.options.create', $data);
    }

    public function store(OptionsRequest $request)
    {
        $option = Option::create([
            'attribute_id' => $request->attribute_id,
            'product_id' => $request->product_id,
            'price' => $request->price,
            'name' => $request->name,
        ]);

        return redirect()->route('admin.options')->with(['success' => 'تم ألاضافة بنجاح']);
    }

    public function edit($optionId)
    {

        $data = [];
        $data['option'] = Option::find($optionId);

        if (!$data['option'])
            return redirect()->route('admin.options')->with(['error' => 'هذه القيمة غير موجود ']);

        $data['products'] = Product::active()->select('id')->get();
        $data['attributes'] = Attribute::select('id')->get();

        return view('dashboard.options.edit', $data);

    }

    public function update($id, OptionsRequest $request)
    {
        try {

            $option = Option::find($id);

            if (!$option)
                return redirect()->route('admin.options')->with(['error' => 'هذا ألعنصر غير موجود']);

            $option->update($request->only(['price','product_id','attribute_id','name']));

            return redirect()->route('admin.options')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {

            return redirect()->route('admin.options')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {

        try {
            $option = Option::find($id);

            if (!$option)
                return redirect()->route('admin.options')->with(['error' => 'هذا ألعنصر غير موجود ']);

            $option->delete();

            return redirect()->route('admin.options')->with(['success' => 'تم  الحذف بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.options')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }
}
