<?php
class User
{
    private $user_id;
    private $username;
    private $full_name;
    private $email;
    private $institution;
    private $degree;
    private $major;
    private $year;
    private $credits;
    private $role;

    public function User($user_id, $username, $full_name, $email, $institution, $degree, $major, $year, $credits, $role)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->full_name = $full_name;
        $this->email = $email;
        $this->institution = $institution;
        $this->degree = $degree;
        $this->major = $major;
        $this->year = $year;
        $this->credits = $credits;
        $this->role = $role;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}
?>