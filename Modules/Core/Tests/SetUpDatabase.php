<?php
/**
 * Created by PhpStorm.
 * User: VAN_HOAI
 * Date: 12/11/2018
 * Time: 2:02 PM
 */

namespace Modules\Core\Tests;

/*
 * A trait to handle authorization based on users permissions for given controller
 */

trait SetUpDatabase
{
    protected $queriesCount;

    public function setUp()
    {
        //$this->makeSureDatabaseExists(static::DB_NAME);

//        if (! static::$db2Setup) {
//            $this->makeSureDatabaseExists(static::DB_NAME2);
//        }

        parent::setUp();

        //## $this->refreshApplication();

        //         $router = $this->app['router'];
//        $this->app['router']->get('/', function () {
//            return view('welcome');
//        });

//        if (! static::$db2Setup) {
//            $this->makeSureSchemaIsCreated('mysql2');
//            //$this->truncateAllTablesButMigrations(static::DB_NAME2);
//            static::$db2Setup = true;
//        }
//
        //## $this->makeSureSchemaIsCreated('mysql');
        //## $this->enableQueryCounter();
        //## $this->refreshSeedData();
    }
    private function makeSureSchemaIsCreated($dbConnectionName)
    {

        $migrationsPath = $this->getBasePath().'/database/migrations';
        $artisan = $this->app->make('Illuminate\Contracts\Console\Kernel');

        // Makes sure the migrations table is created
        $artisan->call('migrate:reset', [
            '--database' => $dbConnectionName,
            '--path'     => $migrationsPath,
            '--force'    => true
        ]);

        $artisan->call('db:seed', [
            '--class' => 'UnitTestDatabaseSeeder'
        ]);
//        $artisan->call('passport:install', [
//            '--force' => true
//        ]);
    }
    protected function enableQueryCounter()
    {
        $that = $this;
        DB::listen(function ($query) use ($that) {
            $that->queriesCount++;
            // echo("\n--- Query {$that->queriesCount}--- $query->sql\n");
        });
    }
    private function refreshSeedData()
    {
//        $this->truncateAllTablesButMigrations(static::DB_NAME);
//        $seeder = new AddFreshSeeds;
//        $seeder->run();

    }
    private function makeSureDatabaseExists($dbName)
    {
        $this->runQuery('CREATE DATABASE IF NOT EXISTS '.$dbName);
    }
    /**
     * @param $query
     * return void
     */
    private function runQuery($query)
    {
        $dbUsername = static::DB_USERNAME;
        $dbPassword = static::DB_PASSWORD;

        $command = "mysql -h database -u $dbUsername ";
        $command .= $dbPassword ? " -p$dbPassword" : '';
        $command .= " -e '$query'";

        exec($command.' 2>/dev/null');

//        $db = $this->app->make('db');
//        $db->statement($query);
    }


}