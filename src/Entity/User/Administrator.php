<?php

namespace Entity\User;

class Administrator extends BaseUser
{
    use BanUserTrait;

    /**
     * @param \Entity\User\BaseUser $user
     *
     * @throws \Exception
     */
    public function addUser(BaseUser $user): void
    {
        $this->repository->addUser($user);
    }

    public function deleteUser(string $id): void
    {
        $this->repository->deleteUser($id);
    }

    public function sendRestorePasswordMail(string $id)
    {
        // TODO: Implement sendRestorePasswordMail() method for Administrator Entity.
    }
}
