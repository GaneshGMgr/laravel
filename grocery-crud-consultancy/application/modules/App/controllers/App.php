<?php defined('BASEPATH') or exit('No direct script access allowed');

class App extends OAS_Controller
{
    public $data = array();

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->data['main_title'] = "Dashboard Page";
        $this->data['title_small'] = "";
        $this->data['inner_template'] = 'Dashboard/DashboardViewPage';
        $this->load->view('Common/common', $this->data);
    }

    function _example_output($output, $data)
    {
        $final_output['data'] = $data;
        $final_output['output'] = (array)$output;
        $this->load->view('Common/common', $final_output);
    }

    function userManagement()
    {
        $data['main_title'] = "User";
        $data['title_small'] = "Management";
        $crud = new grocery_CRUD();

        $crud->set_table('user_auth');

        $crud->columns(['full_name', 'email', 'is_active', 'is_locked_flag']);

        $crud->required_fields('full_name', 'email', 'pass', 'is_active', 'is_locked_flag');
        $crud->callback_before_insert(array($this, 'encrypt_password_callback'));
        $crud->callback_before_update(array($this, 'encrypt_password_callback'));

        $crud->display_as('pass', 'Password');
        $crud->display_as('is_active', 'IS Active ?');
        $crud->display_as('is_locked_flag', 'Status');

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function encrypt_password_callback($post_array)
    {
        $post_array['pass'] = md5($post_array['pass']);
        return $post_array;
    }

    function siteSetting()
    {
        if ($this->uri->segment(3) == "upload" || $this->uri->segment(4) == "upload") {
            $this->upload();
        } else {

            $data['main_title'] = "Site Management";
            $data['title_small'] = "";

            $crud = new grocery_CRUD();

            $crud->set_table('site_setting');
            $crud->set_field_upload('site_logo', 'uploads/site');
            $crud->set_field_upload('fav_icon', 'uploads/site');
            $crud->set_field_upload('footer_logo', 'uploads/site');
            $crud->set_field_upload('menu', 'uploads/site');

            $crud->unset_back_to_list();

            $crud->set_rules('email_address', 'Email Address', 'valid_email');
            $crud->set_rules('phone_number', 'Contact Number', 'numeric|exact_length[10]');
            $crud->required_fields('site_name', 'site_logo', 'fav_icon ','footer_logo','footer_description', 'mobile', 'email_address', 'address', 'map', 'facebook_url', 'office_time');

            $crud->display_as('address', 'Address');

            $output = $crud->render();
            $this->_example_output($output, $data);
        }
    }

    
    function emailConfig()
    {
        $data['main_title'] = "Email Configuration Management";
        $data['title_small'] = "";

        $crud = new grocery_CRUD();
        $crud->set_table('email_config_setting');

        $crud->set_rules('email_from', 'Mail From', 'valid_email');
        $crud->set_rules('username', 'Username', 'valid_email');

        $crud->unset_back_to_list();
        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function slider()
    {
        if ($this->uri->segment(3) == "upload" || $this->uri->segment(4) == "upload") {
            $this->upload();
        } else {
            $data['main_title'] = "Video Slider Management";
            $data['title_small'] = "Video Slider List";

            $crud = new grocery_CRUD();
            $crud->set_table('slider');
            $crud->set_field_upload('video', 'uploads/slider');

            $crud->columns(['title','slider_image','is_active']);
            $crud->required_fields('title','sub_title','slider_image','is_active');

            $output = $crud->render();
            $this->_example_output($output, $data);
        }
    }
    function sliderFeature()
    {
        if ($this->uri->segment(3) == "upload" || $this->uri->segment(4) == "upload") {
            $this->upload();
        } else {
            $data['main_title'] = "Slider Feature Management";
            $data['title_small'] = "Slider Feature List";

            $crud = new grocery_CRUD();
            $crud->set_table('slider_feature');

            $crud->columns(['title','sub_title','is_active']);
            $crud->required_fields('title','sub_title','is_active');

            $output = $crud->render();
            $this->_example_output($output, $data);
        }
    }

    function aboutUs()
    {
        if ($this->uri->segment(3) == "upload" || $this->uri->segment(4) == "upload") {
            $this->upload();
        } else {
            $data['main_title'] = "About Us Management";
            $data['title_small'] = "";
            $crud = new grocery_CRUD();

            $crud->set_table('about_us_master');

            $crud->set_field_upload('featured_image', 'uploads/about');

            $crud->columns(['title', 'description', 'featured_image','slug', 'is_active']);
            $crud->required_fields(['title','is_active','slug']);

            $output = $crud->render();
            $this->_example_output($output, $data);
        }
    }

    function blogCategory()
    {
        $data['main_title'] = "Blog Category Management";
        $data['title_small'] = "";

        $crud = new grocery_CRUD();
        $crud->set_table('blog_category');

        $crud->columns(['category', 'is_active']);
        $crud->required_fields('category','is_active');

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function blog()
    {
        $data['main_title'] = "Blogs Management";
        $data['title_small'] = " ";

        $crud = new grocery_CRUD();
        $crud->set_table('blog');
        $crud->set_field_upload('featured_image', 'uploads/blog');

        $crud->columns(['title', 'featured_image','blog_id','is_active']);
        $crud->required_fields(['title', 'featured_image','blog_id', 'is_active']);
        $crud->set_relation('blog_id', 'blog_category', 'category');

        $crud->display_as('featured_image','Image');
        $output = $crud->render();
        $this->_example_output($output, $data);
    }


    function addWhyus($primary_key, $row)
    {
        return base_url('App/whyChoose/') . $row->id;
    }
    function addServices($primary_key, $row)
    {
        return base_url('App/academicsServices/') . $row->id;
    }

    function whyChoose(){
        if($this->uri->segment(3)=="upload" || $this->uri->segment(4)=="upload"){
            $this->upload();
        }
        else{
            $data['main_title'] = "Academics Management";
            $data['title_small'] = " ";

            $crud = new grocery_CRUD();
            $crud->set_table('why_academics');
            $crud->where('academics_id', $this->uri->segment(3));
            $crud->field_type('academics_id', 'hidden',$this->uri->segment(3));

            $crud->set_field_upload('featured_image', 'uploads/academics');

            $crud->columns(['title', 'description', 'featured_image','is_active']);
            $crud->required_fields(['title', 'academics_id','description', 'featured_image','is_active']);

            $output = $crud->render();
            $this->_example_output($output, $data);
        }
    }

    function academicsServices(){
        if($this->uri->segment(3)=="upload" || $this->uri->segment(4)=="upload"){
            $this->upload();
        }
        else{
            $data['main_title'] = "Academics Services Management";
            $data['title_small'] = " ";

            $crud = new grocery_CRUD();
            $crud->set_table('services_academics');
            $crud->where('academics_id', $this->uri->segment(3));
            $crud->field_type('academics_id', 'hidden',$this->uri->segment(3));

            $crud->columns(['title', 'description', 'is_active']);
            $crud->required_fields(['title', 'academics_id','description', 'is_active']);

            $output = $crud->render();
            $this->_example_output($output, $data);
        }
    }
    

    function upload()
    {
        $CKEditor = $_GET['CKEditor'];
        $funcNum = $_GET['CKEditorFuncNum'];
        $url_image = FCPATH . 'uploads/media/';

        $allowed_extension = array(
            "png", "jpg", "jpeg", "JPG", "JPEG", "svg", "SVG"
        );

        $file_extension = pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION);

        if (in_array(strtolower($file_extension), $allowed_extension)) {
            $filename = $_FILES["upload"]["name"];
            $file_basename = substr($filename, 0, strripos($filename, '.'));
            $file_ext = substr($filename, strripos($filename, '.'));
            $newfilename = $file_basename . time() . $file_ext;

            if (move_uploaded_file($_FILES['upload']['tmp_name'], $url_image . $newfilename)) {

                if (isset($_SERVER['HTTPS'])) {
                    $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
                } else {
                    $protocol = 'http';
                }

                $url = base_url('uploads/media/') . $newfilename;
                $data['url'] = $newfilename;

                $this->db->insert('media_gallery', $data);
                echo '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
            }
            exit;
        }
    }

    function Home()
    {
        $data['main_title'] = "User";
        $data['title_small'] = "Management";
        $crud = new grocery_CRUD();

        $crud->set_table('user_auth');

        $crud->columns(['full_name', 'email', 'is_active', 'is_locked_flag']);

        $crud->required_fields('full_name', 'email', 'pass', 'is_active', 'is_locked_flag');
        $crud->callback_before_insert(array($this, 'encrypt_password_callback'));
        $crud->callback_before_update(array($this, 'encrypt_password_callback'));

        $crud->display_as('pass', 'Password');
        $crud->display_as('is_active', 'IS Active ?');
        $crud->display_as('is_locked_flag', 'Status');

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    
    function courses()
    {
        $data['main_title'] = "Courses";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('courses');
        $crud->set_field_upload('featured_image', 'uploads/about');

        $crud->columns(['course_category_id', 'course_name','featured_image','is_active']);

        $crud->required_fields(['course_category_id', 'course_name','featured_image','is_active']);
        $crud->set_relation('course_category_id', 'course_category', 'course_title');

        $output = $crud->render();
        $this->_example_output($output, $data);
    }
    function course_category()
    {
        $data['main_title'] = "Course Category";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('course_category');
        $crud->set_field_upload('featured_image', 'uploads/courses');

        $crud->columns(['course_title','is_active']);

        $crud->required_fields(['description','is_active']);

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function servicesSetup()
    {
        $data['main_title'] = "SERVICES MANAGEMENT";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('services');
        $crud->set_field_upload('featured_image', 'uploads/services');

        $crud->columns(['title','featured_image','slug','description','is_active']);

        $crud->required_fields(['title','featured_image','is_active']);

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function countryName()
    {
        $data['main_title'] = "COUNTRY NAME";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('country_name');
        $crud->set_field_upload('featured_image', 'uploads/country');

        $crud->columns(['name','featured_image','slug','is_active']);

        $crud->required_fields(['name','featured_image','slug','is_active']);

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function countryTitleSetup()
    {
        $data['main_title'] = "COUNTRY TITLE SETUP";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('country_info');
        $crud->set_field_upload('featured_image', 'uploads/country');

        $crud->columns(['title','position', 'is_active']);

        $crud->required_fields(['title','position', 'is_active']);

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function countryDetails()
    {
        $data['main_title'] = "COUNTRY DETAILS";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('country_details');

        $crud->columns(['country_id', 'title_id', 'description','slug']);

        $crud->required_fields(['country_id', 'title_id', 'description','slug']);
        $crud->set_relation('country_id', 'country_name', 'name');
        $crud->set_relation('title_id', 'country_info', 'title');

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function addPhotos(){
        $data['main_title'] = "ADD PICTURES";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('gallery');
        $crud->set_field_upload('featured_image', 'uploads/country');

        $crud->columns(['featured_image']);

        $crud->required_fields(['featured_image']);

        $output = $crud->render();
        $this->_example_output($output, $data);
}
    function document(){
        $data['main_title'] = "DOCUMENT MANAGEMENT";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('document');
     
        $crud->columns(['document_type','file']);
        $crud->set_field_upload('file', 'uploads/documents');

        $crud->required_fields(['document_type','file']);

        $output = $crud->render();
        $this->_example_output($output, $data);
}
    function universities()
    {
        $data['main_title'] = "UNIVERSITY NAME";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('universities');
        $crud->set_field_upload('featured_image', 'uploads/university');

        $crud->columns(['name','country_id','featured_image','slug','is_active']);

        $crud->required_fields(['name','country_id','featured_image','slug','is_active']);
        $crud->set_relation('country_id', 'country_name', 'name');

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function universityTitle()
    {
        $data['main_title'] = "UNIVERSITY TITLE SETUP";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('university_info');
        $crud->set_field_upload('featured_image', 'uploads/university');

        $crud->columns(['title','position', 'is_active']);
        $crud->required_fields(['title','position', 'is_active']);

        $output = $crud->render();
        $this->_example_output($output, $data);
    }
     
    function universityDetails()
    {
        $data['main_title'] = "UNIVERSITY DETAILS";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('university_details');

        $crud->columns(['university_id', 'title_id', 'description']);

        $crud->required_fields(['university_id', 'title_id', 'description']);
        $crud->set_relation('university_id', 'universities', 'name');
        $crud->set_relation('title_id', 'university_info', 'title');

        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function testimonialSetup()
    {
        $data['main_title'] = "ADD TESTIMONIAL";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();
        $crud->set_table('testimonials');
        $crud->set_field_upload('featured_image', 'uploads/testimonials');
        $crud->columns(['customer_name','description','featured_image','is_active']);
        $crud->required_fields(['customer_name','description','featured_image','is_active']);
        $output = $crud->render();
        $this->_example_output($output, $data);
    }

    function addCertification()
    {
        $data['main_title'] = "ADD CERTIFICATION";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();
        $crud->set_table('certification');
        $crud->set_field_upload('featured_image', 'uploads/testimonials');
        $crud->columns(['name','featured_image','is_active']);
        $crud->required_fields(['name','featured_image','is_active']);
        $output = $crud->render();
        $this->_example_output($output, $data);
    }
    
    function socialSite(){
        $data['main_title'] = "SOCIAL SITE";
        $data['title_small'] = "";
        $crud = new grocery_CRUD();

        $crud->set_table('social_site');
        $crud->columns(['name','favicon','link']);

        $crud->required_fields(['name','favicon','link']);

        $output = $crud->render();
        $this->_example_output($output, $data);
}

function contact(){
    $data['main_title'] = "CONTACT";
    $data['title_small'] = "";
    $crud = new grocery_CRUD();

    $crud->set_table('contact');
 
    $crud->columns(['name','email','subject','message']);
    $crud->unset_operations();  

    $output = $crud->render();
    $this->_example_output($output, $data);
}




}
