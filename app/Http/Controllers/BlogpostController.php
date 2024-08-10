<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Blogpost;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogpostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blogposts.index');
    }

    public function manage()
    {
        $blogposts = Blogpost::latest()->get();
        return view('blogposts.manage', compact('blogposts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); 
        return view('blogposts.create', compact('categories'));
    }

    public function show($slug)
    {
        $blogpost = Blogpost::where('slug', $slug)->firstOrFail();
        $categories = json_decode($blogpost->categories, true); // Decode JSON to array

        return view('blogposts.show', compact('blogpost', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         // Validate the request
         $validated = $request->validate([
             'title' => 'required|string|max:255',
             'content' => 'required',
             'tags' => 'nullable|string',
             'categories' => 'nullable|array',
             'meta_description' => 'nullable|string|max:255',
             'meta_robots' => 'nullable|array',
             'canonical_url' => 'nullable|url',
             'additional_scripts' => 'nullable|string',
         ]);
     
         // Generate slug from the title
         $slug = Str::slug($validated['title'], '-');
     
         // Ensure the slug is unique
         $slugCount = Blogpost::where('slug', $slug)->count();
         if ($slugCount > 0) {
             $slug = $slug . '-' . ($slugCount + 1);
         }
     
         // Create the blog post
         $blogpost = Blogpost::create([
             'user_id' => Auth::id(),
             'title' => $validated['title'],
             'slug' => $slug,
             'content' => $validated['content'],
             'categories' => json_encode($validated['categories'] ?? []),
             'tags' => json_encode(array_map('trim', explode(',', $validated['tags'] ?? ''))),
             'meta_description' => $validated['meta_description'],
             'meta_robots' => json_encode($validated['meta_robots'] ?? []),
             'canonical_url' => $validated['canonical_url'],
             'additional_scripts' => $validated['additional_scripts'],
         ]);
     
         return redirect()->route('blogposts.create')
             ->with(['notification_title' => 'Blogpost', 'success_message' => 'Blog created successfully!']);
     }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
