<?php

namespace App\Repositories;

interface UserInterface
{
    public function getUsers($user_id,$text);
    public function addBenhNhan($company_id,$arr);
}