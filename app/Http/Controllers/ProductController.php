<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::all();
        return view('home',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(auth('provider')->user()) {
            $data = $request->all();
            if ($request->hasFile('photo')) {
                request()->validate([
                    'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $imageName = time() . '.' . $request->photo->getClientOriginalExtension();
                $request->photo->move(public_path('images'), $imageName);
                $data['photo'] = $imageName;
            }
            $data['provider_id'] = auth('provider')->user()->id;
            Product::create($data);
            return redirect('provider/home')->with('success', 'Product Added Successfully!');
        }
        return redirect('provider/home')->with('error', 'You do not have a permission!');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function showProduct($id)
    {
        $product = Product::find($id);
        return view('product-details', compact('product'));
    }
    public function addToCart($id)
    {
        if(auth('client')->user()) {
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
                        'unit'=>$product->unit,
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
                'unit'=>$product->unit,
                "price" => $product->price,
                "photo" => $product->photo
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }
        return redirect('/home')->with('error', 'You do not have a permission!');
    }

    public function cart()
    {
        $cart = array();
        if(session()->has('cart'))
            $cart = session()->get('cart');

        $total = 0;

        foreach ($cart as $k=>$prduct) {
                $total+=($prduct['price']*$prduct['quantity']);

        }
        return view('client.cart', compact('cart', 'total'));
    }
}
