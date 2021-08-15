<?php
namespace Jrquick\QueueCommands\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class QueueTestEvent implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable;

    private $ttl;

    public function __construct($ttl = null) {
        if (is_null($ttl)) {
            $ttl = 0;
        }

        $this->ttl = $ttl;
    }

    public function handle() {
        sleep($this->ttl);
    }
}
