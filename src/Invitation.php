<?php

namespace Bravist\Invitation;

use App\Models\WeipeiActivities\InvitationLetter;

/**
 * @author brave <chenghuiyong1987@gmail.com>
 */
class Invitation
{

    protected $invitation;

    public function __construct(InvitationLetter $invitation)
    {
        $this->invitation = $invitation;
    }

    public function save($name, $telephone)
    {
        try {
            $this->isTelephoneExist($telephone);
            $this->invitation->create([
                'name'      => $name,
                'telephone' => $telephone,
            ]);
        } catch (Exception $e) {
            throw $e;
        }

    }

    public function get($sign, $sort, $lastTime = '', $pageSize = 20)
    {
        $builder = $this->invitation->orderBy('id', $sort);

        if ($lastTime) {
            $builder->where('created_at', $sign, $lastTime);
        }

        return $builder->limit($pageSize)->get();
    }

    private function isTelephoneExist($telephone)
    {
        if ($this->invitation->where('telephone', $telephone)->first()) {
            throw new \Exception(sprintf(trans('The telephone %s has exist'), $telephone));
        }
    }

}