<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Order;
use App\PrColors;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        if(PrColors::where('pr_id', $request['pr_id'])->first()){
            $defaultColorForPr = PrColors::where('pr_id', $request['pr_id'])->first()->color_id;
        }else{
            $defaultColorForPr = null;
        }

        if ($request['color_id']) {
            $checkPr = Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id'], 'pr_color' => $request['color_id']])->first();
            $checkPrV2 = Basket::where(['user_id' => Session('uid'), 'pr_id' => $request['pr_id'], 'pr_color' => $request['color_id']])->first();
        } else {
            $checkPr = Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id'], 'pr_color' => $defaultColorForPr])->first();
            $checkPrV2 = Basket::where(['user_id' => Session('uid'), 'pr_id' => $request['pr_id'], 'pr_color' => $defaultColorForPr])->first();
        }

        if ($request['descQuantity']) {
            if (Auth::user()) {
                if ($checkPr) {
                    $checkPr->update([
                        'quantity' => intval($checkPr->quantity) + intval($request['descQuantity'])
                    ]);
                } else {
                    Basket::create([
                        'user_id' => Auth::id(),
                        'pr_id' => $request['pr_id'],
                        'quantity' => $request['descQuantity'],
                        'pr_color' => $request['color_id'],
                    ]);
                    return response('yox');
                }
            } else {
                if ($checkPrV2) {
                    $checkPrV2->update([
                        'quantity' => intval($checkPrV2->quantity) + intval($request['descQuantity'])
                    ]);
                } else {
                    Basket::create([
                        'user_id' => Session('uid'),
                        'pr_id' => $request['pr_id'],
                        'quantity' => $request['descQuantity'],
                        'pr_color' => $request['color_id'],
                    ]);
                    return response('yox');
                }
            }
        } elseif ($request->orderAgain) {
            $orders = Order::where('id', $request['pr_id'])->first()->orders;
            foreach (json_decode($orders) as $order) {

                if (PrColors::where('pr_id', $order->pr_id)->first()) {
                    $defaultColorForPr = PrColors::where('pr_id', $order->pr_id)->first()->color_id;
                } else {
                    $defaultColorForPr = null;
                }

                if ($request['color_id']) {
                    $checkPr = Basket::where(['user_id' => Auth::id(), 'pr_id' => $order->pr_id, 'pr_color' => $order->pr_color])->first();
                } else {
                    $checkPr = Basket::where(['user_id' => Auth::id(), 'pr_id' => $order->pr_id, 'pr_color' => $defaultColorForPr])->first();
                }

                if ($checkPr) {
                    $checkPr->update([
                        'quantity' => intval($checkPr->quantity) + intval($order->quantity)
                    ]);
                } else {
                    Basket::create([
                        'user_id' => Auth::id(),
                        'pr_id' => $order->pr_id,
                        'quantity' => $order->quantity,
                        'pr_color' => $order->pr_color,
                    ]);
                }
            }
            if (!$checkPr) {
                return response()->json(['check' => 'yox', 'qty' => count(json_decode($orders))]);
            }
        }elseif($request['type'] == 'discountPr'){
             $pr = Products::where('id', $request['pr_id'])->first();

            if (Auth::user()) {
                if ($checkPr) {
                    $checkPr->update([
                        'quantity' => $checkPr->quantity + 1
                    ]);
                     $total = Basket::where('user_id', Auth::id())->get();
                    $totalPrice = 0;
                    for ($i = 0; $i < count($total); $i++) {
                        $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
                    }
                    return response(['pr_id'=>$request['pr_id'],'totalPrice' => $totalPrice]);
                } else {
                    Basket::create([
                        'user_id' => Auth::id(),
                        'pr_id' => $request['pr_id'],
                        'quantity' => $request['quantity'],
                        'pr_color' => $defaultColorForPr,
                    ]);
                    $item = '';
                    $item .= '<tr id="' . $request['pr_id'] . '">';
                    $item .= '<td class="product-image">';
                    $item .= '<a href="' . route(__('esas.prDescRoute'), ['locale' => Session('lang'), 'slug' => $pr->getPr->where('lang', Session('lang'))->first()->slug]) . '">';
                    $item .= '<img src="' . asset('/public/Products/' . $pr->blog_img) . '"alt="product" style="margin-right: 10px"></a></td><td class="product-name">';
                    $item .= '<span class="item-key lg-hidden">' . __('esas.mehsulAdi') . ': </span><span class="item-value">' . ucfirst($pr->getPr->first()->title) . '</span></td><td class="product-price"><span class="item-key lg-hidden">';
                    $item .= '' . __('esas.mehsulQiymət') . ': </span><span class="amount">';
                    $item .= '' . number_format($pr->price, 2) . ' AZN</span></td><td class="product-quantity"><span class="item-key lg-hidden">';
                    $item .= '' . __('esas.mehsulSayi') . ': </span> <input type="number" min="1" class="prQty" value="' . $request['quantity'] . '" onchange=\'changeQty(this,"' . $pr->id . '","' . $defaultColorForPr . '")\'></td>';
                    $item .= '<td class="product-subtotal my-product-total"><span class="item-key lg-hidden">' . __('esas.mehsulReng') . ': </span>';
                    if (count($pr->getPrColors)) {
                        $item .= '<select name="pr_color" id="colorSelect" style="width: 70%;margin:0 auto" onchange=\'changeColor(this,"'.$pr->id . '","' . $defaultColorForPr . '")\'>';
                        foreach ($pr->getPrColors as $k => $color) {
                            $item .= '<option value="' . $color->getColors->id . '"';
                            if ($pr->pr_color == $color->getColors->id) {
                                $item .= 'selected';
                            }
                            $item .= '>';
                            if (Session('lang') == 'az') {
                                $item .= '' . ucfirst($color->getColors->color_n_az) . '';
                            } elseif (Session('lang') == 'en') {
                                $item .= '' . ucfirst($color->getColors->color_n_en) . '';
                            } elseif (Session('lang') == 'ru') {
                                $item .= '' . ucfirst($color->getColors->color_n_ru) . '';
                            }
                            $item .= '</option>';
                        }
                        $item .= '</select>';
                    } else {
                        $item .= '-';
                    }
                    $item .= '</td><td class="product-subtotal my-product-total"><span class="item-key lg-hidden">' . __('esas.cem') . ': </span>';
                    $item .= '<span class="item-value totalP">' . number_format($request['quantity'] * $pr->price, 2) . 'AZN </span></td><td class="remove-item">';
                    $item .= '<button class="btn-general lg-hidden my-product-remove" onclick=\'removePr("' . $pr->id . '","' . $defaultColorForPr . '",this)\'>' . __('esas.sil') . '</button>';
                    $item .= '<button class="xs-lg-hidden" onclick=\'removePr("' . $pr->id . '","' . $defaultColorForPr . '",this)\'> X </button></td></tr>';

                    $total = Basket::where('user_id', Auth::id())->get();
                    $totalPrice = 0;
                    for ($i = 0; $i < count($total); $i++) {
                        $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
                    }
                    return response(['yox' => 'yox', 'item' => $item,'totalPrice' => $totalPrice]);
                }
            } else {
                if ($checkPrV2) {
                    $checkPrV2->update([
                        'quantity' => $checkPrV2->quantity + 1
                    ]);
                    $total = Basket::where('user_id', Session('uid'))->get();
                    $totalPrice = 0;
                    for ($i = 0; $i < count($total); $i++) {
                        $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
                    }
                    return response(['pr_id'=>$request['pr_id'],'totalPrice' => $totalPrice]);
                } else {
                    Basket::create([
                        'user_id' => Session('uid'),
                        'pr_id' => $request['pr_id'],
                        'quantity' => $request['quantity'],
                        'pr_color' => $defaultColorForPr,
                    ]);
                    $item = '';
                    $item .= '<tr id="' . $request['pr_id'] . '">';
                    $item .= '<td class="product-image">';
                    $item .= '<a href="' . route(__('esas.prDescRoute'), ['locale' => Session('lang'), 'slug' => $pr->getPr->where('lang', Session('lang'))->first()->slug]) . '">';
                    $item .= '<img src="' . asset('/public/Products/' . $pr->blog_img) . '"alt="product" style="margin-right: 10px"></a></td><td class="product-name">';
                    $item .= '<span class="item-key lg-hidden">' . __('esas.mehsulAdi') . ': </span><span class="item-value">' . ucfirst($pr->getPr->first()->title) . '</span></td><td class="product-price"><span class="item-key lg-hidden">';
                    $item .= '' . __('esas.mehsulQiymət') . ': </span><span class="amount">';
                    $item .= '' . number_format($pr->price, 2) . ' AZN</span></td><td class="product-quantity"><span class="item-key lg-hidden">';
                    $item .= '' . __('esas.mehsulSayi') . ': </span> <input type="number" min="1" class="prQty" value="' . $request['quantity'] . '" onchange=\'changeQty(this,"' . $pr->id . '","' . $defaultColorForPr . '")\'></td>';
                    $item .= '<td class="product-subtotal my-product-total"><span class="item-key lg-hidden">' . __('esas.mehsulReng') . ': </span>';
                    if (count($pr->getPrColors)) {
                        $item .= '<select name="pr_color" id="colorSelect" style="width: 70%;margin:0 auto" onchange=\'changeColor(this,"'.$pr->id . '","' . $defaultColorForPr . '")\'>';
                        foreach ($pr->getPrColors as $k => $color) {
                            $item .= '<option value="' . $color->getColors->id . '"';
                            if ($pr->pr_color == $color->getColors->id) {
                                $item .= 'selected';
                            }
                            $item .= '>';
                            if (Session('lang') == 'az') {
                                $item .= '' . ucfirst($color->getColors->color_n_az) . '';
                            } elseif (Session('lang') == 'en') {
                                $item .= '' . ucfirst($color->getColors->color_n_en) . '';
                            } elseif (Session('lang') == 'ru') {
                                $item .= '' . ucfirst($color->getColors->color_n_ru) . '';
                            }
                            $item .= '</option>';
                        }
                        $item .= '</select>';
                    } else {
                        $item .= '-';
                    }
                    $item .= '</td><td class="product-subtotal my-product-total"><span class="item-key lg-hidden">' . __('esas.cem') . ': </span>';
                    $item .= '<span class="item-value totalP">' . number_format($request['quantity'] * $pr->price, 2) . 'AZN </span></td><td class="remove-item">';
                    $item .= '<button class="btn-general lg-hidden my-product-remove" onclick=\'removePr("' . $pr->id . '","' . $defaultColorForPr . '",this)\'>' . __('esas.sil') . '</button>';
                    $item .= '<button class="xs-lg-hidden" onclick=\'removePr("' . $pr->id . '","' . $defaultColorForPr . '",this)\'> X </button></td></tr>';

                     $total = Basket::where('user_id', Session('uid'))->get();
                    $totalPrice = 0;
                    for ($i = 0; $i < count($total); $i++) {
                        $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
                    }
                    return response(['yox' => 'yox', 'item' => $item,'totalPrice' => $totalPrice]);
                }
            }
        }
        else {
            if (Auth::user()) {
                if ($checkPr) {
                    $checkPr->update([
                        'quantity' => $checkPr->quantity + 1
                    ]);
                } else {
                    Basket::create([
                        'user_id' => Auth::id(),
                        'pr_id' => $request['pr_id'],
                        'quantity' => $request['quantity'],
                        'pr_color' => $defaultColorForPr,
                    ]);
                    return response('yox');
                }
            } else {
                if ($checkPrV2) {
                    $checkPrV2->update([
                        'quantity' => $checkPrV2->quantity + 1
                    ]);
                } else {
                    Basket::create([
                        'user_id' => Session('uid'),
                        'pr_id' => $request['pr_id'],
                        'quantity' => $request['quantity'],
                        'pr_color' => $defaultColorForPr,
                    ]);
                    return response('yox');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale)
    {
        // $request['pr_color'] = Colors::where('code',$request['pr_color'])->first()->id;
        if (Auth::user()) {
            if ($request['qty']) {
                Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->update([
                    'quantity' => $request['qty']
                ]);

                $total = Basket::where('user_id', Auth::id())->get();
                $totalPrice = 0;
                for ($i = 0; $i < count($total); $i++) {
                    $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
                }
                return response()->json(['ok' => 'ok', 'totalPrice' => $totalPrice]);
            } elseif ($request['chgColor']) {
//                if (Basket::where(['user_id' => , 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->first()) {
//                    return back();
//                } else {
//                    Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id']])->update([
//                        'pr_color' => $request['pr_color']
//                    ]);
//                }
                if (Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->first()) {
                    $getExist = Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->first();
                    $getExist->update([
                        'quantity' => intval($getExist->quantity) + intval($request['pr_qty'])
                    ]);
                    $oldPr = Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id'], 'pr_color' => $request['current_pr_color']])->first();
                    $oldPr->delete();
                    $total = Basket::where('user_id', Auth::id())->get();
                    $totalPrice = 0;
                    for ($i = 0; $i < count($total); $i++) {
                        $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
                    }
                    return response()->json(['colorChged' => 'ok', 'totalPrice' => $totalPrice, 'oldPrQty' => $oldPr->quantity, 'lastPr' => $getExist->id]);

                } else {
                    Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id'], 'pr_color' => $request['current_pr_color']])->update([
                        'pr_color' => $request['pr_color']
                    ]);
                }
            }
        } else {
            if ($request['qty']) {
                Basket::where(['user_id' => Session('uid'), 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->update([
                    'quantity' => $request['qty']
                ]);

                $total = Basket::where('user_id', Session('uid'))->get();
                $totalPrice = 0;
                for ($i = 0; $i < count($total); $i++) {
                    $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
                }
                return response()->json(['ok' => 'ok', 'totalPrice' => $totalPrice]);
            } elseif ($request['chgColor']) {
                if (Basket::where(['user_id' => Session('uid'), 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->first()) {
                    $getExist = Basket::where(['user_id' => Session('uid'), 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->first();
                    $getExist->update([
                        'quantity' => intval($getExist->quantity) + intval($request['pr_qty'])
                    ]);
                    $oldPr = Basket::where(['user_id' => Session('uid'), 'pr_id' => $request['pr_id'], 'pr_color' => $request['current_pr_color']])->first();
                    $oldPr->delete();
                    $total = Basket::where('user_id', Session('uid'))->get();
                    $totalPrice = 0;
                    for ($i = 0; $i < count($total); $i++) {
                        $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
                    }
                    return response()->json(['colorChged' => 'ok', 'totalPrice' => $totalPrice, 'oldPrQty' => $oldPr->quantity, 'lastPr' => $getExist->id]);

                } else {
                    Basket::where(['user_id' => Session('uid'), 'pr_id' => $request['pr_id'], 'pr_color' => $request['current_pr_color']])->update([
                        'pr_color' => $request['pr_color']
                    ]);
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $locale)
    {
        if (Auth::user()) {
            Basket::where(['user_id' => Auth::id(), 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->delete();
            $total = Basket::where('user_id', Auth::id())->get();
            $totalPrice = 0;
            for ($i = 0; $i < count($total); $i++) {
                $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
            }
            return response()->json(['ok' => 'ok', 'totalPrice' => $totalPrice]);
        } else {
            Basket::where(['user_id' => Session('uid'), 'pr_id' => $request['pr_id'], 'pr_color' => $request['pr_color']])->delete();
            $total = Basket::where('user_id', Session('uid'))->get();
            $totalPrice = 0;
            for ($i = 0; $i < count($total); $i++) {
                $totalPrice += $total[$i]->getPrDetails->price * intval($total[$i]->quantity);
            }
            return response()->json(['ok' => 'ok', 'totalPrice' => $totalPrice]);
        }
    }
}
