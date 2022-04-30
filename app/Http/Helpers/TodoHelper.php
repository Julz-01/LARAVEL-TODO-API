<?php

namespace App\Http\Helpers;

use App\Models\Todo;

class TodoHelper
{
    public static function setDone($id)
    {
        $todo = Todo::find($id);
        $todo->status = 'Done';
        $todo->save();

        return $todo;
    }
}
