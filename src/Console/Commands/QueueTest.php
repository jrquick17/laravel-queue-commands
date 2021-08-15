<?php
namespace Jrquick\QueueCommands\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Jrquick\QueueCommands\Jobs\QueueTestEvent;

class QueueTest extends Command {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'queue:test {--queue=} {--delay=} {--repeat=} {--ttl=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add test event(s) to the queue.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle() {
        $queues = $this->option('queue');
        if (is_null($queues)) {
            $queues = ['default'];
        } else {
            $queues = explode(',', $queues);
        }

        $delay = $this->option('delay');
        if (is_null($delay)) {
            $delay = 0;
        }

        $repeat = $this->option('repeat');
        if (is_null($repeat)) {
            $repeat = 1;
        }

        $ttl = $this->option('ttl');

        for ($i = 0; $i < $repeat; $i++) {
            foreach ($queues as $queue) {
                $executeAt = Carbon::now()->addSeconds($delay * ($repeat + 1));

                QueueTestEvent::dispatch($ttl)
                    ->onQueue($queue)
                    ->delay($executeAt);
            }
        }
    }
}
