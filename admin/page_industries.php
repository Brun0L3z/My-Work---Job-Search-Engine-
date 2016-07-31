<?php
	require_once '_includes/class.Industries.php';
	class Industry
	{
		private $template = '';
		private $smarty;
		
		private $industries;
		
		public function __construct()
		{
			$this->industries = industries::getInstance();	
		}
			
		public function processRequest($action, $industryID, $smarty)
		{
			$this->smarty = $smarty;
			
			$this->smarty->assign('current_category', 'industries');
			
			switch ($action)
			{
				case '':
					
					$this->prepareDisplayIndustries();
					break;
					
				case 'prepare-add':
					
					$industry = array('name' => '');
					
					$this->smarty->assign('action', 'add');
					$this->smarty->assign('industry', $industry);
					$this->template = 'industries_edit.tpl';
					
					break;
					
				case 'add':
					
					escape($_POST);
					$errors = array();
					if (isset($GLOBALS['name']))
					{
						$name = trim($GLOBALS['name']);
						$this->validateIndustry($name, $errors);
						
						if (count($errors) == 0)
						{
								$this->createIndustry($name);
								$this->prepareDisplayIndustries();
							
						}
						
						// there are errors
						if (count($errors))
						{
							$industry['name'] = $_POST['name'];
							$this->smarty->assign('action', 'add');
							$this->smarty->assign('states', get_states());
							$this->smarty->assign('industry', $industry);
							$this->smarty->assign('errors', $errors);
							
							$this->template = 'industries_edit.tpl';
						}
					}
					else
						$this->prepareDisplayIndustries();
					
					break;
					
				case 'prepare-edit':
					
					if (isset($industryID) && $industryID != '')
					{
						$industry = $this->getIndustryByID($industryID);
						
						if ($industry)
						{
							$this->smarty->assign('action', 'edit');
							$this->smarty->assign('industry', $industry);
							$this->template = 'industries_edit.tpl';
						}
						else
							$this->prepareDisplayIndustries();
					}
					else
						$this->prepareDisplayIndustries();
						
					break;
					
				case 'edit':
					
					escape($_POST);
					
					$errors = array();
					
					if(isset($GLOBALS['name']))
					{
						$name = trim($GLOBALS['name']);
						$industryID = $GLOBALS['id'];
						$industry = $this->getIndustryByID($industryID);	
						
						$this->validateIndustry($name, $errors);
						
						if (count($errors) == 0)
						{
							if (count($errors) == 0)
							{
								$industry['name'] = $name;
								$this->updateIndustry($industry);
								$this->prepareDisplayIndustries();
							}
						}
						// there are errors
						if (count($errors))
						{
							$industry['name'] = $_POST['name'];
							$this->smarty->assign('action', 'edit');
							$this->smarty->assign('industry', $industry);
							$this->smarty->assign('errors', $errors);
							$this->template = 'industries_edit.tpl';
						}
					}
					else
						$this->prepareDisplayIndustries();
					
					break;
					
				case 'delete':
					parse_str($_SERVER['QUERY_STRING']);
					if(isset($id))
					{
						$industry = $this->getIndustryByID($id);
						if ($industry)
						{
							$this->updateJobsForIndustryDeletion($industry);
							$this->deleteIndustry($industry);
							redirect_to(BASE_URL.'industries/list/');
							
						}
						else
							echo 0;
						
					}
					else
						$this->prepareDisplayIndustries();
						
					break;
					
				case 'list': ; // do nothing, just fall through 
				default:
					$this->prepareDisplayIndustries();
			}
			
			return $this->template;
		}
		
		private function getIndustryByID($industryID)
		{
			return $this->industries->getIndustryByID($industryID);
		}
		
		private function prepareAddIndustry()
		{
			$industry_name = array('name' => '');
			$this->smarty->assign('action', 'add');
			$this->smarty->assign('industry', $industry_name);
		}
		
		private function prepareDisplayIndustries()
		{
			$industries = $this->getIndustries();
			$this->smarty->assign('industries', $industries);
			$this->template = 'industries.tpl';
		}
		
		private function getIndustries()
		{
			return $this->industries->getIndustries();
		}
		private function updateIndustry($industry)
		{
			$this->industries->updateIndustry($industry);
		}
		
		/**
		 * Validates the name and asciiName and puts the error messages (if any)
		 * in the $errors array.
		 * @param $name
		 * @param $asciiName
		 * @param $errors
		 * @return void
		 */
		private function validateIndustry($name, &$errors)
		{
			if ($name == '')
				$errors['name'] = 'Enter industry name';
		}
		
		private function createIndustry($name)
		{
			$industry_name = array('name' => $name);
			
			$this->industries->insertIndustry($industry_name);
		}
		
		private function updateJobsForIndustryDeletion($indutsry)
		{
			global $db;
			parse_str($_SERVER['QUERY_STRING']);
			$query = 'UPDATE '.DB_PREFIX.'jobs SET
					  industry = NULL
					  WHERE 
					  industry = ' . $id;
			$db->query($query);
		}
		
		private function deleteIndustry($industry)
		{
			$this->industries->deleteIndustry($industry);
		}
	}
?>