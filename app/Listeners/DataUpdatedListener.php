<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\DataUpdate;
use Kreait\Firebase\Database;


class DataUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(DataUpdate $event)
{
    $database = app(Database::class);
    $database->getReference('/isGateOpen')->set($event->data);
}
}
