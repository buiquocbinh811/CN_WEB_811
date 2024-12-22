<?php
namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $config;
    public $items;
    
    public function __construct($table, $items)
    {
        $this->config = config("table-config.$table");
        $this->items = $items;
    }

    public function render()
    {
        return view('components.data-table');
    }
}