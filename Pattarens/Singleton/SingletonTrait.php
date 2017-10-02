<?php
/**
 * Created by PhpStorm.
 * User: lance
 * Date: 02.10.2017
 * Time: 23:09
 */

trait SingletonTrait
{
    protected static $instance = null;

    protected function __construct(){}
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

    public function speakHello()
    {
        echo '<p>Hello:<b>'.__CLASS__.'</b> from:<b>'.__FILE__.'</b></p>';
    }
}