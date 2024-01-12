<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StudentFeePayment;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentFeePaymentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the studentFeePayment can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the studentFeePayment can view the model.
     */
    public function view(User $user, StudentFeePayment $model): bool
    {
        return true;
    }

    /**
     * Determine whether the studentFeePayment can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the studentFeePayment can update the model.
     */
    public function update(User $user, StudentFeePayment $model): bool
    {
        return true;
    }

    /**
     * Determine whether the studentFeePayment can delete the model.
     */
    public function delete(User $user, StudentFeePayment $model): bool
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
     * Determine whether the studentFeePayment can restore the model.
     */
    public function restore(User $user, StudentFeePayment $model): bool
    {
        return false;
    }

    /**
     * Determine whether the studentFeePayment can permanently delete the model.
     */
    public function forceDelete(User $user, StudentFeePayment $model): bool
    {
        return false;
    }
}
