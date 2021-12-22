<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    function kost_get($id=null){
        if ($id == null){   
            return $this->db->get('tb_kost')->result();
        }else {
            return $this->db->get_where('tb_kost', ['id_kost' => $id])->result_array();
        }
    }

    public function penghuni_get($q = null, $limit = 5, $offset = 0){
        if ($q == null) return $this->db->get('tb_penghuni', $limit, $offset)->result();
        else return $this->db->get_where('tb_penghuni', ['id_penghuni' => $q])->result_array();
    }

    public function penghuni_count(){
        return $this->db->get('tb_penghuni')->num_rows();
    }

    public function tambah($data)
    {
        try {
            $this->db->insert('tb_penghuni', $data);
            $error = $this->db->error();
            if (!empty($error['code'])) {
                throw new Exception('Terjadi kesalahan: ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        } 
        catch (Exception $ex) {
            return ['status' => false, 'msg' => $ex->getMessage()];
        }
    }

    public function ubah($id, $data)
    {
        try {
            $this->db->update('tb_penghuni', $data, ['id_penghuni' => $id]);
            $error = $this->db->error();
            if (!empty($error['code'])) {
                throw new Exception('Terjadi kesalahan: ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        } catch (Exception $ex) {
            return ['status' => false, 'msg' => $ex->getMessage()];
        }
    }

    public function delete($id)
    {
        try {
            $this->db->delete('tb_penghuni', ['id_penghuni' => $id]);
            $error = $this->db->error();
            if (!empty($error['code'])) {
                throw new Exception('Terjadi kesalahan: ' . $error['message']);
                return false;
            }
            return ['status' => true, 'data' => $this->db->affected_rows()];
        } catch (Exception $ex) {
            return ['status' => false, 'msg' => $ex->getMessage()];
        }
    }

}
