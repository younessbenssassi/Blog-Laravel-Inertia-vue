<?php

namespace App\Listeners\General;

use App\Enums\Blog\PostStatus;
use App\Events\Blog\PostCreated;
use App\Jobs\Blog\SendNewPostMailJob;
use App\Services\General\SubscriptionService;

class SendNotificationEmail
{
    /**
     * Create the event listener.
     */
    public function __construct(public readonly SubscriptionService $subscriptionService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        if ($event->post?->status === PostStatus::Public) {
            dispatch(new SendNewPostMailJob($event->post, $this->subscriptionService));
        }
    }
}
