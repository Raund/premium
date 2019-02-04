<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Translate {

    protected $table = "texts";

    protected $fields = [];

    protected $fillable = [
        'page_id',
        'name',
        'title',
        'type',
        'priority',
        'description',
        'lang_active'
    ];

    public function init(){
        $textsArray = $this->all();
        foreach($textsArray as $text){
            $desription = $text->getTranslate('description');
            //$this->fields[$text->id] = $desription;
            $this->fields[$text->name] = $desription;
        }
        return $this;
    }

    public function get($value){
        return isset($this->fields[$value]) ? $this->fields[$value] : $value;
    }

}
