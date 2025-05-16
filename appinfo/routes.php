<?php

return [
    // Main page (invite interface)
    ['name' => 'page#index', 'url' => '/', 'verb' => 'GET'],

    // Generate a token (invite request form submit)
    ['name' => 'page#generateToken', 'url' => '/generate', 'verb' => 'POST'],

    // Accept an invite with token
    ['name' => 'page#acceptInvite', 'url' => '/invite/{token}', 'verb' => 'GET'],
    ['name' => 'page#acceptInvitePost', 'url' => '/invite/{token}', 'verb' => 'POST'],

    // Success confirmation page
    ['name' => 'page#success', 'url' => '/success', 'verb' => 'GET'],

    // Admin view of issued invites
    ['name' => 'admin#index', 'url' => '/admin', 'verb' => 'GET'],

    // API endpoint (optional - for automation or future use)
    ['name' => 'api#validateToken', 'url' => '/api/validate/{token}', 'verb' => 'GET'],

    // Static pages like Terms
    ['name' => 'page#terms', 'url' => '/terms', 'verb' => 'GET'],
];
