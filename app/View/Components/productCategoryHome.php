<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;

class productCategoryHome extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

   
    public function render(): View|Closure|string
    {

        $args_category=[
            ['status','=',1],
            ['parent_id','=',0],

        ];
        $category_list=Category::where( $args_category)
        ->orderBy('sort_order','asc')->get();
        return view('components.product-category-home',compact('category_list'));
    }
}




// namespace App\View\Components;

// use Closure;
// use Illuminate\Contracts\View\View;
// use Illuminate\View\Component;
// use App\Models\Category;

// class productCategoryHome extends Component
// {
//     public $categoryList; // Public property to hold categories

//     public function __construct()
//     {
//         // Constructor logic if needed
//     }

//     public function render(): View|Closure|string
//     {
//         // Retrieve categories with status = 1 and parent_id = 0
//         $this->categoryList = Category::where('status', 1)
//             ->where('parent_id', 0)
//             ->orderBy('sort_order', 'asc')
//             ->with('products') // Eager load products relationship
//             ->get();

//         return view('components.product-category-home', [
//             'categoryList' => $this->categoryList,
//         ]);
//     }
// }
















