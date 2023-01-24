<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function readFoodId($id)
    {
        $food = Food::find($id);
        return response()->json(['Food'=>$food], 200);
    }

    public function readFood()
    {
        return Food::all();
    }

    public function createFood(Request $request)
    {
        $data = $request->all();
        try {
            $food = new Food();
            $food-> food_brand=$data['food_brand'];
            $food-> food_price=$data['food_price'];
            $food-> food_description=$data['food_description'];
            $food-> url_image=$data['url_image'];
            
            $food->save();
            $status='BERHASIL.. BERHASIL';
            return response()->json(compact('status', 'food'), 200);
        } catch (\Throwable $th) {
            $status='YAH.. GAGAL';
            return response()->json(compact('status', 'th'), 401);
        }
    }
}
