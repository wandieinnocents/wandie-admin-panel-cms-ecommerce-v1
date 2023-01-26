<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\withPagination;
use App\Models\Category;

class Index extends Component
{
    use withPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category:orderBy('id','DESC')->paginate(10);

        return view('livewire.admin.category.index' , ['categories' => $categories]);
    }
}
