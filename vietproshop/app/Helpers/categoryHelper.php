<?php 

if(!function_exists("categoryHelper")){
    function categoryHelper($category, $parent, $char, $parent_id_chir){
        foreach($category as $cat){
            if($cat["parent"] == $parent){
                if($cat["id"] == $parent_id_chir){
                    echo "<option value ='".$cat["id"]." 'selected>".$char.$cat["name"]."</option>";
                }else{
                    echo "<option value ='".$cat["id"]."'>".$char.$cat["name"]."</option>";
                }
                $new_parent = $cat["id"];
                categoryHelper($category, $new_parent, $char."|--- ", $parent_id_chir );
            }
        }
    }
    function showCategory($category, $parent, $char){
        foreach($category as $cat){
            if($cat["parent"] == $parent){
                echo  '<div class="item-menu"><span>'.$char.$cat["name"].'</span>
                            <div class="category-fix">
                                <a class="btn-category btn-primary" href="/admin/category/edit/'.$cat["id"].'"><i class="fa fa-edit"></i></a>
                                <a class="btn-category btn-danger" href="/admin/category/delete/'.$cat["id"].'"><i class="fas fa-times"></i></i></a>

                            </div>
                        </div>';
                $new_parent = $cat["id"];
                showCategory($category, $new_parent, $char."|--- ");
            }
        }
    }
}
                                       

?>