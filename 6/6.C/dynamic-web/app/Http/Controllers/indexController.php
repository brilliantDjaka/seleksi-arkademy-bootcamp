<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasir = DB::select('select * from cashier');
        $category = DB::select('select * from category');
        $count = 1;
        $data = DB::select('SELECT product.id as id, cashier.name as cashier, product.name as product, category.name as category, product.price as price 
        FROM product 
        LEFT JOIN cashier ON product.id_cashier = cashier.id
        LEFT JOIN category ON product.id_category = category.id');
        
        return view('index',compact('data','kasir','category','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(DB::table('product')->insert([
            'name'=>$request->product,
            'price'=>$request->price,
            'id_category'=>$request->category,
            'id_cashier'=>$request->kasir
        ])) return redirect('/')->with('status', 'Success');
        else return redirect('/')->with('status', 'Error');
        
        
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
        $kasir = DB::select('select * from cashier');
        $category = DB::select('select * from category');
        $product = DB::select('select * from product where product.id ='.$id);
        $product = $product[0];
        
        return view('edit',compact('kasir','category','product'));
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
        $affected = DB::table('product')
              ->where('id', $id)
              ->update([
                'name'=>$request->product,
                'price'=>$request->price,
                'id_category'=>$request->category,
                'id_cashier'=>$request->kasir
            ]);
            if($affected) return redirect('/')->with('status', 'Success');
            else return redirect('/')->with('status', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(DB::delete(
            'delete from product where product.id ='.$id
        )) return redirect('/')->with('status', 'Success');
        else return redirect('/')->with('status', 'Error');
    }
}
