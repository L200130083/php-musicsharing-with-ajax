<?php
/**
 * this script is not working properly.. need improvement
 * current known bug : total offset = 2, in link tab, it shows 3
 * for now it's okay XD
 * author : brothernation@gmail.com
 */
isset($config) OR include('config.php');
class Pagination
{
    private $base_url;
    private $total_row;
    private $perpage;
    function __construct($base_url, $total_row, $perpage = FALSE)
    {
        GLOBAL $config;
        $this->base_url  = $base_url;
        $this->total_row = $total_row;
        $this->perpage   = (int) $config['perpage'];
    }
    function get()
    {
        if (strpos($this->base_url, '?') === FALSE)
        {
            $mark = '?';
        }
        else
        {
            $mark = '&';
        }
        $page              = $this->_current_p();
        $offset            = $this->_offset();
        $toffset           = $this->_total_offset();
        $data              = array();
        $data['perpage']   = $this->perpage;
        $data['offset']    = $offset;
        $data['is_needed'] = $toffset > 1;
        
        $data['number']['firstpage'] = ($toffset > 1 AND $page > 1) ? 'First' : FALSE;
        $data['number']['firstbutton'] = (intval($toffset) >= 2) ? ($page <= 1 ? $page + 1 : $page - 1) : FALSE;
        $data['number']['secondbutton'] = ($page + 1 <= $toffset) ? ($page + 1 > $data['number']['firstbutton'] ? $page + 1 : $page + 2) : FALSE;
        $data['number']['lastpage'] = $toffset >= $page + 1 ? 'Last' : FALSE;

        $data['link']['firstpage']    = ($toffset > 1 AND $page > 1) ? $this->base_url : FALSE;
        $data['link']['firstbutton']  = ($toffset >= 2) ? $this->base_url . "{$mark}p=" . ($page <= 1 ? $page + 1 : $page - 1) : FALSE;
        $data['link']['secondbutton'] = ($page + 1 <= $toffset) ? $this->base_url . "{$mark}p=" . ($page + 1 > $data['number']['firstbutton'] ? $page + 1 : $page + 2) : FALSE;
        $data['link']['lastpage']     = $toffset >= $page + 1 ? $this->base_url . "{$mark}p=" . $toffset : FALSE;
        
        return $data;
        
    }
    private function _current_p() //get the current page
    {
        $rv = isset($_GET['p']) ? $_GET['p'] : 1;
        return $rv;
    }
    private function _offset()
    {
        if (isset($_GET['p']))
        {
            if (intval($_GET['p']) > 1)
            {
                $current_page = (intval($_GET['p'] - 1) * $this->perpage);
            }
            else
            {
                $current_page = intval($_GET['p']) - 1;
            }
        }
        else
        {
            $current_page = 0;
        }
        return $current_page;
    }
    private function _total_offset() // how many tab?
    {
        $rv = floatval($this->total_row) / floatval($this->perpage);
        $rv = floatval(intval($rv)) < floatval($rv) ? intval($rv) + 1 : intval($rv);
        return intval($rv);
    }
}