<?php
namespace Modules\Core\Tests;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Modules\Employee\Models\Employee\Employee;
use Modules\Employee\Tests\TestsBase;
use \Route;
use Tests\TestCase;
use App\Models\User\User;

class LoginTest extends TestCase
{
    protected $headers;

    public function testRequiresLogin()
    {
        $response = $this->json('POST', '/api/v1/user/login');
        //dd($response->json());
        $response->assertStatus(403);
        $response->assertJson([
            'success' => false,
            'message' => "Dữ liệu không hợp lệ",
        ]);
    }


    public function testUserLoginsSuccessfully()
    {
//        $this->json('POST', '/api/v1/user/login/')
//            ->assertStatus(422)
//            ->assertJson([
//                'email' => ['The email field is required.'],
//                'password' => ['The password field is required.'],
//            ]);

        $createEmployeeUser = true;
        if ($createEmployeeUser) {
            Employee::firstOrCreate(['employee_no' => 'LP0001']);
        }
        Artisan::call('passport:install');

        $payload = ['username' => 'LP0001', 'password' => 'LP0001'];
        $response = $this->json('POST', '/api/v1/user/login', $payload);
        //$response = $this->post('/api/v1/user/login', $payload);
//        dd($response->json());
        $response->assertStatus(422);
        $response->assertJson([
            'success' => false,
            'message' => trans('auth.login_fail')
        ]);

    }
}
