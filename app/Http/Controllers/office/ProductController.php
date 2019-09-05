<?php

namespace App\Http\Controllers\office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Hash;
use App\Helpers\General;

use JsValidator;
use SWAL;
use Carbon\Carbon;
use Charts;

class ProductController extends Controller
{
    public $view;
    public $model;
    public $title;
    public $breadCrumbs;
    public $controller;

    public function __construct(Product $model)
    {
        $this->model = $model;
        $this->view = 'office.product';
        $this->title = 'Produk';
        $this->validate = 'ProductRequest';
        $this->controller = 'product';

        View::share('view', $this->view);
        View::share('controller', $this->controller);
        View::share('title', $this->title);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        View::share('breadcrumbs', [
            ['link' => route($this->controller. ".index"), 'text' => $this->title],
            ['link' => route($this->controller. ".create"), 'text' => 'Tambah ' . $this->title]
        ]);

        $search = ucwords($request->search);

        if (empty($search)) {
            $datas  = $this->model->paginate(5);
        }else{
            $datas = $this->model->where('name', 'like', '%'.$search.'%')
                                 ->paginate(5);
        }

        // $get = Carbon::now();
        // $d = $get->month;
        // if($d % 2 == 0){
        //     $tg = [];
        //     for($i = 1; $i <= 30; $i++){
        //         $tg[] = $i;
        //     }
        // }else{
        //     $tg = [];
        //     for($i = 1; $i <= 31; $i++){
        //         $tg[] = $i;
        //     }
        // }
        // return $data;

        return view($this->view . '.index', compact(['datas', 'search']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        View::share('breadcrumbs', [
            ['link' => route($this->controller. ".index"), 'text' => $this->title],
            ['link' => route($this->controller. ".create"), 'text' => 'Tambah ' . $this->title, 'class' => 'active']
        ]);

        $data = [];
        $data = (object)$data;
        $validator = JsValidator::formRequest('App\Http\Requests\\' . $this->validate);
        // $parents = $this->model->whereParentId(0)->get();

        return view($this->view . '.create')->with(compact('data', 'validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $input = $request->all();

        DB::beginTransaction();
        try {

            $save = $this->model->create($input);
            DB::commit();
            
            swal()->success($this->title, $this->title . ' berhasil disimpan!');
            return redirect()->route($this->controller . '.index');
        } catch (\Exception $e) {
            return $e;
            DB::rollback();

            swal()->error($this->title, $e->getMessage());
            return redirect()->route($this->controller . '.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        View::share('breadcrumbs', [
            ['link' => route($this->controller. ".index"), 'text' => $this->title],
            ['link' => route($this->controller. ".edit", $id), 'text' => 'Ubah ' . $this->title, 'class' => 'active']
        ]);

        $data = [];
        $data = (object) $this->model->findOrFail($id);
        // dd($data);
        $validator = JsValidator::formRequest('App\Http\Requests\\' . $this->validate);
        // $parents = $this->model->whereParentId(0)->get();
        
        return view($this->view . '.edit')->with(compact('id', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->model->findOrFail($id);

        DB::beginTransaction();
        try {
            $image = $request->file('image');
            if($image) {
                if(General::existsImg($data->image)) {
                    General::destroyImg($data->image);
                }
                
                $input['image'] = General::setImage($image, $input['title'], 'activity_images');    
            }

            $data->fill($input)->save();
            DB::commit();

            swal()->success($this->title, $this->title. ' berhasil diubah!');
            return redirect()->route($this->controller. '.index');
        } catch (\Exception $e) {
            DB::rollback();

            swal()->error($this->title, $e->getMessage());
            return redirect()->route($this->controller. '.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->model->findOrFail($id);
        
        DB::beginTransaction();
    	try{
            if(General::existsImg($data->image)) {
                General::destroyImg($data->image);
            }

            $data->delete();
            DB::commit();
            
            swal()->success($this->title, $this->title . ' berhasil dihapus!');

            return redirect()->route($this->controller.'.index');
        }catch(\Exception $e) {
            swal()->error($this->title, $e->getMessage());

    		DB::rollback();
    	}
        
        return redirect()->back();
    }
}
