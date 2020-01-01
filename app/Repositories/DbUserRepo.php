<?php
/**
 * Owner: Muhammad Saimon Uddin
 * 12/7/2019 12:14 PM
 */

namespace App\Repositories;


class DbUserRepo implements UserRepositories {

    public function create($attributes)
    {
        dd("$attributes from interface");
    }

}