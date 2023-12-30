<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'books';
    protected $allowedFields    = ['title', 'author', 'isbnNo','status'];

    public function getBook(){
        return $this->orderBy('id','desc')->findAll();
    }

    public function updateBooks($id){
        return $this->where('id', $id)->first();

    }
}