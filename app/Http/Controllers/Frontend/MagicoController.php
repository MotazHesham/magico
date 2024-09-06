<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\MessageGeneration;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Services\OpenAIService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MagicoController extends Controller
{
    protected $openAIService;

    public function __construct(OpenAIService $openAIService)
    {
        $this->openAIService = $openAIService;
    }
    public function message_ai(Request $request){ 
        if(!tenant('canGenerate') || tenant('tokens') < 0){
            if(!tenant('canGenerate')){
                $errorMessage = 'You Are Disabled From Addeing messages';
            }else{
                $errorMessage = 'You do not have enough tokens to generate messages';
            }
            return response()->json(['error' => $errorMessage],403);
        }
        $full_message = $request->input('full_message');
        $shift_id = $request->shift_id; 
        $response = $this->openAIService->getResponse($full_message,$shift_id); 
        $messageGenerationId = $response['message_generation_id'];

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), ''); 
        
        $countryName = $response['order']->customer_address->country ?? null;
        $cityName = $response['order']->customer_address->city ?? null; 

        $country = Country::where('name',$countryName)->orWhere('predictions','LIKE', '%' . $countryName . '%')->first();
        $city = City::where('name',$cityName)->orWhere('predictions','LIKE', '%' . $cityName . '%')->first(); 

        foreach($response['order']->products as $key => $product){
            $fetchedProduct = Product::where('name',$product->product_name)->orWhere('predictions','LIKE', '%' . $product->product_name . '%')->first(); 
            $response['order']->products[$key]->product_id = $fetchedProduct ? $fetchedProduct->id : 0;
        }
        
        return view('frontend.messageGenerations.partials.result',compact('response','countries','cities','country','city','products','full_message','shift_id','messageGenerationId'));
    }

    public function storeOrder(StoreOrderRequest $request){
        
        $order = Order::create([ 
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'phone_number_2' => $request->phone_number_2,
            'shipping_address' => $request->shipping_address,
            'total_cost' => $request->total_cost, 
            'operating_status' => 'pending', 
            'shift_id' => $request->shift_id,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'district' => $request->district,
        ]);

        $details = [];
        foreach($request->products as $product){
            $fetchedProduct = Product::find($product['product_id']);
            $price = $fetchedProduct->price ?? 0;
            $details[] = [
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'size' => $product['size'],
                'colors' => implode(',',$product['colors']),
                'price' => $price,
                'total_cost' => $price * $product['quantity'],
                'order_id' => $order->id
            ]; 
        }

        OrderDetail::insert($details);

        $messageGeneration = MessageGeneration::find($request->message_generation_id);
        $messageGeneration->update(['order_id' => $order->id]);
        
        toast('تم أضافة الطلب بنجاح','success');
        return redirect()->route('frontend.message-generations.create');
    }
}
