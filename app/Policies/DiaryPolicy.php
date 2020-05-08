<?php

namespace App\Policies;

use App\User;
use App\diary;
use Illuminate\Auth\Access\HandlesAuthorization;

class DiaryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any diaries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the diary.
     *
     * @param  \App\User  $user
     * @param  \App\diary  $diary
     * @return mixed
     */
    public function view(User $user, diary $diary)
    {//日記編集ページは見れないようにする必要がある
        return $user->id === $diary->user_id;
    }

    /**
     * Determine whether the user can create diaries.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {

    }

    /**
     * Determine whether the user can update the diary.
     *
     * @param  \App\User  $user
     * @param  \App\diary  $diary
     * @return mixed
     */
    public function update(User $user, diary $diary)
    {//日記の更新
        return $user->id === $diary->user_id;
    }

    /**
     * Determine whether the user can delete the diary.
     *
     * @param  \App\User  $user
     * @param  \App\diary  $diary
     * @return mixed
     */
    public function delete(User $user, diary $diary)
    {//日記の削除
        return $user->id === $diary->user_id;
    }

    /**
     * Determine whether the user can restore the diary.
     *
     * @param  \App\User  $user
     * @param  \App\diary  $diary
     * @return mixed
     */
    public function restore(User $user, diary $diary)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the diary.
     *
     * @param  \App\User  $user
     * @param  \App\diary  $diary
     * @return mixed
     */
    public function forceDelete(User $user, diary $diary)
    {
        //
    }
}
