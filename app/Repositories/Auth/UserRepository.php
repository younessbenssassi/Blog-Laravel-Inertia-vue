<?php

namespace App\Repositories\Auth;

use App\Models\Auth\User;

class UserRepository
{
    /**
     * Find a user by ID.
     *
     * @param int $id
     * @return User|null
     */
    public function find(int $id): ?User
    {
        return User::find($id);
    }

    /**
     * Create a new user .
     *
     * @param array $data
     * @return User
     */
    public function store(array $data): User
    {
        $user = new User();
        $user->fill($data);
        $user->save();

        return $user;
    }

    /**
     * Update an existing user.
     *
     * @param User $user
     * @param array $data
     * @return void
     */
    public function update(User $user, array $data): void
    {
        $user->fill($data);
        $user->save();
    }

    /**
     * Delete an existing user .
     *
     * @param User $user
     * @return void
     */
    public function delete(User $user): void
    {
        $user->delete();
    }
}
