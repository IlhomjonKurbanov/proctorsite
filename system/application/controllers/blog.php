<?php

class Blog extends MY_Controller {

	 function __construct()
    {
        parent::__construct();
		$this->logged_in();
	}
	
	function index()
	{
		redirect('blog/item');
	}
	function logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		$role = $this->session->userdata('role');
		if($is_logged_in!=NULL && $role ==1)
			{
			$globaldata['edit'] = "yes";
			$globaldata['create_news'] = site_url("admin/create_news");
			$this->load->vars($globaldata);
	        }
			
	}
	function item()
	{
		
		if(($this->uri->segment(3))==NULL)
			{
				$id = "news";
			}
		else
			{
				$id = $this->uri->segment(3);
			}
			
		
		$data['menu'] =	$this->content_model->get_menus();
		$data['slideshow'] = "slideshow/main_slideshow2";
		$data['news'] = $this->news_model->list_news();
		
		$data['widecolumn'] = 'global/mainbuttons';
		
		$data['widecolumntop'] = 'sidebar/testimonials';
		
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');	
			
		$data['content'] =	$this->content_model->get_content($id);
	
		$data['main'] = "pages/news";
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
		
		
			
         $data['title'] = 'Proctor Consulting Blog';
		              
			
		$data['info'] = "infoblock/times";
		$this->load->vars($data);
		$this->load->view('template');
	}
function post($post)
	{
		
		$id = 'news';
		$data['menu'] =	$this->content_model->get_menus();
		$data['slideshow'] = "slideshow/main_slideshow2";
		$data['news'] = $this->news_model->get_news($post);
		$data['sidebar'] = 'sidebar/links';
		$data['rightcolumn'] = 'sidebar/channel_partner_program';
		$data['page'] = $id;
		$is_logged_in = $this->session->userdata('is_logged_in');	
			
		$data['content'] =	$this->content_model->get_content($id);
	
		$data['main'] = "pages/newsitem";
		
		$is_logged_in = $this->session->userdata('is_logged_in');
		
			//display widecolumn module - this should eventually be controlled by some table or something
		$data['widecolumn'] = 'sidebar/benefits_of_leasedesk';
		
		
			
         $data['title'] = 'Proctor Consulting Blog';
		              
			
		$data['info'] = "infoblock/times";
		$this->load->vars($data);
		$this->load->view('template');
	}
	
}

/* End of file news.php */
/* Location: ./system/application/controllers/news.php */