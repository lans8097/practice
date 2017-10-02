<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 02.10.2017
 * Time: 23:48
 */

class RegistryLock
{
    use RegistryTrait;

    protected $lock = [];

    /**
     * @param string $kay
     * @param mixed $value
     * @param bool $lock
     */
    public function set($kay, $value, $lock = false)
    {
        if($this->exist($kay) && $this->isLock($kay)){
            echo 'key:'.$kay.' is lock to modify';
        }

        if($lock) array_push($this->lock, $kay);
        $this->date[$kay]=$value;
    }

    /**
     * @param $kay
     * @return bool
     */
    private function isLock($kay)
    {
        return in_array($kay, $this->lock);
    }

    /**
     * @param string $kay
     * @return bool|null
     */
    public function drop($kay)
    {
        if($this->isLock($kay)){
            echo 'key:'.$kay.' is lock to drop';
            return false;
        }

        unset($this->date[$kay]);
    }



}