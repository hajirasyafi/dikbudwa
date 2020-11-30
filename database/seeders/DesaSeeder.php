<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path       = getcwd().'/database/seeders/desas.sql';
        $database   = config('database.connections.mysql.database');
        $user       = config('database.connections.mysql.username');
        $pass       = config('database.connections.mysql.password');

        $this->command->info($database);
        $this->command->info($user);
        $this->command->info($pass);

        $command    = "mysql -u $user -p$pass $database < $path";
        exec($command);
    }
}
