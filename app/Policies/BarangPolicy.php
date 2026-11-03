<?php

namespace App\Policies;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BarangPolicy
{
    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Barang $barang): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Barang $barang): bool
    {
        return false;
    }

    public function delete(User $user, Barang $barang): bool
    {
        return false;
    }

    public function restore(User $user, Barang $barang): bool
    {
        return false;
    }

    public function forceDelete(User $user, Barang $barang): bool
    {
        return false;
    }
}
