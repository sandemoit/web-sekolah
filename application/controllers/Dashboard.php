<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
        $this->load->model('Visitor_model');
    }
	public function index()
	{
		 // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }

        $data['slider']  = $this->db->query('SELECT * FROM slider ORDER BY id ASC')->result();
        $data['guru']  = $this->db->query('SELECT * FROM guru ORDER BY id DESC LIMIT 4')->result();
        $data['ekskul']  = $this->db->get('ekskul')->result();
        $data['foto']  = $this->db->query('SELECT * FROM foto ORDER BY id DESC LIMIT 10')->result();
        $data['siswa']  = $this->db->query('SELECT * FROM siswa ORDER BY id DESC ')->result();
        $data['jumlahsiswa']  = $this->db->query('SELECT SUM(jumlah) AS jumlahsiswa FROM siswa')->row();
        $data['sambutankepsek']  = $this->db->query('SELECT * FROM sambutan WHERE id = "1"  ')->row();
        $data['denah']  = $this->db->query('SELECT * FROM denah WHERE id = "1"  ')->row();
        $data['berita'] = $this->M_dashboard->get_datadashboard();
        $data['denahbangunan']  = $this->db->query('SELECT * FROM denahbangunan WHERE id = "1"  ')->row();
        $data['keutamaan']  = $this->db->get('keutamaan')->result();
        $data['jurusan']  = $this->db->get('jurusan')->result();
        $data['industri']  = $this->db->get('industri')->result();
        $data['testimoni']  = $this->db->get('testimoni')->result();
        $data['video'] = $this->db->order_by('id', 'desc')->limit(3)->get('video')->result();





        
		$this->load->view('dashboardnew/page/dashboard',$data);
		
	}

    public function kirimpesan()
    {
       
            
            $data = array(
                'nama' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'subjek' => $this->input->post('subject'),
                'pesan' => $this->input->post('message'),
                'waktu' => date('Y-m-d H:i:s')
            );

			$simpan = $this->db->insert('kontak', $data);


            // kirim email dan simpan data ke database
            if ($simpan) {
                $this->session->set_flashdata('success_msg', 'Pesan Anda telah berhasil dikirim!');
            } else {
                $this->session->set_flashdata('error_msg', 'Maaf, terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.');
            }
            redirect('dashboard');
        
    
    }

    public function profil_sekolah(){
       
         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }

        $data = [
			'judul'		=> 'Profil',
			'subjudul'	=> 'Profil Sekolah ',
            'profil'     => $this->db->query('SELECT * FROM profil WHERE id = "1"  ')->row(),
		];
        
		$this->load->view('dashboardnew/page/profil',$data);

    }

    public function kontak(){
       
        // Dapatkan alamat IP pengunjung
        $ip_address = $this->input->ip_address();

        // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
        if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
            // Jika belum, tambahkan pengunjung ke database
            $this->Visitor_model->add_visitor($ip_address);
        }

       $data = [
           'judul'		=> 'Kontak',
           'subjudul'	=> 'Kontak Sekolah ',
           'profil'     => $this->db->query('SELECT * FROM profil WHERE id = "1"  ')->row(),
       ];
       
       $this->load->view('dashboardnew/page/kontak',$data);

   }

    public function visi_misi(){

         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }
       
        $data = [
			'judul'		=> 'Profil',
			'subjudul'	=> 'Visi Misi Sekolah ',
            'visi'     => $this->db->query('SELECT * FROM visi WHERE id = "1"  ')->row(),
		];
        
		$this->load->view('dashboardnew/page/visimisi',$data);

    }

    public function sambutandetail()
    {
        $data = [
			'judul'		=> 'Profil',
			'subjudul'	=> 'Sambutan Kepala Sekolah',
            'sambutankepsek'     =>  $this->db->get_where('sambutan', ['id' => '1'])->row()
		];
       
		$this->load->view('dashboardnew/page/detailsambutan',$data);

        
    }

    public function guru(){

         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }
       
        $data = [
			'judul'		=> 'Informasi',
			'subjudul'	=> 'Guru',
            'guru'     => $this->db->query('SELECT * FROM guru ORDER BY id ASC ')->result(),
		];
        
		$this->load->view('dashboardnew/page/guru',$data);

    }

    public function file(){

         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }
       
        $data = [
			'judul'		=> 'Informasi',
			'subjudul'	=> 'File Download',
            'file'     => $this->db->query('SELECT * FROM file ORDER BY id ASC ')->result(),
		];
        
		$this->load->view('dashboardnew/page/file',$data);

    }


    public function kegiatan(){

         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }
       
        $data = [
			'judul'		=> 'Kegiatan',
			'subjudul'	=> 'Kalender Sekolah',
            
		];
        
		$this->load->view('dashboardnew/page/kegiatan',$data);

    }

    public function denahbangunan(){

         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }
       
        $data = [
			'judul'		=> 'Denah Bangunan',
			'subjudul'	=> 'Peta Denah Bangunan Sekolah',
            'denahbangunan' => $this->db->query('SELECT * FROM denahbangunan WHERE id = "1"  ')->row()
            
		];
        
		$this->load->view('dashboardnew/page/denahbangunan',$data);

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

    public function video(){

         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }
       
        $data = [
			'judul'		=> 'Galeri',
			'subjudul'	=> 'Video',
            'video'     => $this->db->query('SELECT * FROM video ORDER BY id DESC ')->result(),
		];
        
		$this->load->view('dashboardnew/page/video',$data);

    }

    public function foto(){

         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }
       
        $data = [
			'judul'		=> 'Galeri',
			'subjudul'	=> 'Foto',
            'foto'     => $this->db->query('SELECT * FROM foto ORDER BY id DESC ')->result(),
		];
        
		$this->load->view('dashboardnew/page/foto',$data);

    }

    public function struktur_organisasi(){

         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }
       
        $data = [
			'judul'		=> 'Profil',
			'subjudul'	=> 'Struktur Organisasi Sekolah ',
            'struktur'     => $this->db->query('SELECT * FROM struktur WHERE id = "1"  ')->row(),
		];
        
		$this->load->view('dashboardnew/page/struktur',$data);

    }

    public function ekskuldetail($slug = "")
    {

        
        if (!$slug) {
            redirect('dashboard');
        }
		
        $cekdulu = $this->M_dashboard->get_ekskul_by_slug($slug);
       

        if ($cekdulu->num_rows() < 1) {
            redirect('my404');
        } else {
            $data = [
                'judul'		=> 'Ekstrakulikuler',
                'ekskul'   => $this->db->get('ekskul')->result()
            ];
            $data['detail']   = $this->M_dashboard->get_ekskul_by_slug($slug)->row();
            $data['berita'] = $this->M_dashboard->get_datadashboard();
            $data['subjudul'] = $data['detail']->judul;

            $this->load->view('dashboardnew/page/detailekskul',$data);
        }

    }

    public function jurusandetail($slug = "")
    {
        if (!$slug) {
            redirect('dashboard');
        }
		
        $cekdulu = $this->M_dashboard->get_jurusan_by_slug($slug);
       

        if ($cekdulu->num_rows() < 1) {
            redirect('my404');
        } else {
            $data = [
                'judul'		=> 'Jurusan',
                'jurusan'   => $this->db->get('jurusan')->result(),
                'ekskul'   => $this->db->get('ekskul')->result()

            ];
            $data['detail']   = $this->M_dashboard->get_jurusan_by_slug($slug)->row();
            $data['berita'] = $this->M_dashboard->get_datadashboard();
            $data['subjudul'] = $data['detail']->judul;

            $this->load->view('dashboardnew/page/detailjurusan',$data);
        }

    }

    public function berita_list()
    {
         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }

        $data = [
			'judul'		=> 'Informasi',
			'subjudul'	=> 'Daftar Berita',
           
		];
        $config['base_url'] = site_url('berita-sekolah-list'); //site url
        $config['total_rows'] = $this->db->get('berita')->num_rows(); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
    
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = '<span aria-hidden="true"><i class="far fa-arrow-right"></i></span>';
        $config['prev_link']        = '<span aria-hidden="true"><i class="far fa-arrow-left"></i></span>';
        $config['full_tag_open']    = '<ul class="pagination">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tagl_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tagl_close']  = '</li>';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tagl_close']  = '</li>';
        $config['attributes'] = array('class' => 'page-link'); // Menambahkan kelas 'page-link' ke tag anchor

 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(1)) ? $this->uri->segment(2) : 0;

       
        $start = $this->uri->segment(2);
        $data['beritalists'] = $this->M_dashboard->get_all_post($config['per_page'], $start);

        
        $data['pagination'] = $this->pagination->create_links();
 
        $data['berita'] = $this->M_dashboard->get_datadashboard();
        $data['ekskul']  = $this->db->get("ekskul")->result();


        $this->load->view('dashboardnew/page/list_berita',$data);

        
    }

    public function cariberita()
    {

        if ($this->input->post('cari')!=''){
        
           
        
         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }

        $data = [
			'judul'		=> 'Informasi',
			'subjudul'	=> 'Daftar Berita',
			'keyword'	=> $this->input->post('cari'),
           
		];
        
        $data['beritalists'] = $this->M_dashboard->get_all_post_cari($this->input->post('cari'));

        
       
 
        $data['berita'] = $this->M_dashboard->get_datadashboard();
        $data['ekskul']  = $this->db->get("ekskul")->result();


        $this->load->view('dashboardnew/page/cariberita',$data);
    }else{
        redirect("berita-sekolah-list");
    }

        
    }


   


    public function beritadetail($slug = "")
    {
         // Dapatkan alamat IP pengunjung
         $ip_address = $this->input->ip_address();
         $this->load->library('disqus');

         // Periksa apakah pengunjung dengan IP yang sama telah mengunjungi pada hari yang sama
         if (!$this->Visitor_model->check_ip_visit_today($ip_address)) {
             // Jika belum, tambahkan pengunjung ke database
             $this->Visitor_model->add_visitor($ip_address);
         }

        if (!$slug) {
            redirect('dashboard');
        }
		
        $cekdulu = $this->M_dashboard->get_post_by_slug($slug);
        $data['berita'] = $this->M_dashboard->get_datadashboard();
        if ($cekdulu->num_rows() < 1) {
            redirect('my404');
        } else {
            
            $berita =$this->M_dashboard->get_post_by_slug($slug)->row();
            $new_views_count = $berita->view_count + 1;
        
            // Update nilai views_count di database
            $this->db->where('slug', $slug);
            $this->db->update('berita', array('view_count' => $new_views_count));
    
            $data = [
                'judul'		=> 'Berita Detail',
                'ekskul'   => $this->db->get('ekskul')->result()
            ];
           

            
            $data['detail']   = $this->M_dashboard->get_post_by_slug($slug)->row();
            $data['berita'] = $this->M_dashboard->get_datadashboard();
            $data['subjudul'] = 'Berita Detail';
            $disqus = $this->disqus->get_html();
            $data['disqus']  = $disqus;
            $this->load->view('dashboardnew/page/detailberita',$data);
        }

    }


    
 function summernote()  {
    $this->load->view('dashboard/page/summernote');

    
 }
    
}
