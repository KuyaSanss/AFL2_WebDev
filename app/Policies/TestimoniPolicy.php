<?php

namespace App\Policies;

use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TestimoniPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Testimoni $testimoni): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Testimoni $testimoni): bool
    {
        return false;
    }

    public function delete(User $user, Testimoni $testimoni): bool
    {
        return false;
    }

    public function restore(User $user, Testimoni $testimoni): bool
    {
        return false;
    }

    public function forceDelete(User $user, Testimoni $testimoni): bool
    {
        return false;
    }
}
