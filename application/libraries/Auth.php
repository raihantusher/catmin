<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
    function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->config('auth', TRUE);
        $this->ci->load->library('session');
        $this->ci->load->model(['User']);
    }

    /**
     * Login user on the site. Return TRUE if login is successful
     * (user exists and activated, password is correct), otherwise FALSE.
     *
     * @param    string (username or email or both depending on settings in config file)
     * @param    string
     * @param    bool
     * @return    bool
     */
    function login($login, $password)
    {
        if ((strlen($login) > 0) AND (strlen($password) > 0)) {
            if ($user = $this->ci->User->get_user_by_login($login, $password)) {
                $session_data = ['data' => ['id' => $user->id, 'login' => $user->login, 'name' => $user->full_name, 'logged_in' => TRUE, 'role_id' => $user->role_id, 'is_super_admin' => $user->is_super_admin, 'project_id' => $user->project_id]];
                $this->ci->session->set_userdata($session_data);
                $this->ci->User->update_login_info($user->id, $this->ci->config->item('login_record_ip', 'auth'), $this->ci->config->item('login_record_time', 'auth'));
                return TRUE;
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }


    function logout()
    {
        $this->ci->session->unset_userdata('data');
        $this->ci->session->sess_destroy();
    }

    function is_logged_in()
    {
        return !empty($this->ci->session->userdata('data')) ? true : false;
    }

}

?>
