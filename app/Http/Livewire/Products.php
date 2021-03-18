<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Products as Product;

class Products extends Component
{
	
	public $searchTerm;
	
    public function render()
    {
		
		$q = $this->searchTerm;
		
		if(empty($q)){
			
			$products = Product::with('tags')->get();
			
		} else {
			
			$products = Product::with('tags')->where(function($query) use ($q) {
					
				$q = explode(" ", $q);
				foreach($q as $t){
					$query->orWhere('name', 'LIKE', "%".$t."%");
					$query->orWhere('tagged', 'LIKE', "%".$t."%");
					$query->orWhere('type', 'LIKE', "%".$t."%");
				}
			  
			})->get();
				
			
		}
		
        return view('livewire.products', [
			'products' => $products,
			'term' => $q
		]);
		
    }
	
	
	
	
}
