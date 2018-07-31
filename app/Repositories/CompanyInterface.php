<?php

namespace App\Repositories;

interface CompanyInterface
{
    public function getCompanies($user_id=0,$text);
}