<?php
class Contact extends View
{
	public function output(){
		$title = $this->model->title;
		$data = $this->model->viewuser;
		require APPROOT . '/views/inc/header.php';
		$text = <<<EOT
		<div class="jumbotron jumbotron-fluid">
		<div class="container">
		   <h1 class="display-4"> $title</h1>
		   <h1 class="display-4"> $data</h1>
		</div>
       </div>
EOT;
        echo $text;
        require APPROOT . '/views/inc/footer.php';	
	}
}
