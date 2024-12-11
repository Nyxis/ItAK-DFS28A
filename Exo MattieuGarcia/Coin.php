<?php
class Coin
{
    public function flip()
    {
        $result = rand(0, 1) ? 'heads' : 'tails';
        $this->log("Coin flipped: $result");
        return $result;
    }

    public function log($message)
    {
        echo $message . PHP_EOL;
    }
}
