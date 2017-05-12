<?php

/**
 * @author Anupam Oza <anupamoza90@gmail.com>
 * @copyright (c) 2017, Anupam Oza
 * @link http://localhost/login/
 */
Class Calendar_Model extends CI_Model
{

    var $conf;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->conf = array(
            'start_day' => 'monday',
            'month_type' => 'long',
            'day_type' => 'short',
            'show_next_prev' => TRUE,
            'next_prev_url' => base_url() . 'calendar/display'
        );
        $this->conf['template'] = '
                                {table_open}<table cellpadding="1" cellspacing="2" class="calendar">{/table_open}

                                {heading_row_start}<tr>{/heading_row_start}

                                {heading_previous_cell}<th class="prev_sign"><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
                                {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
                                {heading_next_cell}<th class="next_sign"><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

                                {heading_row_end}</tr>{/heading_row_end}

                                //Deciding where to week row start
                                {week_row_start}<tr class="week_name" >{/week_row_start}
                                //Deciding  week day cell and  week days
                                {week_day_cell}<td >{week_day}</td>{/week_day_cell}
                                //week row end
                                {week_row_end}</tr>{/week_row_end}

                                {cal_row_start}<tr class="days">{/cal_row_start}
                                {cal_cell_start}<td class="day">{/cal_cell_start}

                                {cal_cell_content}
                                <div class="day_num">{day}</div>
                                <div class="content">{content}</div>
                                {/cal_cell_content}
                                
                                {cal_cell_content_today}
                                <div class="day_num highlight">{day}</div>
                                <div class="content">{content}</div>
                                {/cal_cell_content_today}

                                {cal_cell_no_content}
                                <div class="day_num">{day}</div>
                                {/cal_cell_no_content}
                                {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

                                {cal_cell_blank}&nbsp;{/cal_cell_blank}

                                {cal_cell_end}</td>{/cal_cell_end}
                                {cal_row_end}</tr>{/cal_row_end}

                                {table_close}</table>{/table_close}
                                    ';
    }

    public function get_calendar_data($year, $month)
    {
        // date LIKE '2017-05%'
        $query = $this->db->select('date, data')->from('meeting_calendar')->like('date', "$year-$month", 'after')->get();
        $cal_data = array();
        foreach ($query->result() as $row)
        {
            $cal_data[ltrim(substr($row->date, 8, 2), 0)] = $row->data; //2017-05-11 2 chars from 8th position
        }
        return $cal_data;
    }

    public function add_calendar_data($date, $data)
    {
        if ($this->db->select('date')->from('meeting_calendar')->where('date', $date)->count_all_results())
        {
            $this->db->where('date', $date)
                    ->update('meeting_calendar', array(
                        'date' => $date,
                        'data' => $data
            ));
        } else
        {
            $this->db->insert('meeting_calendar', array(
                'date' => $date,
                'data' => $data
            ));
        }
    }

    public function generate($year, $month)
    {
        $this->load->library('calendar', $this->conf);
        $this->db->last_query();
//        exit;
        $data = $this->get_calendar_data($year, $month);
        return $this->calendar->generate($year, $month, $data);
    }

}
