<?php
    echo $this->Html->script('bootstrap-datetimepicker.js');
    echo $this->Html->css('bootstrap-datetimepicker.min.css');
?>
<!--validation code starts here-->
<?php
echo $this->Html->script('jqBootstrapValidation');
?>
<script>
    $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>
<div class="row-fluid">
    <div class="span12">
        <!-- Main content -->
        <!-- form using cakephp -->
        <div class="span5 well">
        	<?php foreach($milestones as $milestone){ ?>
            
            <legend>Edit Milestone</legend>
                <?php
                    echo $this->Form->create('Milestone',array('class' => 'form-horizontal', 'url' => array('controller' => 'Project',
                                                                                                           'action' => 'editMilestone',$milestone['Milestone']['id'], $projectid)));
                ?>
                <div class="control-group">
                <?php
                    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $milestone['Milestone']['id'],'required'));
                ?>
                <p class="help-block"></p>
                </div>
                <div class="control-group">
                <?php
                    echo $this->Form->input('title', array('value' => $milestone['Milestone']['title']),'required');
                ?>
                <p class="help-block"></p>
                </div>
                <div class="control-group">
                <div id="datetimepicker1" class="input-append date">
                	<label>Due Date</label>
                    <input data-format="yyyy-MM-dd" type="text" required id="data[Milestone][due_date]" value=<?php echo $milestone['Milestone']['due_date']; ?> name="data[Milestone][due_date]"></input>
                    <span class="add-on">
                    	<i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                    </span>
                    <p class="help-block"></p>
                </div>
                    <script type="text/javascript">
                                $(function() {
                                    $('#datetimepicker1').datetimepicker({
                                        language: 'en',
                                        pick24HourFormat: true,
                                        pickTime: false
                                    });
                                });
                    </script>
                </div>
                <div class="control-group">
                <?php
                        echo $this->Form->input('responsible_user',array('options' => $responsibleuser,
											                        	 'value' => $responsibleuser[$milestone['Milestone']['responsible_user']], 	
											                             ));

                ?>
                    <p class="help-block"></p>
                </div>
                <div class="control-group">
                <?php
                        echo "<span>Description</span><br/>";
                        echo $this->Form->textarea('description', array('value' => $milestone['Milestone']['description'], 	
                            											'rows' => 10 ));
                ?>
                    <p class="help-block"></p>
                </div>
                <?php
                        echo $this->Form->input('project_id',array('label'=>false,
										                            'type' => 'hidden',
										                            'value' => $projectid
                        											));
                        echo $this->Form->submit('Save Milestone',array('class' => 'btn'));
                        echo $this->Form->end();
        	}
            ?>
                
        </div>
    </div>
</div>
