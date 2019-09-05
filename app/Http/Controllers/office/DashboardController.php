<?php

namespace App\Http\Controllers\office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use View;

use App\Models\Item;

class DashboardController extends Controller
{
    // public $model_item;

    public function __construct(
        // Item $model_item
        )
    {
        // $this->model_item = $model_item;
        $this->view = '';
        $this->title = 'Dashboard';
        $this->validate = '';
        $this->controller = 'admin.dashboard';

        View::share('view', $this->view);
        View::share('controller', $this->controller);
        View::share('title', $this->title);
    }

    public function index() {
        View::share('breadcrumbs', [
            ['link' => route($this->controller. ".index"), 'text' => $this->title]
        ]);

        return view('office.dashboard.index');
    }
}
