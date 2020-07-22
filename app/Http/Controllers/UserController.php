<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    private $router = "users";
    private $paginate =6;
    private $search = ['name']; 
    private $model;

    public function __construct(UserRepositoryInterface $model){
       $this->model = $model;
    } 

    
    public function index(Request $req)
    {
        $columnList = ['name'=>'Nome','email'=>'email'];  

        $search = '';
        if(isset($req->search)){
          $search = $req->search;
          $list = $this->model->findWhereLike($this->search, $search,'name','ASC');
        }else{
          $list = $this->model->paginate($this->paginate,'name','ASC');
        }

        $page = "Lista de usuários";

        $routerName = $this->router;
        
       
        return view('admin.'.$routerName.'.index', compact('list','search','routerName','columnList','page'));
        
    }

    
    public function create()
    {
        $routerName = $this->router;
        $page = "Adicionar Usuário";

        return view('admin.'.$routerName.'.create', compact('routerName','page'));

    }

    
    public function store(Request $request)
    {
        $data = $request->all();

        Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ])->validate();

        if($this->model->create($data)){
            $request->session()->flash('msg', 'Registro adicionado com sucesso');
            $request->session()->flash('status', 'success');// success error notification
            return redirect()->back();
        }else{
            $request->session()->flash('msg', 'erro ao adicionar um registro');
            $request->session()->flash('status', 'error');
            return redirect()->back();

        }


    }

   
    public function show($id, Request $req)
    {
        $routerName = $this->router;
        $register = $this->model->find($id);

         if($register){
            $page2 = "Detalhes";

            $delete = false;
            if($req->delete ?? false){
                $req->session()->flash('msg','Que realmente deletar esse registro?');
                $req->session()->flash('status', 'error');
                $delete = true;
            }

            return view('admin.'.$routerName.'.show', compact('routerName','page2','register','delete'));  
         }

         return redirect()->route($routerName.'.index');
    }

    
    public function edit($id)
    {
        $routerName = $this->router;
        $register = $this->model->find($id);


         if($register){
            $page2 = "Editar Usuário";

            return view('admin.'.$routerName.'.edit', compact('routerName','page2','register'));  
         }

         return redirect()->route($routerName.'.index');

        
    }

    
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if(!$data['password']){
            unset($data['password']);
        }

        Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255:unique:users,email'.$id,
            'password' => 'sometimes|required|string|min:6|confirmed',
        ])->validate();
        
        if(isset($data['password'])){
            $data['password']= Hash::make($data['password']);
        }

        if($this->model->update($data,$id)){
            $request->session()->flash('msg', 'Registro atualizado com sucesso');
            $request->session()->flash('status', 'success');// success error notification
            return redirect()->back();
        }else{
            $request->session()->flash('msg', 'erro ao atualizar o registro');
            $request->session()->flash('status', 'error');
            return redirect()->back();

        }
    }

   
    public function destroy($id, Request $request)
    {
        if($this->model->delete($id)){
            $request->session()->flash('msg', 'Registro excluido com sucesso');
            $request->session()->flash('status', 'success');// success error notification
        }else{
            $request->session()->flash('msg', 'erro ao excluir o registro');
            $request->session()->flash('status', 'error');
        }

        $routerName = $this->router;
        return redirect()->route($routerName.'.index');
    }
}