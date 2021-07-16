<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class Attributes
{
    public static function get($items, $excludes = [])
    {
        $attrs = '';
        foreach ($items as $key => $value) {
            if (!in_array($key, $excludes) && !empty($value) && !\is_array($value)) {
                $attrs .= ' ' . $key . '="' . $value . '"';
            }
        }

        return $attrs;
    }

    private static function getTemplateFields()
    {
        return [
            'key' => '',
            'label' => '',
            'headerTitle' => '',
            'class' => '',
            'sortable' => true,
            'tdClass' => '',
            'thClass' => '',
            'thStyle' => '',
            'variant' => '',
            'tdAttr' => '',
            'thAttr' => '',
            'isRowHeader' => false,
            'cell'  => '',
            'visible' => true
        ];
    }

    private static function getTemplateFieldButton()
    {
        return [
            'key' => '',
            'label' => '',
            'class' => '',
            'title'  => '',
            'visible' => true
        ];
    }

    private static function getLabel($text)
    {
        return title_case(snake_case(studly_case($text), ' '));
    }

    public static function getFields($fields, $items)
    {
        if (is_null($fields)) {
            $object = head($items);
            if ($object instanceof Model)
                $object = $object->getAttributes();
            $fields = array_keys($object);
        }

        return array_map(function($field) {
            $template = self::getTemplateFields();
            if (is_string($field)) {
                data_set($template, 'key', $field);
                data_set($template, 'label', static::getLabel($field));
            } else {
                $template = array_merge($template, $field);
                if (blank($template['label'])) {
                    data_set($template, 'label', static::getLabel($template['key']));
                }
            }
            return $template;
        }, $fields);
    }

    public static function getField($fieldName, $caption, $options = [])
    {
        $fields = array_merge(static::getTemplateFields(), ['key' => $fieldName, 'label' => $caption]);
        return array_merge($fields, $options);
    }

    public static function getFieldButton($fieldName, $caption, $options = [])
    {
        $fields = array_merge(static::getTemplateFieldButton(), ['key' => $fieldName, 'label' => $caption]);
        return array_merge($fields, $options);
    }
}
