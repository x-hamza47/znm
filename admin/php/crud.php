<?php

class Database{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $conn;
    private $result = array();

    // Constructor(Database Connection)
    public function __construct()
    {
        $this->db_host = getenv("DB_HOST");
        $this->db_user = getenv("DB_USER");
        $this->db_pass = getenv("DB_PASS");
        $this->db_name = getenv("DB_NAME");

        try {
            $this->conn = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
           
            if($this->conn->connect_error) {
                throw new Exception("Connection Error: ". $this->conn->connect_error);
            }
        } catch (Throwable $e) {
            die($e->getMessage());
        }

    }//Construct End

    // Admin Authentication
    public function authenticateUser(string $username, string $password) {
        $username = $this->conn->real_escape_string($username);
        $pass = $this->conn->real_escape_string($password);

        $query = "SELECT * FROM admin WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
    
            if (password_verify($pass, $user['password'])) {
                array_push($this->result,"Authentication Successfull");
                return true;
            }else{
                array_push($this->result,"Incorrect Username or Password!");
                return false;
            }
        }else{
            array_push($this->result,"Incorrect Username or Password!");
            return false;
        }
    }//authentication end

    public function updateUserPassword(string $username, string $old_password,string $new_password) {
        if ($this->authenticateUser($username,$old_password) === true) {
            try{
                $this->beginTransaction();
                $encrypt_pass = password_hash($new_password,PASSWORD_BCRYPT);
                $sql = "UPDATE admin SET password = ? WHERE username = ?";
                $query = $this->conn->prepare($sql);
                $query->bind_param("ss",$encrypt_pass,$username);

                if (!$query->execute()) {
                    throw new Exception("Password Updating failed");
                }
                $this->conn->commit();
                return true;
            }catch(Exception $e){
                $this->conn->rollback();
                echo $e->getMessage();
                return false;
            }
            
        }else{
            return false;
        }
    }

    // Table Exists
    public function tableExists($table) {
        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $table_in_db = $this->conn->query($sql);

        if ($table_in_db) {
            if ($table_in_db->num_rows == 1) {
                return true;
            }else{
                return false;
            }
        }
    }

    public function destroy($table,int $user) {
        if($this->tableExists($table)) {
            if (!empty($user) || isset($user)){
                if (filter_var($user,FILTER_VALIDATE_INT)) {
                    $query = "DELETE FROM $table WHERE id = ?";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bind_param("i",$user);
                    if ($stmt->execute()) {
                        $result = array(
                            'status' => true,
                            'message' => 'Deleted successfully.'
                        );
                        return $result;
                    }else{
                        $result = array(
                            'status' => false,
                            'message' => 'The item could not be deleted.'
                        );
                        return $result;
                    }

                }else{
                    $result = array(
                        'status' => false,
                        'message' => 'Invalid item ID detected.'
                    );
                    return $result;
                }
            }else{
                $result = array(
                    'status' => false,
                    'message' => 'Item ID not found.'
                );
                return $result;
            }
        }else{
            $result = array(
                'status' => false,
                'message' => 'Contact your Developer.'
            );
            return $result;
        }
        
    }
    
    // public function select($table, $row = "*", $join = null, $where = null, $order = null, $limit = null) {
    //     if ($this->tableExists($table)) {
    //         $sql = "SELECT $row FROM $table";
    //         if ($join != null) {
    //             $sql .= " JOIN $join";
    //         }
    //         if ($where != null) {
    //             $sql .= " WHERE $where";
    //         }
    //         if ($order != null) {
    //             $sql .= " ORDER BY $order";
    //         }
    //         if ($limit != null) {
    //             if(isset($_POST['page'])){
    //                 $page = $_POST['page'];
    //             }else{
    //                 $page = 1;
    //             }
    //             $start = ($page - 1) * $limit;

    //             $sql .= " LIMIT ?,?";
    //         }
    //         $query = $this->conn->prepare($sql);
    //         if ($limit != null) {
    //             $query->bind_param("ii",$start,$limit);
    //         }
    //         if ($query->execute()) {
    //             $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
    //             return $result;
    //         }else{
    //             array_push($this->result, $this->conn->error);
    //             return false;
    //         }

    //     }else{
    //         array_push($this->result, $this->conn->error ."Contact your developer.");
    //         return false;
    //     }
    // }

    public function search($table,$search,$col1, $col2) {
        if($this->tableExists(($table))){
                $sql = "SELECT * FROM $table WHERE $col1 LIKE ? OR $col2 LIKE ? ";
                $query = $this->conn->prepare($sql);
                $searchParam = "%$search%";
                $query->bind_param("ss",$searchParam,$searchParam);
                if ($query->execute()) {
                    $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
                        return $result;
                }else{
                    return false;
                }
        }else{
            return false;
        }
    }

    public function select($table,$row = "*", $join = null, $where = null, $order = null, $limit = null,$page = null) {
        if ($this->tableExists($table)) {
            $sql = "SELECT $row FROM $table";
                    if ($join != null) {
                        $sql .= " JOIN $join";
                    }
                    if ($where != null) {
                        $sql .= " WHERE $where";
                    }
                    if ($order != null) {
                        $sql .= " ORDER BY $order";
                    }
                    
                    if ($limit != null) {
                        $offset = ($page - 1) * $limit;
                        $sql .= " LIMIT $offset,$limit";
                    }
                    $query = $this->conn->prepare($sql);

                    if ($query->execute()) {
                        $result = $query->get_result()->fetch_all(MYSQLI_ASSOC);
                        return $result;
                    }else{
                        return false;
                    }
                    
        }else{
            return false;
        }
    }
    
    public function pagination($table,$join = null , $where = null , $limit=null,$page){
        if($this->tableExists($table)){

            if ($limit != null) {
                $sql = "SELECT COUNT(*) FROM $table";
                if ($join != null) {
                    $sql .= " JOIN $join";
                }
                if ($where != null) {
                    $sql .= " WHERE $where";
                }

                $query = $this->conn->query($sql);
                $total_records = $query->fetch_array();
                $total_records = $total_records[0];

                $total_pages = ceil($total_records / $limit);

                    $result = "<ul class='pagination  m-0 float-right'>";
                    
                    if($page > 1 ){
                        $result .= "<li class='page-item'><a href='' class='page-link'  id='".($page - 1)."'>«</a></li>";
                    }

                    if($total_records > $limit){
                        for ($i=1; $i <= $total_pages ; $i++) { 
                            $active = ($i == $page) ? "active" : "";
                            $result .= "<li class='page-item $active'><a href='' class='page-link'  id='{$i}'>{$i}</a></li>";
                        }
                    }
                   
                    if($total_pages > $page){
                        $result .= "<li class='page-item'><a href='' class='page-link'  id='".($page + 1)."'>»</a></li>";
                    }

                    $result .= "</ul>";
                    echo $result;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }


    public function prepare($query) {
        return $this->conn->prepare($query);
    }
    // Begin a transaction
    public function beginTransaction() {
        return $this->conn->begin_transaction();
    }
    
    // Commit a transaction
    public function commit() {
        return $this->conn->commit();
    }
    
    // Rollback a transaction
    public function rollback() {
        return $this->conn->rollback();
    }
    
    // Get the mysqli connection object
    public function getConnection() {
        return $this->conn;
    }
    

    // Result
    public function getResult() {
        $val = $this->result;
        $this->result = array();
        return $val;
    }
    
    
    // projects
    public function uploadProject($table,string $img = null, string $name, string $desc ,string $status = null){
        if ($this->tableExists($table)) {
            if (!empty($desc) && !empty($name)){

                $img_path = $this->conn->real_escape_string($img);
                $pro_name = $this->conn->real_escape_string($name);
                $pro_desc = $this->conn->real_escape_string($desc);
                $pro_status = $this->conn->real_escape_string($status);

                $sql = "INSERT INTO projects(project_image,project_name,project_desc,status)
                VALUES(?,?,?,?) ";
                $query = $this->conn->prepare($sql);
                $query->bind_param('ssss',$img_path,$pro_name,$pro_desc,$pro_status);
                
                if($query->execute()) {
                    $result = array(
                        'status' => true,
                        'message' => 'Project Uploaded Successfully.'
                    );
                    return $result;
                    exit;
                }else{
                    $result = array(
                        'status' => false,
                        'message' => 'Uploading failed!.'
                    );
                    return $result;
                    exit;
                }

            }else{
                $result = array(
                    'status' => false,
                    'message' => 'Please fill out all required fields.'
                );
                return $result;
                exit;
            }
        }else{
            $result = array(
                'status' => false,
                'message' => 'Contact your Developer!'
            );
            return $result;
            exit;
        }
    }

    public function update($table, $id, $title, $desc, $img, $status) {
        if($this->tableExists($table)) {
            $sql = "UPDATE projects SET project_image = ?, project_name = ?,project_desc = ?,status = ? 
            WHERE id = ?";
            $query = $this->conn->prepare($sql);
            $query->bind_param("ssssi",$img,$title,$desc,$status,$id);
            if ($query->execute()){
                $result = array(
                    'status' => true,
                    'message' => 'Project Updated Successfully.'
                );
                return $result;
                exit;
            }else{
                $result = array(
                    'status' => false,
                    'message' => 'Uploading failed!.'
                );
                return $result;
                exit;
            }
        }else{
            $result = array(
                'status' => false,
                'message' => 'Contact your Developer!'
            );
            return $result;
            exit;
        }
    }
    
        // Connection Destroy
        public function __destruct()
        {
            if($this->conn->close()) {
                return true;
            }
        }
    
}

class SessionController {
    public static function startSession() {
        session_start();
    }

    public static function setSessionVariable ($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function getSessionVariable ($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function destroySession () {
        session_unset();

        session_destroy();
    }

    public static function isLoggedIn () {
        return isset($_SESSION['user']);
    }

    public static function redirectUserLogin () {
        $hostname = "http://localhost/znm/admin/";
        header("Location: {$hostname}index.php");
    }
    public static function redirectUserAdmin() {
        $hostname = "http://localhost/znm/admin/";
        header("Location: {$hostname}inbox.php");
    }
}

?>