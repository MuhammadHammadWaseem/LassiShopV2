<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;


class NotificationCreate implements ShouldBroadcast
{ 
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $unreadNotifications;
    public $notifications;

    public function __construct($unreadNotifications, $notifications)
    {
        $this->unreadNotifications = $unreadNotifications;
        $this->notifications = $notifications;
    }
    public function broadcastOn()
    {
        return ['notification-show'];
    }

    public function broadcastAs()
    {
        return 'notification-show';
    }
}
