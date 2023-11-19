<?php

namespace App\Services\General;


use App\Models\General\Subscription;
use App\Repositories\General\SubscriptionRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class SubscriptionService
{
    /**
     * @param SubscriptionRepository $subscriptionRepository
     */
    public function __construct(private readonly SubscriptionRepository $subscriptionRepository)
    {
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->subscriptionRepository->all();
    }

    /**
     * @return mixed
     */
    public function list(): mixed
    {
        return $this->subscriptionRepository->list();
    }

    /**
     * @param int $subscriptionId
     * @return Subscription|null
     */
    public function find(int $subscriptionId): ?Subscription
    {
        return $this->subscriptionRepository->find($subscriptionId);
    }

    /**
     * @param array $data
     * @return Subscription
     */
    public function store(array $data): Subscription
    {
        $data['user_id'] = Auth::id();
        return $this->subscriptionRepository->store($data);
    }

    /**
     * @param Subscription $subscription
     * @return void
     */
    public function destroy(Subscription $subscription): void
    {
        $this->subscriptionRepository->destroy($subscription);
    }
}
