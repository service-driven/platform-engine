<?php

return [
    "auth" => [
        "base_url" => "http://unitedpeople.local/auth/process",
        "providers" => [
            "XING" => [
                "enabled" => true,
                "keys" => [
                    "key" => "58dd6490e6587f2c45b0",
                    "secret" => "84226127b281018a76bde6c12d0cf4696e902461"
                ],
                "wrapper" => [
                    "path" => getcwd() . "/vendor/hybridauth/hybridauth/additional-providers/hybridauth-xing/Providers/XING.php",
                    "class" => "Hybrid_Providers_XING",
                ],
            ],
            "BitBucket" => [
                "enabled" => false,
                "keys" => [
                    "key" => "58dd6490e6587f2c45b0",
                    "secret" => "84226127b281018a76bde6c12d0cf4696e902461"
                ],
                "wrapper" => [
                    "path" => getcwd() . "/vendor/hybridauth/hybridauth/additional-providers/hybridauth-bitbucket/Providers/BitBucket.php",
                    "class" => "Hybrid_Providers_BitBucket",
                ],
            ],
            "GitHub" => [
                "enabled" => false,
                "keys" => [
                    "key" => "58dd6490e6587f2c45b0",
                    "secret" => "84226127b281018a76bde6c12d0cf4696e902461"
                ],
                "wrapper" => [
                    "path" => getcwd() . "/vendor/hybridauth/hybridauth/additional-providers/hybridauth-github/Providers/GitHub.php",
                    "class" => "Hybrid_Providers_GitHub",
                ],
            ],
            "Dropbox" => [
                "enabled" => false,
                "keys" => [
                    "key" => "58dd6490e6587f2c45b0",
                    "secret" => "84226127b281018a76bde6c12d0cf4696e902461"
                ],
                "wrapper" => [
                    "path" => getcwd() . "/vendor/hybridauth/hybridauth/additional-providers/hybridauth-dropbox/Providers/Dropbox.php",
                    "class" => "Hybrid_Providers_Dropbox",
                ],
            ],
            "Paypal" => [
                "enabled" => false,
                "keys" => [
                    "key" => "58dd6490e6587f2c45b0",
                    "secret" => "84226127b281018a76bde6c12d0cf4696e902461"
                ],
                "wrapper" => [
                    "path" => getcwd() . "/vendor/hybridauth/hybridauth/additional-providers/hybridauth-paypal/Providers/Paypal.php",
                    "class" => "Hybrid_Providers_Paypal",
                ],
            ],
            "StackExchange" => [
                "enabled" => false,
                "keys" => [
                    "key" => "58dd6490e6587f2c45b0",
                    "secret" => "84226127b281018a76bde6c12d0cf4696e902461"
                ],
                "wrapper" => [
                    "path" => getcwd() . "/vendor/hybridauth/hybridauth/additional-providers/hybridauth-stackexchange/Providers/StackExchange.php",
                    "class" => "Hybrid_Providers_StackExchange",
                ],
            ],


            "Google" => [
                "enabled" => false,
                "keys" => [
                    "id" => "279994941500-5l059ovudn8j5lh5c8lmofl8gikoq0i1.apps.googleusercontent.com",
                    "secret" => "D6jP6F09Qd3mVfbbBvrlodAO",
                ],
            ],
            "Facebook" => [
                "enabled" => false,
                "keys" => [
                    "id" => "289126911457550",
                    "secret" => "63c8cb2ccf0027593151cf9d54fbb9fe",
                ],
                "scope" => "email, user_about_me, user_birthday, user_hometown",
            ],
            "Twitter" => [
                "enabled" => false,
                "keys" => [
                    "key" => "VIwfIdeeDXoJr5Q64q6yXQ",
                    "secret" => "mbWsLsZ977uNDuMOaP5T8lRGAcB16gg4qkrt1Eao",
                ],
            ],
            "LinkedIn" => [
                "enabled" => false,
                "keys" => [
                    "key" => "",
                    "secret" => ""
                ],
            ],
        ],
//        "debug_mode" => false,
//        "debug_file" => "",
    ],
];
