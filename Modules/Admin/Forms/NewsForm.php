<?php

namespace Modules\Admin\Forms;

use Modules\Admin\Entities\CategoriesModel;
use Vnnit\Core\Forms\Field;
use Vnnit\Core\Forms\Form;

class NewsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('post_title', Field::TEXT)
            ->add('post_excerpt', Field::TEXT)
            ->add('post_link', Field::TEXT)
            ->add('category_id', Field::SELECT, [
                'choices' => CategoriesModel::pluck('category_name', 'id')->toArray(),
                'selected' => data_get($this->getModel(), 'category_id'),
                'empty_value' => '=== Select category ==='
            ])
            ->add('post_image', Field::FILE)
            ->add('post_content', Field::TEXTAREA)
            ->add('ob_title', Field::TEXT)
            ->add('ob_desception', Field::TEXT)
            ->add('ob_keyword', Field::TEXT);
    }
}
