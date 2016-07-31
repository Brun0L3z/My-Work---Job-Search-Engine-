<?php
	require_once '_includes/class.Qualification.php';
	class Qualification
	{
		private $template = '';
		private $smarty;
		
		private $industries;
		
		public function __construct()
		{
			$this->qualification_list = QualificationList::getInstance();	
		}
			
		public function processRequest($action, $qualificationID, $smarty)
		{
			$this->smarty = $smarty;
			
			$this->smarty->assign('current_category', 'qualification_list');
			
			switch ($action)
			{
				case '':
					
					$this->prepareDisplayQualification();
					break;
					
				case 'prepare-add':
					
					$qualification = array('name' => '');
					
					$this->smarty->assign('action', 'add');
					$this->smarty->assign('qualification', $qualification);
					$this->template = 'qualification_edit.tpl';
					
					break;
					
				case 'add':
					
					escape($_POST);
					$errors = array();
					if (isset($GLOBALS['name']))
					{
						$name = trim($GLOBALS['name']);
						$this->validateQualification($name, $errors);
						
						if (count($errors) == 0)
						{
								$this->createQualification($name);
								$this->prepareDisplayQualification();
							
						}
						
						// there are errors
						if (count($errors))
						{
							$qualification['name'] = $_POST['name'];
							$this->smarty->assign('action', 'add');
							$this->smarty->assign('states', get_states());
							$this->smarty->assign('qualification', $qualification);
							$this->smarty->assign('errors', $errors);
							
							$this->template = 'qualification_edit.tpl';
						}
					}
					else
						$this->prepareDisplayQualification();
					
					break;
					
				case 'prepare-edit':
					
					if (isset($qualificationID) && $qualificationID != '')
					{
						$qualification = $this->getQualificationByID($qualificationID);
						
						if ($qualification)
						{
							$this->smarty->assign('action', 'edit');
							$this->smarty->assign('qualification', $qualification);
							$this->template = 'qualification_edit.tpl';
						}
						else
							$this->prepareDisplayQualification();
					}
					else
						$this->prepareDisplayQualification();
						
					break;
					
				case 'edit':
					
					escape($_POST);
					
					$errors = array();
					
					if(isset($GLOBALS['name']))
					{
						$name = trim($GLOBALS['name']);
						$qualificationID = $GLOBALS['id'];
						$qualification = $this->getQualificationByID($qualificationID);	
						
						$this->validateQualification($name, $errors);
						
						if (count($errors) == 0)
						{
							if (count($errors) == 0)
							{
								$qualification['name'] = $name;
								$this->updateQualification($qualification);
								$this->prepareDisplayqualification();
							}
						}
						// there are errors
						if (count($errors))
						{
							$qualification['name'] = $_POST['name'];
							$this->smarty->assign('action', 'edit');
							$this->smarty->assign('qualification', $qualification);
							$this->smarty->assign('errors', $errors);
							$this->template = 'qualification_edit.tpl';
						}
					}
					else
						$this->prepareDisplayQualification();
					
					break;
					
				case 'delete':
					parse_str($_SERVER['QUERY_STRING']);
					if(isset($id))
					{
						$qualification = $this->getQualificationByID($id);
						if ($qualification)
						{
							$this->updateJobsForQualificationDeletion($qualification);
							$this->deleteQualification($qualification);
							redirect_to(BASE_URL.'qualification/list/');
							
						}
						else
							echo 0;
						
					}
					else
						$this->prepareDisplayQualification();
						
					break;
					
				case 'list': ; // do nothing, just fall through 
				default:
					$this->prepareDisplayQualification();
			}
			
			return $this->template;
		}
		
		private function getQualificationByID($qualificationID)
		{
			return $this->qualification_list->getQualificationByID($qualificationID);
		}
		
		private function prepareAddQualification()
		{
			$qualification_name = array('name' => '');
			$this->smarty->assign('action', 'add');
			$this->smarty->assign('qualification', $qualification_name);
		}
		
		private function prepareDisplayQualification()
		{
			$qualification_list = $this->getqualification();
			$this->smarty->assign('qualification_list', $qualification_list);
			$this->template = 'qualification.tpl';
		}
		
		private function getqualification()
		{
			return $this->qualification_list->getqualification();
		}
		private function updateQualification($qualification)
		{
			$this->qualification_list->updateQualification($qualification);
		}
		
		/**
		 * Validates the name and asciiName and puts the error messages (if any)
		 * in the $errors array.
		 * @param $name
		 * @param $asciiName
		 * @param $errors
		 * @return void
		 */
		private function validateQualification($name, &$errors)
		{
			if ($name == '')
				$errors['name'] = 'Enter qualification name';
		}
		
		private function createQualification($name)
		{
			$qualification_name = array('name' => $name);
			
			$this->qualification_list->insertQualification($qualification_name);
		}
		
		private function updateJobsForQualificationDeletion($qualification)
		{
			global $db;
			parse_str($_SERVER['QUERY_STRING']);
			$query = 'UPDATE '.DB_PREFIX.'jobs SET
					  qualification = NULL
					  WHERE 
					  qualification = ' . $id;
			$db->query($query);
		}
		
		private function deleteQualification($qualification)
		{
			$this->qualification_list->deleteQualification($qualification);
		}
	}
?>