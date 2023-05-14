<?php

return [
    'api' => env('DALL_E_API', 'https://api.openai.com/v1/images'),
    'key' => env('DALL_E_KEY', ''),
    'disabled' => env('DALL_E_DISABLED', false),
];
