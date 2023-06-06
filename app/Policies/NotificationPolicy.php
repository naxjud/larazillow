<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Notifications\DatabaseNotification;

class NotificationPolicy
{
    use HandlesAuthorization;

    public function update(User $user, DatabaseNotification $databaseNotification)
    {
        // dd('i was called');
        return $user->id === $databaseNotification->notifiable_id;
    }


}
