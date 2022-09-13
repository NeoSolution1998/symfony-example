<?php

namespace App\Model;

class User
{
    private $path = __DIR__ . '/../../var/users.txt';
    public $name;
    public $email;
    public $password;

    function name($name)
    {
        $this->name = $name;
    }

    function email($email)
    {
        $this->email = $email;
    }

    function password($password)
    {
        $this->password = $password;
    }

    public function getAll()
    {
        $users = file_get_contents($this->path);
        $users = json_decode($users, true);
        return $users;
    }

    public function save()
    {
        if (!file_exists($this->path)) {
            $users = [];
            return file_put_contents($this->path, json_encode($users));
        }
        $id = rand(0, 1000);
        $users = file_get_contents($this->path);
        $users = json_decode($users, true);
        $users[$id] = ['id' => $id, 'name' => $this->name, 'email' => $this->email,'password' => $this->password]; 
        file_put_contents($this->path, json_encode($users));
        return;
    }
}
