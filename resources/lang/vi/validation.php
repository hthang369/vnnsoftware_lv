<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Trường following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Trường :attribute phải được chấp thuận.',
    'active_url' => 'Trường :attribute không phải là một URL hợp lệ.',
    'after' => 'Trường :attribute phải là một ngày sau :date.',
    'after_or_equal' => 'Trường :attribute phải là một ngày sau hoặc bằng :date.',
    'alpha' => 'Trường :attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash' => 'Trường :attribute chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => 'Trường :attribute chỉ có thể chứa các chữ cái và số.',
    'array' => 'Trường :attribute phải là một mảng.',
    'before' => 'Trường :attribute phải là một ngày trước :date.',
    'before_or_equal' => 'Trường :attribute phải là một ngày trước hoặc bằng :date.',
    'between' => [
        'numeric' => 'Trường :attribute phải ở giữa :min và :max.',
        'file' => 'Trường :attribute phải ở giữa :min và :max kilobytes.',
        'string' => 'Trường :attribute phải ở giữa :min và :max ký tự.',
        'array' => 'Trường :attribute phải có giữa :min và :max mục.',
    ],
    'boolean' => 'Trường :attribute phải đúng hoặc sai.',
    'confirmed' => 'Trường :attribute nhận đinh không phù hợp.',
    'date' => 'Trường :attribute không phải là ngày hợp lệ.',
    'date_equals' => 'Trường :attribute phải là một ngày bằng :date.',
    'date_format' => 'Trường :attribute không phù hợp với định dạng :format.',
    'different' => 'Trường :attribute và :other phải khác nhau.',
    'digits' => 'Trường :attribute phải là số có :digits chữ số.',
    'digits_between' => 'Trường :attribute phải ở giữa :min và :max chữ số.',
    'dimensions' => 'Trường :attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => 'Trường :attribute trường có giá trị trùng lặp.',
    'email' => 'Trường :attribute phải là một địa chỉ email hợp lệ.',
    'ends_with' => 'Trường :attribute phải kết thúc bằng một trong những điều sau: :values.',
    'exists' => 'Trường :attribute đã chọn không có hiệu lực.',
    'file' => 'Trường :attribute phải là một tập tin.',
    'filled' => 'Trường :attribute phải có một giá trị.',
    'gt' => [
        'numeric' => 'Trường :attribute phải lớn hơn :value.',
        'file' => 'Trường :attribute phải lớn hơn :value kilobytes.',
        'string' => 'Trường :attribute phải lớn hơn :value ký tự.',
        'array' => 'Trường :attribute phải có nhiều hơn :value mục.',
    ],
    'gte' => [
        'numeric' => 'Trường :attribute phải lớn hơn hoặc bằng :value.',
        'file' => 'Trường :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => 'Trường :attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array' => 'Trường :attribute phải có :value mục trở lên.',
    ],
    'image' => 'Trường :attribute phải là một hình ảnh.',
    'in' => 'Trường :attribute đã chọn có giá trị không hợp lệ.',
    'in_array' => 'Trường :attribute không tồn tại trong :other.',
    'integer' => 'Trường :attribute phải là số nguyên.',
    'ip' => 'Trường :attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => 'Trường :attribute phải là địa chỉ IPv4 hợp lệ.',
    'ipv6' => 'Trường :attribute phải là địa chỉ IPv6 hợp lệ.',
    'json' => 'Trường :attribute phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => 'Trường :attribute phải nhỏ hơn :value.',
        'file' => 'Trường :attribute phải nhỏ hơn :value kilobytes.',
        'string' => 'Trường :attribute phải nhỏ hơn :value ký tự.',
        'array' => 'Trường :attribute phải có ít hơn :value mục.',
    ],
    'lte' => [
        'numeric' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array' => 'Trường :attribute không được có nhiều hơn :value mục.',
    ],
    'max' => [
        'numeric' => 'Trường :attribute có thể không lớn hơn :max.',
        'file' => 'Trường :attribute có thể không lớn hơn :max kilobytes.',
        'string' => 'Trường :attribute có thể không lớn hơn :max ký tự.',
        'array' => 'Trường :attribute có thể không có nhiều hơn :max mục.',
    ],
    'mimes' => 'Trường :attribute phải là một loại tệp: :values.',
    'mimetypes' => 'Trường :attribute phải là một loại tệp: :values.',
    'min' => [
        'numeric' => 'Trường :attribute ít nhất phải là :min.',
        'file' => 'Trường :attribute ít nhất phải là :min kilobytes.',
        'string' => 'Trường :attribute ít nhất phải là :min ký tự.',
        'array' => 'Trường :attribute phải có ít nhất :min mục.',
    ],
    'not_in' => 'Trường :attribute đã chọn có giá trị không hợp lệ.',
    'not_regex' => 'Trường :attribute định dạng không hợp lệ.',
    'numeric' => 'Trường :attribute phải là một số.',
    'password' => 'Trường mật khẩu không chính xác.',
    'present' => 'Trường :attribute phải có trong dữ liệu đầu vào.',
    'regex' => 'Trường :attribute định dạng không hợp lệ.',
    'required' => 'Trường :attribute này là bắt buộc.',
    'required_if' => 'Trường :attribute này là bắt buộc khi :other là :value.',
    'required_unless' => 'Trường :attribute này là bắt buộc trừ khi :other trong :values.',
    'required_with' => 'Trường :attribute này là bắt buộc khi :values phải có mặt.',
    'required_with_all' => 'Trường :attribute này là bắt buộc khi :values có mặt.',
    'required_without' => 'Trường :attribute này là bắt buộc khi :values không có mặt.',
    'required_without_all' => 'Trường :attribute này là bắt buộc trong số :values có mặt.',
    'same' => 'Trường :attribute và :other phải phù hợp.',
    'size' => [
        'numeric' => 'Trường :attribute phải có :size.',
        'file' => 'Trường :attribute phải có :size kilobytes.',
        'string' => 'Trường :attribute phải có :size ký tự.',
        'array' => 'Trường :attribute phải chứa :size mục.',
    ],
    'starts_with' => 'Trường :attribute phải bắt đầu bằng một trong những điều sau: :values.',
    'string' => 'Trường :attribute phải là một chuỗi.',
    'timezone' => 'Trường :attribute phải là một khu vực hợp lệ.',
    'unique' => 'Trường :attribute đã được thực hiện.',
    'uploaded' => 'Trường :attribute không tải lên được.',
    'url' => 'Trường :attribute định dạng không hợp lệ.',
    'uuid' => 'Trường :attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Trường following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
