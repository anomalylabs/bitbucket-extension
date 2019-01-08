<?php

return [
    'username' => [
        'required' => true,
        'env'      => 'BITBUCKET_USERNAME',
        'type'     => 'anomaly.field_type.text',
        'bind'     => 'anomaly.extension.bitbucket::bitbucket.username',
    ],
    'password' => [
        'required' => true,
        'env'      => 'BITBUCKET_PASSWORD',
        'type'     => 'anomaly.field_type.encrypted',
        'bind'     => 'anomaly.extension.bitbucket::bitbucket.password',
    ],
];
