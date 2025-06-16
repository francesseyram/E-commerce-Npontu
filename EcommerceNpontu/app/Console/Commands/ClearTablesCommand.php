<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearTablesCommand extends Command
{
    protected $signature = 'tables:clear';
    protected $description = 'Clear all records from database tables';

    public function handle()
    {
        if (!$this->confirm('Are you sure you want to clear all tables? This cannot be undone!')) {
            return;
        }

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Clear tables in correct order
        $tables = [
            'reviews',
            'order_items',
            'orders',
            'cart_items',
            'carts',
            'products',
            'categories',
            'users'
        ];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
            $this->info("Cleared table: {$table}");
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $this->info('All tables have been cleared successfully!');
    }
}
