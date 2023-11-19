<?php

namespace App\Repositories\General;

use App\Models\General\Subscription;
use Illuminate\Database\Eloquent\Collection;

class SubscriptionRepository
{
    /**
     * List all subscriptions
     *
     * @return Collection
     */
    public function all(): Collection
    {
        return Subscription::all();
    }

    /**
     * List paginate subscriptions
     *
     * @return mixed
     */
    public function list(): mixed
    {
        return Subscription::paginate(20);
    }

    /**
     * Find a subscription by ID.
     *
     * @param int $id
     * @return Subscription|null
     */
    public function find(int $id): ?Subscription
    {
        return Subscription::find($id);
    }

    /**
     * Create a new subscription .
     *
     * @param array $data
     * @return Subscription
     */
    public function store(array $data): Subscription
    {
        $subscription = new Subscription();
        $subscription->fill($data);
        $subscription->save();

        return $subscription;
    }

    /**
     * Delete an existing subscription.
     *
     * @param Subscription $subscription
     * @return void
     */
    public function destroy(Subscription $subscription): void
    {
        $subscription->delete();
    }
}
