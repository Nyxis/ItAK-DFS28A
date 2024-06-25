<?php

class EventDispatcher
{
    private $listeners = [];

    public function addEventListener(string $event, callable $listener)
    {
        if (!isset($this->listeners[$event])) {
            $this->listeners[$event] = [];
        }
        $this->listeners[$event][] = $listener;
    }

    public function dispatchEvent(string $event, ...$data)
    {
        if (isset($this->listeners[$event])) {
            foreach ($this->listeners[$event] as $listener) {
                call_user_func($listener, ...$data);
            }
        }
    }
}

$dispatcher = new EventDispatcher();


$dispatcher->addEventListener('newUser', function ($user) {
    echo "Nouvel utilisateur : $user->name, $user->email \n";
});


$dispatcher->addEventListener('sendMessage', function ($user, $message) {
    echo "De $user->name : $message \n";
});

$user = (object) ['name' => 'Tristan', 'email' => 't.jacquemard@it-students.fr'];

$dispatcher->dispatchEvent('newUser', $user);
$dispatcher->dispatchEvent('sendMessage', $user, 'Bonjour!');
