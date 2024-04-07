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
    public function deleteCategory($table,string $user,$col_name) {
        if($this->tableExists($table)) {
            if (!empty($user) || isset($user)){
                    $query = "DELETE FROM $table WHERE $col_name = ?";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bind_param("s",$user);
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

    public function search($table, $row = "*", $join = null, $search, $order = null) {
        if($this->tableExists(($table))){

                $sql = "SELECT $row FROM $table";
                if($join != null) {
                    $sql .= " $join";
                }
                $sql .= " $search";

                if($order != null) {
                    $sql .= " $order";
                }
                $query = $this->conn->query($sql);
                if ($query->num_rows > 0) {
                    $result = $query->fetch_all(MYSQLI_ASSOC);
                    return $result;
                }else{
                    return false;
                }
        }else{
            return false;
        }
    }
    public function searchCategory($table,$search,$col) {
        if($this->tableExists(($table))){
                $sql = "SELECT * FROM $table WHERE $col LIKE ? ";
                $query = $this->conn->prepare($sql);
                $searchParam = "%$search%";
                $query->bind_param("s",$searchParam);
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

    public function select($table,$row = "*", $join = null, $where = null, $order = null, $limit = null,$page = null,$group = null) {
        if ($this->tableExists($table)) {
            $sql = "SELECT $row FROM $table";
                    if ($join != null) {
                        $sql .= " $join";
                    }
                    if ($where != null) {
                        $sql .= " WHERE $where";
                    }
                    if ($group != null) {
                        $sql .= " GROUP BY $group";
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
    public function sql($sql){
        $query = $this->conn->query($sql);
        if ($query->num_rows > 0) {
            return  true;
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
    public function uploadProject($table, string $name, string $desc, string $cid = null, int $sid = null, string $location = null, string $status){
        if ($this->tableExists($table)) {
            if (!empty($desc) && !empty($name)){
                $pro_name = $this->conn->real_escape_string($name);
                $pro_desc = $this->conn->real_escape_string($desc);
                $pro_cat = $this->conn->real_escape_string($cid);
                $pro_sub = $this->conn->real_escape_string($sid);
                $pro_location = $this->conn->real_escape_string($location);
                $pro_status = $this->conn->real_escape_string($status);
                $pro_id = 'pro_id-' . str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);

                $sql = "INSERT INTO projects(project_id, project_name, project_desc, category, sub_category, location, status)
                VALUES(?,?,?,?,?,?,?) ";
                $query = $this->conn->prepare($sql);
                $query->bind_param('ssssiss' ,$pro_id, $pro_name, $pro_desc ,$pro_cat, $pro_sub, $pro_location, $pro_status);
                
                if($query->execute()) {
                    $result = array(
                        'status' => true,
                        'message' => 'Project Uploaded Successfully.',
                        'pro_id' => $pro_id
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
    public function uploadImages($table,string $id,string $img) {
        if($this->tableExists($table)) {
            if(isset($id) && !empty($id) && !empty($img)) {
                $p_id = $this->conn->real_escape_string($id);
                $img_name = $this->conn->real_escape_string($img);
                $sql = "INSERT INTO $table(pid,project_image) VALUES(?,?)";
                $query = $this->conn->prepare($sql);
                $query->bind_param("ss",$p_id, $img_name);
                if($query->execute()) {
                    $result = array(
                        'status' => true,
                        'message' => 'Images Uploaded Successfully.',
                    );
                    return $result;
                    exit;
                }else{
                    $result = array(
                        'status' => false,
                        'message' => 'Images Uploading Failed.',
                    );
                    return $result;
                    exit;
                }
                
            }else{
                $result = array(
                    'status' => false,
                    'message' => 'Please Upload and image.',
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

    public function createCategory($table,$col1,$col2,$col3,$n1,$n2,$n3) {
        if ($this->tableExists($table)) {
            if(!empty($col1) && !empty($col2)){
                $column1 = $this->conn->real_escape_string($col1);
                $column2 = $this->conn->real_escape_string($col2);
                $column3 = $this->conn->real_escape_string($col3);
                $sql = "INSERT INTO $table($n1,$n2,$n3) VALUES(?,?,?)";
                $query = $this->conn->prepare($sql);
                $query->bind_param("sss",$column1,$column2,$column3);
                if ($query->execute()){
                    $result = array(
                        'status' => true,
                        'message' => 'Category Uploaded Successfully.'
                    );
                    return $result;

                }else{
                    $result = array(
                        'status' => false,
                        'message' => 'Uploading failed!.'
                    );
                    return $result;
    
                } 
            }else{
                $result = array(
                    'status' => false,
                    'message' => 'Please fill out all required fields.'
                );
                return $result;
            
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

    public function updateCategory($table, $id, $name, $status) {
        if($this->tableExists($table)) {
            if(!empty($name)){
                $cid = $this->conn->real_escape_string($id);
                $cat_name = $this->conn->real_escape_string($name);
                $cat_st = $this->conn->real_escape_string($status);
                $sql = "UPDATE $table SET name = ? , status = ? WHERE cid = ?";
                $query = $this->conn->prepare($sql);
                $query->bind_param("sss",$cat_name,$cat_st,$cid);
                if ($query->execute()){
                    $result = array(
                        'status' => true,
                        'message' => 'Category Updated Successfully.'
                    );
                    return $result;

                }else{
                    $result = array(
                        'status' => false,
                        'message' => 'Uploading failed!.'
                    );
                    return $result;
     
                }
            }else{
                $result = array(
                    'status' => false,
                    'message' => 'Please fill out all required fields.'
                );
                return $result;
            
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

    public function updateSubCategory($table, $sid, $cid, $name, $status) {
        if($this->tableExists($table)) {
            if(!empty($name)){
                $sid = $this->conn->real_escape_string($sid);
                $cid = $this->conn->real_escape_string($cid);
                $cat_name = $this->conn->real_escape_string($name);
                $cat_st = $this->conn->real_escape_string($status);
                $sql = "UPDATE $table SET category_id = ? , name = ? ,status = ? WHERE id = ?";
                $query = $this->conn->prepare($sql);
                $query->bind_param("sssi",$cid,$cat_name,$cat_st,$sid);
                if ($query->execute()){
                    $result = array(
                        'status' => true,
                        'message' => 'Sub Category Updated Successfully.'
                    );
                    return $result;

                }else{
                    $result = array(
                        'status' => false,
                        'message' => 'Uploading failed!.'
                    );
                    return $result;
     
                }
            }else{
                $result = array(
                    'status' => false,
                    'message' => 'Please fill out all required fields.'
                );
                return $result;
            
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