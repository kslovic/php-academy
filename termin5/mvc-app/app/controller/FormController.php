<?php

class FormController
{
    /**
     * Registration page with form
     */
    public function index()
    {
        $view = new View();
        $view->render('form', []);
    }

    /**
     * Form submit
     */
    public function submit()
    {
        // collect $_POST data to $data array using Request class, inspect Request class
        // $data = [];
        // $data[] = Request::post('name');
        // $data[] = Request::post('email');
	    //$data[] = Request::post('academy_major');
		//$data[] = Request::post('academy_year');
		//$data[] = Request::post('motivation');
		//$data[] = Request::post('prior_knowledge');
		//$data[] = Request::post('prior_languages');
        $data = $this->_validate($_POST);

        if($data === false) {
            header('Location: ' . App::config('url').'form/index');
        }

        //$data['prior_languages'] is array so we convert it to string before writing to file
        $data['prior_languages'] = implode(',', $data['prior_languages']);

        $file = fopen(BP . 'private/attendees.csv', 'a');
        fputcsv($file, $data);
        fclose($file);

        //@todo: write submited data to database
		Db::connect( App::config(), $name = 'db');
		$sql= 'INSERT INTO `attendee`(name,email,academy_major,academy_year,motivation, prior_knowledge,prior_languages) VALUES("'.$data['name'].'", "'.$data['email'].'", "'.$data['academy_major'].'", "'.$data['academy_year'].'", "'.$data['motivation'].'")';
		$stm= $this ->query($sql);
        //@todo: upload submited file to /private folder, relate file with attendee
		if($_FILES['code_example']['name']) {
		$uploadpath = include BP .'private/';
		$filename=$_FILES['code_example']['name'];
		$cleanfile=mysql_escape_string($_FILES['code_example']['name']);
		$temp = explode(".", $_FILES["code_example"]["name"]);
		$newfilename = $data['name'] . 'Code.txt';
		if(move_uploaded_file($_FILES["code_example"]["tmp_name"],  $uploadpath . $newfilename)) {?> <p> <?php echo "Vaš kod je uspješno objavljen!"; ?> </p><br> <?php 
		}
		}
        // redirect to thank you page
        header('Location: ' . App::config('url').'form/thankyou');
    }

    /**
     * @param $data
     * @return array|bool
     */
    private function _validate($data)
    {
        $required = ['name', 'email', 'academy_major', 'academy_year', 'motivation'];
        $other = ['prior_knowledge', 'prior_languages'];
        $all = array_merge($required, $other);

        // remove unknown keys from data if any
        $data = array_diff_key($data, $all);

        //validate required keys
        foreach($required as $key) {
            if(!isset($data[$key])) {
                return false;
            }

            // trim (strip whitespaces from values) then check if empty
            $data[$key] = trim((string)$data[$key]);
            if(empty($data[$key])) {
                return false;
            }
        }

        // check if email is valid
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        if(!in_array($data['academy_year'], ['1', '2', '3', '4', '5'])) {
            return false;
        }

        //@todo validate prior_languages by checking possible values
		if(!in_array($data['prior_languages'], ['C', 'C#', 'Javascript', 'Brainfuck'])) {
            return false;
        }
        return $data;
    }

    /**
     * Thank you page
     */
    public function thankyou()
    {
        $view = new View();
        $view->render('thankyou');
    }

}