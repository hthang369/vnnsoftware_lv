<?php

use App\Services\FeatureApi\FeatureApiService;
use App\Services\User\UserService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{

    private $featureApiService;

    /**
     * FeatureApiController constructor.
     * @param FeatureApiService $featureApiService
     */
    public function __construct(FeatureApiService $featureApiService, UserService $userService)
    {
        $this->featureApiService = $featureApiService;
        $this->userService = $userService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->featureApiService->saveAllRoutesToDB();

        $roleOld = DB::table('role')->where('name', '=', config('constants.name.role_permission_name'))->first();

        if (!is_null($roleOld)) {
            DB::table('role_has_feature_api')->where('role_id', '=', $roleOld->id)->delete();
        } else {
            DB::table('role')->insert([
                'name' => config('constants.name.role_permission_name'),
                'description' => 'Role for set permission',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        $listFeatureApiPermission = DB::table('feature_api')
            ->select('feature_api.*')
            ->join('list_function', 'feature_api.name', '=', 'list_function.function')
            ->where('list_function.is_main', '=', 1)
            ->whereNull('feature_api.deleted_at')
            ->get();

        $role = DB::table('role')->where('name', '=', config('constants.name.role_permission_name'))->first();

        foreach ($listFeatureApiPermission as $item) {
            DB::table('role_has_feature_api')->insert([
                'feature_api_id' => $item->id,
                'role_id' => $role->id,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }

        if ($this->userService->countOthersPermissionUser(0)->total == 0) {
            $listUsers = DB::table('users')
                ->whereNull('deleted_at')
                ->limit(5)
                ->get();

            foreach ($listUsers as $user) {
                DB::table('role_user')->insert([
                    'user_id' => $user->id,
                    'role_id' => $role->id,
                ]);
            }
        }
    }

}
