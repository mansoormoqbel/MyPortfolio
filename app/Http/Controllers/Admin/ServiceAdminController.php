<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $services = Service::paginate(15);
        /*  return $services; */
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /* return $request; */
         $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            
            'is_active' => 'sometimes|boolean',
        ]);
        if ($request->has('icon')) {
            $image=$request->file('icon');
            
            $imageName=time().'.'.$image->extension();
            $image->move(public_path('icon'),$imageName);
        
        }
        
        $data['icon']=$imageName;

        Service::create($data);
        return redirect()->route('admin.admin.services.index')
                     ->with('success', 'Service added successfully');
        /* return redirect()->route('admin.services.index')->with('success','Service created'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $service = Service::findOrFail($id);

        // عرض صفحة تحتوي تفاصيل المشروع
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
         return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $id = $request->id;
         $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'sometimes|boolean',
        ]);

        $service = Service::findOrFail($id);
        if ($request->hasFile('icon')) {

            // حذف الصورة القديمة
            if ($service->icon && file_exists(public_path('icon/' . $service->icon))) {
                unlink(public_path('icon/' . $service->icon));
            }

            // رفع الصورة الجديدة
            $image = $request->file('icon');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('icon'), $imageName);

            // حفظ الاسم الجديد
             $data['icon']= $imageName;
        }
        $service->title   = $data['title'];
        $service->description      = $data['description'];
        $service->icon=$data['icon']; 
        $service->is_active  = $data['is_active'];
        $service->save();
       
         
        return redirect()->route('admin.services.index')->with('success','Service updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Service = Service::findOrFail($id);

        // حذف الصورة القديمة من public/thumbnails
       

        // حذف المشروع من قاعدة البيانات
        $Service->delete();

        return redirect()->route('admin.admin.services.index')
                        ->with('success', 'service deleted successfully');
    }
}
