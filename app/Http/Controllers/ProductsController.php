<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\User;
class ProductsController extends Controller
{
    public function index()
    {
    $products = Product::all();
    return view('index', compact('products'));
    return view('/', compact('products'));
    return view('home', compact('products'));
    $products = Product::orderBy('created_at','asc')->get();
    return view('products.index')->with('products',$products);
    }

   
    public function addToCart($id,$name)
        {
            $product = Product::find($id);
           

            if(!$product) {
     
                abort(404);
     
            }
            $cart = session()->get('cart');

           
            // if cart is empty then this the first product
            if(!$cart) {

                $cart = [
                        $id => [
                            "name" => $product->name,
                            "quantity" => 1,
                            "price" => $product->price,
                            "photo" => $product->photo
                        ]
                ];
     
                session()->put('cart', $cart);
               
              
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }
     
            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {
     
                $cart[$id]['quantity']++;
     
                session()->put('cart', $cart);
     
                return redirect()->back()->with('success', 'Product added to cart successfully!');
     
            }
     
            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "photo" => $product->photo
            ];
     
            session()->put('cart', $cart);
            //$car=new Cart();
         
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    
public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
           
            session()->flash('success', 'Cart updated successfully');
        
         
        }
    }
 
    public function removefromCart(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
    [
        'name' => 'required',
        'description' => 'required',
        'price' => 'required'
    ]);
       $product = new Product;
       $product->name= $request->input('name');
       $product->description= $request->input('description');
       $product->price= $request->input('price');
       $product->save();

       return redirect('/products')->with('success','Product Added');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
