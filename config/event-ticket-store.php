<?php

/**
 * ETS - Event Ticket Store
 */

return [
    "tickets_url" => env("ETS_TICKETS_URL", '/tickets/{event}'),
    "robokassa_url" => env("ETS_TICKETS_URL", '/check-payment'),
    "company" => [
        "name" => env("ETS_COMPANY_NAME", ''),
        "inn" => env("ETS_COMPANY_INN", ''),
        "kpp" => env("ETS_COMPANY_KPP", ''),
        "ogrn" => env("ETS_COMPANY_OGRN", ''),
        "bik" => env("ETS_COMPANY_BIK", ''),
        "rs" => env("ETS_COMPANY_RS", ''),
        "ks" => env("ETS_COMPANY_KS", ''),
        "bank" => env("ETS_COMPANY_BANK", ''),
        "phone" => env("ETS_COMPANY_PHONE", ''),
        "address" => env("ETS_COMPANY_ADDRESS", ''),
        "general_manager" => env("ETS_COMPANY_GENERAL_MANAGER", ''),
        "position" => env("ETS_COMPANY_POSITION", ''),
        "reason" => env("ETS_COMPANY_REASON", ''),
    ],
    "robokassa" => [
        "login" => env("ETS_ROBOKASSA_LOGIN", ''),
        "password" => env("ETS_ROBOKASSA_PASSWORD", ''),
    ],
];
