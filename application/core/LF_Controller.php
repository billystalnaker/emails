<?php

if (!defined('BASEPATH'))
{
    exit('No direct script access allowed');
}
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package        CodeIgniter
 * @author        ExpressionEngine Dev Team
 * @copyright    Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license        http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since        Version 1.0
 * @filesource
 */
// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package        CodeIgniter
 * @subpackage    Libraries
 * @category    Libraries
 * @author        ExpressionEngine Dev Team
 * @link        http://codeigniter.com/user_guide/general/controllers.html
 */
class LF_Controller extends CI_Controller
{
    public $data = array();
    public $class_key;
    public $task_key;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->class_key = $this->router->fetch_class();
        $this->task_key = $this->router->fetch_method();
        $this->data['class_key'] = $this->class_key;
        $this->data['task_key'] = $this->task_key;

        // IMPORTANT! This global must be defined BEFORE the flexi auth library is loaded!
        // It is used as a global that is accessible via both models and both libraries, without it, flexi auth will not work.
        $this->auth = new stdClass;
        // Load 'standard' flexi auth library by default.
        $this->load->library('flexi_auth');
        $is_logged = $this->flexi_auth->is_logged_in();
        $this->data['is_logged'] = $is_logged;
        $this->data['message'] = $this->session->flashdata('message');
        $logged_out_class_keys = array('account', 'images');
        if ($is_logged)
        {
            $session_data = $this->session->userdata('flexi_auth');
            define('USER_ID', $session_data['user_id']);
            $groups = array_keys($session_data['group']);
            define('USER_GROUP_ID', $groups[0]);
            $this->data['user_info'] = $session_data['user_info'];
        }
        elseif (!in_array($this->class_key, $logged_out_class_keys))
        {
            redirect('account');
        }

        //possible way of doing it later on?
//		$has_access = true;
//		if(!$has_access){
//			log_message('info', "User {user id goes here} tried to access  {$this->class_key}_$this->task_key.");
//			redirect('restricted');
//		}
        log_message('debug', "Controller Class ({$this->class_key}_$this->task_key) Initialized");
    }
}

// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */