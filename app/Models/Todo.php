<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedBy;
use App\Traits\Sluggable;
use Illuminate\Support\Facades\Auth;


class Todo extends Model
{
    use HasFactory, CreatedBy;


    public static function getTodos(){
        $todos = self::where('created_by', Auth::id())->get();
        return $todos;
    }
}
