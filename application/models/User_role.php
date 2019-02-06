<?php

class User_role extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_list()
    {
        return $this->db->query("SELECT * FROM `user_roles` ORDER BY FIELD(id,1) DESC, `role_name`")->result_array();
    }

    public function get_item()
    {
        $returnArray = [];
        $user_roles = $this->db->query("SELECT `id`, `role_name` FROM `user_roles` ORDER BY FIELD(id,1) DESC, `role_name`")->result();
        $count = count($user_roles);
        for ($i = 0; $i < $count; $i++) {
            $returnArray[$user_roles[$i]->id] = $user_roles[$i]->role_name;
        }
        return $returnArray;
    }

    /**
     * add data
     * @author  :   Sara
     * @uses    :   To insert  data
     * @access  :   public
     * @param   :    $id, $data
     * @return  :   array
     * @createdon      01/08/2017
     * @lastmodified Date: 01/08/2017
     */

    function add($data)
    {
        return $this->db->insert('user_roles', $data);
    }
    /**
     * Edit particular data
     * @author  :   Sara
     * @uses    :   To Edit particular data
     * @access  :   public
     * @param   :    $id, $data
     * @return  :   boolean
     * @createdon       1/08/2017
     * @lastmodified Date: 1/08/2017
     */
    function edit($id, $data)
    {
        return $this->db->update('user_roles', $data, ['id' => $id]);

    }

    function read($id)
    {
        $this->db->select('*');
        $this->db->from('user_roles');
        $this->db->where('id', $id);
        return $this->db->get()->row();
    }

    function get_role_name_by_id($role_id)
    {
        return $this->db->query("SELECT `role_name` FROM `user_roles` WHERE `id` = '$role_id'")->row()->role_name;
    }
    /**
     * Deletes particular data
     * @author  :   Sara
     * @uses    :   To delete particular data
     * @access  :   public
     * @param   :   int $id
     * @return  :   boolean
     * @createdon       1/08/2017
     * @lastmodified Date: 1/08/2017
     */
    function delete($id)
    {
        if ($this->dependency_chek_on_delete('user_role_wise_privileges', 'role_id', $id)) {
            return false;
        } elseif ($this->dependency_chek_on_delete('users', 'role_id', $id)) {
            return false;
        } else {
            return $this->db->delete('user_roles', ['id' => $id]);
        }
    }

}
