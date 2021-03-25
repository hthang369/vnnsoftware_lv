<?php

namespace App\Models\Permission;

use Modules\Core\Entities\Concerns\HasTimezone;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasTimezone;

    public static function defaultPermissions()
    {
        $result = array();
        $sections =  config('permission.sections');
        $actions =  config('permission.actions');
        $sectionAction = config('permission.section_action');

        foreach ($sections as $section) {
            if (isset($sectionAction[$section['code']])) {
                foreach ($sectionAction[$section['code']] as $action) {
                    $result[] = $action . '_' . $section['code'];
                }
            } else {
                foreach ($actions as $action) {
                    $result[] = $action . '_' . $section['code'];
                }
            }
        }
        return $result;
    }
}
