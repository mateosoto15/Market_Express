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

    'accepted' => 'El  :attribute debe ser aceptado.',
    'active_url' => 'El :attribute no es una URL valida.',
    'after' => 'El :attribute debe ser una fecha después de :date.',
    'after_or_equal' => 'El :attribute debe ser una fecha después o igual a :date.',
    'alpha' => 'El :attribute solo puede contener letras.',
    'alpha_dash' => 'El :attribute solo puede contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El :attribute solo puede contener letras y números.',
    'array' => 'El :attribute debe ser un arreglo.',
    'before' => 'El :attribute debe ser una fecha antes de :date.',
    'before_or_equal' => 'El :attribute debe ser una fecha antes o igual a :date.',
    'between' => [
        'numeric' => 'El :attribute debe estar entre :min y :max.',
        'file' => 'El :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El :attribute debe estar entre :min y :max caracteres.',
        'array' => 'El :attribute debe estar entre :min y :max items.',
    ],
    'boolean' => 'El :attribute  debe ser verdadero o falso.',
    'confirmed' => 'el campo :attribute de confirmación no corresponde.',
    'date' => 'el campo :attribute no es una fecha validad.',
    'date_equals' => 'El :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El :attribute no concuerda con el formato :formato.',
    'different' => 'El :attribute y :other debe ser diferente.',
    'digits' => 'El :attribute debe ser :digits dígitos.',
    'digits_between' => 'El :attribute debe estar entre :min y :max dígitos.',
    'dimensions' => 'El :attribute tiene unas dimensiones de imagen erróneas.',
    'distinct' => 'El campo :attribute  tiene un valor duplicado.',
    'email' => 'El :attribute debe ser un email valido.',
    'exists' => 'El campo  :attribute  es invalido.',
    'file' => 'El campo :attribute debe ser un archivo.',
    'filled' => 'El campo :attribute debe estar diligenciado.',
    'gt' => [
        'numeric' => 'El :attribute debe ser mayor que :value.',
        'file' => 'El :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El :attribute debe ser mayor que :value characters.',
        'array' => 'El :attribute debe tener más :value items.',
    ],
    'gte' => [
        'numeric' => 'El :attribute debe ser mayor que o igual :value.',
        'file' => 'El :attribute debe ser mayor que o igual :value kilobytes.',
        'string' => 'El :attribute debe ser mayor que o igual :value characters.',
        'array' => 'El :attribute debe tener :value items o más.',
    ],
    'image' => 'El campo :attribute debe ser una imagen.',
    'in' => 'El valor seleccionado :attribute es invalido.',
    'in_array' => 'El campo :attribute no existe en  :other.',
    'integer' => 'El campo :attribute debe ser numero entero.',
    'ip' => 'El :attribute debe ser una IP valida.',
    'ipv4' => 'El :attribute debe ser una IPv4 valida.',
    'ipv6' => 'El :attribute debe ser una IPv6 valida.',
    'json' => 'El :attribute debe ser una JSON valida.',
    'lt' => [
        'numeric' => 'El :attribute debe ser menor :value.',
        'file' => 'El :attribute debe ser menor :value kilobytes.',
        'string' => 'El :attribute debe ser menor :value caracteres.',
        'array' => 'El :attribute debe tener menos :value items.',
    ],
    'lte' => [
        'numeric' => 'El :attribute debe ser menor o igual :value.',
        'file' => 'El :attribute debe ser menor o igual :value kilobytes.',
        'string' => 'El :attribute debe ser menor o igual :value caracteres.',
        'array' => 'El :attribute no puede tener mas de :value items.',
    ],
    'max' => [
        'numeric' => 'El :attribute no puede ser mayor que :max.',
        'file' => 'El :attribute no puede ser mayor que :max kilobytes.',
        'string' => 'El :attribute no puede ser mayor que :max characters.',
        'array' => 'El :attribute no puede tener mas que mas que :max items.',
    ],
    'mimes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El campo :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El :attribute debe ser al menos :min.',
        'file' => 'El :attribute debe ser al menos :min kilobytes.',
        'string' => 'El :attribute debe ser al menos :min characters.',
        'array' => 'El :attribute debe tener al menos :min items.',
    ],
    'not_in' => 'El selected :attribute es invalido.',
    'not_regex' => 'El :attribute formato es invalido.',
    'numeric' => 'El campo :attribute debe ser numérico.',
    'present' => 'El campo :attribute debe estar presente.',
    'regex' => 'El :attribute formato es invalido.',
    'required' => 'El campo :attribute es requerido.',
    'required_if' => 'El campo :attribute is requerido cuando :other es :value.',
    'required_unless' => 'El campo :attribute es requerido unless :other is in :values.',
    'required_with' => 'El campo :attribute es requerido quando :values esta presente.',
    'required_with_all' => 'El campo :attribute es requerido cuando :values estan presentes.',
    'required_without' => 'El campo :attribute es requerido cuando :values no esta presente.',
    'required_without_all' => 'El campo :attribute es requerido cuando none de :values estan presentes.',
    'same' => 'El :attribute y :other must match.',
    'size' => [
        'numeric' => 'El :attribute debe ser :size.',
        'file' => 'El :attribute debe ser :size kilobytes.',
        'string' => 'El :attribute debe ser :size characters.',
        'array' => 'El :attribute debe contener :size items.',
    ],
    'starts_with' => 'El :attribute debe empezar con uno de los siguientes: :values',
    'string' => 'El campo :attribute debe ser una cadena de caracteres.',
    'timezone' => 'El :attribute debe ser una zona valida.',
    'unique' => 'El :attribute ya ha sido tomado.',
    'uploaded' => 'El :attribute fallo la carga.',
    'url' => 'El :attribute format es invalido.',
    'uuid' => 'El :attribute debe ser una UUID valida.',

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

    'attributes' => [
        'message' => 'Mensaje',
        'user' => 'Usuario',
        'name' => 'Nombre',
        'date' => 'fecha',
        'description' => 'Descripción',
        'email' => 'Correo Electrónico',
        'number' => 'Numero',
    ],

];
