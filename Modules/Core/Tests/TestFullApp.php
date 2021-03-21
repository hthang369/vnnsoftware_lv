<?php

namespace Modules\Core\Tests;

use App\Models\Permission\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Modules\Employee\Models\Employee\Employee;
use Modules\Employee\Tests\TestsBase;
use \Route;
use Tests\TestCase;
use App\Models\User\User;

class TestFullApp extends TestCase //TestsBase
{
    use RefreshDatabase;
    protected $headers;
//    public function testIndex()
//    {
//
//
////        $response = $this->get('/api/v1/language', [
////            'Accept' => 'application/json'
////        ]);
//        $response = $this->json('POST', '/api/v1/language');
//
//       print_r($response->json());
//        $response->assertStatus(200);
////        $response->assertStatus(200);
////        $response->assertJson([
////            'success' => true,
////            'data' => []
////        ]);
////
////        $response->assertJsonCount(1, 'data');
//    }
//    public function testRequiresEmailAndLogin()
//    {
//        $this->json('POST', 'api/v1/user/login')
//            ->assertStatus(422)
//            ->assertJson([
//                'email' => ['The email field is required.'],
//                'password' => ['The password field is required.'],
//            ]);
//    }
////
///

    public function testBasicTest()
    {

        $response = $this->get('/');
        $response->assertStatus(200);
//        $response = $this->get('/api/v1/language');
//        dd($response->json());
//        $response->assertStatus(200);

//        $employee = Employee::find(1);
//        echo "\n",$employee->employee_no,"\n";
//        $this->assertEquals(2, $employee->id);
    }


    public function testLoginWithToken()
    {
//        factory(Employee::class, 1)->create()->each(function ($e) {
//            $user = factory(User::class)->create(
//                [
//                    'name' => $e->firstname.' ' .$e->lastname,
//                    'username' => $e->employee_no,
//                    'email' => $e->email_company,
//                    'employee_id' => $e->id,
//                    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//                    'remember_token' => str_random(10)
//                ]
//            );
//            $e->user()->save($user);
//            $user->assignRole('Admin');
//            $e->user()->save($user);
//        });


        Artisan::call('passport:install');

        $payload = [];
        $this->login();
        $response = $this->json('GET', '/api/v1/language', $payload, $this->headers);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data'
        ]);

    }

    public function login()
    {
        if ($user = User::where('name', 'LP9999')->first()) {
            $user->delete();
        }

        $employee = factory(\Modules\Employee\Models\Employee\Employee::class)->create(['employee_no' => 'LP9999']);
        $user = $employee->User()->first();

        $role = Role::firstOrCreate(['name' => 'Admin'], [
            'level' => 0,
            'name' => 'Admin',
            'role_rank' => 0,
            'description' => 0,
            'guard_name' => 'api',
            'roles_status_prop' => 0,
            'created_at' => '2019-01-01',
            'updated_at' => '2019-01-01'
        ]);


        $user->assignRole('Admin');
        $token = $user->generateToken();
        $this->headers = ['Authorization' => "Bearer $token"];
    }
//    public function testRoutes()
//    {
//        $appURL = env('APP_URL');
//
//        $urls = [
//            '/'
//        ];
//
//        echo  PHP_EOL;
//
//        foreach ($urls as $url) {
//            $response = $this->get($url);
//            if((int)$response->status() !== 200){
//                echo  $appURL . $url . ' (FAILED) did not return a 200.';
//                $this->assertTrue(false);
//            } else {
//                echo $appURL . $url . ' (success ?)';
//                $this->assertTrue(true);
//            }
//            echo  PHP_EOL;
//        }
//
//    }


}
