<?php

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelBuku', 'ModelUser', 'ModelBooking']);
    }
    
    public function index() {
        $data = [
            'judul' => "Katalog Buku",
            'buku' => $this->ModelBuku->getBuku()->result()
        ];

        // jika sudah login dan jika belum login
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

            $data['user'] = $user['nama'];

            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer', $data);
        } else {
            $data['user'] = 'Pengunjung';

            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('buku/daftarbuku', $data);
            $this->load->view('templates/templates-user/modal');
            $this->load->view('templates/templates-user/footer', $data);
        }
    }

    // View Detail Buku 
    function detailBuku() {
        $id = $this->uri->segment(3);
        $kategori = $this->ModelBuku->joinKategoriBuku(['buku.id' => $id])->result();
        $buku = $this->ModelBuku->bukuWhere(['id' => $id])->result();
        // var_dump($buku);die();

        $data['title'] = "Detail Buku";

        // cek login 
        if(!empty($this->session->userdata("email"))){
            $data['user'] = $this->session->userdata("nama");
        } else {
            $data['user'] = "Pengunjung";
        }

        // Mengambil kategori buku
        foreach ($kategori as $fields) {
            $data['kategori'] = $fields->kategori;
        }

        // Mengambil detail data buku
        foreach ($buku as $fields) {
            $data['judul'] = $fields->judul_buku;
            $data['pengarang'] = $fields->pengarang;
            $data['penerbit'] = $fields->penerbit;
            $data['tahun'] = $fields->tahun_terbit;
            $data['isbn'] = $fields->isbn;
            $data['gambar'] = $fields->image;
            $data['dipinjam'] = $fields->dipinjam;
            $data['dibooking'] = $fields->dibooking;
            $data['stok'] = $fields->stok;
            $data['id'] = $id;
        }
        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('buku/detail-buku', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }
}

?>