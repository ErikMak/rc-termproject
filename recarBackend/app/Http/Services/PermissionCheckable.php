<?php
namespace App\Http\Services;

interface PermissionCheckable {
    public function canDelete($object) : bool;
}
