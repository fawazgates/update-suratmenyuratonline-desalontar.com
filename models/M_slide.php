<?php

class M_slide extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('tb_slider');
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
