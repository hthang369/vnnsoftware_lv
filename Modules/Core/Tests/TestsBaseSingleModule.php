<?php
namespace Modules\Core\Tests;
use Modules\Employee\Models\Employee\Employee;
use Orchestra\Testbench\TestCase;
use Modules\Employee\EmployeeServiceProvider;
//use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\Finder\Finder;
use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Config\Repository as RepositoryContract;
//use Tests\TestCase;


class TestsBaseSingleModule extends TestCase
{

//    use CreatesApplication;
    use SetUpDatabase;

    protected static $db2Setup = false;
    const DB_NAME = 'laravel_test';
    //const DB_NAME2 = 'laravel_test2';
    const DB_USERNAME = 'laravel';
    const DB_PASSWORD = 'lampart';







    private function truncateAllTablesButMigrations($dbName)
    {
        $db = $this->app->make('db');
        $db->statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables = $db->select('SHOW TABLES') as $table) {
            $table = $table->{'Tables_in_'.$dbName};
            if ($table != 'migrations') {
                $db->table($table)->truncate();
            }
        }
        $db->statement('SET FOREIGN_KEY_CHECKS=1;');
    }



    protected function getPackageProviders($app)
    {
        return [
            \Illuminate\Auth\AuthServiceProvider::class,
            \Illuminate\Broadcasting\BroadcastServiceProvider::class,
            \Illuminate\Bus\BusServiceProvider::class,
            \Illuminate\Cache\CacheServiceProvider::class,
            \Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
            \Illuminate\Cookie\CookieServiceProvider::class,
            \Illuminate\Database\DatabaseServiceProvider::class,
            \Illuminate\Encryption\EncryptionServiceProvider::class,
            \Illuminate\Filesystem\FilesystemServiceProvider::class,
            \Illuminate\Foundation\Providers\FoundationServiceProvider::class,
            \Illuminate\Hashing\HashServiceProvider::class,
            \Illuminate\Mail\MailServiceProvider::class,
            \Illuminate\Notifications\NotificationServiceProvider::class,
            \Illuminate\Pagination\PaginationServiceProvider::class,
            \Illuminate\Pipeline\PipelineServiceProvider::class,
            \Illuminate\Queue\QueueServiceProvider::class,
            \Illuminate\Redis\RedisServiceProvider::class,
            \Illuminate\Auth\Passwords\PasswordResetServiceProvider::class,
            \Illuminate\Session\SessionServiceProvider::class,

            //Illuminate\Translation\TranslationServiceProvider::class,
            \Spatie\TranslationLoader\TranslationServiceProvider::class,

            \Illuminate\Validation\ValidationServiceProvider::class,
            \Illuminate\View\ViewServiceProvider::class,

            /*
             * Package Service Providers...
             */

            /*
             * Application Service Providers...
             */
            \App\Providers\AppServiceProvider::class,
            \App\Providers\AuthServiceProvider::class,
            // App\Providers\BroadcastServiceProvider::class,
            \App\Providers\EventServiceProvider::class,
            \App\Providers\RouteServiceProvider::class,

            \Laravel\Passport\PassportServiceProvider::class,
            \Spatie\Permission\PermissionServiceProvider::class,
            //modify passport token expiration
            \App\Providers\ModifyPassportServiceProvider::class,
            \Elibyy\TCPDF\ServiceProvider::class,
            \Astrotomic\Translatable\TranslatableServiceProvider::class,

            \Nwidart\Modules\LaravelModulesServiceProvider::class,
            \Modules\Employee\Providers\EmployeeServiceProvider::class,
            ];
    }
    protected function getBasePath()
    {
        return realpath(__DIR__ . '/../../../');
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = $this->getBasePath();
        $app->setBasePath($this->getBasePath());

        //dd($app['path.base']);

        $app['config']->set('database.default', 'mysql');
        $app['config']->set('database.connections.mysql', [
            'driver'   => 'mysql',
            'host' => 'database',
            'database' => static::DB_NAME,
            'username' => static::DB_USERNAME,
            'password' => static::DB_PASSWORD,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'strict' => false,
        ]);
        $app['config']->set('auth.providers.users.model', \App\Models\User\User::class);
//        $app['config']->set('database.connections.mysql2', [
//            'driver'   => 'mysql',
//            'host' => 'database',
//            'database' => static::DB_NAME2,
//            'username' => static::DB_USERNAME,
//            'password' => static::DB_PASSWORD,
//            'charset' => 'utf8',
//            'collation' => 'utf8_unicode_ci',
//            'strict' => false,
//        ]);

    }

    protected function getPackageAliases($app)
    {
        return [
            'App' => \Illuminate\Support\Facades\App::class,
            'Artisan' => \Illuminate\Support\Facades\Artisan::class,
            'Auth' => \Illuminate\Support\Facades\Auth::class,
            'Blade' => \Illuminate\Support\Facades\Blade::class,
            'Broadcast' => \Illuminate\Support\Facades\Broadcast::class,
            'Bus' => \Illuminate\Support\Facades\Bus::class,
            'Cache' => \Illuminate\Support\Facades\Cache::class,
            'Config' => \Illuminate\Support\Facades\Config::class,
            'Cookie' => \Illuminate\Support\Facades\Cookie::class,
            'Crypt' => \Illuminate\Support\Facades\Crypt::class,
            'DB' => \Illuminate\Support\Facades\DB::class,
            'Eloquent' => \Illuminate\Database\Eloquent\Model::class,
            'Event' => \Illuminate\Support\Facades\Event::class,
            'File' => \Illuminate\Support\Facades\File::class,
            'Gate' => \Illuminate\Support\Facades\Gate::class,
            'Hash' => \Illuminate\Support\Facades\Hash::class,
            'Lang' => \Illuminate\Support\Facades\Lang::class,
            'Log' => \Illuminate\Support\Facades\Log::class,
            'Mail' => \Illuminate\Support\Facades\Mail::class,
            'Notification' => \Illuminate\Support\Facades\Notification::class,
            'Password' => \Illuminate\Support\Facades\Password::class,
            'Queue' => \Illuminate\Support\Facades\Queue::class,
            'Redirect' => \Illuminate\Support\Facades\Redirect::class,
            'Redis' => \Illuminate\Support\Facades\Redis::class,
            'Request' => \Illuminate\Support\Facades\Request::class,
            'Response' => \Illuminate\Support\Facades\Response::class,
            'Route' => \Illuminate\Support\Facades\Route::class,
            'Schema' => \Illuminate\Support\Facades\Schema::class,
            'Session' => \Illuminate\Support\Facades\Session::class,
            'Storage' => \Illuminate\Support\Facades\Storage::class,
            'URL' => \Illuminate\Support\Facades\URL::class,
            'Validator' => \Illuminate\Support\Facades\Validator::class,
            'View' => \Illuminate\Support\Facades\View::class,
            'PDF' => \Elibyy\TCPDF\Facades\TCPDF::class

        ];
    }



    private function beautifyQuery($query)
    {
        $capitalizeWords = ['select ', ' from ', ' where ', ' on ', ' join '];
        $newLineWords = ['select ', 'from ', 'where ', 'join '];
        foreach ($capitalizeWords as $word) {
            $query = str_replace($word, strtoupper($word), $query);
        }

        foreach ($newLineWords as $word) {
            $query = str_replace($word, "\n$word", $query);
            $word = strtoupper($word);
            $query = str_replace($word, "\n$word", $query);
        }

        return $query;
    }

    /**
     * @param $bindings
     *
     * @return mixed
     */
    private function formatBindingsForSqlInjection($bindings)
    {
        foreach ($bindings as $i => $binding) {
            if ($binding instanceof DateTime) {
                $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
            } else {
                if (is_string($binding)) {
                    $bindings[$i] = "'$binding'";
                }
            }
        }

        return $bindings;
    }

    /**
     * @param $query
     * @param $bindings
     *
     * @return string
     */
    private function insertBindingsIntoQuery($query, $bindings)
    {
        if (empty($bindings)) {
            return $query;
        }

        $query = str_replace(['%', '?'], ['%%', '%s'], $query);

        return vsprintf($query, $bindings);
    }
    protected function resolveApplicationConfiguration($app)
    {
        parent::resolveApplicationConfiguration($app);

        //$app['config']->set('auth.providers.users.model', CustomUser::class);

//        $app['config']['cors'] = [
//            'supportsCredentials' => false,
//            'allowedOrigins' => ['localhost'],
//            'allowedHeaders' => ['X-Custom-1', 'X-Custom-2'],
//            'allowedMethods' => ['GET', 'POST'],
//            'exposedHeaders' => [],
//            'maxAge' => 0,
//        ];
        //$items = [];

        //$app->instance('config', $config = new Repository($items));

        $this->loadConfigurationFiles($app, $app['config']);

        mb_internal_encoding('UTF-8');
    }
    /**
     * Load the configuration items from all of the files.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @param  \Illuminate\Contracts\Config\Repository  $config
     *
     * @return void
     */
    protected function loadConfigurationFiles(Application $app, RepositoryContract $config): void
    {
        foreach ($this->getConfigurationFiles($app) as $key => $path) {
            $config->set($key, require $path);
        }
    }

    /**
     * Get all of the configuration files for the application.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     *
     * @return array
     */
    protected function getConfigurationFiles(Application $app): array
    {
        $files = [];

        $path = realpath($this->getBasePath() . '/config');

        foreach (Finder::create()->files()->name('*.php')->in($path) as $file) {
            $files[basename($file->getRealPath(), '.php')] = $file->getRealPath();
        }

        return $files;
    }
}
