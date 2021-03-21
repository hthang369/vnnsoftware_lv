<?php

namespace Modules\Core\Traits;
use \Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Exceptions\UnauthorizedException;
/*
 * A trait to handle authorization based on users permissions for given controller
 */

trait Authorizable
{
    /**
     * Abilities: maps action controller with permission actions
     *
     * @var array
     */
    private $abilities =  [];

    /**
     * Override of callAction to perform the authorization before it calls the action
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        // Skip permission check when run unit test
        if (app()->environment() === 'testing') {
            return parent::callAction($method, $parameters);
        }

        //check middleware multiple roles or permission
        if($this->isMiddleWareRolesPermission()){
            return parent::callAction($method, $parameters);
        }
        //check permission action
        if ($ability = $this->getAbility($method)) {
            if (!preg_match('/^public_/', $ability)) {
                $this->authorize($ability);
            }
            return parent::callAction($method, $parameters);
        }


          $auth = ['auth:api', 'web:api'];
          $middleware = \Request::route()->middleware();

        //public action in auth. this is mean pulic for every one signed
//
//        if(empty(array_diff($auth, $middleware))){
//            throw UnauthorizedException::forPermissions([\Request::route()->getName()]);
//        }
//        else {
//            return parent::callAction($method, $parameters);
//        }

        //denied all other public controller not exists in permission

        if(count(array_diff($auth, $middleware)) == 1){
            throw UnauthorizedException::forPermissions([\Request::route()->getName()]);
        }
        else {
            return parent::callAction($method, $parameters);
        }
    }
    /*
     * Check middleware have multiple roles or permission
     * @return boolean
     */
    public function isMiddleWareRolesPermission(){
        $middleware = \Request::route()->middleware();
        /*
         * example in route used
         * Route::group(['middleware' => ['role:super-admin|writer']], function () {
                //
            });

            Route::group(['middleware' => ['permission:publish articles|edit articles']], function () {
                //
            });

            Route::group(['middleware' => ['role_or_permission:super-admin|edit articles']], function () {
                //
            });
         */
        $guard = ['role', 'permission', 'role_or_permission'];
        foreach($middleware as $m){
            $t  = explode(':', $m);
            if(in_array($t[0], $guard)){
                return true;
            }
        }
        return false;
    }

    /**
     * Get ability
     *
     * @param $method
     * @return null|string
     */
    public function getAbility($method)
    {
        //dd(\Request::route()->middleware());
        $routeName = explode('.', \Request::route()->getName());
        $action = array_get($this->getAbilities(), $method);
//dd($action . '_' . $routeName[0]);
        return $action ? $action . '_' . $routeName[0] : null;
    }

    /**
     * @return array
     */
    private function getAbilities()
    {
        return !empty($this->abilities)? $this->abilities: config('permission.abilities');
    }

    /**
     * @param array $abilities
     */
    public function setAbilities($abilities)
    {
        $this->abilities = array_merge(config('permission.abilities'), $abilities);
    }
    /**
     * @param array $abilities
     */
    public function setControllerActionPermission($abilities)
    {
        $this->setAbilities($abilities);
    }
    /**
     * @param array $abilities
     */
    public function removeAbilities($abilitie_action)
    {
        if (isset($this->abilities[$abilitie_action])) {
            unset($this->abilities[$abilitie_action]);
        }
    }
}
