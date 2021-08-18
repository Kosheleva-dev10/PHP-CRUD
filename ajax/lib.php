<?php

require __DIR__ . '/db_connection.php';

class CRUD
{

    protected $db;

    function __construct()
    {
        $this->db = DB();
    }

    function __destruct()
    {
        $this->db = null;
    }

    function get_announcement_status($status_id)
    {
        switch($status_id)
        {
            case '0':
                return "Draft";
                break;
            case '1':
                return "Published";
                break;
            case '2':
                return "Hidden";
                break;
        }

        if($status_id == 1 || $status_id == "1")
        {
            return "Active";
        }
        else
        {
            return "Inactive";
        }
    }

    function get_staff_status($status_id)
    {

        if($status_id == 1 || $status_id == "1")
        {
            return "Active";
        }
        else
        {
            return "Inactive";
        }
    }
    /*
     * Add new Record
     *
     * @param $first_name
     * @param $last_name
     * @param $email
     * @return $mixed
     * */
    public function CreateNewAnnouncement($valid_from_date,$valid_to_date,$ann_title,$ann_content,$ann_status)
    {
        $query = $this->db->prepare("INSERT INTO announcement(valid_from_date,valid_to_date,ann_title,ann_content,ann_status) VALUES (:valid_from_date, :valid_to_date, :ann_title, :ann_content, :ann_status)");
        $query->bindParam("valid_from_date", $valid_from_date, PDO::PARAM_STR);
        $query->bindParam("valid_to_date", $valid_to_date, PDO::PARAM_STR);
        $query->bindParam("ann_title", $ann_title, PDO::PARAM_STR);
        $query->bindParam("ann_content", $ann_content, PDO::PARAM_STR);
        $query->bindParam("ann_status", $ann_status, PDO::PARAM_STR);

        $query->execute();
        return $this->db->lastInsertId();
    }


