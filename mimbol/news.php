<?php
class news extends mysqlo{
    private $news
    function __construct($id=1;){
        $this->news = mysqlo::query("SELECT * FROM news WHERE id = :id",['id' => $id]);
    }
    function get(){
       return [
           'id' => $this->news['id'],
           'name' => $this->news['name'],
           'subtitle' => $this->news['subtitle'],
           'title' => $this->news['title'],
           'viawers' => $this->news['viawers'],
           'author' => $this->news['author']
       ];
    }
    
}