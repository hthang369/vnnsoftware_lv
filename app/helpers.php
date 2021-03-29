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
if (!function_exists('checkOverLapping')) {
    /**
     * @param $from
     * @param $to
     * @param $currentFrom
     * @param $currentTo
     * @param bool $showinfo
     * @return array|bool
     */
    function checkOverLapping($from, $to, $currentFrom, $currentTo, $showinfo = false)
    {
        $data ['from_1'] = strtotime($from);
        $data ['to_1'] = strtotime($to);
        $data ['from_2'] = strtotime($currentFrom);
        $data ['to_2'] = strtotime($currentTo);

        if ($data ['from_1'] > $data ['to_1'] || $data ['from_2'] > $data ['to_2']) {
            return false;
        }

        $data_string ['string_from_1'] = date('H:i', $data ['from_1']);
        $data_string ['string_to_1'] = date('H:i', $data ['to_1']);
        $data_string ['string_from_2'] = date('H:i', $data ['from_2']);
        $data_string ['string_to_2'] = date('H:i', $data ['to_2']);


        // Sort data by value
        asort($data);

        $array_key = array_keys($data);

        // Check right index key
        if ($array_key == ['from_1', 'to_1', 'from_2', 'to_2'] || $array_key == ['from_2', 'to_2', 'from_1', 'to_1']) {
            // Nằm tách biệt nhau
            $flag_return = false;
        } elseif ($data_string['string_to_1'] == $data_string['string_from_2'] || $data_string['string_to_2'] == $data_string['string_from_1']) {
            // Nằm tách biệt nhau
            $flag_return = false;
        } else {
            // Nằm lồng nhau
            $flag_return = true;
        }

        //<editor-fold desc="Show info">
        if ($showinfo) {
            if ($array_key == ['from_1', 'to_1', 'from_2', 'to_2']) {
                $flag_sort = 'desc';
            } else {
                $flag_sort = 'asc';
            }

            $data_return = [];
            foreach ($array_key as $value) {
                $data_return[] = $data_string['string_' . $value];
            }

            if ($flag_return == true) {
                $max = array_last($data_return);
                $min = array_first($data_return);
            }


            $return = [
                'flag_sort' => $flag_sort,
                'info' => $array_key,
                'data' => $data_return,
                'min' => @$min,
                'max' => @$max,
                'flag' => $flag_return
            ];
            return $return;
        }
        //</editor-fold>

        return $flag_return;
    }
}
if (!function_exists('OrOverLapping')) {
    /**
     * @param $from
     * @param $to
     * @param $currentFrom
     * @param $currentTo
     * @param bool $showinfo
     * @return array|bool
     */
    function OrOverLapping($from, $to, $currentFrom, $currentTo)
    {
        $return = [];
        $data = checkOverLapping($from, $to, $currentFrom, $currentTo, true);

        switch ($data['flag']) {
            case true:
                $return[1]['from'] = $data['data'][0];
                $return[1]['to'] = $data['data'][3];
                break;
            case false:
                if ($data['data'][0] == '00:00' && $data['data'][1] == '00:00') {
                    $return[1]['from'] = $data['data'][2];
                    $return[1]['to'] = $data['data'][3];
                } else {
                    $return[1]['from'] = $data['data'][0];
                    $return[1]['to'] = $data['data'][1];
                    $return[2]['from'] = $data['data'][2];
                    $return[2]['to'] = $data['data'][3];
                }

                break;
        }
        return $return;
    }

}
if (!function_exists('AndOverLapping')) {

    function AndOverLapping($from, $to, $currentFrom, $currentTo)
    {
        $return = [];
        $data = checkOverLapping($from, $to, $currentFrom, $currentTo, true);

        switch ($data['flag']) {
            case true:
                $return[1]['from'] = $data['data'][1];
                $return[1]['to'] = $data['data'][2];
                $return[1]['type'] = 'working';
                break;
            case false:
                $return[1]['from'] = null;
                $return[1]['to'] = null;
                break;
        }
        return $return;
    }
}

