<?php

namespace Modules\Core\Tests;

use App\Models\User\User;
use Carbon\CarbonPeriod;
use Illuminate\Foundation\Testing\TestCase as LaravelTestCase;
use Illuminate\Support\Facades\DB;
use Modules\Core\Support\Carbon;
use Modules\Employee\Models\Employee\Employee;
use Modules\ManageOvertimeDayoff\Entities\JobTypeModel;
use Modules\ManageOvertimeDayoff\Services\WorkingTimeDetailFactory;
use Modules\Setting\Facade\Setting;
use Modules\Timestamp\Tests\TimestampTest;
use Tests\CreatesApplication;

abstract class BaseTestCase extends LaravelTestCase
{
    use CreatesApplication;

    const STATUS_SUCCESS = 200;
    const STATUS_CREATED = 201;
    const STATUS_UPDATED = 200;
    const STATUS_DELETED = 200;
    const STATUS_ERROR = 500;
    const STATUS_ERROR_VALIDATION = 403;
    const STATUS_UNAUTHORIZE = 403;
    const STATUS_INVALID_SPEC = 409;
    const STATUS_ERROR_UNPROCESS = 422;
    const STATUS_ERROR_NOT_FOUND = 404;

    protected $apiBaseUrl = 'api/v1';
    protected $apiModuleUrl;
    protected $url;

    protected function setUp()
    {
        $env = env('APP_ENV');

        if ($env != 'testing' || !file_exists('.env.testing')) {
            echo 'Environment is not "testing" or ".env.testing" file is missing.' . "\n" .
                'You can create ".env.testing" from ".env.testing.example"' . "\n" .
                'Exiting.';
            exit(1);
        }

        parent::setUp();

        $this->url = $this->apiBaseUrl . '/' . $this->apiModuleUrl;
        $this->withHeader('Accept', 'application/json');
    }

    protected function mockSetting($settings): void
    {
        foreach ($settings as $setting => $detail) {
            foreach ($detail as $key => $value) {
                Setting::shouldReceive('get')
                    ->with($setting, $key, \Mockery::any())
                    ->andReturn($value);
            }
        }

        Setting::shouldReceive('getLocalTimezone')
            ->andReturn('Asia/Ho_Chi_Minh');
    }

    protected function createUserAndLogin(): User
    {
        $employee = factory(Employee::class, 'attachJobType')->create();
        $user = $this->loginExistingEmployee($employee);

        return $user;
    }

    protected function loginExistingEmployee(Employee $employee)
    {
        $user = factory(User::class)->make();
        $user->employee_id = $employee->id;
        $user->save();
        $this->actingAs($user);

        return $user;
    }

