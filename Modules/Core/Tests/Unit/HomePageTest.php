<?php
namespace Modules\Core\Tests\Unit;
use Modules\Employee\Models\Employee\Employee;
use Modules\Core\Tests\TestsBaseSingleModule;
use Tests\TestCase;
use App\Models\User\User;


class HomePageTest extends TestsBaseSingleModule
{
    protected $headers;
    const DB_NAME = 'laravel_test';
    //const DB_NAME2 = 'laravel_test2';
    const DB_USERNAME = 'laravel';
    const DB_PASSWORD = 'lampart';

    public function testBasicTest()
    {

        $response = $this->get('/');
        $response->assertStatus(200);

    }

}

?>