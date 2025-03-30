<?php

namespace App\Policies;

use App\Models\JobOffer;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobOfferPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        // Anyone can view job offers
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, JobOffer $jobOffer): bool
    {
        // Anyone can view a job offer
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Only users with 'create-job-offer' permission can create job offers
        return $user->hasPermissionTo('create-job-offer');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobOffer $jobOffer): bool
    {
        // Only users with 'create-job-offer' permission and are members of the organization
        return $user->hasPermissionTo('create-job-offer') && 
               $user->organizations()->where('organizations.id', $jobOffer->organization_id)->exists();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobOffer $jobOffer): bool
    {
        // Only users with 'create-job-offer' permission and are members of the organization
        return $user->hasPermissionTo('create-job-offer') && 
               $user->organizations()->where('organizations.id', $jobOffer->organization_id)->exists();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobOffer $jobOffer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobOffer $jobOffer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can request participation for the model.
     */
    public function request(User $user, JobOffer $jobOffer): bool
    {
        // السماح لجميع المستخدمين بتقديم طلب المشاركة طالما الفرصة متاحة
        return $jobOffer->status === 'متاحة';
    }
}
