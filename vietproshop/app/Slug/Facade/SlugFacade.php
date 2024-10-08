<?php 
namespace App\Slug\Facade;

use Illuminate\Support\Facades\Facade;


class SlugFacade{
    protected static function getFacadeAccessor(){
        return "slug";
    }
}


?>