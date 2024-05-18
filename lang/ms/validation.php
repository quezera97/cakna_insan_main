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

    'accepted' => 'Medan :attribute mestilah diterima.',
    'accepted_if' => 'Medan :attribute mestilah diterima apabila :other ialah :value.',
    'active_url' => 'Medan :attribute mestilah URL yang sah.',
    'after' => 'Medan :attribute mestilah tarikh selepas :date.',
    'after_or_equal' => 'Medan :attribute mestilah tarikh selepas atau sama dengan :date.',
    'alpha' => 'Medan :attribute hanya boleh mengandungi huruf.',
    'alpha_dash' => 'Medan :attribute hanya boleh mengandungi huruf, nombor, sengkang, dan garis bawah.',
    'alpha_num' => 'Medan :attribute hanya boleh mengandungi huruf dan nombor.',
    'array' => 'Medan :attribute mestilah jenis array.',
    'ascii' => 'Medan :attribute hanya boleh mengandungi aksara alfanumerik satu bait dan simbol.',
    'before' => 'Medan :attribute mestilah tarikh sebelum :date.',
    'before_or_equal' => 'Medan :attribute mestilah tarikh sebelum atau sama dengan :date.',
    'between' => [
        'array' => 'Medan :attribute mestilah antara :min dan :max perkara.',
        'file' => 'Medan :attribute mestilah antara :min dan :max kilobait.',
        'numeric' => 'Medan :attribute mestilah antara :min dan :max.',
        'string' => 'Medan :attribute mestilah antara :min dan :max aksara.',
    ],

    'boolean' => 'Medan :attribute mestilah benar atau salah.',
    'can' => 'Medan :attribute mengandungi nilai yang tidak dibenarkan.',
    'confirmed' => 'Pengesahan medan :attribute tidak sepadan.',
    'current_password' => 'Kata laluan tidak betul.',
    'date' => 'Medan :attribute mestilah tarikh yang sah.',
    'date_equals' => 'Medan :attribute mestilah tarikh yang sama dengan :date.',
    'date_format' => 'Medan :attribute mestilah sepadan dengan format :format.',
    'decimal' => 'Medan :attribute mestilah mempunyai :decimal tempat perpuluhan.',
    'declined' => 'Medan :attribute mestilah ditolak.',
    'declined_if' => 'Medan :attribute mestilah ditolak apabila :other ialah :value.',
    'different' => 'Medan :attribute dan :other mestilah berbeza.',
    'digits' => 'Medan :attribute mestilah :digits digit.',
    'digits_between' => 'Medan :attribute mestilah antara :min dan :max digit.',
    'dimensions' => 'Medan :attribute mempunyai dimensi imej yang tidak sah.',
    'distinct' => 'Medan :attribute mempunyai nilai yang berulang.',
    'doesnt_end_with' => 'Medan :attribute mestilah tidak berakhir dengan salah satu daripada: :values.',
    'doesnt_start_with' => 'Medan :attribute mestilah tidak bermula dengan salah satu daripada: :values.',
    'email' => 'Medan :attribute mestilah alamat emel yang sah.',
    'ends_with' => 'Medan :attribute mestilah berakhir dengan salah satu daripada: :values.',
    'enum' => 'Pilihan :attribute yang dipilih tidak sah.',
    'exists' => 'Pilihan :attribute yang dipilih tidak sah.',
    'extensions' => 'Medan :attribute mestilah mempunyai salah satu daripada sambungan berikut: :values.',
    'file' => 'Medan :attribute mestilah fail.',
    'filled' => 'Medan :attribute mestilah mempunyai nilai.',
    'gt' => [
        'array' => 'Medan :attribute mestilah mempunyai lebih daripada :value perkara.',
        'file' => 'Medan :attribute mestilah lebih besar daripada :value kilobait.',
        'numeric' => 'Medan :attribute mestilah lebih besar daripada :value.',
        'string' => 'Medan :attribute mestilah lebih besar daripada :value aksara.',
    ],
    'gte' => [
        'array' => 'Medan :attribute mestilah mempunyai :value perkara atau lebih.',
        'file' => 'Medan :attribute mestilah lebih besar atau sama dengan :value kilobait.',
        'numeric' => 'Medan :attribute mestilah lebih besar atau sama dengan :value.',
        'string' => 'Medan :attribute mestilah lebih besar atau sama dengan :value aksara.',
    ],

    'hex_color' => 'Medan :attribute mestilah warna heksadesimal yang sah.',
    'image' => 'Medan :attribute mestilah imej.',
    'in' => 'Pilihan :attribute yang dipilih tidak sah.',
    'in_array' => 'Medan :attribute mestilah wujud dalam :other.',
    'integer' => 'Medan :attribute mestilah integer.',
    'ip' => 'Medan :attribute mestilah alamat IP yang sah.',
    'ipv4' => 'Medan :attribute mestilah alamat IPv4 yang sah.',
    'ipv6' => 'Medan :attribute mestilah alamat IPv6 yang sah.',
    'json' => 'Medan :attribute mestilah rentetan JSON yang sah.',
    'lowercase' => 'Medan :attribute mestilah huruf kecil.',
    'lt' => [
        'array' => 'Medan :attribute mestilah mempunyai kurang daripada :value perkara.',
        'file' => 'Medan :attribute mestilah kurang daripada :value kilobait.',
        'numeric' => 'Medan :attribute mestilah kurang daripada :value.',
        'string' => 'Medan :attribute mestilah kurang daripada :value aksara.',
    ],
    'lte' => [
        'array' => 'Medan :attribute mestilah tidak mempunyai lebih daripada :value perkara.',
        'file' => 'Medan :attribute mestilah kurang atau sama dengan :value kilobait.',
        'numeric' => 'Medan :attribute mestilah kurang atau sama dengan :value.',
        'string' => 'Medan :attribute mestilah kurang atau sama dengan :value aksara.',
    ],
    'mac_address' => 'Medan :attribute mestilah alamat MAC yang sah.',
    'max' => [
        'array' => 'Medan :attribute tidak boleh mempunyai lebih daripada :max perkara.',
        'file' => 'Medan :attribute tidak boleh melebihi :max kilobait.',
        'numeric' => 'Medan :attribute tidak boleh melebihi :max.',
        'string' => 'Medan :attribute tidak boleh melebihi :max aksara.',
    ],
    'max_digits' => 'Medan :attribute tidak boleh mempunyai lebih daripada :max digit.',
    'mimes' => 'Medan :attribute mestilah fail jenis: :values.',
    'mimetypes' => 'Medan :attribute mestilah fail jenis: :values.',
    'min' => [
        'array' => 'Medan :attribute mestilah mempunyai sekurang-kurangnya :min perkara.',
        'file' => 'Medan :attribute mestilah sekurang-kurangnya :min kilobait.',
        'numeric' => 'Medan :attribute mestilah sekurang-kurangnya :min.',
        'string' => 'Medan :attribute mestilah sekurang-kurangnya :min aksara.',
    ],

    'min_digits' => 'Medan :attribute mestilah mempunyai sekurang-kurangnya :min digit.',
    'missing' => 'Medan :attribute mestilah hilang.',
    'missing_if' => 'Medan :attribute mestilah hilang apabila :other ialah :value.',
    'missing_unless' => 'Medan :attribute mestilah hilang kecuali :other ialah :value.',
    'missing_with' => 'Medan :attribute mestilah hilang apabila :values hadir.',
    'missing_with_all' => 'Medan :attribute mestilah hilang apabila :values semua hadir.',
    'multiple_of' => 'Medan :attribute mestilah merupakan banyak ganda :value.',
    'not_in' => 'Pilihan :attribute yang dipilih tidak sah.',
    'not_regex' => 'Format medan :attribute tidak sah.',
    'numeric' => 'Medan :attribute mestilah nombor.',
    'password' => [
        'letters' => 'Medan :attribute mestilah mengandungi sekurang-kurangnya satu huruf.',
        'mixed' => 'Medan :attribute mestilah mengandungi sekurang-kurangnya satu huruf besar dan satu huruf kecil.',
        'numbers' => 'Medan :attribute mestilah mengandungi sekurang-kurangnya satu nombor.',
        'symbols' => 'Medan :attribute mestilah mengandungi sekurang-kurangnya satu simbol.',
        'uncompromised' => ':attribute yang diberikan telah muncul dalam kebocoran data. Sila pilih :attribute yang berbeza.',
    ],
    'present' => 'Medan :attribute mestilah hadir.',
    'present_if' => 'Medan :attribute mestilah hadir apabila :other ialah :value.',
    'present_unless' => 'Medan :attribute mestilah hadir kecuali :other ialah :value.',
    'present_with' => 'Medan :attribute mestilah hadir apabila :values hadir.',
    'present_with_all' => 'Medan :attribute mestilah hadir apabila :values semua hadir.',
    'prohibited' => 'Medan :attribute adalah dilarang.',
    'prohibited_if' => 'Medan :attribute adalah dilarang apabila :other ialah :value.',
    'prohibited_unless' => 'Medan :attribute adalah dilarang kecuali :other dalam :values.',
    'prohibits' => 'Medan :attribute melarang :other daripada hadir.',
    'regex' => 'Format medan :attribute tidak sah.',
    'required' => 'Medan :attribute diperlukan.',
    'required_array_keys' => 'Medan :attribute mestilah mengandungi entri untuk: :values.',
    'required_if' => 'Medan :attribute diperlukan apabila :other ialah :value.',
    'required_if_accepted' => 'Medan :attribute diperlukan apabila :other diterima.',
    'required_unless' => 'Medan :attribute diperlukan kecuali :other dalam :values.',
    'required_with' => 'Medan :attribute diperlukan apabila :values hadir.',
    'required_with_all' => 'Medan :attribute diperlukan apabila :values semua hadir.',
    'required_without' => 'Medan :attribute diperlukan apabila :values tidak hadir.',
    'required_without_all' => 'Medan :attribute diperlukan apabila tiada daripada :values hadir.',
    'same' => 'Medan :attribute mestilah sepadan dengan :other.',
    'size' => [
        'array' => 'Medan :attribute mestilah mengandungi :size perkara.',
        'file' => 'Medan :attribute mestilah :size kilobait.',
        'numeric' => 'Medan :attribute mestilah :size.',
        'string' => 'Medan :attribute mestilah :size aksara.',
    ],
    'starts_with' => 'Medan :attribute mestilah bermula dengan salah satu daripada: :values.',
    'string' => 'Medan :attribute mestilah rentetan.',
    'timezone' => 'Medan :attribute mestilah zon masa yang sah.',
    'unique' => 'Medan :attribute telah diambil.',
    'uploaded' => 'Gagal memuat naik :attribute.',
    'uppercase' => 'Medan :attribute mestilah huruf besar.',
    'url' => 'Medan :attribute mestilah URL yang sah.',
    'ulid' => 'Medan :attribute mestilah ULID yang sah.',
    'uuid' => 'Medan :attribute mestilah UUID yang sah.',

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
