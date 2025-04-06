<?php
use App\Models\UserCheckList;
use App\Models\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

function getImage($folder, $file): string
{
    return "http://localhost:8002/uploads/$folder/$file";
}
