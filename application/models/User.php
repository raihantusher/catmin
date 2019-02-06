<?php

/**
 * User Model Class.
 * @pupose        Manage user information
 *
 * @filesource    \app\model\user.php
 * @package        microfin
 * @subpackage    microfin.model.user
 * @version      $Revision: 1 $
 * @author       $Author: Amlan Chowdhury $
 * @lastmodified $Date: 2011-01-04 $
 */
class User extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * Generates list of users
     * @author  :   Anis Alamgir
     * @uses    :   To get users list
     * @access  :   public
     * @param   :   int $offset, int $limit, string $cond
     * @return  :   array
     */
    function get_list($offset, $limit, $cond = [])
    {
        $this->db->select('users.id,users.full_name,users.login,users.role_id,user_roles.role_name,users.status,users.is_super_admin,users.created_on');
        $this->db->order_by('login', 'ASC');
        $this->db->from('users', $offset, $limit);
        $this->db->join('user_roles', 'users.role_id = user_roles.id');

        if (isset($cond['full_name']) && !empty($cond['full_name'])) {
            $where = "( users.full_name LIKE '%{$cond['full_name']}%' OR users.full_name LIKE '%{$cond['full_name']}%')";
            $this->db->where($where);
        }

        if (isset($cond['cbo_user_role']) && !empty($cond['cbo_user_role']) and $cond['cbo_user_role'] != -1) {
            $this->db->where('users.role_id', $cond['cbo_user_role']);
        }

        if (isset($cond['cbo_user_status']) && !empty($cond['cbo_user_status'])) {
            $this->db->where('users.status', $cond['cbo_user_status']);
        }
        if ($offset == 0 && $limit == 0) {
            return $this->db->count_all_results();
        }
        $this->db->limit($offset, $limit);
//        $this->db->order_by('users.full_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * Action for add a branch
     * @author  Amlan Chowdhury
     * @access    public
     * @param   array $data
     * @return    bool
     */
    function add($data)
    {
        $data['id'] = $this->get_new_id('users', 'id');
        $data['created_on'] = date('Y-m-d H:i:s');
        $data['password'] = sha1($data['password']);
        $data['project_id'] = empty($data['project_id']) ? null : $data['project_id'];
        $data['status'] = '1';
        unset($data['confirm_password']);
        return $this->db->insert('users', $data);
    }

    /**
     * Action for update a branch
     * @author  Amlan Chowdhury
     * @access    public
     * @param   array $data , $default_secret_hash
     * @return    bool
     */
    function edit($data, $id)
    {
        $data['modified_on'] = date('Y-m-d H:i:s');
        $data['project_id'] = empty($data['project_id']) ? null : $data['project_id'];
        $data['is_super_admin'] = empty($data['is_super_admin']) ? null : $data['is_super_admin'];
        return $this->db->update('users', $data, ['id' => $id]);
    }

    /**
     * Reads the record on given id
     * @author  :   Amlan Chowdhury
     * @uses    :   To read the record on given id
     * @access  :   public
     * @param   :   int $id
     * @return  :   array
     */
    function read($user_id)
    {
        return $this->db->get_where('users', ['id' => $user_id])->row();
    }

    /**
     * Gets the record  by login
     * @author  :   Amlan Chowdhury
     * @uses    :   To get the record by login
     * @access  :   public
     * @param   :   int $login
     * @return  :    boolean
     */
    function get_user_by_login($login, $password)
    {
        $this->db->select('users.id,users.full_name,users.login,users.role_id,users.is_super_admin,users.email');
        $this->db->from('users');
        $this->db->where('users.login', $login);
        $this->db->where('users.password', SHA1($password));
        $this->db->where('users.status', 'A');
        $query = $this->db->get()->row();
        return !empty($query) ? $query : false;
    }

    /**
     * Checks password
     * @author  :   Amlan Chowdhury
     * @uses    :   To check password
     * @access  :   public
     * @param   :   int $id, string $password
     * @return  :   boolean
     */
    function checkPassword($user_id, $password)
    {
        $password = sha1($password);
        $sql = "select id from users where id= ? and password= ?";
        $query = $this->db->query($sql, array($user_id, $password));

        if ($query->num_rows() == 1) {
            return TRUE;
        }
        return FALSE;
    }

    function checkNewPassword()
    {
        $sql = "SELECT `password`
FROM `users`
WHERE `id`=($this->user_id)";

        return $this->db->query($sql)->row()->password;

    }

    /**
     * Checks valid email
     * @author  :   Amlan Chowdhury
     * @uses    :   To check password
     * @access  :   public
     * @param   :   int $id, string $password
     * @return  :   boolean
     */
    function checkEmail($email)
    {
        $query = $this->db->query("select id,login,email from users where email= '$email' LIMIT 1")->row();
        return empty($query) ? false : (array)$query;
    }

    /**
     * Changes password
     * @author  :   Amlan Chowdhury
     * @uses    :   To change password
     * @access  :   public
     * @param   :   array $user_data
     * @return  :   boolean
     */
    function changePassword($data)
    {
        $data['password'] = sha1($data['password']);
        return $this->db->update('users', $data, ['id' => $data['id']]);
    }

    /**
     * Update user login info, such as IP-address or login time, and
     * clear previously generated (but not activated) passwords.
     * @author  :   Amlan Chowdhury
     * @param    int $user_id
     * @param    bool $record_ip
     * @param    bool $record_time
     * @return    void
     */
    function update_login_info($user_id, $record_ip, $record_time = null)
    {
        $data = array();
        $data['last_login'] = date('Y-m-d H:i:s');
        if ($record_ip) {
            $data['last_ip'] = $record_ip;
        }
        $this->db->where('id', $user_id);
        return $this->db->update('users', $data);
    }


    public function get_item()
    {
        $returnArray = [];
        $users = $this->db->query("SELECT `id`, `login` FROM `users` ORDER BY `login`")->result();
        $count = count($users);
        for ($i = 0; $i < $count; $i++) {
            $returnArray[$users[$i]->id] = $users[$i]->login;
        }
        return $returnArray;
    }
}
