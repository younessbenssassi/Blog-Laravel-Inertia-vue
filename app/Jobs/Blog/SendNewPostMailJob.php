<?php

namespace App\Jobs\Blog;

use App\Mail\Blog\NewPostMail;
use App\Models\Blog\Post;
use App\Services\General\SubscriptionService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewPostMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Post $post,
        public $subscriptionService
    )
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscriptions = $this->subscriptionService->all();

        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new NewPostMail($this->post));
        }
    }
}
