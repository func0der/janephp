<?php

namespace PicturePark\API\Model;

class IdpClaimToUserAttributeMapping
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * Claim type name coming from external identity provider
     *
     * @var string|null
     */
    protected $claimType;
    /**
     * Path to a user attribute to synchronize
     *
     * @var string|null
     */
    protected $userAttributePath;
    /**
     * Claim type name coming from external identity provider
     *
     * @return string|null
     */
    public function getClaimType() : ?string
    {
        return $this->claimType;
    }
    /**
     * Claim type name coming from external identity provider
     *
     * @param string|null $claimType
     *
     * @return self
     */
    public function setClaimType(?string $claimType) : self
    {
        $this->initialized['claimType'] = true;
        $this->claimType = $claimType;
        return $this;
    }
    /**
     * Path to a user attribute to synchronize
     *
     * @return string|null
     */
    public function getUserAttributePath() : ?string
    {
        return $this->userAttributePath;
    }
    /**
     * Path to a user attribute to synchronize
     *
     * @param string|null $userAttributePath
     *
     * @return self
     */
    public function setUserAttributePath(?string $userAttributePath) : self
    {
        $this->initialized['userAttributePath'] = true;
        $this->userAttributePath = $userAttributePath;
        return $this;
    }
}