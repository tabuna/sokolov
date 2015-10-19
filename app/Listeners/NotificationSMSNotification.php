<?php

namespace App\Listeners;

use App\Events\NewOrder;
use App\Events\Notification;
use App\Models\Task;
use Config;
use SMS;

class NotificationSMSNotification
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
     * @param  NewOrder $event
     * @return void
     */
    public function handle(Notification $event)
    {
        SMS::send(Config::get('link.phone'), 'Задача #' . $event->id . ' выла взята в работу');

        $Task = Task::findOrFail($event->id);
        $User = $Task->getUser()->select('phone_notification', 'phone')->first();
        if ($User->phone_notification) {
            SMS::send($User->phone, 'Ваш заказ #' . $event->id . ' ожидает рассмотрения');
        }
    }
}
