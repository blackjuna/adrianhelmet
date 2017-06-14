<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mb');
	}

	public function index($a='',$offset='')
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = $data['key']->nama_brand;
		$data['slider'] = $this->mb->slider();
		if (isset($_GET['search'])) {
			$data['produk'] = $this->mb->getSearch();
		}else{
			$jml = $this->db->get_where('produk');
			//pengaturan pagination
			$config['base_url'] = base_url().'vb/index/page/';
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = '12';
					// Desain pagination
			$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

		//inisialisasi config
			$this->pagination->initialize($config);

			$data['produk'] = $this->db->get('produk',$config['per_page'], $offset)->result();	
		}
		$data['halaman'] = $this->pagination->create_links();
		$this->load->view('main2', $data, FALSE);
	}

	public function login()
	{
		if ($this->session->userdata('id')) {
            redirect(site_url('vp'));
		}else{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Login | '.$data['key']->nama_brand;
		$this->load->view('login2', $data, FALSE);
		}
	}

	public function lupa_password()
	{
		if ($this->session->userdata('id')) {
            redirect(site_url('vp'));
		}else{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Lupa Password | '.$data['key']->nama_brand;
		$this->load->view('login2', $data, FALSE);
		}
	}

	public function akses_pw_tk($t='')
	{
		if ($this->session->userdata('id')) {
            redirect(site_url('vp'));
		}else{
			$q = $this->db->get_where('user', array('token' => $t,'verif' => '1'));
			if ($q->num_rows() > 0) {
				$data['key'] = $this->mb->utama_user()->row();
				$data['title'] = 'Ganti Password | '.$data['key']->nama_brand;
				$this->load->view('login2', $data, FALSE);	
			} else{
				$this->session->set_flashdata('error', 'Mohon maaf anda tidak dapat mengakses alamat url tersebut!');
				redirect(site_url());
			}
		}
	}

	public function konf_pemb($t='')
	{
		$q = $this->db->get_where('invoices', array('kode_invoice' => $t,'link_stats' => '1'));
		if ($q->num_rows() > 0) {
			$data['key'] = $this->mb->utama_user()->row();
			$data['title'] = 'Konfirmasi Pembayaran | '.$data['key']->nama_brand;
			$data['val'] = $q->row();
			$this->load->view('main2', $data);	
		}else{
			$this->session->set_flashdata('error', 'Mohon maaf anda tidak dapat mengakses alamat url tersebut!');
			redirect(site_url());
		}
	}

	public function produk($l='')
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Produk | '.$data['key']->nama_brand;
		if ($this->uri->segment(2) != '') {
			$data['p'] = $this->mb->single_produk($l);
		}else{
			$data['p'] = $this->mb->p_all_kate();
		}
		$this->load->view('main2', $data, FALSE);	
	}

	public function produk_id()
	{
		$a = $this->mb->produk_id($this->input->get('id'));
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($a, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function kategori($l='',$offset='')
	{
		$data['key'] = $this->mb->utama_user()->row();

		if ($l == 'promo') {
			$data['title'] = 'Promo | '.$data['key']->nama_brand;
			$jml = $this->db->get_where('promo',array('kategori' => $l));
			//pengaturan pagination
			$config['base_url'] = base_url().'kategori/'.$l;
			$config['total_rows'] = $jml->num_rows();
			$config['per_page'] = '12';
					// Desain pagination
			$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

		//inisialisasi config
			$this->pagination->initialize($config);

			$data['promo'] = $this->db->get_where('promo',array('kategori' => $l),$config['per_page'], $offset)->result();	
		}else{	
			$data['title'] = 'Kategori | '.$data['key']->nama_brand;
			if ($this->db->get_where('produk',array('kategori' => $l))->num_rows() > 0){
				$data['title'] = 'Kategori | '.$data['key']->nama_brand;
				$jml = $this->db->get_where('produk',array('kategori' => $l));
				//pengaturan pagination
				$config['base_url'] = base_url().'kategori/'.$l;
				$config['total_rows'] = $jml->num_rows();
				$config['per_page'] = '12';
				// Desain pagination
				$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
				$config['full_tag_close'] ="</ul>";
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
				$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
				$config['next_tag_open'] = "<li>";
				$config['next_tagl_close'] = "</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tagl_close'] = "</li>";
				$config['first_tag_open'] = "<li>";
				$config['first_tagl_close'] = "</li>";
				$config['last_tag_open'] = "<li>";
				$config['last_tagl_close'] = "</li>";

				//inisialisasi config
				$this->pagination->initialize($config);

				$data['produk'] = $this->db->get_where('produk',array('kategori' => $l),$config['per_page'], $offset)->result();	
				$data['promo'] = '';		
			}else{
				echo "tidak";
			}
		}
		//buat pagination
		$data['halaman'] = $this->pagination->create_links();

		$this->load->view('main', $data, FALSE);	
	}

	public function incart($id="",$d='')
	{
		if (isset($_POST['btn'])) {	
		foreach ($this->cart->contents() as $i) {
			if ($i['id'] == $this->input->post('izjq9dsz')) {
				echo "Maaf anda tidak dapat memesan produk ini lagi, karena anda sudah memesan produk ini sebelumnya";
				$a[] = 'true';
				redirect('produk/'.$d);
			}
		}
		if (@$a[0] == '') {
			$p = $this->mb->produk_id($id);
			if ($this->input->post('pilihharga') == 0) {
				$stok = $this->input->post('stok');
			}elseif($this->input->post('pilihharga') == 1){
				$stok =  20;
			}
			if ($this->input->post('warna') != '') {
				$warna = $this->input->post('warna');
			}else{
				$warna = $this->input->post('text_warna');
			}
			$data = array(
				'id'      => $p->id_produk,
				'img'     => $p->img,
				'warna'   => $warna,
				'cos'     => $this->input->post('cos'),
				'qty'     => $stok,
				'name'    => $p->nama_produk,
				'price'   => $p->harga_satuan
				);

			$val = $this->cart->insert($data);
			if ($val) {
				$this->session->set_flashdata('sukses', 'Item berhasil ditambahkan ke keranjang belanja');
				redirect('keranjang_belanja');
			}
			}else{
				echo "Jangan sembarangan cari celah bro :v";
			} 	
		} 
	}

	public function decart($i='')
	{
		$data = array(
			'rowid'   => $i,
			'qty'     => 0
			);

		$this->cart->update($data);
		$this->session->set_flashdata('sukses', 'Item berhasil dihapus dari keranjang belanja');
		redirect('keranjang_belanja');
	}

	public function upcart()
	{
		$data = array(
			'rowid'   => $this->input->post('row'),
			'qty'     => $this->input->post('qty')
			);

		$this->cart->update($data);
		$this->session->set_flashdata('sukses', 'Item berhasil diedit dari keranjang belanja');
		redirect('keranjang_belanja');
	}

	public function keranjang_bel()
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Keranjang Belanja | '.$data['key']->nama_brand;
		$this->load->view('main2', $data, FALSE);
	}
	public function inpemesanan()
	{
		if (isset($_POST['kirimpem'])) {
			$this->mb->inpemesanan();
			$x = $this->cart->contents();
			$xc = count($this->cart->contents());
			foreach ($x as $o) {
				$id[] = $o['id'];
				$stok[] = $o['qty'];
			}

			for($i=0;$i< $xc;$i++){ 
				echo $id[$i];
				$this->db->query('UPDATE produk SET stok=(stok-'.$stok[$i].') WHERE id_produk='.$id[$i]);
			}	
			$this->session->set_flashdata('sukses', 'Pemesanan berhasil, detail pemesanan akan dikirimkan ke email anda jika email anda belum juga mendapatkan tanggapan silahkan tunggu 1x24 jam. Terimakasih');
			$this->cart->destroy();
			redirect(site_url());
		}else{
			redirect(site_url());
		}
	}

	public function laman($b='')
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Laman | '.$data['key']->nama_brand;
		if ($this->uri->segment(2) != '') {
			$data['l'] = $this->mb->single_laman($b);
		}
		$this->load->view('main', $data, FALSE);	
	}

	public function promo($b='',$t='')
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Kategori | '.$data['key']->nama_brand;
		if ($this->uri->segment(2) != 'produk'){
			$data['l'] = $this->mb->single_promo($b,$t);
		}
		$this->load->view('main', $data, FALSE);	
	}

	public function feedback()
	{
		$data['key'] = $this->mb->utama_user()->row();
		$data['title'] = 'Feedback | '.$data['key']->nama_brand;
		if ($this->uri->segment(1) == 'testimoni') { 
			$this->load->view('main2', $data, FALSE);
		}else{
			redirect('404');
		}
	}

}

