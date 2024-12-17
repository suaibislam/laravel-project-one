<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
  



    
     * Add a product to the cart.
     */
    public function addToCart(Request $request)
    {
        $id = $request->input('id');
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['total'] += $product->price;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'total' => $product->price,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }




    /**
     * Update the quantity of a product in the cart.
     */
    public function updateCart(Request $request)
    {
        $id = $request->input('id');
        $quantity = $request->input('quantity');
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            $cart[$id]['total'] = $cart[$id]['price'] * $quantity;
            session()->put('cart', $cart);
        }

        return response()->json(['cart' => $cart]);
    }


    /**
     * Remove a product from the cart.
     */
    public function removeFromCart(Request $request)
    {
        $id = $request->input('id');
        $cart = session()->get('cart', []);
        // Log::info("Request to remove item with ID: {$id}");
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        // Log::info("Updated Cart: ", $cart);

        return response()->json(['cart' => $cart]);
    }












    public function submitCart(Request $request)
    {
        $carts = $request->input('cart');
        $users= $request->input('user');

        // Save user details
        // $userId = \DB::table('productuser')->insertGetId([
        //     'name' => $user['name'],
        //     'address' => $user['address'],
        //     'phone' => $user['phone'],
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Save cart details
        // foreach ($cart as $item) {
        //     \DB::table('orders')->insert([
        //         'user_id' => $userId,
        //         'product_id' => $item['id'],
        //         'quantity' => $item['quantity'],
        //         'price' => $item['price'],
        //         'total' => $item['price'] * $item['quantity'],
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ]);
        // }

        // Respond with success message
        // return response()->json(['message' => 'Order submitted successfully!'], 200);

        return view('checkout.checkout', ['carts' => $carts, 'users'=> $users]);
    }



}
