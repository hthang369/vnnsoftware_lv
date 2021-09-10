<?php

namespace App\Services;

class LakaLogService
{
    public function filesFilterByDate($files, $dtFrom, $dtTo) {
        foreach ($files->all() as $key => $value) {
            $temp = explode(".", $value);
            $date = $temp[1] . '-' . $temp[2] . '-' . $temp[3];
            if($dtFrom > $date || $date > $dtTo){
                array_splice($files->all(),$key,1);
            }
        }
        return $files;
    }
}
