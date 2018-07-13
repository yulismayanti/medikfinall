<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
	function __construct(){
			parent::__construct();
			$this->load->model('m_data');
			$this->load->helper('url');
		}


	public function d_pasien()
	{
		$this->load->model('m_data');
		$data['tb_pasien'] = $this->m_data->tampil_data('tb_pasien')->result();
		$this->load->view('template/sidebar');
		$this->load->view('template/header');
		$this->load->view('admin/data_pasien',$data);
		$this->load->view('template/footer');
	}
	public function d_pasien_front()
	{
		$this->load->model('m_data');
		$data['tb_pasien'] = $this->m_data->tampil_data('tb_pasien')->result();
		$this->load->view('template/front_office');
		$this->load->view('template/header');
		$this->load->view('admin/data_pasien',$data);
		$this->load->view('template/footer');
	}
	public function d_pasien_dokter()
	{
		$this->load->model('m_data');
		$data['tb_pasien'] = $this->m_data->tampil_data('tb_pasien')->result();
		$this->load->view('template/header');
		$this->load->view('template/v_dokter');
		$this->load->view('admin/data_pasien',$data);
		$this->load->view('template/footer');
	}

	public function edit_pasien($id)
	{
		$where = array('id' => $id);
		$this->load->model('m_data');
		$data['tb_pasien'] = $this->m_data->tampil_data('tb_pasien')->result();
		$this->load->view('template/sidebar');
		$this->load->view('template/header');
		$this->load->view('admin/edit_pasien',$data);
		$this->load->view('template/footer');
	}
	public function edit_pasien_front($id)
	{
		$where = array('id' => $id);
		$this->load->model('m_data');
		$data['tb_pasien'] = $this->m_data->tampil_data('tb_pasien')->result();
		$this->load->view('template/front_office');
		$this->load->view('template/header');
		$this->load->view('admin/edit_pasien',$data);
		$this->load->view('template/footer');
	}

	function tambah_pasien()
	{
		$nama_lengkap 		= $this->input->post('nama_lengkap');
		$tgl_masuk 		= $this->input->post('tgl_masuk');
		$alamat 		= $this->input->post('alamat');
		$provinsi		= $this->input->post('provinsi');
		$kabupaten_kota 	= $this->input->post('kabupaten_kota');
		$kecematan			= $this->input->post('kecematan');
		$desa_kelurahan			= $this->input->post('desa_kelurahan');
		$umur			= $this->input->post('umur');
		$telp			= $this->input->post('telp');
		$agama			= $this->input->post('agama');
		$pekerjaan			= $this->input->post('pekerjaan');
		$jk			= $this->input->post('jk');
		$rekmed		= $this->input->post('rekmed');
		$pj		= $this->input->post('pj');
		
		$data = array(

				'nama_lengkap' 		=> $nama_lengkap,	
				'tgl_masuk' 	=> $tgl_masuk,	
				'alamat' 	=> $alamat,	
				'provinsi'	 	=> $provinsi,	
				'kabupaten_kota'	=> $kabupaten_kota,	
				'kecematan'		=> $kecematan,	
				'desa_kelurahan'			=> $desa_kelurahan,	
				'umur'			=> $umur,	
				'telp'			=> $telp,	
				'agama'			=> $agama,	
				'pekerjaan'			=> $pekerjaan,	
				'jk'			=> $jk,	
				'rekmed'	=> $rekmed,	
				'pj'		=> $pj,	
		);


		$this->m_data->input_data($data,'tb_pasien');
		redirect('pasien/d_pasien');
	}

	function update_pasien()
	{
		$id 		= $this->input->post('id');
		$nama_lengkap 		= $this->input->post('nama_lengkap');
		$tgl_masuk 		= $this->input->post('tgl_masuk');
		$alamat 		= $this->input->post('alamat');
		$provinsi		= $this->input->post('provinsi');
		$kabupaten_kota 	= $this->input->post('kabupaten_kota');
		$kecematan			= $this->input->post('kecematan');
		$desa_kelurahan			= $this->input->post('desa_kelurahan');
		$umur			= $this->input->post('umur');
		$telp			= $this->input->post('telp');
		$agama			= $this->input->post('agama');
		$pekerjaan			= $this->input->post('pekerjaan');
		$jk			= $this->input->post('jk');
		$rekmed		= $this->input->post('rekmed');
		$pj		= $this->input->post('pj');

		$data = array(

				'nama_lengkap' 		=> $nama_lengkap,	
				'tgl_masuk' 	=> $tgl_masuk,	
				'alamat' 	=> $alamat,	
				'provinsi'	 	=> $provinsi,	
				'kabupaten_kota'	=> $kabupaten_kota,	
				'kecematan'		=> $kecematan,	
				'desa_kelurahan'			=> $desa_kelurahan,	
				'umur'			=> $umur,	
				'telp'			=> $tep,	
				'agama'			=> $agama,	
				'pekerjaan'			=> $pekerjaan,	
				'jk'			=> $jk,	
				'rekmed'	=> $rekmed,	
				'pj'		=> $pj,		
		);

		$where = array('id' => $id);


		$this->m_data->update_data($where,'tb_pasien',$data);
		redirect('pasien/d_pasien');
	}

	function detail($id)
	{

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$where = array('id' => $id);
		$this->load->model('m_data');
		$data['tb_pasien'] = $this->m_data->edit_data($where,'tb_pasien')->result();
		$this->load->view('pasien/detail_pasien',$data);
		$this->load->view('template/footer');
	}

	function hapus($id){
		$where = array('id' => $id);
		$this->m_data->hapus_data($where,'tb_pasien');
		redirect('pasien/d_pasien');
	}
}
