<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Return Status name of status
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function currentstatus()
    {
        return $this->HasOne(Status::class, "id", 'status');
    }
}
