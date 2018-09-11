<?php
/**
 * Project Model
 *
 * Project Model is the model which communicates between database and classes
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to the MIT license
 * that is available through the world-wide-web at the following URI:
 * https://opensource.org/licenses/MIT
 *
 * @category  LaravelProject
 * @package   ProxCMS
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @version   SVN: $Id$
 * @link      https://github.com/marcelsanting/captainprox
 * @since     File available since Release 1.0.0
 */
namespace App\Models;

use App\User;
use App\models\Status;
use Illuminate\Database\Eloquent\Model;

/**
 * Model Project
 *
 * @category  Model
 * @package   App\Models
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
class Project extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', "user_id"
    ];

    /**
     * Selects user related to project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function owner()
    {
        return $this->hasOne('App\User', "id", "user_id");
    }

    /**
     * Returns all features related to project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    /**
     * Returns all tasks related to project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

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
     * Produces the percentage completed for the Project
     *
     * @return float|int
     */
    public function completed()
    {
        $total = $this->tasks()->count('id');
        $taskComplete = $this->hasMany(Task::class)
            ->where('closed', "=", '1')->count("closed");
        if (!$total) {
            return 0;
        }

        return round($taskComplete/$total*100, '1');
    }

}
