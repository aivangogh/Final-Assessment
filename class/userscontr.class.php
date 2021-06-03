<?php

class UsersContr extends Users {

    public function createUser($id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role) {
        $this->setUser($id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role);
    }

    public function checkUserExists($id) {
        $this->idExists($id);
    }

    public function login($id, $password) {
        // $this.idExists($id);
    }

}
