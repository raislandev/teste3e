<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ItemRepositoryInterface;
use App\Item;

class ItemRepository extends AbstractRepository implements ItemRepositoryInterface {

    protected $model = Item::class;
    
    
    
    
} 


?>