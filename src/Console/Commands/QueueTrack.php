<?php
namespace Jrquick\QueueCommands\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class QueueTrack extends Command {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'queue:track {--queue=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Track the queue size.';

    private $previousCount = 0;

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
        $queue = $this->option('queue');

        if (!is_null($queue)) {
            $queues = explode(',', $queue);

            $count = count($queues);
            if ($count === 0) {
                $this->error("Queue is required.");

                return;
            } else {
                $this->info("Tracking queue(s): ");
            }

            $this->info("Total\tChange");

            $this->track($queues);
        }
    }

    public function track($queues) {
        $currentCount = 0;
        foreach ($queues as $queue) {
            $currentCount += Queue::size($queue);
        }

        $currentCountLength = strlen($currentCount);
        $paddingCount = 5 - $currentCountLength;

        $countString = $currentCount;
        if ($paddingCount > 0) {
            $countString = $countString . str_repeat(" ", $paddingCount);
        }

        $dots = $currentCount / 125;

        $difference = 0;
        if (isset($this->previousCount) && $this->previousCount > 0) {
            $difference = $currentCount - $this->previousCount;
        }

        $differenceString = $difference;

        $bufferSize = 4 - strlen($difference);
        if ($bufferSize > 0) {
            $differenceString .= str_repeat(" ", $bufferSize);
        }

        if ($difference > 0) {
            $differenceString = '+' . $differenceString;
        } else {
            if ($difference < 0) {
                $differenceString = '' . $differenceString;
            } else {
                $differenceString = " " . $differenceString;
            }
        }

        $this->info($countString . " \t" . $differenceString . "\t" . str_repeat('.', $dots));

        $this->previousCount = $currentCount;

        sleep(3);

        $this->track($queues);
    }
}
