<?php

use App\Services\FeatureApi\FeatureApiService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{

    private $featureApiService;

    /**
     * FeatureApiController constructor.
     * @param FeatureApiService $featureApiService
     */
    public function __construct(FeatureApiService $featureApiService)
    {
        $this->featureApiService = $featureApiService;
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

        DB::table('role')->where('name', '=', config('constants.name.role_permission_name'))->delete();

        if (!is_null($roleOld)) {
            DB::table('role_has_feature_api')->where('role_id', '=', $roleOld->id)->delete();
        }

        DB::table('role')->insert([
            'name' => config('constants.name.role_permission_name'),
            'role_rank' => 1,
            'description' => 'Role for set permission',
            'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
        ]);

        $listFeatureApiPermission = DB::table('feature_api')
            ->select('*')
            ->where('name', 'like', '%[Permission]')
            ->whereNull('deleted_at')
            ->get();

        $role = DB::table('role')->where('name', '=', config('constants.name.role_permission_name'))->first();

        foreach ($listFeatureApiPermission as $item) {
            DB::table('role_has_feature_api')->insert([
                'feature_api_id' => $item->id,
                'role_id' => $role->id,
                'created_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => \Illuminate\Support\Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }

}
