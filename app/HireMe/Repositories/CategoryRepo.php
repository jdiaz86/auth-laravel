<?php

namespace HireMe\Repositories;

use HireMe\Entities\Category;
use HireMe\Repositories\BaseRepo;

class CategoryRepo extends BaseRepo{

    public function getModel()
    {
        return new Category;
    }


    public function getList()
    {
        return Category::lists('name','id');
    }
}