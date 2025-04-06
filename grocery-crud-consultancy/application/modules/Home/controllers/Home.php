<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller{
	function __construct(){
		parent::__construct();
    }

    function index(){
        $data['slider'] = $this->db->get('slider_master')->result();
        // $data['association'] = $this->db->get('tbl_association')->result();
        $data['testimonial'] = $this->db->get('impact')->result();


        // $data['team'] = $this->db->get_where('tbl_team',array('show_in_home'=>"Yes"))->result();
        // $data['notice'] = $this->db->get('tbl_notice')->result();
        $data['service'] = $this->db->get('our_services')->result();
        $data['articles'] = $this->db->get('tbl_articles')->result();
        $this->load->view('index',$data);
    }

    function fixedDepositProcess(){
        $output = array(
			'response' => false,
			'msg' => "Something went wrong. Please try again",
			'result' => "",
		);

		try {

			$this->load->library('form_validation');
			$this->form_validation->set_rules('fd_amount','Fixed Deposit Amount','required|numeric|greater_than[0]');
			$this->form_validation->set_rules('time','Time Period','required');

			if($this->form_validation->run($this) == false){
				$output = array(
					'result' => $this->form_validation->error_array(),
				);

				throw new Exception(validation_errors());
			}
			else{

			    $process = array(
			        'fd_amount' => $this->input->post('fd_amount'),
			        'time' => $this->input->post('time'),
			        'created_date' => date('Y-m-d H:i:s'),
			    );

			    $this->db->insert('fd_request', $process);

			    $output = array(
        			'response' => TRUE,
        			'msg' => "Thank you for your interest. Our Customer Service representative will contact you shortly.",
        			'result' => "",
        		);
			}
		} catch (Exception $e) {
			$output['msg'] = $e->getMessage();
			$output['response'] = FALSE;
		}

		print(json_encode($output));
		exit();
    }

    function loanProcess(){
        $output = array(
			'response' => false,
			'msg' => "Something went wrong. Please try again",
			'result' => "",
		);

		try {

			$this->load->library('form_validation');
			$this->form_validation->set_rules('loan_amount','Loan Amount','required|numeric|greater_than[0]');
			$this->form_validation->set_rules('time','Time Period','required');
			$this->form_validation->set_rules('purpose','Purpose','required');

			if($this->form_validation->run($this) == false){
				$output = array(
					'result' => $this->form_validation->error_array(),
				);

				throw new Exception(validation_errors());
			}
			else{

			    $process = array(
			        'loan_amount' => $this->input->post('loan_amount'),
			        'time' => $this->input->post('time'),
			        'purpose' => $this->input->post('purpose'),
			        'created_date' => date('Y-m-d H:i:s'),
			    );

			    $this->db->insert('loan_process_request', $process);

			    $output = array(
        			'response' => TRUE,
        			'msg' => "Loan Processing Request Form Submitted Successfully",
        			'result' => "",
        		);
			}
		} catch (Exception $e) {
			$output['msg'] = $e->getMessage();
			$output['response'] = FALSE;
		}

		print(json_encode($output));
		exit();
    }

    function calculateFixedDeposit(){
		$output = array(
			'response' => false,
			'msg' => "Something went wrong. Please try again",
			'result' => "",
		);

		try {

			$this->load->library('form_validation');
			$this->form_validation->set_rules('p','Principal Amount','required|numeric');
			$this->form_validation->set_rules('t','Time Period','required|numeric');
			$this->form_validation->set_rules('r','Rate Amount','required|numeric');
			$this->form_validation->set_rules('type','Type','required');
			$this->form_validation->set_rules('frequency','Frequency','required');

			if($this->form_validation->run($this) == false){
				$output = array(
					'result' => $this->form_validation->error_array(),
				);

				throw new Exception('Form Validation Error');
			}
			else{
				$temp = 0.0;

				if ('days'==$this->input->post('type')) {
					$time = $this->input->post('t')/365;
				}
				elseif ('months'==$this->input->post('type')) {
					$time = $this->input->post('t')/12;
				}
				elseif ('years'==$this->input->post('type')) {
					$time = $this->input->post('t');
				}

				$rate = $this->input->post('r') / 100;

				$temp=(1+$rate/$this->input->post('frequency'));
				$amount = $this->input->post('p')*pow($temp,($this->input->post('frequency')*$time));

				$interest = $amount - $this->input->post('p');

				$output = array(
					'result' => array(
						'interest' => number_format(round($interest, 2), 2),
						'amount' => number_format(round($amount, 2), 2),
					),
					'response' => TRUE,
					'msg' => "",
				);
			}
		} catch (Exception $e) {
			$output['msg'] = $e->getMessage();
			$output['response'] = FALSE;
		}

		print(json_encode($output));
		exit();
	}

    function about(){
        $data['team'] = $this->db->get_where('tbl_team',array('show_in_home'=>"Yes"))->result();
        $data['service'] = $this->db->get('tbl_service')->result();
        $this->load->view('aboutus',$data);
    }

    function team(){
        $data['team'] = $this->db->get('tbl_team')->result();
        $this->load->view('team',$data);
    }


    function emiCalculator(){
        $this->load->view('emi_calculator');
    }

    function emiProcess(){
        $this->load->view('emiProcess');
    }

   function fdCalculator()
  {
    $this->load->view('fd_cal');
  }

  function fdprocess()
  {
    $this->load->view('fdProcess');
  }

  function savingType()
  {
    $data['saving_type'] = $this->db->get('tbl_account_plan')->result();
    $data['service'] = $this->db->get('tbl_service')->result();

    $this->load->view('account_type',$data);

  }

  function service()
  {
    $data['service'] = $this->db->get('tbl_service')->result();
    $this->load->view('service',$data);
  }

  function serviceSingle()
  {
    $title = str_replace('-',' ',$this->uri->segment(2));
    $data['service'] = $this->db->get_where('tbl_service',array('title'=>$title))->row();
    $data['services'] = $this->db->get('tbl_service')->result();
    $this->load->view('service_single',$data);
  }

  function branches()
  {
    $data['branches'] = $this->db->get('tbl_branches')->result();
    $this->load->view('branches',$data);
  }

  function news()
  {
    $data['news'] = $this->db->get('tbl_news')->result();
    $this->load->view('news',$data);
  }

   function newsSingle()
  {
    $title = str_replace('-',' ',$this->uri->segment(2));
    $data['news'] = $this->db->get_where('tbl_news',array('title'=>$title))->row();
    $data['services'] = $this->db->get('tbl_service')->result();
    $this->load->view('news_single',$data);
  }


  function publication(){
    $data['title'] = str_replace('-', ' ',$this->uri->segment(2));
    $publication_id = $this->db->get_where('tbl_publication_cat',array('category'=>$data['title']))->row()->id;
    $data['list'] = $this->db->get_where('tbl_publication',array('category'=>$publication_id))->result();

    $data['banner']=$this->db->get_where('tbl_banner',array('id'=>1))->row()->publicaiton_banner;
    $this->load->view('publication_list',$data);
  }

  function publicationDesc(){
    $data['title'] = str_replace('-', ' ',$this->uri->segment(2));
    $data['details'] = $this->db->get_where('tbl_publication',array('title'=>$data['title']))->row();
    $this->load->view('publication',$data);
  }


  function newsDesc(){
    $data['title'] = str_replace('-', ' ', $this->uri->segment(2));
    $data['details'] = $this->db->get_where('tbl_news',array('title'=>$data['title']))->row();
    $this->load->view('news',$data);
  }

  function notice(){
    $data['list'] = $this->db->get('tbl_notice')->result();
    $data['news'] = $this->db->get('tbl_news',0,3)->result();
    $data['banner']=$this->db->get_where('tbl_banner',array('id'=>1))->row()->notice_banner;

    $this->load->view('notice_list',$data);
  }

  function noticeDesc(){
    $data['title'] = str_replace('-', ' ', $this->uri->segment(2));
    $data['details'] = $this->db->get_where('tbl_notice',array('title'=>$data['title']))->row();
    $this->load->view('notice',$data);
  }


  function aboutList(){
    $data['title'] = str_replace('-', ' ',$this->uri->segment(2));
    $data['details'] = $this->db->get_where('tbl_about_list',array('title'=>$data['title']))->row();
    $this->load->view('about_list',$data);
  }


  function partners()
  {
    $data['partner_cat'] = $this->db->get('tbl_partner_cat')->result();
    $this->load->view('partners',$data);
  }


  function contact(){
    $data['contact_us_banner']=$this->db->get_where('tbl_banner',array('id'=>1))->row()->contact_us_banner;
    $this->load->view('contact',$data);
  }


  function formContact()
  {
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['msg_subject'] = $_POST['msg_subject'];
    $data['message'] = $_POST['message'];
    $data['phone_number'] = $_POST['phone_number'];
    $this->db->insert('tbl_contact_form',$data);
    $this->session->set_flashdata('successful', 'Thank you '. $data['name'].' for your query!');
    redirect("contactus");
  }

  function gallery()
  {
    $data['gallery'] = $this->db->get('tbl_gallery')->result();
    $this->load->view('gallery',$data);
  }


  function reports(){

    $data['recent_news'] = $this->db->order_by('date', 'DESC')->get('tbl_news',4,0)->result();
    $data['appeal'] =$this->db->select('title')->order_by('id', 'DESC')->get('tbl_success_story')->result();

    $data['reports'] = $this->db->get('tbl_report')->result();


    $this->load->view('reports',$data);
  }




}


?>
