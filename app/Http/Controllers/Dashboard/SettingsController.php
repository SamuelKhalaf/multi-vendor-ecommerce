<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingRequest;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function editShippingMethods($type)
    {
        $shippingMethod =  Settings::where(['key' => $type . '_shipping_label'])->first();

        return view('dashboard.settings.shipping.edit',compact('shippingMethod'));
    }

    public function updateShippingMethods(ShippingRequest $request, $id)
    {
        try {
            $shipping_method = Settings::find($id);

            DB::beginTransaction();
            $shipping_method->update(['plain_value' => $request->plain_value]);

            // save translations
            $shipping_method->value = $request->value;
            $shipping_method->save();

            DB::commit();
            return redirect()->back()->with(['success' => 'تم حفظ البيانات بنجاح']);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect()->back()->with(['error' => 'حدث خطأ ما يرجى المحاولة فى وقت لاحق']);
        }

    }
}
