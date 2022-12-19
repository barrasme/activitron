<?php

namespace Barras\Activitron;

use Illuminate\Support\Facades\Event;

trait PerformsActions
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity()
    {
        return $this->hasMany(Action::class, 'subject_id');
    }

}