    protected function prepareJobType($employeeAttachToJobType = [])
    {
        $job_type = [
            [
                "code_type_job"                    => "J1",
                "code_type_job_name"               => null,
                "type_job"                         => 0,
                "work_time_from"                   => "08:00:00",
                "work_time_to"                     => "17:00:00",
                "is_tomorrow_work_time"            => 0,
                "predefined_time"                  => null,
                "late_night_time_from"             => "22:00:00",
                "is_tomorrow_late_night_time_from" => 0,
                "late_night_time_to"               => "24:00:00",
                "is_tomorrow_late_night_time_to"   => 0,
                "work_time_law"                    => 1,
                "work_time_late_night"             => 1,
                "late_time"                        => 1,
                "limit_time"                       => 1,
                "work_time_amount"                 => 1,
                "holiday_amount"                   => null,
                "day_off_have_salary"              => 0,
                "day_off_no_salary"                => null,
                "show_break_time"                  => 1,
                "status"                           => 1,
                "sequence"                         => 1,
            ],
            [
                "code_type_job"                    => "J2",
                "code_type_job_name"               => null,
                "type_job"                         => 1,
                "work_time_from"                   => null,
                "work_time_to"                     => null,
                "is_tomorrow_work_time"            => null,
                "predefined_time"                  => null,
                "late_night_time_from"             => "22:00:00",
                "is_tomorrow_late_night_time_from" => 0,
                "late_night_time_to"               => "24:00:00",
                "is_tomorrow_late_night_time_to"   => 0,
                "work_time_law"                    => null,
                "work_time_late_night"             => null,
                "late_time"                        => null,
                "limit_time"                       => null,
                "work_time_amount"                 => null,
                "holiday_amount"                   => 1,
                "day_off_have_salary"              => 0,
                "day_off_no_salary"                => 0,
                "show_break_time"                  => 0,
                "status"                           => 1,
                "sequence"                         => 2,
            ],
            [
                "code_type_job"                    => "J3",
                "code_type_job_name"               => null,
                "type_job"                         => 1,
                "work_time_from"                   => null,
                "work_time_to"                     => null,
                "is_tomorrow_work_time"            => null,
                "predefined_time"                  => null,
                "late_night_time_from"             => "22:00:00",
                "is_tomorrow_late_night_time_from" => 0,
                "late_night_time_to"               => "24:00:00",
                "is_tomorrow_late_night_time_to"   => 0,
                "work_time_law"                    => null,
                "work_time_late_night"             => null,
                "late_time"                        => null,
                "limit_time"                       => null,
                "work_time_amount"                 => null,
                "holiday_amount"                   => 0,
                "day_off_have_salary"              => 1,
                "day_off_no_salary"                => 0,
                "show_break_time"                  => 0,
                "status"                           => 1,
                "sequence"                         => 3,
            ],
            [
                "code_type_job"                    => "J4",
                "code_type_job_name"               => null,
                "type_job"                         => 0,
                "work_time_from"                   => "13:00:00",
                "work_time_to"                     => "17:00:00",
                "is_tomorrow_work_time"            => null,
                "predefined_time"                  => "04:00:00",
                "late_night_time_from"             => "22:00:00",
                "is_tomorrow_late_night_time_from" => 0,
                "late_night_time_to"               => "24:00:00",
                "is_tomorrow_late_night_time_to"   => 0,
                "work_time_law"                    => 1,
                "work_time_late_night"             => 1,
                "late_time"                        => 1,
                "limit_time"                       => 1,
                "work_time_amount"                 => 0.5,
                "holiday_amount"                   => null,
                "day_off_have_salary"              => 0.5,
                "day_off_no_salary"                => null,
                "show_break_time"                  => 1,
                "status"                           => 1,
                "sequence"                         => 4,
            ],
            [
                "code_type_job"                    => "J5",
                "code_type_job_name"               => null,
                "type_job"                         => 0,
                "work_time_from"                   => "08:00:00",
                "work_time_to"                     => "12:00:00",
                "is_tomorrow_work_time"            => null,
                "predefined_time"                  => "04:00:00",
                "late_night_time_from"             => "22:00:00",
                "is_tomorrow_late_night_time_from" => 0,
                "late_night_time_to"               => "24:00:00",
                "is_tomorrow_late_night_time_to"   => 0,
                "work_time_law"                    => 1,
                "work_time_late_night"             => 1,
                "late_time"                        => 1,
                "limit_time"                       => 1,
                "work_time_amount"                 => 0.5,
                "holiday_amount"                   => null,
                "day_off_have_salary"              => 0.5,
                "day_off_no_salary"                => null,
                "show_break_time"                  => 1,
                "status"                           => 1,
                "sequence"                         => 5,
            ],
            [
                "code_type_job"                    => "J6",
                "code_type_job_name"               => null,
                "type_job"                         => 1,
                "work_time_from"                   => null,
                "work_time_to"                     => null,
                "is_tomorrow_work_time"            => null,
                "predefined_time"                  => null,
                "late_night_time_from"             => "22:00:00",
                "is_tomorrow_late_night_time_from" => 0,
                "late_night_time_to"               => "24:00:00",
                "is_tomorrow_late_night_time_to"   => 0,
                "work_time_law"                    => null,
                "work_time_late_night"             => null,
                "late_time"                        => null,
                "limit_time"                       => null,
                "work_time_amount"                 => null,
                "holiday_amount"                   => 0,
                "day_off_have_salary"              => 0,
                "day_off_no_salary"                => 1,
                "show_break_time"                  => 0,
                "status"                           => 1,
                "sequence"                         => 6,
            ],
            [
                "code_type_job"                    => "J7",
                "code_type_job_name"               => null,
                "type_job"                         => 3,
                "work_time_from"                   => null,
                "work_time_to"                     => null,
                "is_tomorrow_work_time"            => null,
                "predefined_time"                  => null,
                "late_night_time_from"             => "22:00:00",
                "is_tomorrow_late_night_time_from" => 0,
                "late_night_time_to"               => "24:00:00",
                "is_tomorrow_late_night_time_to"   => 0,
                "work_time_law"                    => null,
                "work_time_late_night"             => null,
                "late_time"                        => null,
                "limit_time"                       => null,
                "work_time_amount"                 => null,
                "holiday_amount"                   => 1,
                "day_off_have_salary"              => 0,
                "day_off_no_salary"                => 0,
                "show_break_time"                  => 0,
                "status"                           => 1,
                "sequence"                         => 2,
            ],
        ];
        JobTypeModel::insert($job_type);

        $employee_jobtype = [];
        JobTypeModel::all()->each(function ($model) use (&$employee_jobtype, $employeeAttachToJobType) {
            switch ($model->code_type_job) {
                case 'J1':
                    $model->name = 'Working Day';
                    $model->restTime()->create([
                        "rest_time_from_value" => "12:00:00",
                        "rest_time_to_value"   => "13:00:00",
                    ]);
                    break;
                case 'J2':
                    $model->name = 'Holiday';
                    break;
                case 'J3':
                    $model->name = 'Paid leave';
                    break;
                case 'J4':
                    $model->name = 'Paid leave (AM)';
                    break;
                case 'J5':
                    $model->name = 'Paid leave (PM)';
                    break;
                case 'J6':
                    $model->name = 'Unpaid leave';
                    break;
                case 'J7':
                    $model->name = 'Weekend';
                    break;
            }
            $model->save();

            foreach ($employeeAttachToJobType as $emp) {
                $employee_jobtype[] = [
                    "employee_id" => $emp->id,
                    "job_type_id" => $model->id,
                ];
            }
        });

        DB::table('employee_jobtype')->insert($employee_jobtype);
    }

    protected function createApprovalDate($employeeId, \Carbon\Carbon $month, $defaultStatus, $statusForDate = [])
    {
        $interval = new CarbonPeriod($month->startOfMonth()->toDateString(), '1 day', $month->endOfMonth()->toDateString());

        foreach ($interval as $date) {
            $wtd = WorkingTimeDetailFactory::make($employeeId, new Carbon($date));

            $updateData = [
                'approval_status' => $statusForDate[$date->toDateString()] ?? $defaultStatus,
                'time_log'        => '0000-00-00 00:00:00',
                'prev_time_log'   => '0000-00-00 00:00:00'
            ];
            $wtd->setAttributes($updateData)->saveTimestampAndApprove();
        }
    }
}
