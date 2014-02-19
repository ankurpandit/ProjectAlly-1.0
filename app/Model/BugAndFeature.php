<?php
class BugAndFeature extends AppModel {
    
   	public $name = 'BugAndFeature';
    public $useTable = 'bugs_and_features';
    public $belongsTo = array(
        'Status' => array(
            'className' => 'Status',
            'foreignKey' => 'status'
        ),
        'Priority' => array(
            'className' => 'Priority',
            'foreignKey' => 'priority_id'
        )
    );

}
?>