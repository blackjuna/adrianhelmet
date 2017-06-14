<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mb extends CI_Model {

	public function utama_user()
	{
		return $this->db->query("SELECT user.nama_lengkap,user.email as uemail,utama.* FROM utama,user WHERE utama.id = user.utama");
	}

	public function utama()
	{
		return $this->db->get('utama');
	}

	public function verif_login()
	{
		$query = $this->db->get_where('user',array('email' => $this->input->post('email'),
			'password' => sha1(md5($this->input->post('password')))
			));
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$dataSession = array(
					'id' => $row->id,
					'status' => $row->status
					);
				$this->session->set_userdata($dataSession);
			}
			redirect('Vp');
		}else{
			$this->session->set_flashdata('error', 'Maaf email dan password anda tidak dapat kami temukan di website kami, silahkan cek kembali email atau password anda!');
			redirect('vb/login');
		}
	}

	public function lupa_password()
	{
		$this->load->library('My_PHPMailer');

		// Get Email
		$q = $this->db->get_where('user', array('email' => $this->input->post('email')));
		// Update Verif
		$this->db->update('user', array('verif' => '1'), array('email' => $this->input->post('email')));

		if ($q->num_rows() > 0) {
			
			$query = $q->row();

			$mail = new PHPMailer();  
			$mail->IsSMTP(); // we are going to use SMTP
			$mail->isMail();
			$mail->SMTPAuth   = true; // enabled SMTP authentication
			$mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
			$mail->Host       = "mx1.idhostinger.com";      // setting GMail as our SMTP server
			$mail->Port       = 465;                   // SMTP port to connect to GMail
			$mail->Username   = "mail@sofensys.id";  // user email address
			$mail->Password   = "sofensys";            // password in GMail
			$mail->SetFrom('mail@sofensys.id', 'Billing Tokokorek');  //Who is sending the email
			$mail->Subject    = 'Lupa Password : '.$this->input->post('email');
			$mail->Body      = 'Terimakasih, telah melakukan konfirmasi password, untuk mengganti password anda silahkan klik '.anchor('vb/akses_pw_tk/'.$query->token, 'Link Ganti Password Sekarang');
			$mail->isHTML(true);
			$mail->AddAddress($this->input->post('email'));
			if(!$mail->Send()) {
				echo  "Error: ".$mail->ErrorInfo;
			}else{
				$this->session->set_flashdata('sukses', 'Konfirmasi password sudah dikirimkan, silahkan cek email anda!');
				redirect('vb/login');
			}
		}else{
			$this->session->set_flashdata('error', 'Mohon maaf email yang anda masukan tidak kami temukan di daftar pemilik tokokorek ini!');
				redirect('vb/login');
		}
	}

	public function ganti_password()
	{
		if (isset($_POST['pw_ganti'])) {	
			$q = $this->db->get_where('user', array('token' => $this->input->post('tkn'),'verif' => '1'));
			if ($q->num_rows() > 0) {
				if ($this->input->post('password') != $this->input->post('upassword')) {
					$this->session->set_flashdata('Error', 'Mohon maaf password harus sama, silahkan coba lagi!');
				}else{
				$val = $this->db->update('user',array('password' => sha1(md5($this->input->post('password'))),'verif' => '0'), array('token' => $this->input->post('tkn')));
					if ($val == TRUE) {
						$this->session->set_flashdata('sukses', 'Selamat anda berhasil mengubah password anda!');
						redirect('vb/login');
					}else{
						$this->session->set_flashdata('error', 'Mohon Maaf system kami sedang mengalami ganguan!');
					}
				}
			}
		}
		redirect('vb/akes_pw_tk');
	}

	public function konf_pemb()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'svg|gif|jpg|png';
		$config['encrypt_name']        = TRUE;
		$config['remove_spaces']        = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('file'))
		{
			$data = array('error' => $this->upload->display_errors());
		}else{
			$bukti = $this->upload->data();
			$ki = $this->input->post('ki');
			$r = $this->db->get('utama')->row(); 
			$val2 = $this->db->query("SELECT pelanggan.nama FROM invoices,pelanggan WHERE invoices.kode_invoice = '$ki' AND invoices.id_invoice = pelanggan.id_invoice")->row();
			$val = $this->db->update('invoices', array('bukti_pemb' => $bukti['file_name'],'link_stats' => '0','pesan' => $this->input->post('pesan')),array('kode_invoice' => $ki));
			if ($val == TRUE) {
				$this->load->library('My_PHPMailer');
				$mail = new PHPMailer();  
				$mail->IsSMTP(); // we are going to use SMTP
				$mail->isMail();
				$mail->SMTPAuth   = true; // enabled SMTP authentication
				$mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
				$mail->Host       = "mx1.idhostinger.com";      // setting GMail as our SMTP server
				$mail->Port       = 465;                   // SMTP port to connect to GMail
				$mail->Username   = "mail@sofensys.id";  // user email address
				$mail->Password   = "sofensys";            // password in GMail
				$mail->SetFrom('mail@sofensys.id', 'Billing Tokokorek');  //Who is sending the email
				$mail->Subject    = 'Konfirmasi Pembayaran : '.$val2->nama;
				$mail->Body      = '<p>Hai Admin, ada pelanggan yang sudah melakukan konfirmasi pembayaran dengan : </p> <p> Nama : <b>'.$val2->nama.'</b> dan kode invoice: <b>'.$ki.'</b> Silahkan cek halaman dashboard website anda '.anchor('vp/invoices/invoices_sukses', 'disini !');
				$mail->isHTML(true);
				$mail->AddAddress($r->email);
				if(!$mail->Send()) {
					echo  "Error: ".$mail->ErrorInfo;
				}else{
				$this->session->set_flashdata('sukses', 'Terimakasih, bukti pembayaran anda telah berhasil di kirimkan.');
				}
			}else{
				$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
			}
		}
		redirect(site_url());
	}

	public function getSearch()
	{
		$u = $_GET['search'];
		$u = $this->db->query("SELECT * FROM `produk` WHERE nama_produk LIKE '%$u%'");
		if ($u->num_rows() > 0) {
			$ok = $u->result();
		}else{
			$ok = $u->num_rows();
		}

		return $ok;
	}

	public function testimoni()
	{
		return $this->db->query("SELECT pelanggan.nama,invoices.* FROM `pelanggan`,`invoices` WHERE invoices.feedback != '' and invoices.status = 'sukses' and pelanggan.id_invoice = invoices.id_invoice ORDER BY invoices.id_invoice DESC LIMIT 6")->result();
	}

	// slider
	public function slider()
	{
		$this->db->order_by('id_slider', 'desc');
		return $this->db->get('slider')->result();
	}

	// Produk
	public function produk()
	{
		return $this->db->get('produk')->result();
	}


	public function p_all_kate()
	{
		$this->db->order_by('id_produk', 'desc');
		return $this->db->query("SELECT * FROM `produk` GROUP BY kategori")->result();
	}

	public function produk_hal_depan()
	{
		$this->db->order_by('id_produk', 'desc');
		return $this->db->get('produk',12)->result();
	}

	public function single_produk($l)
	{	
		$query = $this->db->query("SELECT * FROM `produk` WHERE produk.kode_link = '$l'");
		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			redirect('error404');
		}	
	}

	public function kate_produk($l,$num, $offset)
	{
		 $this->db->order_by('id_produk', 'DESC');
		return $this->db->get_where('produk',array('kategori' => $l),$num, $offset)->result();
	}

	public function produk_id($id)
	{
		return $this->db->get_where('produk',array('id_produk' => $id))->row();
	}

	public function prodprom($id)
	{
		return $this->db->query("SELECT produk.*,promo.id_promo,promo.kode_promo,promo.potongan FROM `produk`,`promo` WHERE produk.id_produk = '$id' and produk.id_promo = promo.id_promo");
	}

	// Pemesanan
	public function inpemesanan()
	{
		// Invoices
		$due_date = date('Y-m-d', strtotime('+3 days'));
		$invoices = $this->db->insert('invoices',array('date' => date('Y-m-d'),'due_date' => $due_date,'status' => 'tunggu'));
		$id = $this->db->insert_id();
		if ($invoices == true) {
			$r = $this->db->get('utama')->row();  
			foreach ($this->cart->contents() as $i) {
				if ($i['warna'] == '') {
					$warna = 'Sesuai Deskripsi';
				}else{
					$warna = $i['warna'];
				}
				$detail = $this->db->insert('detail_invoices', array('id_invoice' => $id,'harga' => $i['price'],'id_produk' => $i['id'],'jumlah' => $i['qty'],'warna' => $warna));
			}
				if ($detail == true) {
					$pelanggan = $this->db->insert('pelanggan', array(
						'id_invoice' => $id,'nama'=>$this->input->post('nama'),
						'email'=>$this->input->post('email'),
						'alamat'=>$this->input->post('alamat'),
						'hp'=>$this->input->post('hp'),
						'pesan'=>$this->input->post('pesan'),
						'date_buat'=>date('Y-m-d')));
				} //tutup item detail
					if ($pelanggan == true) {
					// Pelanggan
					$pel = '<b>Toko Korek : Orderan baru dari '.$this->input->post('nama').'</b><div>Nama:'.$this->input->post('nama').'</div><div>Email:'.$this->input->post('email').'</div><div>Alamat: '.$this->input->post('alamat').'</div><div>No.HP: '.$this->input->post('hp').'</div><div>fax: '.$this->input->post('fax').'</div><div>Pesan: '.$this->input->post('pesan').'</div><div>Tanggal: '.date('Y-m-d').'</div>'.'<br>';
					// table
					$t1 = "
					<table border='2' width='100%'>
					<tr>
					<td align='center'>No</td>
					<td align='center'>Nama Produk</td>
					<td align='center'>Qty</td>
					<td align='center'>Harga</td>
					<td align='center'>Warna</td>
					<td align='center'>Sub Total</td>
					</tr>";
					$n=1;
					foreach ($this->cart->contents() as $i) {
					$t2 = '<tr>
					<td>'.$n++.'</td>
					<td>'.anchor('produk/'.$i['name'],$i['name']).'</td>
					<td>'.$i['qty'].'</td>
					<td>Rp.'.$this->cart->format_number($i['price']).'</td>
					<td>'.$warna.'</td>
					<td>.Rp.'.$this->cart->format_number($i['subtotal']).'</td>
					</tr>';
					}
					$t3 = "<tr>
					<td colspan='4' align='center'><strong>Total Order</strong></td>
					<td align='right'><strong >Rp.".$this->cart->format_number($this->cart->total())."</strong></td>
					</tr>
					</table>";
					$bdy = $pel.$t1.$t2.$t3;
			      	$this->load->library('My_PHPMailer');
					$mail = new PHPMailer();
			        $mail->IsSMTP(); // we are going to use SMTP
			        $mail->isMail();
			        $mail->SMTPAuth   = true; // enabled SMTP authentication
			        $mail->SMTPSecure = "ssl";  // prefix for secure protocol to connect to the server
			        $mail->Host       = "mx1.idhostinger.com";      // setting GMail as our SMTP server
			        $mail->Port       = 465;                   // SMTP port to connect to GMail
			        $mail->Username   = "mail@sofensys.id";  // user email address
			        $mail->Password   = "sofensys";            // password in GMail
			        $mail->SetFrom('mail@sofensys.id', 'Billing Tokokorek');  //Who is sending the email
			        $mail->Subject    = 'Toko Korek : orderan baru dari '.$this->input->post('nama');
			        $mail->Body      = $bdy;
			        $mail->isHTML(true);
			        $mail->AddAddress($r->email);

			        if(!$mail->Send()) {
			        	echo  "Error: " . $mail->ErrorInfo.'<br>';
			        	echo "Website ini harus dihosting agar sistem mail berfungsi. <br>";
			        	echo anchor(site_url(), 'Kembali');
			        }
				}
					
		}

	}

	// Gadget
	public function gadget()
	{
		return $this->db->get('gadget')->result();
	}

	public function gad_l()
	{
		return $this->db->get_where('gadget',array('letak' => 'l'))->result();
	}

	public function gad_tp()
	{
		return $this->db->get_where('gadget',array('letak' => 'tp'))->result();
	}

		public function gad_bp()
	{
		return $this->db->get_where('gadget',array('letak' => 'bp'))->result();
	}

	//Promo
	public function promo()
	{
		return $this->db->get('promo')->result();
	}

	public function single_promo($l,$t)
	{
		return $this->db->get_where('promo',array('link' => $l,'token' => $t))->row();	
	}

	// Laman

	public function laman()
	{
		return $this->db->get('laman')->result();
	}

	public function single_laman($b='')
	{
		return $this->db->get_where('laman',array('link' => $b))->result();
	}

	// Feedback

	public function infeedback()
	{
		if (isset($_POST['simpan'])) {
			if ($this->db->get_where('invoices',array('feedback' => '','kode_invoice' => $this->input->post('kode'),'status' => 'sukses'))->num_rows() > 0) {
				$val = $this->db->update('invoices',array('feedback' => $this->input->post('pesan'),'status_feed' => '1'),array('kode_invoice' => $this->input->post('kode')));
				if ($val == TRUE) {
					$this->session->set_flashdata('sukses', 'Terimakasih, feedback anda berhasil dikirimkan.');
				}else{
					$this->session->set_flashdata('error', 'Maaf system kami sedang mengalami gangguan.');
				}
			}else{
				$this->session->set_flashdata('error', 'Maaf anda tidak dapat melakukan feedback karena id atau kode invoice sudah mulakukan feedback terlebih dahulu.');
			}
		}
		redirect(site_url());
	}

}
