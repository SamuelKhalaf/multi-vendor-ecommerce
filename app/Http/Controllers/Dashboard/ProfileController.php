<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProfileRequest;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function edit()
    {
        $admin =  Admin::find(auth('admin')->user()->id);
        $admin->password = null;
        return view('dashboard.profile.edit',compact('admin'));
    }

    public function update(ProfileRequest $request)
    {

        try {
            $admin = Admin::find($request->id);

            if (!$admin){
                return redirect()->route('admin.edit.profile')->with(['error' => 'حدث خطأ اثناء تحديث البيانات ']);
            }
            $data = $request->except('id','password','password_confirmation');
            if ($request->filled('password')){
                $data['password'] = bcrypt($request->password);
            }

            $admin ->update($data);
            return redirect()->route('admin.edit.profile')->with(['success' => 'تم تحديث البيانات بنجاح']);
        } catch (\Exception $e){
            return redirect()->route('admin.edit.profile')->with(['error' => 'حدث خطأ اثناء تحديث البيانات ']);
        }

    }
}
