<?php
/**
 * Feature Model
 *
 * Feature Model is the model which communicates between database and classes
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

use Illuminate\Database\Eloquent\Model;

/**
 * Model Feature
 *
 * @category  Model
 * @package   App\Models
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
class Feature extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body', "user_id", "project_id"
    ];

    /**
     * Selects user related to project
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
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
        if (!$total) {
            return 0;
        }

        return round($taskComplete/$total*100, '1');
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
}
