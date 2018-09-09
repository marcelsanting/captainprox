<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    /**
     * Shows all tasks related to the feature
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Produces the percentage completed for the Project
     *
     * @return float|int
     */
    public function completed()
    {
        $total = $this->tasks()->count('id');
        $taskComplete = $this->hasMany(Task::class)
            ->where('closed', "=", '1')->count("closed");
        return $taskComplete/$total*100;
    }
}
