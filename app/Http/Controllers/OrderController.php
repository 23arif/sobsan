<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session;
use App\Mail\User_mail;
use App\Mail\Order_mail;
use App\Mail\test;

use Mail;
use Lang;
use Validator;


class OrderController extends Controller
{
    public function store(Request $request, $locale)
    {
        if (Auth::user()) {
            $products = Basket::where('user_id', Auth::user()->id)->get();
            $merge = Basket::select('*')
                ->join('products', 'basket.pr_id', '=', 'products.id')
                ->join('pr_translate', 'pr_translate.pr_id', '=', 'products.id')
                ->where('basket.user_id', Auth::id())
                ->where('pr_translate.lang', 'az')
                ->get();
        } else {
            $products = Basket::where('user_id', Session('uid'))->get();
            $merge = Basket::select('*')
                ->join('products', 'basket.pr_id', '=', 'products.id')
                ->join('pr_translate', 'pr_translate.pr_id', '=', 'products.id')
                ->where('basket.user_id', Session('uid'))
                ->where('pr_translate.lang', 'az')
                ->get();
        }


        $allOrders = json_encode($merge);
        $totalPrice = 0;
        for ($i = 0; $i < count($products); $i++) {
            $totalPrice += $products[$i]->getPrDetails->price * intval($products[$i]->quantity);
        }

        if ($totalPrice >= 50) {
            $delivery = 0;
        } else if(20< $totalPrice && $totalPrice <50) {
            $delivery = 5;
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'unvan' => 'required',
            'telefon' => 'required',
            'email' => 'required',
        ]);

        if ($validator->fails()) {
            return \Redirect::back()->with('sifarisE', __('esas.sifarisError'));
        }

        if (Auth::user()) {
            $orderCompleted = Order::create([
                'name' => $request['name'],
                'address' => $request['unvan'],
                'city' => 'Bakı',
                'telefon' => $request['telefon'],
                'email' => $request['email'],
                'user_id' => Auth::id(),
                'total_price' => $totalPrice,
                'delivery_price' => $delivery,
                'order_type' => $request['orderType'],
                'order_no' => Auth::id().date('his'),
                'orders' => $allOrders,
            ])->id;

            $details = [
                    'company_name' => Auth::user()->company_name,
                    'name'=>$request['name'],
                    'address'=>$request['unvan'],
                    'city' => 'Bakı',
                    'telefon'=>$request['telefon'],
                    'email'=>$request['email'],
                    'total_price'=>$totalPrice,
                    'delivery_price'=>$delivery,
                    'order_type' => $request['orderType'],
                    'order_no' => Auth::id().date('his'),
                    'orders' => json_decode($allOrders)
                ];

                    $email = 'info@los.az';
                Mail::to($email)->send(new Order_mail($details));
                Mail::to($request['email'])->send(new Order_mail($details));



        } else {
            $checkUser = User::where('email', $request['email'])->first();
            if ($checkUser) {
                $orderCompleted = Order::create([
                    'name' => $request['name'],
                    'address' => $request['unvan'],
                    'city' => 'Bakı',
                    'telefon' => $request['telefon'],
                    'email' => $request['email'],
                    'user_id' => $checkUser->id,
                    'total_price' => $totalPrice,
                    'delivery_price' => $delivery,
                    'order_type' => $request['orderType'],
                    'order_no' => $checkUser->id.date('his'),
                    'orders' => $allOrders,
                ]);

                $details = [
                    'company_name' => $checkUser->company_name,
                    'name'=>$request['name'],
                    'address'=>$request['unvan'],
                    'city' => 'Bakı',
                    'telefon'=>$request['telefon'],
                    'email'=>$request['email'],
                    'total_price'=>$totalPrice,
                    'delivery_price'=>$delivery,
                    'order_type' => $request['orderType'],
                    'order_no' => $checkUser->id.date('his'),
                    'orders' => json_decode($allOrders)
                ];

                $email = 'info@los.az';
                Mail::to($email)->send(new Order_mail($details));
                Mail::to($request['email'])->send(new Order_mail($details));

            } else {
                $newPass =  'Sobsan'.Str::random(10);
                $confirm_code = Str::random(10);
                $newUser = User::create([
                    'company_name' => $request['companyName'],
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($newPass),
                    'address' => $request['unvan'],
                    'city' => 'Bakı',
                    'telefon' => $request['telefon'],
                    'confirm_code' => $confirm_code,
                ]);

                if ($newUser) {
                    $orderCompleted = Order::create([
                        'name' => $request['name'],
                        'address' => $request['unvan'],
                        'city' => 'Bakı',
                        'telefon' => $request['telefon'],
                        'email' => $request['email'],
                        'user_id' => $newUser->id,
                        'total_price' => $totalPrice,
                        'delivery_price' => $delivery,
                        'order_type' => $request['orderType'],
                        'order_no' => $newUser->id.date('his'),
                        'orders' => $allOrders,
                    ]);

                    $email = $request['email'];

                    $details = [
                        'login' => $request['email'],
                        'password' => $newPass,
                        'url' => url(Lang::getLocale().'/user_active/'.$confirm_code),
                    ];

                    Mail::to($request['email'])->send(new User_mail($details));


                    $details = [
                    'company_name' => $newUser->company_name,
                    'name'=>$request['name'],
                    'address'=>$request['unvan'],
                    'city' => 'Bakı',
                    'telefon'=>$request['telefon'],
                    'email'=>$request['email'],
                    'total_price'=>$totalPrice,
                    'delivery_price'=>$delivery,
                    'order_type' => $request['orderType'],
                    'order_no' => $newUser->id.date('his'),
                    'orders' => json_decode($allOrders)
                ];

                $email = 'info@los.az';
                Mail::to($email)->send(new Order_mail($details));
                Mail::to($request['email'])->send(new Order_mail($details));
                }
            }
        }
        if ($orderCompleted) {
            if (Auth::user()) {
                Basket::where('user_id', Auth::id())->delete();
            } else {
                Basket::where('user_id', Session('uid'))->delete();
            }
             if(isset($newUser)){
                 Auth()->login($newUser);
                return \Redirect::route(__('esas.sifarislerimRoute'),['locale'=>Session('lang')]);
            }elseif(isset($checkUser)){
                 Auth()->login($checkUser);
                return \Redirect::route(__('esas.sifarislerimRoute'),['locale'=>Session('lang')]);
            }
        }


        return \Redirect::route(__('esas.sifarislerimRoute'), ['locale' => Session('lang')])
            ->with('successOrder', __('esas.sifarisSuccess'));
    }

    public function index()
    {
        $orders = Order::where('destroy', 0)->orderByDesc('id')->paginate(15);
        // return $orders;
        return view('admin.orders_list', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::where('id', $id)->first();
        return view('admin.orders_show', compact('order'));
    }

    public function update($id,Request $request)
    {
       Order::where('id',$id)->update([
           'order_status'=>$request['order_status'],
           ]);
           Session::flash('message', 'Sifariş məlumatları dəyişdirildi.');
        return \Redirect::to('/order_list');
    }

    public function destroy($id)
    {
        if(Auth::user()){
        Order::where('id', $id)->update([
            'destroy' => 1
        ]);
        Session::flash('message', 'Sifariş uğurla silindi.');
        return \Redirect::to('/order_list');
        }else{
            abort(403, 'Unauthorized action.');
        }
    }
}
