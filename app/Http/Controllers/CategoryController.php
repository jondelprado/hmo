<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $categorySidebar = array(
          'maintenance_menu' => 'maintenance-open',
          'maintenance_link' => 'maintenance-active',
          'category_link' => 'category-open'
        );

        $categories = Category::all();

        return view('category.index')->with('categories', $categories)->with($categorySidebar);
        // return view('category.index')->with('categories',$categories);
        // return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categorySidebar = array(
        'maintenance_menu' => 'maintenance-open',
        'maintenance_link' => 'maintenance-active',
        'category_link' => 'category-open'
      );

      $categories = Category::all();

      return view('category.create')->with('categories', $categories)->with($categorySidebar);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //input fields validation
        $this->validate($request, [
          'category_type' => 'required',
          'category_desc' => 'required',
          'category_classification' => 'required',
          'category_specification' => 'required',
        ]);

        //submit to database
        $category = new Category;
        $category->type = $request->input('category_type');
        $category->description = $request->input('category_desc');
        $category->classification = $request->input('category_classification');
        $category->specification = $request->input('category_specification');
        $category->save();

        return redirect('http://localhost/hmo/public/maintenance/category/create')->with('success', 'Saved Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorySidebar = array(
          'maintenance_menu' => 'maintenance-open',
          'maintenance_link' => 'maintenance-active',
          'category_link' => 'category-open'
        );

        $category = Category::find($id);
        return view('category.edit')->with('category', $category)->with($categorySidebar);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'category_type' => 'required',
        'category_desc' => 'required',
        'category_classification' => 'required',
        'category_specification' => 'required',
      ]);

      //submit to database
      $category = Category::find($id);
      $category->type = $request->input('category_type');
      $category->description = $request->input('category_desc');
      $category->classification = $request->input('category_classification');
      $category->specification = $request->input('category_specification');
      $category->save();

      return redirect('http://localhost/hmo/public/maintenance/category')->with('success', 'Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('http://localhost/hmo/public/maintenance/category')->with('success', 'Deleted Successfully!');
    }
}
















//
