<?php
namespace app\Services;

interface PermissionCheckable {
    public function canDelete($object) : bool;
}
