<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Item;
use Auth;

class ItemRepository extends AbstractRepository implements ItemRepositoryInterface {

    protected $model = Item::class;
    
    
    public function all(string $column ='id',string $order='ASC'){
        return $this->model->where('user_id',Auth::user()->id)->orderBy($column, $order)->get();
    }

    public function paginate(int $paginate = 10,string $column ='id',string $order='ASC'){
        return $this->model->where('user_id',Auth::user()->id)->orderBy($column, $order)->paginate($paginate);
    }
    
} 


?>