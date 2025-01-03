<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Engineer; // استدعاء موديل Engineer
use Illuminate\Support\Facades\Hash; // لتشفير كلمة المرور
use Illuminate\Support\Facades\Storage; // للتعامل مع الملفات
use Illuminate\Support\Facades\Notification;
use App\Models\User; // إذا كان الإداري مسجلاً في جدول المستخدمين
use App\Notifications\NewEngineerSignup;

class EngineerController extends Controller
{
    // عرض نموذج تسجيل المهندسين
    // public function create()
    // {
    //     return view('auth.register'); // عرض صفحة التسجيل
    // }
    public function create()
{
    $engineer = null; // تمرير قيمة فارغة لتجنب الخطأ
    return view('auth.register', compact('engineer'));
}


    // تخزين بيانات المهندس الجديد
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:engineers,email',
            'password' => 'required|min:6',
            'city' => 'required|string',
            'field' => 'required|string',
            'about' => 'nullable|string',
            'personal_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'uploaded_pictures*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // إنشاء المهندس الجديد
        $engineer = new Engineer();
        $engineer->name = $request->name;
        $engineer->email = $request->email;
        $engineer->password = Hash::make($request->password); // تشفير كلمة المرور
        $engineer->city = $request->city;
        $engineer->field = $request->field;
        $engineer->about = $request->about;

        // رفع الصورة الشخصية إذا وُجدت
        if ($request->hasFile('photo')) {
            $engineer->photo = $request->file('photo')->store('engineers/photos');
        }

        // رفع الصور المتعددة إذا وُجدت
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('engineers/images');
            }
            $engineer->images = json_encode($images); // حفظ الصور بصيغة JSON
        }
        $engineer->save(); // حفظ البيانات في قاعدة البيانات
        
       
        // // إرسال إشعار للإداري عن المهندس الجديد
        // $adminUsers = User::where('is_admin', true)->get(); // افترضنا أن الإداري له حقل is_admin
        // Notification::send($adminUsers, new NewEngineerSignup($engineer));

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('engineers.index')->with('success', 'Engineer registered successfully!');
    }

    // عرض جميع المهندسين
    public function index()
    {
        $engineers = Engineer::all();
        return view('home.engineers', compact('engineers'));
    }

    // عرض نموذج تعديل بيانات المهندس
    public function edit(Engineer $engineer)
    {
        return view('engineers.edit', compact('engineer'));
    }

    // تحديث بيانات المهندس
    public function update(Request $request, Engineer $engineer)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:engineers,email,' . $engineer->id,
            'password' => 'nullable|min:6',
            'city' => 'required|string',
            'field' => 'required|string',
            'about' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $engineer->name = $request->name;
        $engineer->email = $request->email;

        if ($request->filled('password')) {
            $engineer->password = Hash::make($request->password);
        }

        $engineer->city = $request->city;
        $engineer->field = $request->field;
        $engineer->about = $request->about;

        // تحديث الصورة الشخصية إذا وُجدت
        if ($request->hasFile('photo')) {
            if ($engineer->photo) {
                Storage::delete($engineer->photo); // حذف الصورة القديمة
            }
            $engineer->photo = $request->file('photo')->store('engineers/photos');
        }

        // تحديث الصور المتعددة إذا وُجدت
        if ($request->hasFile('images')) {
            if ($engineer->images) {
                $oldImages = json_decode($engineer->images, true);
                foreach ($oldImages as $oldImage) {
                    Storage::delete($oldImage); // حذف الصور القديمة
                }
            }

            $images = [];foreach ($request->file('images') as $image) {
                $images[] = $image->store('engineers/images');
            }
            $engineer->images = json_encode($images); // حفظ الصور الجديدة
        }

        $engineer->save(); // حفظ التحديثات

        return redirect()->route('engineers.index')->with('success', 'Engineer updated successfully!');
    }

    // حذف المهندس
    public function destroy(Engineer $engineer)
    {
        if ($engineer->photo) {
            Storage::delete($engineer->photo); // حذف الصورة الشخصية
        }

        if ($engineer->images) {
            $images = json_decode($engineer->images, true);
            foreach ($images as $image) {
                Storage::delete($image); // حذف الصور المتعددة
            }
        }

        $engineer->delete();


        return redirect()->route('engineers.index')->with('success', 'Engineer deleted successfully!');
    }
    public function show($id)
    {
        // جلب بيانات المهندس بناءً على ID
        $engineer = Engineer::findOrFail($id);
        // عرض صفحة التفاصيل وتمرير البيانات
        return view('home.engineer-details', compact('engineer'));
    }

}