if (!function_exists('is_inner_time')) {

    function isInnerTime($from, $to, $currentFrom, $currentTo)
    {
        //<editor-fold desc="Reconvert format">
        $from = date('H:i', strtotime($from));
        $to = date('H:i', strtotime($to));
        $currentFrom = date('H:i', strtotime($currentFrom));
        $currentTo = date('H:i', strtotime($currentTo));
        //</editor-fold>

        $data = checkOverLapping($from, $to, $currentFrom, $currentTo, true);

        if ($data['data'][0] == $currentFrom && $data['data'][3] == $currentTo) {
            return true;
        } else {
            return false;
        }
    }
}
if (!function_exists('randomtime')) {
    function randomtime($start_time, $end_time)
    {
        // Convert to timetamps
        $min = strtotime($start_time);
        $max = strtotime($end_time);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('H:i', $val);
    }
}

if (!function_exists('mergeTime')) {
    function mergeTime($TimeAndWithTypeJob, $WorkTimeBreak)
    {
        if (!(is_array($WorkTimeBreak) && is_array($TimeAndWithTypeJob))) {
            return;
        }
        $data = (array_merge($WorkTimeBreak, [$TimeAndWithTypeJob]));
        $tmp = [];

        // Đổ hết ra mảng tmp
        foreach ($data as $v) {
            $tmp[] = $v['from'];
            $tmp[] = $v['to'];
        }
        // Sắp xếp lại mảng tmp
        asort($tmp);
        $i = 0;

        // Set from của block đầu tiên
        $return[$i]['from'] = $TimeAndWithTypeJob['from'];
        foreach ($tmp as $v) {
            // Chặn đầu trên
            if (strtotime($v) <= strtotime($TimeAndWithTypeJob['from'])) {
                continue;
            }
            // Chặn đầu dưới
            if (strtotime($v) > strtotime($TimeAndWithTypeJob['to'])) {
                continue;
            }

            $return[$i]['to'] = $v;
            $return[$i + 1]['from'] = $v;

            $b = ['from' => $return[$i]['from'], 'to' => $return[$i]['to']];

            $return[$i]['type'] = $TimeAndWithTypeJob['type'];
            $i++;
        }
        unset($return[$i]);

        foreach ($return as &$value) {
            foreach ($WorkTimeBreak as $ValueWtb) {
                if (checkOverLapping($value['from'], $value['to'], $ValueWtb['from'], $ValueWtb['to'])) {
                    $value['type'] = $ValueWtb['type'];
                }
            }
        }
        return $return;
    }
}

if (!function_exists('sortByColumnFrom')) {
    function sortByColumnFrom(&$WorkTimeBreak)
    {
        if (is_array($WorkTimeBreak)) {
            usort($WorkTimeBreak,
                function ($a, $b) {
                    return strcmp($a['from'], $b['from']);
                }
            );
        }

    }
}

if (!function_exists('timezone_offset_string')) {
    function timezone_offset_string($localTimeZone)
    {
        $offset = timezone_offset_get(new DateTimeZone($localTimeZone), new DateTime());
        return sprintf("%s%02d:%02d", ($offset >= 0) ? '+' : '-', abs($offset / 3600), abs($offset % 3600));
    }
}

/**
 * @param $time
 * @return false|int
 */
if (!function_exists('countTime')) {
    function countTime($time)
    {
        $from = strtotime($time['from']);
        $to = strtotime($time['to']);
        $m = $to - $from;
        return $m;
    }
}

if (!function_exists('add_timestamp')) {
    function add_timestamp($data)
    {
        $dateTime = (new Carbon())->toDateTimeString();
        foreach ($data as &$item) {
            $item['created_at'] = $dateTime;
            $item['updated_at'] = $dateTime;
        }
        return $data;
    }
}

if (!function_exists('array_sum_by_key')) {
    function array_sum_by_key($array, $add)
    {
        $sum = $array;
        foreach ($add as $key => $value) {
            if (!isset($array[$key])) {
                $sum[$key] = $value;
            } else {
                $sum[$key] = $array[$key] + $value;
            }
        }
        return $sum;
    }
}

if (!function_exists('get_query')) {
    function get_query($query)
    {
        if (!is_array($query)) {
            $conditions = json_decode($query, true);
        } else {
            $conditions = $query;
        }
        return $conditions;
    }
}

