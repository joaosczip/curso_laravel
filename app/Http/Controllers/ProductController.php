<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Product::all();
        dd($produtos);
        //return view('products.index')->with('produtos', $produtos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Brand::all();
        return view('products.create')->with('marcas', $marcas)
            ->with('categorias', Category::all());
    }

    public function relacionaCategorias(int $id)
    {
        $produto = Product::find($id);
        $categorias = Category::paginate(10);
        return view('products.product-categories')
            ->with('produto', $produto)
            ->with('categorias', $categorias);
    }

    public function relacionarComCategorias(Request $request, int $id)
    {
        $produto = Product::find($id);
        $categorias = Category::find($request->category_id);
        $produto->categories()->attach($categorias);
        return redirect()->route('produtos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        $validator = \Validator::make($dados, [
            'name' => 'required|string',
            'description' => 'required|string',
            'amount' => 'required|numeric',
            'price' => 'required|numeric',
            'brand_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        Product::create($dados);
        return redirect()->route('produtos.index')->with(['sucesso' => 'Produto adicionado com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Product::find($id);
        return $produto;
        //$marcas = Brand::all();
        //return view('products.edit')->with('produto', $produto)
        //->with('marcas', $marcas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Product::find($id);
        $produto->update([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'price' => $request->price,
            'brand_id' => $request->brand_id,
        ]);

        return redirect()->route('produtos.index')->with(['success' => 'Produto alterado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Product::find($id);
        try {
            $produto->delete();
            return redirect()->back()->with(['sucesso' => 'Produto apagado com sucesso!']);
        } catch (\Exception $e) {
            $e->getMessage();
        }
    }
}
