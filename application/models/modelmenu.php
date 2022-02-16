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

    public function getdatamenu()
    {
        return $this->db->get('user_menu')->result_array();
    }


    // Sub Menu
    public function getdatasubmenu()
    {

        $this->db->join('user_menu um', 'um.id_menu = usm.menu_id');
        return $this->db->get('user_sub_menu usm')->result_array();

        // $tes = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
        //         FROM `user_sub_menu` JOIN `user_menu`
        //         ON `user_sub_menu`.`menu_id` = `user_menu`.`id_menu`";
        // return $this->db->query($tes)->result_array();
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
