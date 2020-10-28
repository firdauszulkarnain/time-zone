<?php

class modelmenu extends CI_Model
{
    public function hapusmenu($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('user_menu');
    }

    public function updatemenu($id)
    {
        $data = [
            "menu" => htmlspecialchars($this->input->post('menu', true))
        ];
        $this->db->where('id_menu', $id);
        $this->db->update('user_menu', $data);
    }

    public function hitungdata()
    {
        return $this->db->get('user_menu')->num_rows();
    }

    public function getdatamenu($limit, $start)
    {
        return $this->db->get('user_menu', $limit, $start)->result_array();
    }


    // Sub Menu
    public function getdatasubmenu($limit, $start)
    {
        if (!$start)
            $start = 0;

        $tes = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu`
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id_menu` LIMIT  $start, $limit";
        return $this->db->query($tes)->result_array();
    }

    // Hitung Data Sub Menu
    public function hitungdatasubmenu()
    {
        return $this->db->get('user_sub_menu')->num_rows();
    }

    public function getdataupdatesubmenu($id)
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                FROM `user_sub_menu` JOIN `user_menu` 
                ON `user_sub_menu`.`menu_id` = `user_menu`.`id_menu`
                WHERE `user_sub_menu`.`id` = $id";
        return $this->db->query($query)->row_array();
    }


    public function tambahsubmenu()
    {
        $data = [
            "menu_id" => htmlspecialchars($this->input->post('menu_id', true)),
            "title" => htmlspecialchars($this->input->post('title', true)),
            "url" => htmlspecialchars($this->input->post('url', true)),
            "icon" => htmlspecialchars($this->input->post('icon', true)),
            "is_active" => htmlspecialchars($this->input->post('is_active', true))
        ];
        $this->db->insert('user_sub_menu', $data);
    }

    public function hapussubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }

    public function updatesubmenu($id)
    {
        $data = [
            "menu_id" => htmlspecialchars($this->input->post('menu_id', true)),
            "title" => htmlspecialchars($this->input->post('title', true)),
            "url" => htmlspecialchars($this->input->post('url', true)),
            "icon" => htmlspecialchars($this->input->post('icon', true)),
            "is_active" => htmlspecialchars($this->input->post('is_active', true))
        ];
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
    }
}
