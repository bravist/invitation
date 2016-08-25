<?php

namespace Weipei\Invitation;

use App\Models\WeipeiActivities\Invitation as WeipeiInvitation;


/**
 * @author brave <chenghuiyong1987@gmail.com>
 */
class Invitation
{
    private $name;

    private $telephone;

    protected $weipeiInvitation;

    public function __construct($name, $telephone, WeipeiInvitation $weipeiInvitation)
    {
        $this->setTelephone($telephone);
        $this->weipeiInvitation = $weipeiInvitation;
    }

    protected function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    protected function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }


    public function save()
    {
        try {
            $this->isTelephoneExist();
            $this->weipeiInvitation->create([
                'name'      => $this->getName(),
                'telephone' => $this->telephone(),
            ]);
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function get()
    {
        return $this->weipeiInvitation->get();
    }

    private function isTelephoneExist()
    {
        if ($this->weipeiInvitation->where('telephone', $this->getTelephone())->first()) {
            throw new \Exception(sprintf("The telephone %s has exist", $this->getTelephone()));
        }
    }

}