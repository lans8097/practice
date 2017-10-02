<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 02.10.2017
 * Time: 23:48
 */

trait RegistryTrait
{
    protected $date = [];

    /**
     * @param string $kay
     * @param mixed $value
     */
    public function set($kay, $value)
    {
        $this->date[$kay] = $value;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function get($name)
    {
        return isset($this->date[$name])?$this->date[$name]:null;
    }

    /**
     * @param $kay
     * @return bool
     */
    public function exist($kay)
    {
        return isset($this->date[$kay]);
    }

    /**
     * @param string $kay
     */
    public function drop($kay)
    {
        unset($this->date[$kay]);
    }

}