<?php
class Course
{
    private $course_id;
    private $name;
    private $professor;
    private $institution;
    private $major;
    private $year;

    public function Course($course_id, $name, $professor, $institution, $major, $year)
    {
        $this->course_id = $course_id;
        $this->name = $name;
        $this->professor = $professor;
        $this->institution = $institution;
        $this->major = $major;
        $this->year = $year;
    }

    public function getCourseId()
    {
        return $this->course_id;
    }

    public function setCourseId($course_id)
    {
        $this->course_id = $course_id;
    }
}
?>