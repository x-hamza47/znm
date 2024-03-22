<?php

class dataSend 
{
    private $db_host;
    private $db_user;
    private $db_pass;
    private $db_name;
    private $conn;
    private $response = array();

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

    }
// Send Message
    public function sendMessage($table, string $name, $phone = null, string $email, string $msg){


        if($this->tableExist($table)) {
     
            if(!(empty($name) || empty($email) || empty($msg))) {

                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    $query = "INSERT INTO $table (sender_name, sender_phone, sender_email, sender_message, status, receive_date, receive_time)
                    VALUES (?,?,?,?,'unread',CURDATE(), CURTIME())";
                    $stmt = $this->conn->prepare($query);
                    $stmt->bind_param('ssss',$name, $phone, $email, $msg);
                    
                    if ($stmt->execute()) {
                        $response = array(
                                'status' => true,
                                'message' => 'Message Sent Successfully.'
                       );
                       return $response;
                       exit;
                    }else{
                         $response = array(
                                'status' => false,
                                'message' => 'Message Sending failed.'
                           );
                           return $response;
                           exit;
                    }//query
                }else{
                    $response = array(
                            'status' => false,
                            'message' => 'Please enter a valid email.'
                     );
                     return $response;
                     exit;
                }//email valid
            }else{
                $response = array(
                        'status' => false,
                        'message' => 'Missing required feilds.'
                );
                return $response;
                exit;
            }//fields valid
 
        }else{
             $response = array(
                    'status' => false,
                    'message' => 'Contact Your Developer.'
            );
            return $response;
            exit;
        }//table exists

    }

    private function tableExist($table){

        $sql = "SHOW TABLES FROM $this->db_name LIKE '$table'";
        $tableInDb = $this->conn->query($sql);
        if ($tableInDb) {
            if ($tableInDb->num_rows == 1) {
                return true;
            }else{
                return false;
            }
        }
    }
}


?>