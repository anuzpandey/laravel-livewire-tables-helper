<?php

namespace AnuzPandey\LaravelLivewireTablesHelper\Commands;

use Illuminate\Console\Command;

class LaravelLivewireTablesHelperCommand extends Command
{
    public $signature = 'laravel-livewire-tables-helper';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
