<?php

class M_publikasi extends CI_Model
{
    function tampil_data()
    {
        return $this->db->get('tb_publikasi');
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
    public function pubandkat()
    {
        $this->db->select('*');
        $this->db->from('tb_pubkat');
        $this->db->join('tb_publikasi', 'tb_publikasi.id_kat=tb_pubkat.id_kat');
        $this->db->order_by('id_pub', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
}
