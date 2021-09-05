<?php
/**
 * Calculate days in 12 months with special year
 *
 * @param string $year
 * @param null $getMonth
 *
 * @return array
 * @author quoc_thinh
 * @since  2018-12-05
 */

use App\Models\Language\Language;
use Illuminate\Support\Facades\App;
use Modules\Common\Repositories\NotificationRepository;
use Modules\Common\Services\NotificationService;
use Modules\Setting\Facade\Setting;
use App\Models\Setting\SettingDetails;
use Modules\Core\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Helpers\CollectionHelper;
use Modules\ManageOvertimeDayoff\Traits\LeaveTypeEnum;

if (!function_exists('daysInMonthByYear')) {
    function daysInMonthByYear($year, $getMonth = null)
    {
        if (!$year) {
            return [];
        }

        $totalMonth = 12;
        $totalDayList = [];

        if ($getMonth) {
            return $getMonth == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($getMonth - 1) % 7 % 2 ? 30 : 31);
        }

        for ($i = 1; $i <= $totalMonth; $i++) {
            // calculate number of days in a month
            $totalDayList[$i] = $i == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($i - 1) % 7 % 2 ? 30 : 31);
        }

        return $totalDayList;
    }
}

if (!function_exists('timezone_offset_string')) {
    function timezone_offset_string($localTimeZone)
    {
        $offset = timezone_offset_get(new DateTimeZone($localTimeZone), new DateTime());
        return sprintf("%s%02d:%02d", ($offset >= 0) ? '+' : '-', abs($offset / 3600), abs($offset % 3600));
    }
}
if (!function_exists('roundToNumber')) {
    function roundToNumber($number, $to) {
        if($to != 0) {
            if($to > 0)
                return ceil($number/$to) * $to;
            else
                return floor($number/abs($to)) * abs($to);
        }
        return round($number, DEFAULT_ROUND_NUMBER);
    }
}

if (!function_exists('object_only')) {
    function object_only($object, $arr) {
        return array_combine($arr,array_map(function($item) use($object){
            if(method_exists($object,'getAttributeValue'))
                return $object->getAttributeValue($item);
            else
                return object_get($object,$item);
        },$arr));
	}
}
if (!function_exists('user_get')) {
    function user_get($key = null) {
        $user = null;
        if(Auth::check())
            $user = Auth::user();
        if(!is_null($key) && !is_null($user))
            return object_get($user,$key);
        return $user;
    }
}
if (!function_exists('user_can')) {
    function user_can($action) {
        return (Auth::check() && Auth::user()->can($action));
    }
}
if (!function_exists('time_to_sec')) {
    function time_to_sec($time) {
        return strtotime($time) - strtotime('00:00:00');
    }
}
if (!function_exists('time_to_hour')) {
    function time_to_hour($time) {
        return time_to_sec($time) / 3600;
    }
}
if (!function_exists('vn_to_str')) {
	function vn_to_str ($str){
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
			'd'=>'đ',
			'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			'i'=>'í|ì|ỉ|ĩ|ị',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			'D'=>'Đ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
		);

		foreach($unicode as $nonUnicode => $uni){
			$str = preg_replace("/($uni)/i", $nonUnicode, $str);
		}
		// $str = str_replace(' ','_',$str);
		return $str;
	}
}
if (!function_exists('getNumberNegative')) {
    function getNumberNegative($number) {
        return $number < 0 ? 0 : $number;
    }
}
