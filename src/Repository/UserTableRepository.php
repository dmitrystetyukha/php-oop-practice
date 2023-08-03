<?php

namespace Repository;

use Entity\Role;
use Entity\User\BaseUser;
use Exception;
use Model\BannedUserTable;
use Model\RoleTable;
use Model\UserTable;
use UserCreator\UserCreator;

class UserTableRepository extends BaseUserRepository
{
    /**
     * @param int $id
     * @return \Entity\User\BaseUser
     */
    public function getUser(int $id): BaseUser
    {
        $user = UserTable::where('id', $id)->get();

        $bannedUser = BannedUserTable::where('user_id', $id)->get();

        $isBanned = false;
        if (!is_null($bannedUser)) {
            $isBanned = true;
        }

        return UserCreator::createUser(
            $user->id,
            $user->name,
            $user->email,
            Role::from($user->role()->name),
            $isBanned,
        );
    }

    /**
     * Создает новую запись пользователя в БД
     *
     * @param \Entity\User\BaseUser $newUser
     * @return void
     */
    public function addUser(BaseUser $newUser): void
    {
        $user = UserTable::create([
            'name'  => $newUser->getName(),
            'email' => $newUser->getEmail(),
        ]);

        $user->role()->attach(RoleTable::where('name', $newUser->getRole()->value));
    }

    public function updateUser(int $id, BaseUser $newUser): void
    {
        $user = UserTable::where('id', $id);
        $user->beginTransaction();
        try {
            $user        = UserTable::where('id', $id);
            $user->name  = $newUser->getName();
            $user->email = $newUser->getEmail();

            $user->role()->detach(Role::where('name', $user->getRole()->value));
            $user->role()->attach(Role::where('name', $newUser->getRole()->value));

            $user->commit();
        } catch (Exception $exception) { // скорее всего какое-то исключение UserTable выбросит, но не смотрел еще, что она может выбросить, потому пока ловлю общее
            $user->rollBack();
        }
    }

    public function deleteUser(int $id): void
    {
        $user = UserTable::where('id', $id);
        $user->beginTransaction();

        try {
            $user->delete();
            $user->events()->delete();
            $user->role()->delete();

            $user->commit();
        } catch (Exception $exception) { // скорее всего какое-то исключение UserTable выбросит, но не смотрел еще, что она может выбросить, потому пока ловлю общее
            $user->rollBack();
        }
    }

    public function banUser(int $id): void
    {
        $bannedUser = BannedUserTable::create();
        $bannedUser->users()->attach(UserTable::where('id', $id));
        $bannedUser->save();
    }
}
