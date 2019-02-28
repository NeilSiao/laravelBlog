<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => '此 :attribute 必須被接受.',
    'active_url' => '此 :attribute 不是一個合法的URL.',
    'after' => '此 :attribute 必須是 :date之後的日期.',
    'after_or_equal' => '此 :attribute 必須與 :date相同或之後的日期.',
    'alpha' => '此 :attribute 只能輸入字母.',
    'alpha_dash' => '此 :attribute 只能輸入字母, 數字, - 或 _.',
    'alpha_num' => '此 :attribute 只能輸入字母和數字.',
    'array' => '此 :attribute 必須是一個陣列.',
    'before' => '此 :attribute 必須在 :date之前.',
    'before_or_equal' => '此 :attribute 必須是個日期且在:date之前或相同.',
    'between' => [
        'numeric' => '此 :attribute 必須在 :min 與 :max之間.',
        'file' => '此 :attribute必須在 :min and :max Kb大小之間.',
        'string' => '此 :attribute 必須在 :min 和 :max 的字元數量之間.',
        'array' => '此 :attribute 必須在 :min 和 :max 項目數量之間.',
    ],
    'boolean' => '此 :attribute 欄位必須為 true 或者是 false.',
    'confirmed' => '此 :attribute 確認並不相符.',
    'date' => '此 :attribute 不是一個合法的日期格式.',
    'date_equals' => '此 :attribute 必須是一個日期且相等於 :date.',
    'date_format' => '此 :attribute 與 :format格式不相符.',
    'different' => '此 :attribute 和 :other 必需不同.',
    'digits' => '此 :attribute 必須是 :digits 數字.',
    'digits_between' => '此 :attribute 必須為 :min 和 :max 範圍的數字.',
    'dimensions' => '此 :attribute 錯誤的圖像尺寸.',
    'distinct' => '此 :attribute 欄位有一個重複的數值.',
    'email' => '此 :attribute 必須是一個合法的Email格式.',
    'exists' => '此選項 :attribute 不允許.',
    'file' => '此 :attribute 必須是一個檔案.',
    'filled' => '此 :attribute 欄位必須是一個值.',
    'gt' => [
        'numeric' => '此 :attribute 必須大於 :value.',
        'file' => '此 :attribute 必須大於 :value kilobytes.',
        'string' => '此 :attribute 必須大於 :value 字元.',
        'array' => '此 :attribute 必須擁有多餘 :value 的項目.',
    ],
    'gte' => [
        'numeric' => '此 :attribute 必須大於或等於 :value.',
        'file' => '此 :attribute 必須大於或等於 :value kilobytes.',
        'string' => '此 :attribute 必須大於或等於 :value 字元.',
        'array' => '此 :attribute 至少擁有 :value 項目或更多.',
    ],
    'image' => '此 :attribute 必須是一張圖片.',
    'in' => '所選的 :attribute 不允許.',
    'in_array' => '此 :attribute 欄位並不存在於 :other.',
    'integer' => '此 :attribute 必須是一個整數.',
    'ip' => '此 :attribute 必須是一個合法的IP位置.',
    'ipv4' => '此 :attribute 必須是一個合法的IPv4的位置.',
    'ipv6' => '此 :attribute 必須是一個合法的IPv6的位置.',
    'json' => '此 :attribute 必須是一個合法的JSON格式.',
    'lt' => [
        'numeric' => '此 :attribute 必須小於 :value.',
        'file' => '此 :attribute 必須檔案必須小於 :value kilobytes.',
        'string' => '此 :attribute 必須小於 :value 字元.',
        'array' => '此 :attribute 必須小於 :value 數量的項目.',
    ],
    'lte' => [
        'numeric' => '此 :attribute 必須小於或等於 :value.',
        'file' => '此 :attribute 檔案必須小於或等於 :value kilobytes.',
        'string' => '此 :attribute 必須小於或等於 :value 字元數量.',
        'array' => '此 :attribute 不能多於 :value 數量的項目.',
    ],
    'max' => [
        'numeric' => '此 :attribute 不會大於 :max.',
        'file' => '此 :attribute 檔案不會大於 :max kilobytes.',
        'string' => '此 :attribute 不能大於 :max 字元.',
        'array' => '此 :attribute 不會大於 :max 數量項目.',
    ],
    'mimes' => '此 :attribute 檔案類型必須為: :values.',
    'mimetypes' => '此 :attribute 檔案類型必須為: :values.',
    'min' => [
        'numeric' => '此 :attribute 必須至少 :min.',
        'file' => '此 :attribute 必須至少 :min kilobytes.',
        'string' => '此 :attribute 必須至少 :min 字元組.',
        'array' => '此 :attribute 必須至少有 :min 數量的項目.',
    ],
    'not_in' => '被選取 :attribute的選項是不允許的.',
    'not_regex' => '此 :attribute 格式是不允許的.',
    'numeric' => '此 :attribute 必須是一個數字.',
    'present' => '此 :attribute 必須被顯示.',
    'regex' => '此 :attribute 格式不允許.',
    'required' => '此 :attribute 欄位是必須的.',
    'required_if' => '此 :attribute 是必須的當 :other 是 :value.',
    'required_unless' => '此 :attribute 是必須的除非 :other 在 :values裡面.',
    'required_with' => '此 :attribute 欄位是必須的當 :values 在顯示.',
    'required_with_all' => '此 :attribute 欄位是必須的當 :values 被顯示.',
    'required_without' => '此 :attribute 是必須的當:values 沒有被顯示.',
    'required_without_all' => '此 :attribute 欄位是必須的當 :values 任一的數值都沒有顯示.',
    'same' => '此 :attribute 和 :other 必需相符.',
    'size' => [
        'numeric' => '此 :attribute 必須 :size.',
        'file' => '此 :attribute 檔案大小必須 :size kilobytes.',
        'string' => '此 :attribute 必須 :size 字元.',
        'array' => '此 :attribute 必須包含 :size 個項目.',
    ],
    'starts_with' => '此 :attribute 必須以:values為開頭',
    'string' => '此 :attribute 必須是一個字串.',
    'timezone' => '此 :attribute 必須是一個允許的時間區域.',
    'unique' => '此 :attribute 已經存在於上面了.',
    'uploaded' => '此 :attribute 上傳失敗.',
    'url' => '此 :attribute 格式是不允許的.',
    'uuid' => '此 :attribute 必須是一個合法的UUID.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
