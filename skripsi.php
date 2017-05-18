<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skripsi extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('Datalatihmodel');

    }
    var $template = 'template';
    function cek_session(){
        if(!$this->session->userdata('login')){
            header('location:'.base_url().'index.php/webadmin/login');
            exit(0);
        }
    }
    function test() {
        $this->load->view('skripsi/test');
    }
    function index($offset = 0)
    {

        $data_setting = $this->blog_model->GetSetting()->result_array();
        $random_code = "./assets/topsites1.html";
        $data = array(
            'links' => $this->pagination->create_links(),
            'recent_post' => $this->blog_model->GetContent("where status = 'publish' order by rand() limit 5")->result_array(),
            'label' => $this->blog_model->GetLabel()->result_array(),
            'content' => $this->blog_model->GetContentBlog("where content.status = 'publish' group by content.kode_content order by content.kode_content desc limit $offset," . $data_setting[0]['limit_content'])->result_array(),
            'deskripsi' => $data_setting[0]['deskripsi_blog'],
            'author' => 'Siwi Rahmat Januar (siwirahmatjanuar.com)',
            'title' => $data_setting[0]['judul_blog'],
            'facebook' => $data_setting[0]['facebook'],
            'fb_fans_page' => $data_setting[0]['facebook_fans_page'],
            'twitter' => $data_setting[0]['twitter'],
            'g_plus' => $data_setting[0]['g_plus'],
            'email' => $data_setting[0]['email'],
            'pecah' => file_get_contents($random_code)
        );
        $string = $data['pecah'];


        if (preg_match_all("|<a.*(?=href=\"([^\"]*)\")[^>]*>([^<]*)</a>|i", $string, $matches)) {
            $data['matches'] = $matches;
            $matches = $matches[1];
            $data['metadata'] = $this->Datalatihmodel->tampilkan_metadata($random_code);
            $check = $data['metadata'];
            $this->blog_model->check_datalatih($check, $random_code);
            $this->blog_model->check_datalatih_mentah($check, $random_code);
            $this->blog_model->tampilkan_frequency($check, $random_code);
            $this->blog_model->check_url($matches, $random_code);

            $data['metadata'] = $this->Datalatihmodel->tampilkan_metadata($random_code);
            $data['data_latih'] = $this->Datalatihmodel->tampilkan_sebagian($limit = 10);
            $data['hasil1'] = $this->Datalatihmodel->tampilkan_semua($random_code);
            $data['hasil2'] = $this->Datalatihmodel->tampilkan_test($random_code);
            $data['hasil3'] = $this->Datalatihmodel->tampilkan_frequensi($random_code);
            $data['hasil4'] = $this->Datalatihmodel->tampilkan_testing($random_code);

            $data['content'] = 'skripsi/index';
            $this->load->view($this->template, $data);
        }
    }
    function proses_cari_url(){
        $data=$this->blog_model->load_url();
        foreach($data as $link){
           /* echo $link['link'];*/

            $link = $link['link'];
            $tags = @get_meta_tags($link);
            if (@array_key_exists("description", $tags)) {
                $metadata=$tags["description"];
                $this->blog_model->check_metadata($metadata,$link);
                /*print($tags["description"]."<br>");*/

            }
 /*           $tags = @get_meta_tags($link["link"]);
            echo $link["link"]. "|";
            $ql = $this->db->select('metadata')->from('link_check')->where('link', $link["link"])->get();
            if ($ql->metadata = null) {
            echo "sudah Tersedia Di database". "<br>";
            } else {
                if (@array_key_exists("description", $tags)) {
                    $metadata = $tags["description"];
                    $a = array(
                        'metadata' => $metadata,
                        'status' => "1"
                    );
                    $this->blog_model->save_metadata($link["link"],$a);
                echo $tags["description"];
                }
                $this->blog_model->save_metadata($tags,$link["link"]);

                echo "belum ada di database dan sedang dalam proses penambahan". "<br>";
            }*/
        }
       /* $this->blog_model->check_metadata();
        echo "sukses";*/
    }
    function update_kbbi(){

        $kamus=0;
        for ($i=0; $i <107; $i++)
        {
        $random_code = "http://kbbi.co.id/daftar-kata?page=$i";
        $baca = file_get_contents($random_code);
        /*<a href="http://kbbi.co.id/arti-kata/abece">Abece</a>*/
        /*http://kbbi.co.id/arti-kata/-abece*/
        if(preg_match_all('/arti-kata[^"](.*?)"/', $baca, $matches))
        {
            /*echo 'Pencarian Ditemukan Dari html squid anda : <br>';
            $matches = $matches[1];
            $list = array();
            *//*foreach($matches as $var)
            {
                print($var."<br>");
            }*/
            $matches = $matches[1];
            $this->blog_model->check_kamus_indonesia($matches, $random_code,$kamus);
        }
        else
        {
            echo 'Pencarian Tidak Ditemukan';
        }
        }
       /* echo "".htmlentities($baca)."";*/

    }

    function update_kamus_inggris()
    {
        $kamus=1;
        for ($i = 1; $i < 4; $i++) {
            $random_code = "http://www.oxfordlearnersdictionaries.com/wordlist/english/oxford3000/Oxford3000_U-Z/?page=$i";
            $baca = file_get_contents($random_code);
            /*<a href="http://kbbi.co.id/arti-kata/abece">Abece</a>*/
            /*http://kbbi.co.id/arti-kata/-abece*/

            if(preg_match_all('/english[^"](.*?)"/', $baca, $matches))
            {
                /*echo 'Pencarian Ditemukan Dari html squid anda : <br>';*/
                $matches = $matches[1];

                foreach($matches as $var1)
                {
                    $mentah=str_replace([' ','!','@','#','$','%','&','(',')','_','=','+',';',':', '\\', '/', '*','-',',', '|' ,'.','*','1','2','3','4','5','6','7','8','9','0']," ",$var1);
                    $list = array($mentah);
                    /*var_dump($list);*/
                   $this->blog_model->check_kamus_inggris($var1,$list, $random_code,$kamus);

                }
            }
            else
            {
                echo 'Pencarian Tidak Ditemukan';
            }
            /* $arr_kalimat = explode (" ",$baca);

             foreach ($arr_kalimat as $var){
                 echo $var."<br>";

             }*/


/*            echo "" . htmlentities($baca) . "";*/

        }
    }

    function testdoc(){
        $this->load->view('skripsi/doc');
    }

    private function countervisitor()
    {
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }

        $data_visitor = $this->blog_model->GetVisitor("where ip = '" . $_SERVER['REMOTE_ADDR'] . "'")->result_array();
        if ($data_visitor == NULL) {
            $data = array(
                'ip' => $_SERVER['REMOTE_ADDR'],
                'os' => $this->agent->platform(),
                'browser' => $agent,
                'tanggal' => date("Y-m-d H:i:s")
            );
            $this->blog_model->InsertData('visitor', $data);
            $this->session->set_userdata('calonpresident_blogspot_com', "Ahmad Rizal Afani");
            setcookie("calonpresident_blogspot_com", 'Ahmad Rizal Afani', time() + 3600 * 24);
        } else {
            if (!isset($_COOKIE['calonpresident_blogspot_com'])) {
                $data_visitor = $this->blog_model->GetVisitor("where ip = '" . $_SERVER['REMOTE_ADDR'] . "' and tanggal = '" . date("Y-m-d H:i:s") . "'");
                if ($data_visitor != NULL) {
                    if (!$this->session->userdata('calonpresident.blogspot.com')) {
                        $data = array(
                            'ip' => $_SERVER['REMOTE_ADDR'],
                            'os' => $this->agent->platform(),
                            'browser' => $agent,
                            'tanggal' => date("Y-m-d H:i:s")
                        );
                        $this->blog_model->InsertData('visitor', $data);
                        $this->session->set_userdata('calonpresident_blogspot_com', "Ahmad Rizal Afani");
                        setcookie("calonpresident_blogspot_com", 'Ahmad Rizal Afani', time() + 3600 * 24);
                    } else {
                        setcookie("calonpresident_blogspot_com", 'Ahmad Rizal Afani', time() + 3600 * 24);
                    }
                } else {
                    $data = array(
                        'ip' => $_SERVER['REMOTE_ADDR'],
                        'os' => $this->agent->platform(),
                        'browser' => $agent,
                        'tanggal' => date("Y-m-d H:i:s")
                    );
                    $this->blog_model->InsertData('visitor', $data);
                    $this->session->set_userdata('calonpresident_blogspot_com', "Ahmad Rizal Afani");
                    setcookie("calonpresident_blogspot_com", 'Ahmad Rizal Afani', time() + 3600 * 24);
                }
            }
        }
    }
    function list_data_latih($mess = -1){
        $this->cek_session();
        $data = array(
            'session' => $this->session->userdata('login'),
            'content' => $this->blog_model->GetContent('order by kode_content desc')->result_array(),
            'message' => $mess,
            'title' => 'Dasboard admin calonpresident.blogspot.com - semua content'
        );
        $this->load->view('webadmin/post',$data);
    }
}