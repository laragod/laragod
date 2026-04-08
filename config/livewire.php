<?php

return [

    'temporary_file_upload' => [
        'middleware' => ['auth', 'throttle:5,1'],
    ],

];
