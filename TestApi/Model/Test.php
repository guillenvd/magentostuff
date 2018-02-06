<?php
namespace Training\TestApi\Model;
use Training\TestApi\Api\TestInterface;
 
class Test implements TestInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $name Users name.
     * @return string Greeting message with users name.
     */
    public function name($name) {
        return "Hello, " . $name;
    }
}