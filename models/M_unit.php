<?php

class M_unit extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('tb_unit');
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
    public function unitandkat()
    {
        $this->db->select('*');
        $this->db->from('tb_unitkat');
        $this->db->join('tb_unit', 'tb_unit.id_kunit=tb_unitkat.id_kunit');
        $this->db->join('tb_pengurus', 'tb_pengurus.id=tb_unit.id');
        $query = $this->db->get();
        return $query->result();
    }
}
