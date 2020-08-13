<?php

/* require_once('./Database.php'); */


class User
{

    private $db = null;


    public function __construct(Database $db)
    {
        /* dependency injection */
        if ($db->isConnected()) {
            $this->db = $db;
        } else {
            return null;
            echo "Database not connected";
        }
    }


    public function AddUser($data)
    {
        $this->db->query("INSERT INTO users (firstname,lastname,username,password,email,created_at)
                    VALUES(:fisrTnamE,:lasTnamE,:useRnamE,:passworD,:emaiL,:datEtimE)");

        /* bind the values before executing */
        $this->db->bind(':fisrTnamE', $data['firstname']);
        $this->db->bind(':lasTnamE', $data['lastname']);
        $this->db->bind(':useRnamE', $data['username']);
        $this->db->bind(':passworD', $data['password']);
        $this->db->bind(':emaiL', $data['email']);
        $this->db->bind(':datEtimE', $data['datetime']);

        $this->db->execute();
    }

    public function RemoveUser($table, $id)
    {
        $this->db->query("DELETE FROM {$table} WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function getUsersList($table = 'users')
    {
        $this->db->query("SELECT * FROM {$table}");
        return $this->db->resultset();
    }

    public function getSingleUserInformation($table, $id)
    {
        $this->db->query("SELECT * FROM {$table} WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultset();
    }


    public function getUserName($username)
    {
        $this->db->query("SELECT username FROM users WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->resultset();
    }


    public function getAdminName($username)
    {
        $this->db->query("SELECT username FROM admins WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->resultset();
    }


    public function getUserNameById($id)
    {
        $this->db->query("SELECT username FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultset();
    }

    public function getAdminNameById($id)
    {
        $this->db->query("SELECT username FROM admins WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultset();
    }

    public function getUserPassword($username)
    {
        $this->db->query("SELECT password FROM users WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->resultset();
    }

    public function getAdminPassword($username)
    {
        $this->db->query("SELECT password FROM admins WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->resultset();
    }



    public function getUserEmail($email)
    {
        $this->db->query("SELECT email FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->resultset();
    }


    public function getUserId($username)
    {
        $this->db->query("SELECT id FROM users WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->resultset();
    }

    public function getAdminId($username)
    {
        $this->db->query("SELECT id FROM admins WHERE username = :username");
        $this->db->bind(':username', $username);
        return $this->db->resultset();
    }



    public function editUserInfo($data, $id)
    {
        $this->db->query("UPDATE users SET firstname = ':fisrTnamE', lastname = ':lasTnamE' ,username = ':useRnamE' ,password = ':passworD', email = ':emaiL',created_at = ':datEtimE'
                            WHERE id = :id ");
        /* bind the values before executing */

        $this->db->bind(':id', $id);

        $this->db->bind(':fisrTnamE', $data['firstname']);
        $this->db->bind(':lasTnamE', $data['lastname']);
        $this->db->bind(':useRnamE', $data['username']);
        $this->db->bind(':passworD', $data['password']);
        $this->db->bind(':emaiL', $data['email']);
        $this->db->bind(':datEtimE', $data['datetime']);

        $this->db->execute();
    }


    /* add user token to database */
    public function AddUserToken($data)
    {
        $this->db->query("INSERT INTO login_tokens (token,user_id)
                    VALUES(:tokeN,:useRiD)");

        /* bind the values before executing */
        $this->db->bind(':tokeN', $data['token']);
        $this->db->bind(':useRiD', $data['user_id']);


        $this->db->execute();
    }

    public function getUserIdWithToken($token)
    {
        $this->db->query("SELECT user_id FROM login_tokens WHERE token = :tokeN");
        $this->db->bind(':tokeN', $token);
        return $this->db->resultset();
    }

    public function deleteOldUserToken($id)
    {
        $this->db->query("DELETE FROM login_tokens  WHERE user_id = :id");
        // $this->db->query("DELETE FROM login_tokens  WHERE token = :tokeN");
        // $this->db->bind(':tokeN', $token);
        $this->db->bind(':id', $id);
        $this->db->execute();
    }


    public function deleteOldToken($token)
    {

        $this->db->query("DELETE FROM login_tokens  WHERE token = :tokeN");
        $this->db->bind(':tokeN', $token);

        $this->db->execute();
    }


    public function isLoggedIn($user_id)
    {
        if (isset($_COOKIE['USID_'])) {
            return $user_id;
        } else {
            $cstrong = true; //cryptographically strong
            $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
            $data = ['token' => sha1($token), 'user_id' => $user_id];
            $this->AddUserToken($data);
            //delete the old user token from database
            $this->deleteOldToken(sha1($_COOKIE['USID']));

            //reset to the dleted old cookie to the  new cookie
            setcookie("USID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
            setcookie("USID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);

            return $user_id;
        }

        return false;
    }


    public function AddAdmin($data)
    {
        $this->db->query("INSERT INTO admins (username,password) VALUES(:usernamE,:passworD)");
        /* bind the values before executing */
        $this->db->bind(':usernamE', $data['username']);
        $this->db->bind(':passworD', $data['password']);
        $this->db->execute();
    }
}
