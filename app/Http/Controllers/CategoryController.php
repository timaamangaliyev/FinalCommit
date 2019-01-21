<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Category;

class CategoryController extends Controller
{

  public function __construct()
    {
        $this->middleware(['auth:api', 'verified'])->only([
            'store', 
            'update',
            'destroy',
            ]);
    }

   public function index()
   {
     
     $categores=App\Category::all();
     return response()->json($categores,200);

   }

   public function show($id)
   {

    return response()->json(
      App\Product::with('categories')->whereHas('categories', function($query) use ($id){
        $query->where('categories.id', $id);
      })->get()
      ,200
    );

       
   } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['id'] = $request->user()->id;
        $category = Category::create($data);
        return response()->json($category);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    
    public function update(CategoryRequest $request, Category $category)
    {
        
        $this->authorize('update', $category);
        $category->update($request->all());
        return response()->json($category);
        
    }

    public function destroy(Category $category)
    {
        $this->authorize('update', $category);
        $category->products()->detach();
        $category->delete();
        return response()->json([
                'message' => 'Successfully deleted'
            ]);
    }
    


   
}

