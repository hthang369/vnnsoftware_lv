<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait SortTrait {

    /**
     * @param Request $request
     * @return string
     */
    public function getSortConditionFromUrl(Request $request) : string{
        $string = preg_match('/[^\/]*$/', $request->getUri(), $matches);
        return  $matches[0];
    }
}
