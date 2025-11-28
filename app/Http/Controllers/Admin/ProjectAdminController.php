<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;


class ProjectAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pro=Project::all();
         $projectsCount = Project::count();
         $recentProjects = Project::latest()->limit(5)->get();
        /*  $x=$projectsCount.$recentProjects;*/
        /*  return $pro;  */
         return view('admin.projects.index', compact('pro','projectsCount','recentProjects'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       /*  return "mansoor"; */
        return view('admin.projects.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       /* return "mansoor"; */
        $validated = $request->validate([
            'description'   => 'required|string|max:500',
            'category'      => 'required|string|max:255',
            'live_url'      => 'nullable|url',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published'  => 'required|boolean',
        ]);
        if ($request->has('thumbnail')) {
                    $image=$request->file('thumbnail');
                    
                    $imageName=time().'.'.$image->extension();
                    $image->move(public_path('thumbnails'),$imageName);
                
                }
        // إذا كان هناك صورة
        /* if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        } */
            $validated['thumbnail']=$imageName;
        Project::create($validated);

        return redirect()->route('admin.admin.projects.index')
                     ->with('success', 'Project added successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // الحصول على المشروع
        $project = Project::findOrFail($id);

        // عرض صفحة تحتوي تفاصيل المشروع
        return view('admin.projects.show', compact('project'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $project = Project::findOrFail($id);

        // عرض صفحة تحتوي تفاصيل المشروع
        return view('admin.projects.edit', compact('project'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        // validation
        $validated = $request->validate([
            'description'   => 'required|string|max:500',
            'category'      => 'required|string|max:255',
            'live_url'      => 'nullable|url',
            'thumbnail'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published'  => 'required|boolean',
        ]);

        // تحديث القيم الأساسية
        $project->description   = $validated['description'];
        $project->category      = $validated['category'];
        $project->live_url      = $validated['live_url'] ?? $project->live_url;
        $project->is_published  = $validated['is_published'];

        // إذا تم رفع صورة جديدة
        if ($request->hasFile('thumbnail')) {

            // حذف الصورة القديمة
            if ($project->thumbnail && file_exists(public_path('thumbnails/' . $project->thumbnail))) {
                unlink(public_path('thumbnails/' . $project->thumbnail));
            }

            // رفع الصورة الجديدة
            $image = $request->file('thumbnail');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('thumbnails'), $imageName);

            // حفظ الاسم الجديد
            $project->thumbnail = $imageName;
        }

        // حفظ التحديثات
        $project->save();

        return redirect()->route('admin.admin.projects.index')
                        ->with('success', 'Project updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        // حذف الصورة القديمة من public/thumbnails
        if ($project->thumbnail && file_exists(public_path('thumbnails/' . $project->thumbnail))) {
            unlink(public_path('thumbnails/' . $project->thumbnail));
        }

        // حذف المشروع من قاعدة البيانات
        $project->delete();

        return redirect()->route('admin.admin.projects.index')
                        ->with('success', 'Project deleted successfully');
    } 
}
