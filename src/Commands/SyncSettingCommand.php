<?php

namespace Rakhasa\LaravelUtility\Commands;

use Illuminate\Console\Command;
use Rakhasa\LaravelUtility\Models\Setting;

class SyncSettingCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:setting {--reset}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'synchronize setting in config with database';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $total = 0;

        if ($this->option('reset')) {
            Setting::truncate();
        }

        foreach (config('setting.list') as $groups) {

            foreach ($groups as $key => $value) {
                Setting::firstOrCreate(['key' => $key], ['value' => $value[1]]);
                $total++;
            }

        }

        $this->info("Sync {$total} setting complete.");
    }
}
