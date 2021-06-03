<?php

class Users extends Db {

    protected function getUser($id) {
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetchAll();
    }

    protected function idExists($id) {
        $sql = "SELECT * FROM users WHERE id = ?";        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    protected function getUserCourse($courseId, $id) {
        $sql = "SELECT colleges.college_id, colleges.college_name, users.course_id, courses.course_name
                FROM users, colleges JOIN courses ON colleges.college_id = courses.college_id
                WHERE courses.course_id = ? AND users.id = ?;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$courseId, $id]);

        return $stmt->fetchAll();
    }

    protected function setUser($id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role) {
        $sql = "INSERT INTO users (id, email, password, first_name, middle_name, last_name, phone, gender, course_id, year_level, role) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id, $email, $password, $firstName, $middleName, $lastName, $phone, $gender, $course, $yearLevel, $role]);
    }
}
