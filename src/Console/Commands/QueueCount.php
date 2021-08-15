<?php
namespace Jrquick\QueueCommands\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Queue;

class QueueCount extends Command {
    protected $signature = 'queue:count {--queue=}';

    protected $description = 'Count the number of items in the queue(s)';

    public function handle() {
        $queue = $this->option('queue');

        if (is_null($queue)) {
            $message = 'Your queues count: ';

            $this->info($message . Queue::size());
        } else {
            $queues = explode(',', $queue);

            foreach ($queues as $queue) {
                $message = "The '$queue' queue size is: ";

                $this->info($message . Queue::size($queue));
            }
        }
    }
}
