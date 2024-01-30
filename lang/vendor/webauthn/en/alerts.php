<?php

return [
    'browser_not_secure' => 'WebAuthn only supports secure connections.',
    'browser_not_supported' => 'Your browser does not support WebAuthn.',
    'register_not_allowed' => 'You are not able to register any more keys for your account.',
    'key_validation_error' => 'An error occurred during the validation of the key.',
    'key_not_allowed_error' => 'The operation either timed out or was not allowed.',
    'key_already_used' => "This key is already registered. It's not necessary to register it again.",
    'login_not_allowed_error' => 'Please try again or use a different authentication method.',

    'auth' => [
        'AbortError' => 'Authentication ceremony was sent an abort signal.',
        'NotAllowedError' => 'User clicked cancel, or the authentication ceremony timed out.',
        'NotAllowedError_none_registered' => 'No available authenticator recognized any of the allowed credentials.',
        'UnknownError' => 'The authenticator was unable to process your request.',
    ],
];
