<?php

if (!function_exists('get_roles')) {
    function get_roles()
    {
        return [
            "web" => "Admin",
            "owner" => "Owner",
            "partner" => "Partner",
        ];
    }
}
