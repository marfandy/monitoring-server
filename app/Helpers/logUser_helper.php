<?php

use App\Models\LogUserModel;



function log_user($action = "", $activity = "")
{

    session();
    $logUserModel = new LogUserModel();
    $logUserModel->save([
        'user' => session('fullname'),
        'action' => $action,
        'activity' => $activity
    ]);
}
