<?php
	require_once '_includes/class.Education.php';
	class Education
	{
		private $template = '';
		private $smarty;
		
		private $industries;
		
		public function __construct()
		{
			$this->education = EducationList::getInstance();	
		}
			
		public function processRequest($action, $educationID, $smarty)
		{
			$this->smarty = $smarty;
			
			$this->smarty->assign('current_category', 'education');
			
			switch ($action)
			{
				case '':
					
					$this->prepareDisplayEducation();
					break;
					
				case 'prepare-add':
					
					$education = array('name' => '');
					
					$this->smarty->assign('action', 'add');
					$this->smarty->assign('education', $education);
					$this->template = 'education_edit.tpl';
					
					break;
					
				case 'add':
					
					escape($_POST);
					$errors = array();
					if (isset($GLOBALS['name']))
					{
						$name = trim($GLOBALS['name']);
						$this->validateEducation($name, $errors);
						
						if (count($errors) == 0)
						{
								$this->createEducation($name);
								$this->prepareDisplayEducation();
							
						}
						
						// there are errors
						if (count($errors))
						{
							$education['name'] = $_POST['name'];
							$this->smarty->assign('action', 'add');
							$this->smarty->assign('states', get_states());
							$this->smarty->assign('education', $education);
							$this->smarty->assign('errors', $errors);
							
							$this->template = 'education_edit.tpl';
						}
					}
					else
						$this->prepareDisplayEducation();
					
					break;
					
				case 'prepare-edit':
					
					if (isset($educationID) && $educationID != '')
					{
						$education = $this->getEducationByID($educationID);
						
						if ($education)
						{
							$this->smarty->assign('action', 'edit');
							$this->smarty->assign('education', $education);
							$this->template = 'education_edit.tpl';
						}
						else
							$this->prepareDisplayEducation();
					}
					else
						$this->prepareDisplayEducation();
						
					break;
					
				case 'edit':
					
					escape($_POST);
					
					$errors = array();
					
					if(isset($GLOBALS['name']))
					{
						$name = trim($GLOBALS['name']);
						$educationID = $GLOBALS['id'];
						$education = $this->getEducationByID($educationID);	
						
						$this->validateEducation($name, $errors);
						
						if (count($errors) == 0)
						{
							if (count($errors) == 0)
							{
								$education['name'] = $name;
								$this->updateEducation($education);
								$this->prepareDisplayEducation();
							}
						}
						// there are errors
						if (count($errors))
						{
							$education['name'] = $_POST['name'];
							$this->smarty->assign('action', 'edit');
							$this->smarty->assign('education', $education);
							$this->smarty->assign('errors', $errors);
							$this->template = 'education_edit.tpl';
						}
					}
					else
						$this->prepareDisplayEducation();
					
					break;
					
				case 'delete':
					parse_str($_SERVER['QUERY_STRING']);
					if(isset($id))
					{
						$education = $this->getEducationByID($id);
						if ($education)
						{
							$this->deleteEducation($education);
							redirect_to(BASE_URL.'education/list/');
							
						}
						else
							echo 0;
						
					}
					else
						$this->prepareDisplayEducation();
						
					break;
					
				case 'list': ; // do nothing, just fall through 
				default:
					$this->prepareDisplayEducation();
			}
			
			return $this->template;
		}
		
		private function getEducationByID($educationID)
		{
			return $this->education->getEducationByID($educationID);
		}
		
		private function prepareAddEducation()
		{
			$education_name = array('name' => '');
			$this->smarty->assign('action', 'add');
			$this->smarty->assign('education', $education_name);
		}
		
		private function prepareDisplayEducation()
		{
			$education = $this->getEducation();
			$this->smarty->assign('education', $education);
			$this->template = 'education.tpl';
		}
		
		private function getEducation()
		{
			return $this->education->getEducationList();
		}
		private function updateEducation($education)
		{
			$this->education->updateEducation($education);
		}
		
		/**
		 * Validates the educational list
		 * in the $errors array.
		 * @param $name
		 * @param $errors
		 * @return void
		 */
		private function validateEducation($name, &$errors)
		{
			if ($name == '')
				$errors['name'] = 'Enter education name';
		}
		
		private function createEducation($name)
		{
			$education_name = array('name' => $name);
			
			$this->education->insertEducation($education_name);
		}
		
		private function deleteEducation($education)
		{
			$this->education->deleteEducation($education);
		}
	}
?>