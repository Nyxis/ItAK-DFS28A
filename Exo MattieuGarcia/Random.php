<?php
class RandomResult
{
    private $type;

    const SUCCESS = 'success';
    const FAILURE = 'failure';
    const CRITICAL_SUCCESS = 'critical_success';
    const FUMBLE = 'fumble';

    public function __construct($type)
    {
        $this->type = $type;
        $this->log("RandomResult created with type: $type");
    }

    public function getType()
    {
        return $this->type;
    }

    public static function generate()
    {
        $randomNumber = rand(1, 100);
        if ($randomNumber <= 40) {
            return new self(self::SUCCESS);
        } elseif ($randomNumber <= 55) {
            return new self(self::CRITICAL_SUCCESS);
        } elseif ($randomNumber <= 60) {
            return new self(self::FUMBLE);
        } else {
            return new self(self::FAILURE);
        }
    }

    public function log($message)
    {
        echo $message . PHP_EOL;
    }
}
