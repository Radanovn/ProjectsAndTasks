<?php

namespace Database\Seeders;

use App\Models\ProjectStatus;
use Illuminate\Database\Seeder;

class ProjectsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new ProjectStatus();
        $status->alias = 'new';
        $status->name = 'NEW';
        $status->save();

        $status = new ProjectStatus();
        $status->alias = 'pending';
        $status->name = 'PENDING';
        $status->save();

        $status = new ProjectStatus();
        $status->alias = 'failed';
        $status->name = 'FAILED';
        $status->save();

        $status = new ProjectStatus();
        $status->alias = 'done';
        $status->name = 'DONE';
        $status->save();
    }
}
