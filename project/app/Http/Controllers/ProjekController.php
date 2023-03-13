<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Project;
use Illuminate\View\View;

class ProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $project = Project::all();
        return view ('project.index')->with('project', $project);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        Project::create($input);
        return redirect('project')->with('flash_message', 'Project Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $project = Project::find($id);
        return view('project.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $project = Project::find($id);
        return view('project.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $project = Project::find($id);
        $input = $request->all();
        $project->update($input);
        return redirect('project')->with('flash_message', 'project Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Project::destroy($id);
        return redirect('project')->with('flash_message', 'Project deleted!');
    }
}
