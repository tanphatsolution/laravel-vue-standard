<?php

namespace App\Traits\Jobs;

use App\Eloquent\Notification;
use Illuminate\Database\Eloquent\Model;
use Auth;

trait NotificationTrait
{
	public function notification(Model $item, $receiverId, $text = null, $icon = null, $route = null)
    {
        if (!property_exists($this, 'ableAuthGuard') || !$this->ableAuthGuard) {
            $this->ableAuthGuard = 'backend';
        }
        $guard = $this->ableAuthGuard;
        $senderId = (Auth::guard($guard)->check()) ? Auth::guard($guard)->user()->id : 0;
        if (!$route) {
            $route = route('backend.' . strtolower(class_basename($item)) . '.show', $item->id);
        }
        $notification = app(Notification::class)->create([
                            'name' 			=> $item->name,
                            'text' 			=> ($text) ? $text : "You have notify from {$name}",
                            'icon' 			=> ($icon) ? $icon : 'fa-clock-o',
                            'guard' 		=> $guard,
                            'sender_id' 	=> $senderId,
                            'receiver_id' 	=> $receiverId,
                            'url' 			=> parse_url($route, PHP_URL_PATH),

                        ]);

        return $notification;
    }
}