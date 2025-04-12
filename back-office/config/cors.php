<?php

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],  // Allow all HTTP methods
    'allowed_origins' => ['*'],  // Allow all origins (public access)
    'allowed_headers' => ['*'],  // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];



