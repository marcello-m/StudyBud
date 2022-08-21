<?php
class DataLayer
{
    public function db_connect() {
        $USERNAME = "marcello";
        $PASSWORD = "";
        $HOST = "localhost";
        $DB_NAME = "studybud_db";

        $connection = mysqli_connect($HOST, $USERNAME, $PASSWORD, $DB_NAME) or die("Errore nella connessione al DB" . mysqli_error());

        return $connection;
    }

    public function listCourses(){
        $connection = $this->db_connect();

        $sql = "SELECT * FROM courses";

        $risposta = mysqli_query($connection, $sql) or die("Errore nella query: " . $sql . '\n' . mysqli_error());

        mysqli_close($connection);

        $courses = array();
        while($riga = mysqli_fetch_array($risposta)){
            $courses[] = new Course($riga['course_id'], $riga['name'], $riga['professor'], $riga['institution'], $riga['major'], $riga['year']);
        }

        return $courses;
    }

    public function deleteCourse($course_id){
        $connection = $this->db_connect();

        $sql = "DELETE FROM courses WHERE course_id = $course_id";

        $risposta = mysqli_query($connection, $sql) or die("Errore nella query: " . $sql . '\n' . mysqli_error());
        
        mysqli_close($connection);
    }
    
    public function editCourse($course_id, $name, $professor, $institution, $major, $year){
        $connection = $this->db_connect();
        
        $sql = "UPDATE courses SET name = '$name', professor = '$professor', institution = '$institution', major = '$major', year = '$year' WHERE course_id = $course_id";
        
        $risposta = mysqli_query($connection, $sql) or die("Errore nella query: " . $sql . '\n' . mysqli_error());
        
        mysqli_close($connection);
    }

    public function addCourse($name, $professor, $institution, $major, $year){
        $connection = $this->db_connect();
        
        $sql = "INSERT INTO courses (name, professor, institution, major, year) VALUES ('$name', '$professor', '$institution', '$major', '$year')";
        
        $risposta = mysqli_query($connection, $sql) or die("Errore nella query: " . $sql . '\n' . mysqli_error());
        
        mysqli_close($connection);
    }

    public function findUserById($user_id){
        $connection = $this->db_connect();
        
        $sql = "SELECT * FROM users WHERE user_id = $user_id";
        
        $risposta = mysqli_query($connection, $sql) or die("Errore nella query: " . $sql . '\n' . mysqli_error());
        
        mysqli_close($connection);
        
        $riga = mysqli_fetch_array($risposta);
        $user = new User($riga['user_id'], $riga['name'], $riga['surname'], $riga['email'], $riga['password'], $riga['role']);
        
        return $user;
    }
}
?>