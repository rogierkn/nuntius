<?php

return [
    "slug" => "blog",
    "gate" => "use-nuntius",
    "model" => [
        "className" => App\User::class,
        "identifier" => "id"
    ],

];