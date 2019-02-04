<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Translate {
    protected $fillable=[
        'category_id',
        'title',
        'description',
        'price',
        'imgs',
        'priority',
        'meta_description',
        'meta_keywords',
        'quantity',
        'meta_title',
        'public',
        'active',
        'date'
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function getImages(){
        if (isset($this->imgs)){
            $imgs = json_decode($this->imgs, true);
            if(is_array($imgs)){
                foreach($imgs as $key => $img){
                    if(!is_array($img)){
                        $imgs[$key] = [
                            'min' => $img,
                            'full' => $img
                        ];
                    }
                }
            }
            return $imgs ?: [];
        }
        else{
            return [];
        }
    }
}