    /*
     * Search  records
     *
     * @return $mixed
     * */
    public function GetSearchStaff($search_text)
    {
        $query = $this->db->prepare("SELECT * FROM staff where staff_id = :staff_id");
        $query->bindParam("staff_id", $search_text, PDO::PARAM_STR);
        //or first_name like '%:first_name%' or last_name like '%:last_name%'
        //$query->bindParam("first_name", $search_text, PDO::PARAM_STR);
        //$query->bindParam("last_name", $search_text, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    public function CreateNewAccount($staff_id)
    {
        $query = $this->db->prepare("INSERT INTO staff(staff_id,userpwd,first_name,last_name,email_address,mobile_number) VALUES (:staff_id, :userpwd, :first_name,:last_name,:email_address,:mobile_number)");
        $query->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
        $query->bindParam("userpwd", $staff_id, PDO::PARAM_STR);
        $query->bindParam("first_name", $staff_id, PDO::PARAM_STR);
        $query->bindParam("last_name", $staff_id, PDO::PARAM_STR);
        $query->bindParam("email_address", $staff_id, PDO::PARAM_STR);
        $query->bindParam("mobile_number", $staff_id, PDO::PARAM_STR);

        $query->execute();
        return $this->db->lastInsertId();
    }


    public function CreateNewStaff($staff_id,$userpwd,$first_name,$last_name,$email_address,$mobile_number)
    {
        $query = $this->db->prepare("INSERT INTO staff(staff_id,userpwd,first_name,last_name,email_address,mobile_number) VALUES (:staff_id,:userpwd,:first_name,:last_name,:email_address,:mobile_number)");
        $query->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
        $query->bindParam("userpwd", $userpwd, PDO::PARAM_STR);
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("email_address", $email_address, PDO::PARAM_STR);
        $query->bindParam("mobile_number", $mobile_number, PDO::PARAM_STR);

        $query->execute();
        return $this->db->lastInsertId();
    }

    public function GetSearchAnnoucements($search_text)
    {
        $query = $this->db->prepare("SELECT * FROM announcement where ann_title = :ann_title");
        $query->bindParam("ann_title", $search_text, PDO::PARAM_STR);
        //or first_name like '%:first_name%' or last_name like '%:last_name%'
        //$query->bindParam("first_name", $search_text, PDO::PARAM_STR);
        //$query->bindParam("last_name", $search_text, PDO::PARAM_STR);
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    public function GetCurrentAnnouncement()
    {
        $query = $this->db->prepare("SELECT * FROM announcement where valid_to_date >= CURDATE() AND    ann_status = 1");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    public function GetAllAnnouncements()
    {
        $query = $this->db->prepare("SELECT * FROM announcement");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
    /*
     * Read all records
     *
     * @return $mixed
     * */
    public function GetAllStaff()
    {
        $query = $this->db->prepare("SELECT * FROM staff");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }

    /*
     * Delete Record
     *
     * @param $user_id
     * */

    public function DeleteAnnouncement($announcement_id)
    {
        $query = $this->db->prepare("DELETE FROM announcement WHERE id = :id");
        $query->bindParam("id", $announcement_id, PDO::PARAM_STR);
        $query->execute();        
    }
    public function DeleteStaff($staff_id)
    {
        $query = $this->db->prepare("DELETE FROM staff WHERE id = :id");
        $query->bindParam("id", $staff_id, PDO::PARAM_STR);
        $query->execute();
    }

    public function UpdateAnnouncement($id,$valid_from_date,$valid_to_date,$ann_title,$ann_content,$announcement_status)
    {
        $query = $this->db->prepare("UPDATE announcement SET valid_from_date =:valid_from_date,valid_to_date= :valid_to_date,ann_title= :ann_title,ann_content= :ann_content,ann_status =:ann_status WHERE id= :id");
        $query->bindParam("valid_from_date", $valid_from_date, PDO::PARAM_STR);
        $query->bindParam("valid_to_date", $valid_to_date, PDO::PARAM_STR);
        $query->bindParam("ann_title", $ann_title, PDO::PARAM_STR);
        $query->bindParam("ann_content", $ann_content, PDO::PARAM_STR);
        $query->bindParam("ann_status", $announcement_status, PDO::PARAM_STR);
        $query->bindParam("id", $id, PDO::PARAM_STR);

        echo $query->execute();
    }
    /*
     * Update Record
     *
     * @param $first_name
     * @param $last_name
     * @param $email
     * @return $mixed
     * */
    public function UpdateStaff($staff_id,$userpwd,$first_name,$last_name,$email_address,$mobile_number,$is_active, $id)
    {
        $query = $this->db->prepare("UPDATE staff SET staff_id = :staff_id, userpwd= :userpwd, first_name = :first_name, last_name = :last_name, email_address = :email_address,mobile_number = :mobile_number,is_active = :is_active  WHERE id = :id");
        $query->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
        $query->bindParam("userpwd", $userpwd, PDO::PARAM_STR);
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("email_address", $email_address, PDO::PARAM_STR);
        $query->bindParam("mobile_number", $mobile_number, PDO::PARAM_STR);
        $query->bindParam("is_active", $is_active, PDO::PARAM_STR);
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
    }
   public function UpdateStaffProfile($staff_id,$userpwd,$first_name,$last_name,$email_address,$mobile_number,$id)
    {
        $query = $this->db->prepare("UPDATE staff SET staff_id=:staff_id,userpwd= :userpwd, first_name = :first_name, last_name = :last_name, email_address = :email_address,mobile_number = :mobile_number WHERE id = :id");
        $query->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
        $query->bindParam("userpwd", $userpwd, PDO::PARAM_STR);
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("email_address", $email_address, PDO::PARAM_STR);
        $query->bindParam("mobile_number", $mobile_number, PDO::PARAM_STR);
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
    }
    public function UpdateAdmProfile($first_name,$last_name,$email_address,$mobile_number,$password1, $id)
    {
        $query = $this->db->prepare("UPDATE admin_users SET first_name = :first_name, last_name = :last_name, email_address = :email_address,mobile_number = :mobile_number,userpwd = :userpwd  WHERE id = :id");
    
        $query->bindParam("first_name", $first_name, PDO::PARAM_STR);
        $query->bindParam("last_name", $last_name, PDO::PARAM_STR);
        $query->bindParam("email_address", $email_address, PDO::PARAM_STR);
        $query->bindParam("mobile_number", $mobile_number, PDO::PARAM_STR);
        $query->bindParam("userpwd", $password1, PDO::PARAM_STR);
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
    }
    /*
     * Get Details
     *
     * @param $user_id
     * */
    public function GetAnnouncementDetails($id)
    {
        $query = $this->db->prepare("SELECT * FROM announcement WHERE id = :id");
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }

    public function GetStaffDetails($id)
    {
        $query = $this->db->prepare("SELECT * FROM staff WHERE id = :id");
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }

    public function GetStaffProfile($id)
    {
        $query = $this->db->prepare("SELECT * FROM staff WHERE staff_id = :staff_id");
        $query->bindParam("staff_id", $id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));
    }

    public function VerifyStaffFiles($sno)
    {
        $staff_id = ltrim(rtrim($sno));
        $query = $this->db->prepare("SELECT * FROM staff WHERE staff_id = :staff_id");
        $query->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
        $query->execute();
        $count = $query->rowCount();
        if($count == 1 && !empty($row))
        {
            $query->execute();
            $data = array();
            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function GetAdminDetails($id)
    {
        $query = $this->db->prepare("SELECT * FROM admin_users WHERE id = :id");
        $query->bindParam("id", $id, PDO::PARAM_STR);
        $query->execute();
        return json_encode($query->fetch(PDO::FETCH_ASSOC));  
    }

    public function CheckAdminAuth($username, $passwd)
    {
        if($username != "" && $passwd != "") {
            try {
                //$query = "select * from `admin_users` where `username`= :username and `userpwd`= :userpwd";
                $stmt = $this->db->prepare("SELECT * FROM admin_users where username= :username and userpwd= :userpwd");
                $stmt->bindParam("username", $username, PDO::PARAM_STR);
                $stmt->bindValue("userpwd", $passwd, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->rowCount();
                $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                if($count == 1 && !empty($row)) {
                    /******************** Your code ***********************/
                    $_SESSION['sess_user_id']   = $row['id'];
                    $_SESSION['sess_username'] = $row['username'];
                    $_SESSION['sess_name'] = $row['first_name']." ".$row['last_name'];
                    echo "manage_users.php";
                } else {
                    echo "invalid";
                }
            } catch (PDOException $e) {
                echo "Error : ".$e->getMessage();
            }
        } 
        else {
            echo "Both fields are required!";
        }
    }
    public function CheckUserAuth($staff_id, $passwd)
    {
        if($staff_id != "" && $passwd != "") {
            try {
                //$query = "select * from `admin_users` where `username`= :username and `userpwd`= :userpwd";
                $stmt = $this->db->prepare("SELECT * FROM staff where staff_id= :staff_id and userpwd= :userpwd");
                $stmt->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
                $stmt->bindValue("userpwd", $passwd, PDO::PARAM_STR);
                $stmt->execute();
                $count = $stmt->rowCount();
                $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                if($count == 1 && !empty($row)) {
                    /******************** Your code ***********************/
                    $_SESSION['sess_id']   = $row['id'];
                    $_SESSION['sess_staff_id'] = $row['staff_id'];
                    $_SESSION['sess_staff_name'] = $row['first_name']." ".$row['last_name'];
                    $_SESSION['sess_account_status'] = $row['is_active'];

                    if($_SESSION['sess_account_status'] == "1")
                        echo "medfund_user.php";
                    else
                        echo "disabled";
                } else {
                    echo "invalid";
                }
            } catch (PDOException $e) {
                echo "Error : ".$e->getMessage();
            }
        } 
        else {
            echo "Both fields are required!";
        }
    }
}

?>