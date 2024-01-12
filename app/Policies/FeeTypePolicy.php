<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FeeType;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeeTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the feeType can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the feeType can view the model.
     */
    public function view(User $user, FeeType $model): bool
    {
        return true;
    }

    /**
     * Determine whether the feeType can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the feeType can update the model.
     */
    public function update(User $user, FeeType $model): bool
    {
        return true;
    }

    /**
     * Determine whether the feeType can delete the model.
     */
    public function delete(User $user, FeeType $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the feeType can restore the model.
     */
    public function restore(User $user, FeeType $model): bool
    {
        return false;
    }

    /**
     * Determine whether the feeType can permanently delete the model.
     */
    public function forceDelete(User $user, FeeType $model): bool
    {
        return false;
    }
}
