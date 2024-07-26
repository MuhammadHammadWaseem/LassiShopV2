<?php

namespace App\Providers;

use Config;
use App\utils\helpers;
use App\Models\Setting;
use App\Models\Notification;
use App\Events\NotificationCreate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try {
            $helpers           = new helpers();
            $currency          = $helpers->Get_Currency();
            $symbol_placement  = $helpers->get_symbol_placement();
            $settings          = Setting::where('deleted_at', '=', null)->first();
            // $notifications = Notification::with('NotificationDetail')
            // // ->where('notification_details.user_id', auth()->user()->id)
            // ->orderBy('id', 'desc')
            // ->get();

            // $notifications = DB::select('select * from `notification` INNER JOIN notification_details ON notification_details.notification_id = notification_details.id where notification_details.user_id = ?', [Auth::user()->id]);
            // event(new NotificationCreate($notifications));
                
            View::share([
                'settings'         => $settings,
                'currency'         => $currency,
                'symbol_placement' => $symbol_placement
                // 'notifications' => $notifications
            ]);
        } catch (\Exception $e) {

            return dd($e);
        }

        Schema::defaultStringLength(191);
        if (isset($_COOKIE['language'])) {
            App::setLocale($_COOKIE['language']);
        } else {
            App::setLocale('en');
        }
    }
}
