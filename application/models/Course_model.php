<?php

/**
 * Created by PhpStorm.
 * User: nur
 * Date: 5/24/17
 * Time: 2:31 PM
 */

//Documentation about model
//https://codeigniter.com/user_guide/general/models.html

//Database reference
//https://codeigniter.com/user_guide/database/index.html

//Activity inherits My_Model class which is located in core/My_Model.php
class Course_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    /**
     * Generates a list of user roles
     * @author  :   Amlan Chowdhury
     * @uses    :   To Generate a list of user roles
     * @access  :   public
     * @param   :   int $parent_role_id
     * @return  :   array
     */

//get_list(0,0,[]) returns rows number of table
// it is used to take data from database according to $offset and $limit
//$cond is an array, it holds search form data
    function get_list($offset, $limit, $cond)
    {
//echo '<pre>';print_r($cond);exit;
        if ($offset == 0 && $limit == 0) {
            $this->db->select('count(0) as num'); // select count(0) as num
        } else {
            $this->db->select('course.*'); //select *
        }

        $this->db->from('course');//from projects
        // if $cond["name"] is not empty then add where clause
        if (!empty($cond['name'])) {
            $where = "( projects.name LIKE '%{$cond['name']}%')";
            $this->db->where($where); //where projects.name LIKE '%$cond['name']%';
        }

        // if $offset and $limit is 0
        if ($offset == 0 && $limit == 0) {
            return $this->db->get()->row()->num; // return the row number
        }

        $this->db->limit($limit, $offset);// LIMIT $offset $limit
        //$this->db->order_by('projects.code', 'ASC'); //ORDER  BY projects.code ASC
        $query = $this->db->get();// get all data
        $query->result();
        return $query->result();// return rows as object
    }

    function get_item()
    {
        $this->db->select('*'); //select *
        $this->db->from('course');// from projects
        //$this->db->order_by("code", "asc");//ORDER BY code ASC
        $query = $this->db->get();//get data
        $result_array = []; //array initialize
        //foreach loop
        foreach ($query->result() as $row) {
            //bellow array takes id as key
            //holds string with code and name
            $result_array[$row->id] = '<b>'.$row->code . '</b> - ' . $row->name;
        }
        return $result_array; //return the above array
    }

    //get single row by id
    function get_info_by_id($id)
    {
        $this->db->select('*'); //select *
        $this->db->from('course');// from projects
        $this->db->where('id', $id);//where id=$id;
        return $this->db->get()->row();//return the row
    }

    function add($data)
    {
        return $this->db->insert('course', $data); // insert $data(array) into projects
    }

    /**
     * Reads data of specific indicators
     * @author  :   Sara
     * @uses    :   To  read data of specific indicators
     * @access  :   public
     * @param   :   int $id
     * @return  :   array
     */
//    function get_list_by_id($id)
//    {
//        $query=$this->db->where('tiers', array('id' => $id));
//        return $query->row();
//    }

    function edit($id, $data)
    {
        return $this->db->update('course', $data, ['id' => $id]); //edit row by id return true/row_id
    }

    /**
     * Deletes particular data
     * @author  :   Sara
     * @uses    :   To delete particular data
     * @access  :   public
     * @param   :   int $id, $delete_by
     * @return  :   boolean
     */


    function delete($id)
    {

            return $this->db->delete('course', ['id' => $id]);//delete projects by id

    }
}
