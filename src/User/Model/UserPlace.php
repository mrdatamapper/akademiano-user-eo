<?php
/**
 * User: Evgeniy
 */

namespace User\Model;


use DeltaCore\Prototype\AbstractEntity;
use DeltaCore\Prototype\Parts\TimeStamp;
use DeltaDb\EntityInterface;
use DeltaDb\Model\Type\Json;

/**
 * Class UserPlace
 * @package User\Model
 * @method setUserManager(UserManager $userManager)
 * @method UserManager getUserManager()
 */
class UserPlace extends AbstractEntity implements EntityInterface {

    use TimeStamp;

    protected $id;
    protected $user;
    protected $data;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        if (!$this->user instanceof EntityInterface) {
            $this->user = $this->getUserManager()->findById($this->user);
        }
        return $this->user;
    }

    /**
     * @return Json|null
     */
    public function getData()
    {
        if (!is_null($this->data) && !$this->data instanceof Json) {
            $this->data = new Json($this->data);
        }
        return $this->data;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

}