<?php

namespace Repository;

use Entity\Role;
use Entity\User\BaseUser;
use Exception;
use Model\BannedUserTable;
use Model\RoleTable;
use Model\UserTable;
use RoleManager\UserCreator;

class UserTableRepository extends BaseUserRepository
{
    /**
     * @param string $id
     * @return \Entity\User\BaseUser
     */
    public function getUser(string $id): BaseUser
    {
        $storedUser = UserTable::where('id', $id)->get();

        $storedUserRole = Role::from($storedUser->role()->name);

        if ($storedUserRole === Role::Customer) {
            $bannedStoredUser = BannedUserTable::where('user_id', $id)->get();
        }

        $user = UserCreator::createUser(
            $storedUser->id,
            $storedUser->name,
            $storedUser->email,
            $storedUserRole
        );

        if (isset($bannedStoredUser)) {
            $user->setIsBanned(true);
        }


        return $user;
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

    public function updateUser(string $id, BaseUser $newUser): void
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

    public function deleteUser(string $id): void
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

    public function banUser(string $id): void
    {
        $bannedUser = BannedUserTable::create();
        $bannedUser->users()->attach(UserTable::where('id', $id));
        $bannedUser->save();
    }
}
