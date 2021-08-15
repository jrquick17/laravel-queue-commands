<?php
namespace Jrquick\QueueCommands;

use Illuminate\Support\ServiceProvider;
use Jrquick\QueueCommands\Console\Commands\QueueCount;
use Jrquick\QueueCommands\Console\Commands\QueueTest;
use Jrquick\QueueCommands\Console\Commands\QueueTrack;

class QueueCommandsProvider extends ServiceProvider {
    public function boot() {
        if ($this->app->runningInConsole()) {
            $this->commands([
                QueueCount::class,
                QueueTest::class,
                QueueTrack::class,
            ]);
        }
    }
}
