<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(Project::orderByDesc('id')->paginate());
        return view('admin.projects.index', ['projects' => Project::orderByDesc('id')->paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create', ['types' => Type::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //dd($request->all());
        //validazione dei dati
        $val_data = $request->validated();

        $val_data['cover_image'] = Storage::put('uploads', $request->cover_image);
        dd($val_data);
        //creazione
        Project::create($val_data);
        return to_route('admin.projects.index')->with('message', 'Project Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //dd($request->all());
        //valido i dati
        $val_data = $request->validated();

        //aggiorno l'immagine
        if ($request->has('cover_image')) {

            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            $image_path =  Storage::put('uploads', $request->cover_image);
            $val_data['cover_image'] = $image_path;
        }
        //dd($val_data);
        //aggiorno i dati

        $project->update($val_data);
        return to_route('admin.projects.index')->with('message', 'Post Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image && !Str::startsWith($project->cover_image, 'https://')) {
            Storage::delete($project->cover_image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project deleted correctly');
    }
}
