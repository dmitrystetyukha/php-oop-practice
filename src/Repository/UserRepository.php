<?php

namespace Repository;

use Entity\Role;
use Entity\User\BaseUser;
use Exception;
use Model\BannedUserTable;
use Model\RoleTable;
use Model\UserTable;
use RoleManager\UserFactory;

class UserRepository extends BaseRepository
{
    /**
     * @param string $id
     * @return \Entity\User\BaseUser
     */
    public function get(string $id): BaseUser
    {
        $storedUser = UserTable::where('id', $id)->get();

        $storedUserRole = Role::from($storedUser->role()->name);

        if ($storedUserRole === Role::Customer) {
            $bannedStoredUser = BannedUserTable::where('user_id', $id)->get();
        }

        $user = UserFactory::createUser(
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
     * @param \Entity\User\BaseUser $newUser
     * @return void
     */
    public function save(BaseUser $newUser): void
    {
        $user = UserTable::create([
            'name'  => $newUser->getName(),
            'email' => $newUser->getEmail(),
        ]);

        $user->role()->attach(RoleTable::where('name', $newUser->getRole()->value));
    }

    /**
     * Обновляет запись пользователя в БД
     * @param string                $id
     * @param \Entity\User\BaseUser $newUser
     * @return void
     */
    public function update(string $id, BaseUser $newUser): void
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

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
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

    /**
     * @param string $id
     * @return void
     */
    public function ban(string $id): void
    {
        $bannedUser = BannedUserTable::create();
        $bannedUser->users()->attach(UserTable::where('id', $id));
        $bannedUser->save();
    }
}
