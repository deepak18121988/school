<?php

namespace SpondonIt\FCM;

use GuzzleHttp\Client;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

/**
 * Class FcmNotificationServiceProvider.
 */
class FcmNotificationServiceProvider extends ServiceProvider
{
    /**
     * Register.
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('fcm', function () {
                return new FcmChannel();
            });
        });
    }
}
