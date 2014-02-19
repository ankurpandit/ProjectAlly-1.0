<?php
	class ProjectMember extends AppModel {
		public $name = 'ProjectMember';
		public $useTable = 'project_members';

		public $belongsTo = array('AddProject' => array(
            'className' => 'AddProject',
            'foreignKey' => 'project_id'
        	));
	}
?>