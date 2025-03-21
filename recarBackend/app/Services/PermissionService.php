<?php
namespace app\Services;

use Illuminate\Support\Facades\Auth;

class PermissionService implements PermissionCheckable {
    public static function getInstance(): self {
        return new static();
    }

    public function canDelete($object): bool
    {
        $user = Auth::user();
        return $user && $object->user_id === $user->id;
    }
}
