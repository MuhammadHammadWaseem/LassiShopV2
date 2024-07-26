<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Events\NotificationCreate;
use App\Models\NotificationDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function fetchNotifications()
    {

        $notifications = DB::table('notification')
            ->select('*')
            ->join('notification_details', 'notification.id', '=', 'notification_details.notification_id')
            ->where('notification_details.user_id', Auth::user()->id)
            ->where('notification_details.status', 0)
            ->orderBy('notification.id', 'desc')
            ->get();


        $unreadNotificationsCount = NotificationDetail::where('user_id', Auth::user()->id)->where('status', 0)->count();

        return response()->json(['unreadNotificationsCount' => $unreadNotificationsCount, 'notifications' => $notifications,]);
    }

    public function fetchNotificationsMessage(Request $request)
    {
        $notificationDetailId = $request->id;
        $Details = NotificationDetail::with('notification')->where('id', $notificationDetailId)->where('user_id', Auth::user()->id)->first();
        $Details->status = 1;
        $Details->read_at = now();
        $Details->save();

        $notifications = DB::select(
            '
            SELECT *
            FROM notification
            INNER JOIN notification_details ON notification.id = notification_details.notification_id
            WHERE notification_details.user_id = ?
            AND status = 0
            ORDER BY notification.id DESC
            ',
            [Auth::user()->id]
        );
        $unreadNotificationsCount = NotificationDetail::where('user_id', Auth::user()->id)->where('status', 0)->count();

        event(new NotificationCreate($unreadNotificationsCount, $notifications));
        return response()->json(['notificationDetails' => $Details]);
    }

    public function markAllAsRead(Request $request)
    {
        // Logic to mark all notifications as read
        NotificationDetail::where('user_id', auth()->id())->update(['status' => 1]);
        return response()->json(['message' => 'All notifications marked as read'], 200);
    }
}
