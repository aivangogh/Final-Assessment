<?php

class UsersView extends Users {

    public function showUser($id) {
        $result = $this->getUser($id);
    }
}