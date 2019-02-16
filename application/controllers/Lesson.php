<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson extends MY_Controller {


	function __construct()
    {
        parent::__construct();

      //  $this->load->helper(array('form', 'url', 'html'));
       $this->load->library('Pagination');

        $this->load->model(['Lesson_model'], '', TRUE);

    }

    function index($course_id){
    	// echo $course_id;
			$data = array();
			$submit=[];

			if($_POST){
							//if form posting is done then

							//hold whole post data into $data array
							$post=$this->input->post();

							switch ($post["type"]) {
								case 'article':
											$data["type"]="article";
											$data["lesson_name"]=$post["lesson_name"];
											$data["title"]=$post["title"];
											$data["content"]["article"]=$post["article"];

											$submit["content"]=json_encode($data);

											$submit["course_id"]=$post["course_id"];

									break;
								case "video":
										$data["type"]="video";
										$data["name"]=$post["lesson_name"];
										$data["content"]["url"]=$post["video_url"];

										$submit["content"]=json_encode($data);

										$submit["course_id"]=$post["course_id"];

									break;

									case "announce":
											$data["type"]="video";
											$data["lesson_name"]=$post["lesson_name"];
											$data["content"]["video_url"]=$post["video_url"];

											$submit["content"]=json_encode($data);

											$submit["course_id"]=$post["course_id"];

										break;

								default:
									// code...
									break;
							}
              $this->Lesson_model->add($submit);
						//  if($this->Lesson_model->add($submit)){
									$this->session->set_flashdata("success","New course has been added!");
									//redirect('/lesson/');
							}//if post is finished here

       // $data=[];
       // $data["headline"]=$data["title"]="Add New Course";
        //$data["action"]="add";
         $data["course_id"]=$course_id;
    	$data["lessons"]=$this->Lesson_model->get_list($course_id);
    	$this->layout("lessons/index", $data);

    }
function add(){
    $data = array();
		$submit=[];

    if($_POST){
            //if form posting is done then

            //hold whole post data into $data array
            $post=$this->input->post();

						switch ($post["type"]) {
							case 'article':
										//$data["name"]
								break;
							case "video":
									$data["type"]="video";
									$data["name"]=$post("lesson_name");
									$data["content"]["url"]=$post("video_url");

									$submit["content"]=json_encode($data);
									echo $submit["content"];
									$submit["course_id"]=$post("course_id");

								break;

							default:
								// code...
								break;
						}

          //  if($this->Lesson_model->add($submit)){
                $this->session->set_flashdata("success","New course has been added!");
                //redirect('/lesson/');
            //}
        }//if post is finished here

        $data=[];
        $data["headline"]=$data["title"]="Add New Course";
        $data["action"]="add";
        $this->layout("lessons/add_lesson");

			}

			public function viewLesson($course_id){

				$response=[];
				header('Access-Control-Allow-Origin: *');
				header('Content-Type: application/json');
		    $data=$this->Lesson_model->get_list($course_id);
			  foreach ($data as $row){
					$obj=json_decode($row->content);
					//unset($obj->id);
					$obj->id=$row->id;
					//$obj["id"]=$row->id;
					$response[]=$obj;
				}

				echo stripslashes(json_encode($response));
			}

}
