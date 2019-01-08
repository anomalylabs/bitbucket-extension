<?php

return [
    'token' => [
        'required' => true,
        'env'      => 'GITHUB_TOKEN',
        'type'     => 'anomaly.field_type.encrypted',
        'bind'     => 'anomaly.extension.bitbucket::bitbucket.token',
    ],
];
