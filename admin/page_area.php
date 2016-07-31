<?php
	require_once '_includes/class.Area.php';
	class Area
	{
		private $template = '';
		private $smarty;
		
		private $industries;
		
		public function __construct()
		{
			$this->area = AreaList::getInstance();	
		}
			
		public function processRequest($action, $areaID, $smarty)
		{
			$this->smarty = $smarty;
			
			$this->smarty->assign('current_category', 'area');
			
			switch ($action)
			{
				case '':
					
					$this->prepareDisplayArea();
					break;
					
				case 'prepare-add':
					
					$area = array('name' => '');
					
					$this->smarty->assign('action', 'add');
					$this->smarty->assign('area', $area);
					$this->template = 'area_edit.tpl';
					
					break;
					
				case 'add':
					
					escape($_POST);
					$errors = array();
					if (isset($GLOBALS['name']))
					{
						$name = trim($GLOBALS['name']);
						$this->validateArea($name, $errors);
						
						if (count($errors) == 0)
						{
								$this->createArea($name);
								$this->prepareDisplayArea();
							
						}
						
						// there are errors
						if (count($errors))
						{
							$area['name'] = $_POST['name'];
							$this->smarty->assign('action', 'add');
							$this->smarty->assign('states', get_states());
							$this->smarty->assign('area', $area);
							$this->smarty->assign('errors', $errors);
							
							$this->template = 'area_edit.tpl';
						}
					}
					else
						$this->prepareDisplayArea();
					
					break;
					
				case 'prepare-edit':
					
					if (isset($areaID) && $areaID != '')
					{
						$area = $this->getAreaByID($areaID);
						
						if ($area)
						{
							$this->smarty->assign('action', 'edit');
							$this->smarty->assign('area', $area);
							$this->template = 'area_edit.tpl';
						}
						else
							$this->prepareDisplayArea();
					}
					else
						$this->prepareDisplayArea();
						
					break;
					
				case 'edit':
					
					escape($_POST);
					
					$errors = array();
					
					if(isset($GLOBALS['name']))
					{
						$name = trim($GLOBALS['name']);
						$areaID = $GLOBALS['id'];
						$area = $this->getAreaByID($areaID);	
						
						$this->validateArea($name, $errors);
						
						if (count($errors) == 0)
						{
							if (count($errors) == 0)
							{
								$area['name'] = $name;
								$this->updateArea($area);
								$this->prepareDisplayArea();
							}
						}
						// there are errors
						if (count($errors))
						{
							$area['name'] = $_POST['name'];
							$this->smarty->assign('action', 'edit');
							$this->smarty->assign('area', $area);
							$this->smarty->assign('errors', $errors);
							$this->template = 'area_edit.tpl';
						}
					}
					else
						$this->prepareDisplayArea();
					
					break;
					
				case 'delete':
					parse_str($_SERVER['QUERY_STRING']);
					if(isset($id))
					{
						$area = $this->getAreaByID($id);
						if ($area)
						{
							$this->updateJobsForAreaDeletion($area);
							$this->deleteArea($area);
							redirect_to(BASE_URL.'area/list/');
							
						}
						else
							echo 0;
						
					}
					else
						$this->prepareDisplayArea();
						
					break;
					
				case 'list': ; // do nothing, just fall through 
				default:
					$this->prepareDisplayArea();
			}
			
			return $this->template;
		}
		
		private function getAreaByID($areaID)
		{
			return $this->area->getAreaByID($areaID);
		}
		
		private function prepareAddArea()
		{
			$area_name = array('name' => '');
			$this->smarty->assign('action', 'add');
			$this->smarty->assign('area', $area_name);
		}
		
		private function prepareDisplayArea()
		{
			$area = $this->getArea();
			$this->smarty->assign('area', $area);
			$this->template = 'area.tpl';
		}
		
		private function getArea()
		{
			return $this->area->getAreaList();
		}
		private function updateArea($area)
		{
			$this->area->updateArea($area);
		}
		
		/**
		 * Validates the functional area
		 * in the $errors array.
		 * @param $name
		 * @param $errors
		 * @return void
		 */
		private function validateArea($name, &$errors)
		{
			if ($name == '')
				$errors['name'] = 'Enter functional area name';
		}
		
		private function createArea($name)
		{
			$area_name = array('name' => $name);
			
			$this->area->insertArea($area_name);
		}
		
		private function updateJobsForAreaDeletion($indutsry)
		{
			global $db;
			parse_str($_SERVER['QUERY_STRING']);
			$query = 'UPDATE '.DB_PREFIX.'jobs SET
					  functional_area = NULL
					  WHERE 
					  functional_area = ' . $id;
			$db->query($query);
		}
		
		private function deleteArea($area)
		{
			$this->area->deleteArea($area);
		}
	}
?>