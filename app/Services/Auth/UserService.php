<?php

namespace App\Services\Auth;


use App\Models\Auth\User;
use App\Repositories\Auth\UserRepository;

class UserService
{
    /**
     * @param UserRepository $userRepository
     */
    public function __construct(private readonly UserRepository $userRepository)
    {
    }


    /**
     * @param int $userId
     * @return User|null
     */
    public function find(int $userId): ?User
    {
        return $this->userRepository->find($userId);
    }

    /**
     * @param array $data
     * @return User
     */
    public function store(array $data): User
    {
        return $this->userRepository->store($data);
    }

    /**
     * @param User $user
     * @param array $data
     * @return void
     */
    public function update(User $user, array $data): void
    {
        $this->userRepository->update($user, $data);
    }

    /**
     * @param User $user
     * @return void
     */
    public function delete(User $user): void
    {
        $this->userRepository->delete($user);
    }
}
