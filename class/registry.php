<?php
//  Author: Trabis
//  URL: http://www.xuups.com
//  E-Mail: lusopoemas@gmail.com

defined('XOOPS_ROOT_PATH') || exit('Restricted access.');

/**
 * Class ForRegistry
 */
class ForRegistry
{
    public $_entries;
    public $_locks;
    public $_dirname;

    /**
     * @param string $dirname
     */
    public function __construct($dirname = '')
    {
        $this->_dirname = $dirname;
        $this->_entries = [];
        $this->_locks   = [];
    }

    /**
     * @return ForRegistry
     */
    public static function getInstance()
    {
        static $instance;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    /**
     * @param $key
     * @param $item
     *
     * @return bool
     */
    public function setEntry($key, $item)
    {
        if (true === $this->isLocked($key)) {
            trigger_error('Unable to set entry `' . $key . '`. Entry is locked.', E_USER_WARNING);

            return false;
        }

        $this->_entries [$this->_dirname] [$key] = $item;

        return true;
    }

    /**
     * @param $key
     */
    public function unsetEntry($key)
    {
        unset($this->_entries [$key]);
    }

    /**
     * @param $key
     *
     * @return null
     */
    public function getEntry($key)
    {
        if (false === isset($this->_entries [$this->_dirname] [$key])) {
            return null;
        }

        return $this->_entries [$this->_dirname] [$key];
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function isEntry($key)
    {
        return (null !== $this->getEntry($key));
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function lockEntry($key)
    {
        $this->_locks [$this->_dirname] [$key] = true;

        return true;
    }

    /**
     * @param $key
     */
    public function unlockEntry($key)
    {
        unset($this->_locks [$this->_dirname] [$key]);
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function isLocked($key)
    {
        return (true === isset($this->_locks [$this->_dirname] [$key]));
    }

    public function unsetAll()
    {
        $this->_entries = [];
        $this->_locks   = [];
    }
}
