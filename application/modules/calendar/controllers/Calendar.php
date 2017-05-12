<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Anupam Oza <anupamoza90@gmail.com>
 * @copyright (c) 2017, Anupam Oza
 * @link http://localhost/calendar/
 */
//session_start(); //we need to start session in order to access it through CI

Class Calendar extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function display($year = null, $month = null)
    {
        $this->load->model('Calendar_model');
        if (!$year)
        {
            $year = date('Y');
        }
        if (!$month)
        {
            $month = date('m');
        }
        if ($day = $this->input->post('day'))
        {
            $this->Calendar_model->add_calendar_data("$year-$month-$day", $this->input->post('data'));
        }

        $data['calendar'] = $this->Calendar_model->generate($year, $month);
        $this->load_view('calendar_view', $data);
    }

    // Load View
    public function load_view($view_name = '', $data = array())
    {
        $this->load->view('header', $data);
        $this->load->view($view_name, $data);
        $this->load->view('footer');
    }

}
