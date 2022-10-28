<?php


class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    // Region Buku
    public function index()
    {
        $data['nis'] = 'Data Siswa';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->ModelSiswa->getSiswa()->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules(
            'nis',
            'NIS',
            'required|min_length[3]|numeric',
            [
                'required' => 'NIS harus diisi',
                'min_length' => 'NIS terlalu pendek',
                'numeric' => 'Hanya boleh diisi angka'
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama Siswa',
            'required|min_length[3]',
            [
                'required' => 'Nama Siswa harus diisi',
                'min_length' => 'Nama Siswa terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'kelas',
            'Kelas',
            'required|min_length[3]',
            [
                'required' => 'Kelas harus diisi',
                'min_length' => 'Kelas terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|min_length[3]',
            [
                'required' => 'Tahun terbit harus diisi',
                'min_length' => 'Tahun terbit terlalu pendek',
            ]
        );
        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|min_length[3]',
            [
                'required' => 'Tempat lahir harus diisi',
                'min_length' => 'Tempat lahir terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[3]',
            [
                'required' => 'Alamat harus diisi',
                'min_length' => 'Alamat terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'gender',
            'Jenis Kelamin',
            'required',
            [
                'required' => 'Jenis Kelamin harus diisi'
            ]
        );
        $data = [
            'nis' => $this->input->post('nis', true),
            'nama' => $this->input->post('nama', true),
            'kelas' => $this->input->post('kelas', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'gender' => $this->input->post('gender', true),
            'agama' => $this->input->post('agama', true),

        ];
        $this->ModelBuku->simpanBuku($data);
        redirect('buku');
    }

    public function ubahSiswa()
    {
        $data['nis'] = 'Ubah Data Siswa';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->ModelSiswa->siswaWhere(['id_siswa' => $this->uri->segment(3)])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/ubah_siswa', $data);
        $this->load->view('templates/footer');


        $this->form_validation->set_rules(
            'nis',
            'NIS',
            'required|min_length[3]|numeric',
            [
                'required' => 'NIS harus diisi',
                'min_length' => 'NIS terlalu pendek',
                'numeric' => 'Hanya boleh diisi angka'
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama Siswa',
            'required|min_length[3]',
            [
                'required' => 'Nama Siswa harus diisi',
                'min_length' => 'Nama Siswa terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'kelas',
            'Kelas',
            'required|min_length[3]',
            [
                'required' => 'Kelas harus diisi',
                'min_length' => 'Kelas terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required|min_length[3]',
            [
                'required' => 'Tahun terbit harus diisi',
                'min_length' => 'Tahun terbit terlalu pendek',
            ]
        );
        $this->form_validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required|min_length[3]',
            [
                'required' => 'Tempat lahir harus diisi',
                'min_length' => 'Tempat lahir terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required|min_length[3]',
            [
                'required' => 'Alamat harus diisi',
                'min_length' => 'Alamat terlalu pendek'
            ]
        );
        $this->form_validation->set_rules(
            'gender',
            'Jenis Kelamin',
            'required',
            [
                'required' => 'Jenis Kelamin harus diisi'
            ]
        );

        $data = [
            'nis' => $this->input->post('nis', true),
            'nama' => $this->input->post('nama', true),
            'kelas' => $this->input->post('kelas', true),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
            'tempat_lahir' => $this->input->post('tempat_lahir', true),
            'alamat' => $this->input->post('alamat', true),
            'gender' => $this->input->post('gender', true),
            'agama' => $this->input->post('agama', true),

        ];
        $this->ModelBuku->updateBuku($data, ['id' => $this->input->post('id')]);
        redirect('buku');
    }

    public function hapusSiswa()
    {
        $where = ['id_siswa' => $this->uri->segment(3)];
        $this->ModelSiswa->hapusSiswa($where);
        redirect('siswa');
    }
}
