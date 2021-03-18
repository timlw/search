<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request){
		
		dd($request);
		
		$term = $this->searchTerm;
		
		if(empty($term)){
			
			$products = Product::with('tags')->get();
			
		} else {
			
			$products = Product::whereHas('tags', function($query) use ($term) {
			  $query->where('name', 'LIKE', "%".$term."%");
			})->orWhere('type', 'LIKE', "%".$term."%")->get();
			
		}
		
        return view('livewire.products', [
			'products' => $products,
			'term' => $term
		]);
		
    }
	
}
 