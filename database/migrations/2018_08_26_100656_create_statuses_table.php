<?php
/**
 * CreateStatusesTable
 *
 * The Database objects which Creates all the tables
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
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateStatusesTable
 *
 * @category  Migration
 * @package   Database\Migrations
 * @author    Original Author <author@example.com>
 * @author    Marcel Santing <marcel@prox-web.nl>
 * @copyright 2018 Prox-Web
 * @license   https://opensource.org/licenses/MIT  MIT License
 * @link      https://github.com/marcelsanting/captainproxessionController
 */
class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->char('title');
                $table->char('belongs_to')->default('all');;
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
