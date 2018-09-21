<?php

use Illuminate\Database\Seeder;
Use App\Models\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $open = new Status();
        $open->title = 'Open';
        $open->save();
        $Closed = new Status();
        $Closed->title = 'Closed';
        $Closed->save();
        $progress = new Status();
        $progress->title = 'In progress';
        $progress->save();
        $testing = new Status();
        $testing->title = 'In Testing';
        $testing->save();

    }
}
