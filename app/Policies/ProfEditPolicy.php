<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProfEditPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function view(User $user,User $model)
    {//プロフィール編集ページは自分のみ閲覧可能にする
        return $user->id === $model->id;
    }

    public function update(User $user,User $model)
    {//プロフィール編集ページは自分のみ更新可能にする
        return $user->id === $model->id;
    }
}
