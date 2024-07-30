<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

class Permissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Use this command to create or update permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $arrPermission = config('rolePermissions.permissions');
        // create if not exists
        foreach ($arrPermission as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission['name']],
                $permission
            );
            $this->info('Permission created: ' . $permission['name']);
        }

        return Command::SUCCESS;

    }
}
