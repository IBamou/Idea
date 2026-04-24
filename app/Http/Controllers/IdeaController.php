<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $ideas = $user->ideas;
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $user = $user->findOrFail(Auth::id());
        $user->ideas()->create($validation);
        return redirect()->route('ideas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        return view('ideas.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $idea->update($validation);
        return redirect()->route('ideas.show', $idea);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        return redirect()->route('ideas.index');
    }
}
