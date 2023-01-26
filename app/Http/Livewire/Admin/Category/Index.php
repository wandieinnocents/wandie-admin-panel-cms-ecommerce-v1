<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;

    // delete with livewire
    public function deleteCategory($category_id){
        dd($category_id);
        $this->$category_id = $category_id;

    }


    // render index page
    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(20);

        return view('livewire.admin.category.index' , ['categories' => $categories]);
    }
}
