<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Test;
use App\Cart;
use App\User;
use App\Order;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;

class TestController extends Controller
{
    public function getIndex()
    {
        $tests = Test::all();
        return view('test.index', ['tests' => $tests]);
    }

    public function getAddToCart(Request $request, $id)
    {
        $test = Test::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($test, $test->id);
        $request->session()->put('cart', $cart);        
        return redirect()->route('test.shoppingCart');
    }
    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart'); 
        }
        return redirect()->route('test.shoppingCart');
    }
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0)
        {
            Session::put('cart', $cart);
        }
        else
        {
            Session::forget('cart'); 
        }
        
        return redirect()->route('test.shoppingCart');
    }

    public function getCart()
    {
        if(! Session::has('cart')){
            return view('shop.shopping-cart');
            }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['tests' => $cart->items, 'totalPrice'=>$cart->totalPrice]);
    }

    public function getCheckout()
    {
        if(! Session::has('cart')){
            return view('shop.shopping-cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $total = $cart->totalPrice;
            return view('shop.checkout',['total'=>$total]);

    }
    public function postCheckout(Request $request)
    {
        if(! Session::has('cart')){
            return redirect()->route('shop.shopping-cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            Stripe::setApiKey('sk_test_51H1X5xCRNbVdL6qcPDR4e76wKwJNe6gq3NJ6vKh9bVEQLVkhLgtA9UVKxTbdgTHq1puZFsCNY5Lwd2R1b3vmSiJq00naJc2ott');
            
            try
            {
               $charge = Charge::create(array(
                    "amount" => $cart->totalPrice * 100,
                    "currency" => 'zar',
                    "source" => 'tok_mastercard',
                    "description" => 'Test charge'
                ));
                $order = new Order();
                $order->cart = serialize($cart);
                $order->address = $request->input('address');
                $order->name = $request->input('name');
                $order->payment_id = $charge->id;
                Auth::user()->orders()->save($order);

            } 
            catch(\Exception $e)
            {
                return redirect()->route('checkout')->with('error', $e->getMessage());
            }          
            Session::forget('cart');
            return redirect()->route('test.index')->with('success','Successfully ordered Test(s)');        

    }


    
}
