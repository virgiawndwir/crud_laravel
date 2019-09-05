<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait Updater
{
    protected static function boot()
    {
        parent::boot(); /* * During a model create Eloquent will also update the updated_at field so * need to have the updated_by field here as well * */
        static::creating(function ($model) {
            $model->created_by = @Auth::user()->name;
            $model->updated_by = @Auth::user()->name;
        });

        static::updating(function ($model) {
            @$model->updated_by = @Auth::user()->name;
        });
        
        static::deleting(function ($model) {
            $model->deleted_by = @Auth::user()->name;
            $model->save();
        });
    }
}