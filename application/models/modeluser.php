<?php

class modeluser extends CI_Model
{
    // Registrasi Semua User
    public function registrasi($role_id)
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "email" => htmlspecialchars($this->input->post('email', true)),
            "foto" => 'Default.jpg',
            "password" => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
            "alamat" => htmlspecialchars($this->input->post('alamat', true)),
            "id_kabupaten" => htmlspecialchars($this->input->post('kabupaten', true)),
            "notelp" => htmlspecialchars($this->input->post('notelp', true)),
            "role_id" => $role_id,
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
    }


    // Menu Role
    public function hapusrole($id)
    {
        $this->db->where('id_role', $id);
        $this->db->delete('user_role');
    }

    public function updaterole($id)
    {
        $data = [
            "role" => htmlspecialchars($this->input->post('role', true))
        ];
        $this->db->where('id_role', $id);
        $this->db->update('user_role', $data);
    }

    // Agen
    // Produk
    public function getdatajamuser($limit, $start, $agen_id)
    {
        return $this->db->get_where('produk_jam', array('agen_id' => $agen_id), $limit, $start)->result_array();
    }

    public function hitungdataprodukjamuser($agen_id)
    {
        return $this->db->get_where('produk_jam', ['agen_id' => $agen_id])->num_rows();
    }

    public function tambahprodukjam($gambar, $agen_id)
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "harga" => htmlspecialchars($this->input->post('harga', true)),
            "deskripsi" => htmlspecialchars($this->input->post('deskripsi', true)),
            "gambar" => $gambar,
            "agen_id" => $agen_id
        ];
        $this->db->insert('produk_jam', $data);
    }

    public function hapusproduk($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('produk_jam');
    }

    // Pesanan
    // Hitung Pesanan
    public function getdatapesanan($agen_id)
    {
        $data = [
            "agen_id" => $agen_id,
            "status" => 'Selesai'
        ];
        return $this->db->get_where('pesanan', $data)->num_rows();
    }

    //Tampilkan Pesanan
    public function tampilpesanan($limit, $start, $agen_id)
    {
        if (!$start) {
            $start = 0;
        }

        $query = "SELECT `pesanan`.*, `produk_jam`.`nama` as namajam 
                FROM `pesanan` JOIN `produk_jam`
                ON `pesanan`.`barang_id` = `produk_jam`.`id_produk`
                WHERE `pesanan`.`agen_id` = $agen_id AND pesanan.status != 'Selesai' LIMIT  $start, $limit";
        return $this->db->query($query)->result_array();
    }

    public function detailpesanan($id)
    {
        $query = "SELECT `pesanan`.*, `user`.`nama` as namauser, `user`.`notelp` as notelp, `user`.`email` as email, `user`.`alamat` as alamatuser, `kabupaten`.`nama` as kabupaten, `produk_jam`.`nama` as namajam 
                FROM `pesanan` JOIN `user` 
                ON `pesanan`.`user_id` = `user`.`id_user`
                JOIN `kabupaten`
                ON `user`.`id_kabupaten` = `kabupaten`.`id_kab`
                JOIN `produk_jam`
                ON `pesanan`.`barang_id` = `produk_jam`.`id_produk`
                WHERE `pesanan`.`id` = $id";
        return $this->db->query($query)->row_array();
    }

    //Set Status Pesanan
    public function setpesanan($id, $status)
    {

        $data = [
            "status" => $status
        ];
        $this->db->where('id', $id);
        $this->db->update('pesanan', $data);
        //Jika Selesai Tambahkan ke Invoice
        if ($status == 'Selesai') {
            $data['pesanan'] = $this->db->get_where('pesanan', ['id' => $id])->row_array();
            $pesanan_id = $data['pesanan']['id'];
            $agen_id = $data['pesanan']['agen_id'];
            $tgl_pemesanan = $data['pesanan']['tgl_pesanan'];
            $total = $data['pesanan']['harga'];

            $data = [
                "pesanan_id" => $pesanan_id,
                "agen_id" => $agen_id,
                "total_harga" => $total,
                "tgl_pemesanan" => $tgl_pemesanan,
                "tgl_selesai" => date('Y-m-d H:i:s')
            ];

            $this->db->insert('invoice', $data);
        }
    }

    //Hitung Data Invoice
    public function hitunginvoice($agen_id)
    {
        return $this->db->get_where('invoice', array('agen_id' => $agen_id))->num_rows();
    }

    //Tampilkan Data Invoice
    public function getdatainvoice($limit, $start, $agen_id)
    {
        if (!$start) {
            $start = 0;
        }
        $query = "SELECT `invoice`.*,`pesanan`.`qty` as qty, `produk_jam`.`nama` as namajam 
        FROM `invoice` JOIN `pesanan`
        ON `invoice`.`pesanan_id` = `pesanan`.`id`
        JOIN `produk_jam`
        ON `pesanan`.`barang_id` = `produk_jam`.`id_produk`
        WHERE `invoice`.`agen_id` = $agen_id ORDER BY `invoice`.`id` DESC LIMIT  $start, $limit ";
        return $this->db->query($query)->result_array();
    }

    //Detail Invoice
    public function detailinvoice($id)
    {
        $query = "SELECT `invoice`.*, `pesanan`.*, `user`.`nama` as namauser, `user`.`notelp` as notelp, `user`.`email` as email, `user`.`alamat` as alamatuser, `kabupaten`.`nama` as kabupaten, `produk_jam`.`nama` as namajam 
                FROM `invoice` JOIN `pesanan` 
                ON `invoice`.`pesanan_id` = `pesanan`.`id`
                JOIN `user` 
                ON `pesanan`.`user_id` = `user`.`id_user`
                JOIN `kabupaten`
                ON `user`.`id_kabupaten` = `kabupaten`.`id_kab`
                JOIN `produk_jam`
                ON `pesanan`.`barang_id` = `produk_jam`.`id_produk`
                WHERE `invoice`.`id` = $id";
        return $this->db->query($query)->row_array();
    }



    // -------------------------------------------------------------------------------//
    // Customer
    // Home
    public function getdatajam($limit, $start)
    {
        return $this->db->get('produk_jam', $limit, $start)->result_array();
    }

    public function hitungdataprodukjam()
    {
        return $this->db->get('produk_jam')->num_rows();
    }

    public function getdatajamnewest($limit, $start)
    {
        if (!$start)
            $start = 0;
        $query = "SELECT * FROM `produk_jam` ORDER BY `id_produk` DESC LIMIT  $start, $limit";
        return $this->db->query($query)->result_array();
    }

    public function getdatajamprices($limit, $start)
    {
        if (!$start)
            $start = 0;
        $query = "SELECT * FROM `produk_jam` ORDER BY `harga` DESC LIMIT  $start, $limit";
        return $this->db->query($query)->result_array();
    }

    // Detail Produk
    public function detailproduk($id_produk)
    {
        $query = "SELECT `produk_jam`.*, `user`.`nama` as nama_user
                FROM `produk_jam` JOIN `user` 
                ON `produk_jam`.`agen_id` = `user`.`id_user`
                WHERE `produk_jam`.`id_produk` = $id_produk";
        return $this->db->query($query)->row_array();
    }

    // Checkout
    public function checkout($id_user)
    {
        $data = [
            "nama" => htmlspecialchars($this->input->post('nama', true)),
            "alamat" => htmlspecialchars($this->input->post('alamat', true)),
            "id_kabupaten" => htmlspecialchars($this->input->post('kabupaten', true)),
            "notelp" => htmlspecialchars($this->input->post('notelp', true)),
        ];
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        foreach ($this->cart->contents() as $item) {
            $id_produk = $item['id'];
            $data['agen'] = $this->db->get_where('produk_jam', ['id_produk' => $id_produk])->row_array();
            $agen_id = $data['agen']['agen_id'];
            $data = array(
                'barang_id' => $id_produk,
                'qty' => $item['qty'],
                'harga' => $item['price'],
                'user_id' => $id_user,
                'agen_id' => $agen_id,
                'subtotal' => $item['subtotal'],
                'tgl_pesanan' =>  date('Y-m-d H:i:s'),
                "catatan" => htmlspecialchars($this->input->post('catatan', true)),
                'status' => 'Menunggu Konfirmasi'
            );
            $this->db->insert('pesanan', $data);
        }
        return true;
    }

    //Pesanan Customer

    public function pesanancustomer($user_id)
    {
        $query = "SELECT `pesanan`.*, `produk_jam`.`nama` as namajam, `produk_jam`.`id_produk` as idproduk
        FROM `pesanan` JOIN `produk_jam`
        ON `pesanan`.`barang_id` = `produk_jam`.`id_produk`
        WHERE `pesanan`.`user_id` = $user_id ORDER BY `pesanan`.`id` DESC";
        return $this->db->query($query)->result_array();
    }

    // Ambil data saat ingin checkout
    public function getdatauser($user_id)
    {
        $query = "SELECT `user`.`nama` as namauser, `user`.`notelp` as notelp, `user`.`alamat` as alamatuser, `kabupaten`.`nama` as kabupaten, `user`.`id_kabupaten` as id_kab
        FROM `user` 
        JOIN `kabupaten`
        ON `user`.`id_kabupaten` = `kabupaten`.`id_kab`
        WHERE `user`.`id_user` = $user_id";
        return $this->db->query($query)->row_array();
    }

    public function getdatakab($user_id)
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $user_id])->row_array();
        $idkab = $data['user']['id_kabupaten'];
        $query =  "SELECT * FROM `kabupaten`
                   WHERE `kabupaten`.`id_kab` != $idkab";
        return $this->db->query($query)->result_array();
    }
}
