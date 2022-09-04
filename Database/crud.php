<?php
    //CRUD stands for creation, read, update and delete
    class crud{
        private $db;

        function __construct($conn){
            try{
                $this->db = $conn;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function insert($fname, $lname, $dob, $speciality, $email, $phone){
            try {
                $sql = "INSERT INTO student (firstname, lastname, dob, speciality_id, email, phone) VALUES  (:fname,:lname,:dob,:speciality,:email,:phone)";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':speciality',$speciality);

                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function get_record(){
            try{
                $sql = "SELECT * FROM `student` st inner join speciality sp on st.speciality_id = sp.speciality_id";
                $rec = $this->db->query($sql);
                return $rec;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        public function get_speciality(){
            try{
                $sql = "SELECT * FROM `speciality`";
                $rec = $this->db->query($sql);
                return $rec;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function get_student($id){
            try{
                $sql = "SELECT * FROM `student` st inner join speciality sp on st.speciality_id = sp.speciality_id WHERE student_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $response = $stmt->fetch();

                return $response;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function update_student($id, $fname, $lname, $dob, $speciality, $email, $phone){
            try{
                $sql = "UPDATE `student` SET `firstname`= :fname,`lastname`= :lname,`dob`= :dob,`speciality_id`= :speciality,`email`= :email,`phone`= :phone WHERE `student_id`= :id";
                $stmt = $this->db->prepare($sql);

                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':dob',$dob);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':phone',$phone);
                $stmt->bindparam(':speciality',$speciality);

                $stmt->execute();
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function remove($id)
        {
            try
            {
                $sql = "DELETE from `student` WHERE student_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);

                $stmt->execute();
                return true;
            }
            catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }
?>