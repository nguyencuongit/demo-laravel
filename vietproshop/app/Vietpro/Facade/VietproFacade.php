<?php 
namespace App\Vietpro\Facade;
use Illuminate\Support\Facades\Facade;

class VietproFacade{
    protected static function getFacadeAccessor(){
        return "vietpro";
    }
}

?>