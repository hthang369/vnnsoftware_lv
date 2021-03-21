<?php

namespace Modules\Core\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Core\Entities\BaseModel;

/**
 * Class BaseTransformer.
 *
 * @package namespace Modules\Core\Transformers;
 */
class BaseTransformer extends TransformerAbstract
{
    /**
     * Transform the Base entity.
     *
     * @param \Modules\Core\Entities\BaseModel $model
     *
     * @return array
     */
    public function transform(BaseModel $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
