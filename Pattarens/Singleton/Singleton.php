<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 02.10.2017
 * Time: 23:06
 */

class Singleton
{
    protected static $instance = null;
    private $count;

    protected function __construct()
    {
        $this->count = 0;
    }

    protected function __clone(){}
    protected function __wakeup(){}

    /**
     * @return static
     */
    public static function getInstance()
    {
        if(is_null(static::$instance)){
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function showCountAndPlus()
    {
        echo '<p>'.$this->count++.'</p>';
    }
}