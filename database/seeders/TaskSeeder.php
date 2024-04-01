<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("tasks")->insert([
            'name' => 'Họp nhóm',
            'deadline' => '2024-10-12 09:35:40',
            'status'=> 'Chưa thực hiện',
            'deleted'=> 'false',
        ]);
    }
}
