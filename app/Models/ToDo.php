<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'to_do_list_id',
        'start',
        'end',
        'state',
    ];

    public function todolist()
    {
        return $this->belongsTo(ToDoList::class);
    }
}
