<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Category;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $category = new Category;
            $category->title = $request->title;
            if(!$request->is_active)
            {
                $category->is_active = false;
            }
            $category->save();

            $request->session()->flash('alert-success','Data successfully saved');

            DB::commit();    

            return redirect(route('categories.index'));
        } catch (Exception $e) {
            return Redirect::back()->with('error-message', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);

        return view('admin.categories.edit', $data);
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
        try {
            DB::beginTransaction();
            $category = Category::find($id);
            $category->title = $request->title;
            if($request->is_active)
            {
                $category->is_active = $request->is_active;
            } else {
                $category->is_active = false;
            }
            $category->save();

            $request->session()->flash('alert-success','Data successfully updated');

            DB::commit();    

            return redirect(route('categories.index'));
        } catch (Exception $e) {
            return Redirect::back()->with('error-message', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        try {
            DB::beginTransaction();

            $category = Category::find($id);
            $category->delete();

            $request->session()->flash('alert-success','Data successfully deleted');

            DB::commit(); 

            return redirect(route('categories.index'));
        }
        catch (Exception $e) {
            return Redirect::back()->with('error_message', $e->getMessage())->withInput();
        }  
    }
}
