<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->path = FCPATH . "uploads/kegiatan/";
		$this->path2 = FCPATH . "uploads/kegiatan/isi/";


		//cek session login
		if(!$this->session->userdata('admin')){
            $cookie = get_cookie('djehbicd');
            if($cookie == NULL){
                redirect(base_url());
            }else{
                $getCookie = $this->db->get_where('admin', ['cookie' => $cookie])->row_array();
                if($getCookie){
                    $this->session->set_userdata('admin', true);
                }else{
                    redirect(base_url());
                }
            }
        }
	}

	public function index()
	{
		$data = [
            
			'judul'		=> 'Kegiatan',
			'subjudul'	=> 'Kegiatan Sekolah',
		];
	
		$this->load->view('admin/page/kegiatan',$data);
	}

	public function load()
	{
		$dataa = $this->db->get("tbl_rencanakegiatan")->result_array();
   
        foreach ($dataa as $row ) 
		{
			$data[] = array(
				// 'id' => $row['id'],
				'title' => $row['nama_kegiatan'],
				'start' => $row['tanggal'],
				'end' => date('Y-m-d', strtotime($row['tanggal_selesai'].'+ 1 days ')),
				'description' => $row['keterangan'],
				'tanggal' => date('d M Y', strtotime($row['tanggal'])),
				'selesai' => date('d M Y', strtotime($row['tanggal_selesai']))
			   );
			
            // $data['data'][$key]['title'] = $value->nama_kegiatan;
            // $data['data'][$key]['start'] = $value->tanggal;
            // $data['data'][$key]['end'] =  date('Y-m-d', strtotime($value->tanggal_selesai.'+ 1 days '));;
            // $data['data'][$key]['description'] = $value->keterangan;
            // $data['data'][$key]['tanggal'] = date('d M Y', strtotime($value->tanggal));
            // $data['data'][$key]['selesai'] = date('d M Y', strtotime($value->tanggal_selesai));
            // // $data['data'][$key]['backgroundColor'] = "#00a65a";
        }

		echo json_encode($data);
	}


	public function getdata()
	{

		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $this->db->order_by('id','DESC');
		$query = $this->db->get("tbl_rencanakegiatan");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  = $lists->nama_kegiatan;
			$data[$key][]  = $lists->keterangan;
			$data[$key][]  = date("d M Y",strtotime($lists->tanggal)).' <strong> S/d </strong>'.date("d M Y",strtotime($lists->tanggal_selesai));
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data,
            
		);


		echo json_encode($result);
		exit();
	}

	function simpan()
	{


		$nama = $this->input->post('nama');
		$keterangan = $this->input->post('keterangan');
		$tanggal = $this->input->post('tanggalm');
		$tanggal_selesai = $this->input->post('tanggals');

        
            $datasimpan = array(

                'nama_kegiatan' => $nama,
                'tanggal' => $tanggal,
                'tanggal_selesai' => $tanggal_selesai,
                'keterangan' => $keterangan,
            );
    
            $data = $this->db->insert('tbl_rencanakegiatan', $datasimpan);
            if ($data) {
                echo 'success';
            } else {
                echo 'error';
            }
        

		
	}

	public function showedit()
	{
		$koser = $this->input->get('id');
		$user = $this->db->get_where("tbl_rencanakegiatan",["id" => $koser]);
		if ($user->num_rows() > 0) {
			foreach ($user->result() as $data) {
				$hasil = array(
					'nama' => $data->nama_kegiatan,
					'tanggal' => $data->tanggal,
					'tanggal_selesai' => $data->tanggal_selesai,
					'keterangan' => $data->keterangan,
                'id' => $data->id,
				);
			}
		}
		echo json_encode($hasil);
	}

	public function simpanedit()
	{
        $nama = $this->input->post('enama');
		$keterangan = $this->input->post('eketerangan');
		$tanggal = $this->input->post('etanggalm');
		$tanggal_selesai = $this->input->post('etanggals');

        $datasimpan = array(
            'nama_kegiatan' => $nama,
                'tanggal' => $tanggal,
                'tanggal_selesai' => $tanggal_selesai,
                'keterangan' => $keterangan,
        );

        
		$this->db->where('id', $this->input->post('kodedit'));
		$simpan = $this->db->update('tbl_rencanakegiatan', $datasimpan);
		if ($simpan) {
			echo 'success';
		} else {
			echo 'error';
		}
	}


	public function hapus()
	{

		$id = $this->input->post('id');

		$data = $this->db->query("DELETE FROM tbl_rencanakegiatan WHERE id = '$id' ");
		if ($data) {
			echo 'success';
		} else {
			echo 'error';
		}
	}
}
