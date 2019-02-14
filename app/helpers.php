<?php

function getIdByName($id,$table,$column, $column2){
    $query = DB::table($table)
        ->where($column, '=', $id)
        ->select($column2)
        ->first();
    return $query->$column2;
}

function getserviceCategory(){
    return DB::table('service_categories')->get();
}

function getserviceSubcategory(){
    return DB::table('service_subcategories')->get();
}