if (!function_exists('get_format_date_by_setting')) {
    function get_format_date_by_setting($date)
    {
        if(empty($date) || $date === '-') return $date;
        $arr = ['Y/m/d','Y-m-d','m/d/Y','m-d-Y','d/m/Y','d-m-Y','Y-m-d'];
        $format = Setting::get('general','format_date','Y-m-d');
        $format = preg_replace(array('/YYYY/','/MM/','/DD/'),array('Y','m','d'),$format);
        return Carbon::parse($date)->format($format);
    }
}
if (!function_exists('get_format_date_time_by_setting')) {
    function get_format_date_time_by_setting($date,$time = 'H:i:s')
    {
        if(empty($date) || $date === '-') return $date;
        $arr = ['Y/m/d','Y-m-d','m/d/Y','m-d-Y','d/m/Y','d-m-Y','Y-m-d'];
        $format = Setting::get('general','format_date','Y-m-d');
        $format = preg_replace(array('/YYYY/','/MM/','/DD/'),array('Y','m','d'),$format);
        return Carbon::parse($date)->format($format .' '.$time);
    }
}

if (!function_exists('get_languages_translated')) {
    function get_languages_translated($groupName)
    {
        return $languages = Language::getTranslationsForGroup(App::getLocale(), $groupName);
    }
}
if (!function_exists('get_date_format_sql')) {
    function get_date_format_sql()
    {
        $format = Setting::get('general','format_date','%Y-%m-%d');
        return preg_replace(array('/YYYY/','/MM/','/DD/'),array('%Y','%m','%d'),$format);
    }
}
if (!function_exists('getClientIp')) {
    function getClientIp($isIp2Long = false) {
        $request = request();
        $ipAddress = $request->getClientIp();
        if($ipAddress === '::1') $ipAddress = gethostbyname($request->getHttpHost());
        if(boolval($isIp2Long))
            return ip2long($ipAddress);
        return $ipAddress;
    }
}
if (!function_exists('is_empty_or_null')) {
    function is_empty_or_null($string) {
        return empty($string) || is_null($string);
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
if (!function_exists('convert_time_to_sec')) {
    function convert_time_to_sec($time) {
        $seconds = 0;
        if(preg_match('/^\d+:([0-5]\d|\d)$/', $time)) {
            $timestamp = strtotime($time);
            if(is_empty_or_null($timestamp)) {
                $arr = explode(':', $time);
                if(count($arr) == 3) {
                    list($hour,$minute,$second) = $arr;
                    $seconds = ($hour * 3600) + ($minute * 60) + $second;
                } else if(count($arr) == 2) {
                    list($hour,$minute) = $arr;
                    $seconds = ($hour * 3600) + ($minute * 60);
                }
            } else {
                $seconds = $timestamp - strtotime('00:00:00');
            }
        }
        return $seconds;
    }
}
if (!function_exists('convert_sec_to_time')) {
    function convert_sec_to_time($seconds, $format = 'H:i:s') {
        $times = date($format, 0);
        if(is_numeric($seconds)) {
            if($seconds >= (24 * 3600)) {
                $hour = floor($seconds / 3600);
                $minute = floor($seconds / 60 % 60);
                $second = floor($seconds % 60);
                if($format == 'H:i:s')
                    $times = sprintf('%02d:%02d:%02d', $hour, $minute, $second);
                else
                    $times = sprintf('%02d:%02d', $hour, $minute);
            } else {
                $times = date($format, $seconds);
            }
        }
        return $times;
    }
}
if (!function_exists('get_query_request')) {
    function get_query_request($name) {
        return data_get(get_query(request()->input('query')), $name);
    }
}
if (!function_exists('roundAutoNumber')) {
    function roundAutoNumber($number, $round = null) {
        $round_number = is_null($round) ? ROUND_NUMBER['ONE_NUMBER'] : $round;
        $delimiter = filter_var($number, FILTER_VALIDATE_INT) ? ROUND_NUMBER['NONE'] : $round_number;
        return round($number, $delimiter);
    }
}
if (!function_exists('getNumberNegative')) {
    function getNumberNegative($number) {
        return $number < 0 ? 0 : $number;
    }
}

if (!function_exists('getNotificationOfEmployee')) {
    function getLeaveTypeDefaults() {
        return CollectionHelper::getConstantsByClass(LeaveTypeEnum::class);
    }
}

/*===============================================
 * Notification Helpers
 *===============================================*/
if (!function_exists('getNotificationOfEmployee')) {
    function getNotificationOfEmployee($employee_id) {
        $service = resolve(NotificationService::class);
        return $service->getListByEmployeeId($employee_id);
    }
}

if (!function_exists('pushNotification')) {
    function pushNotification($notification) {
        $repository = resolve(NotificationRepository::class);
        return $repository->insert($notification);
    }
}
