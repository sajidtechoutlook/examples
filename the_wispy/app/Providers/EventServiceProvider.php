<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Auth\Listeners\WelcomeMail;
use Illuminate\Auth\Events\AgantRegisterEvent;
use Illuminate\Auth\Listeners\AgentEmailListner;
use Illuminate\Auth\Listeners\NotifyAdminEmailListner;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        SendEmailToUsersZEvent::class => [
            \App\Listeners\SendEmailToUsersListener::class,
            // \App\Listeners\RegisterCustomerToNewsletter::class,
            // \App\Listeners\NotifyAdminViaSlack::class,
        ],
        AgantRegisterEvent::class => [
            AgantRegisterEvent::class,
            NotifyAdminEmailListner::class
        ]   

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
