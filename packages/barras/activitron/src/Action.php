<?php

namespace Barras\Activitron;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $guarded = [];

    /**
     * @param $model
     * @param $action
     * @return void
     */
    public static function insert($model, $action = null)
    {
        $a = new Action();

        $user = Auth::user();

        if(isset($user)){
            $a->performer_id = $user->id;
        } else {
            $a->performer_id = 1;
        }
        $a->subject = class_basename($model);
        $a->subject_id = $model->id;
        $a->action = $action;
        $a->detail = serialize($model->getDirty());

        $a->save();
    }

}
