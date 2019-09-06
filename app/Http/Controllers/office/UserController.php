<?php

namespace App\Http\Controllers\office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

use JsValidator;
use SWAL;  

class UserController extends Controller
{
    public $view;
    public $model;
    public $title;
    public $breadCrumbs;
    public $controller;

    public function __construct(User $model)
    {
        $this->model = $model;
        $this->view = 'office.user';
        $this->title = 'Pengguna';
        $this->validate = 'UserRequest';
        $this->controller = 'user';

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
            $datas  = $this->model->paginate(10);
        }else{
            $datas = $this->model->where('name', 'like', '%'.$search.'%')
                                 ->orWhere('email', 'like', '%'.strtolower($search).'%')
                                 ->paginate(10);
        }

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

        return view($this->view . '.create')->with(compact('data', 'validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();

        $input['name'] = ucwords($input['name']);
        $input['email'] = strtolower($input['email']);

        DB::beginTransaction();
        try {
            if($input['password_confirm'] != $input['password']){
                swal()->error($this->title, "Konfirmasi password tidak sesuai!");
                return redirect()->route($this->controller . '.create');
            }

            $input['password'] = Hash::make($request->password);
            unset($input['password_confirm']);
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
        $validator = JsValidator::formRequest('App\Http\Requests\\' . $this->validate);
        
        return view($this->view . '.edit')->with(compact('id', 'data', 'validator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $input = $request->all();
        $data = $this->model->findOrFail($id);

        DB::beginTransaction();
        try {
            if($input['password_confirm'] != $input['password']){
                swal()->error($this->title, "Konfirmasi password tidak sesuai!");
                return redirect()->route($this->controller . '.create');
            }
            $input['password'] = Hash::make($request->password);
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
