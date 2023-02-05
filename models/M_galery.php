<?php

class M_galery extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('tb_galery');
    }
    function simpan_data($data, $table)
    {
        $this->db->insert($table, $data);
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
    function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function galandkat()
    {
        $this->db->select('*');
        $this->db->from('tb_galkat');
        $this->db->join('tb_galery', 'tb_galery.id_galkat=tb_galkat.id_galkat');

        $query = $this->db->get();
        return $query->result();
    }
}
