<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
Use App\Models\TaskComment;

class Task extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'user_id',
        'created_by',
        'feature_id',
        'status',
        'project_id',
        'title',
        'closed'
    ];
    /**
     * Return Status name of status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function currentstatus()
    {
        return $this->HasOne(Status::class, "id", 'status');
    }

    /**
     * Selects user related to task
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function owner()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    /**
     * Shows all Comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(TaskComment::class);
    }

}
