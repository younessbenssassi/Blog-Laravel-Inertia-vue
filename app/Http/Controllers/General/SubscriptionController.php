<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\General\StoreSubscriptionRequest;
use App\Models\General\Subscription;
use App\Services\General\SubscriptionService;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    /**
     * @param SubscriptionService $subscriptionService
     */
    public function __construct(
        private readonly SubscriptionService $subscriptionService
    )
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubscriptionRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSubscriptionRequest $request): RedirectResponse
    {
        $this->subscriptionService->store($request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subscription $subscription
     * @return RedirectResponse
     */
    public function destroy(Subscription $subscription): RedirectResponse
    {
        $this->subscriptionService->destroy($subscription);
        return back();
    }
}
