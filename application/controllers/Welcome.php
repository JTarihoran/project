<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 *
	 */
	public function __construct()
	{
		parent::__construct ();
		$this-> load->database();
		$this-> load->model('Ambil_data'	);
	}
	 public function index()
    {
        // $this->load->model('Ambil_data'); // ini WAJIB sebelum dipakai
		// var_dump('')
        $data['data'] = $this->Ambil_data->get_data();
		// var_dump($data);die();
        $this->load->view('pertemuan3', $data);


		
    }
	
		public function tambah()
		{
			$insert_data= [
			'NIM' 		=> $this->input->post('NIM',TRUE),
			'Nama'		=> $this->input->post('Nama',TRUE),
			'Offering'	=> $this->input->post('Offering',TRUE)
			];
			// $nimtest = '12345';
			// var_dump($insert_data);
			// var_dump($nimtest);
			// die();
			if ($this->Ambil_data->insert($insert_data)){
				redirect('welcome');

			}else {
				echo "gagal";
			}
			
		}

		public function hapus($nim)
		{
			// var_dump($nim);die();	
			if ($this->Ambil_data->delete($nim)) {
				redirect('Welcome');

			}else {
				echo "Gagal menghapus data";
			}
		}
	
	// {
	// 	"nama_mahasiswa":"ali";
	// }
}

