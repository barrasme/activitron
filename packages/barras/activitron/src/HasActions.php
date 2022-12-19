<?php

namespace Barras\Activitron;

use Illuminate\Support\Facades\Event;

trait HasActions
{
    /**
     * @return void
     */
    public static function bootHasActions():void
    {
        static::created(function($model){
            Action::insert($model, 'create');
        });
        static::updating(function($model){
            Action::insert($model, 'update');
        });
        static::deleting(function($model){
            Action::insert($model, 'delete');
        });
    }

}
