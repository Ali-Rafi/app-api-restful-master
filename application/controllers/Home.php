<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Home extends RestController {

    public function __construct(){
        parent::__construct();
        $this->load->model('M_Home', 'home');
        // $this->methods['index_get']['limit'] = 100; // Akses Terbatas 100x per API TOKEN, reset 1x24 Jam
        // $this->methods['penghuni_get']['limit'] = 100; // Akses Terbatas 100x per API TOKEN, reset 1x24 Jam
    }

	public function index_get()
	{
		$id = $this->get('id', true);
        if ($id == null){
            $data = $this->home->kost_get();
            $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK); 
        } else {
            $data = $this->home->kost_get($id);
            if ($data) $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
            else $this->response(['status' => false, 'msg' => 'Data Tidak Ditemukan.'], RestController::HTTP_NOT_FOUND);
        } 
	}

    public function penghuni_get(){
        $q = $this->get('q', true); /// Cari Nama Penghuni
        if ($q === null){
            $p = $this->get('page', true);
            $p = (empty($p) ? 1 : $p);
            $total_data = $this->home->penghuni_count();
            $total_page = ceil($total_data / 5);
            $start = ($p - 1) * 5;
            $list = $this->home->penghuni_get(null, 5, $start);
            if ($list) {
                $data = [
                    'status' => true,
                    'page' => $p,
                    'total_data' => $total_data,
                    'total_page' => $total_page,
                    'data' => $list
                ];
            } else {
                $data = [
                    'status' => false,
                    'msg' => 'Data tidak ditemukan'
                ];
            }
            $this->response($data, RestController::HTTP_OK);
        } else {
            $data = $this->home->penghuni_get($q);
            if ($q) $this->response(['status' => true, 'data' => $data], RestController::HTTP_OK);
            else $this->response(['status' => false, 'data' => 'Data Tidak Ditemukan'], RestController::HTTP_NOT_FOUND);
        }
    }

    public function penghuni_post(){
        $data = [
            'kost_id' => $this->post('kost_id', true),
            'nama_penghuni' => $this->post('nama_penghuni', true),
            'jenis_kelamin' => $this->post('jenis_kelamin', true),
            'email' => $this->post('email', true),
            'password' => $this->post('password', true),
            'no_telp' => $this->post('no_telp', true),
            'status' => $this->post('status', true)
        ];
        $simpan = $this->home->tambah($data);
        if ($simpan['status']) {
            $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah ditambahkan'], RestController::HTTP_CREATED);
        } else {
            $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
        }
    }

    public function penghuni_put()
    {
        $data = [
            'kost_id' => $this->put('kost_id', true),
            'nama_penghuni' => $this->put('nama_penghuni', true),
            'jenis_kelamin' => $this->put('jenis_kelamin', true),
            'email' => $this->put('email', true),
            'password' => $this->put('password', true),
            'no_telp' => $this->put('no_telp', true),
            'status' => $this->put('status', true)
        ];
        $id = $this->put('id', true);
        if ($id === null) {
            $this->response(['status' => false, 'msg' => 'Masukkan ID Penghuni yang akan dirubah'], RestController::HTTP_BAD_REQUEST);
        }
        $simpan = $this->home->ubah($id, $data);
        if ($simpan['status']) {
            $status = (int)$simpan['data'];
            if ($status > 0)
                $this->response(['status' => true, 'msg' => $simpan['data'] . ' Data telah dirubah'], RestController::HTTP_OK);
            else
                $this->response(['status' => false, 'msg' => 'Tidak ada data yang dirubah'], RestController::HTTP_BAD_REQUEST);
        } else {
        $this->response(['status' => false, 'msg' => $simpan['msg']], RestController::HTTP_INTERNAL_ERROR);
        }
    }

    public function penghuni_delete()
    {
        $id = $this->delete('id', true);
        if ($id === null) {
            $this->response(['status' => false, 'msg' => 'Masukkan ID Penghuni yang akan dihapus'], RestController::HTTP_BAD_REQUEST);
        }
        $delete = $this->home->delete($id);
        if ($delete['status']) {
            $status = (int)$delete['data'];
            if ($status > 0)
                $this->response(['status' => true, 'msg' => 'Data ID Penghuni ' . $id . ' telah dihapus'], RestController::HTTP_OK);
            else
                $this->response(['status' => false, 'msg' => 'Tidak ada data yang dihapus'], RestController::HTTP_BAD_REQUEST);
        } else {
            $this->response(['status' => false, 'msg' => $delete['msg']], RestController::HTTP_INTERNAL_ERROR);
        }
    }

}
