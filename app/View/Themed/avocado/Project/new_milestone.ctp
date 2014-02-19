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
            <legend>Add New Milestone</legend>
                <?php
                    echo $this->Form->create('Milestone',array('class' => 'form-horizontal', 'url' => array('controller' => 'Project',
                                                                                                           'action' => 'newMilestone', $projectid)));
                ?>
                <div class="control-group">
                <?php
                    echo $this->Form->input('title',array('required'));
                ?>
                    <p class="help-block"></p>
                </div>
                <div class="control-group">
                <div id="datetimepicker1" class="input-append date">
                        <label>Due Date</label>
                        <input data-format="yyyy/MM/dd hh:mm:ss" type="text" id="data[Milestone][due_date]" name="data[Milestone][due_date]" required></input>
                         <span class="add-on">
                          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                          </i>
                        </span>
                            <script type="text/javascript">
                                $(function() {
                                    $('#datetimepicker1').datetimepicker({
                                        language: 'en',
                                        pick24HourFormat: true
                                    });
                                });
                            </script>
                </div>
                    <p class="help-block"></p>
                </div>
                <div class="control-group">
                <?php
                        echo $this->Form->input('responsible_user',array(
                             'options' => $responsibleuser,
                             'empty' => '--- Select an user ---',
                             'required'));
                ?>
                    <p class="help-block"></p>
                </div>
                <div class="control-group">
                <?php
                    echo "<span>Description</span><br/>";
                    echo $this->Form->textarea('description',array('required'));
                ?>
                </div>
                <div class="control-group">
                <?php 
                    echo "<span>Remaing Hours</span><br/>";
                    echo $this->Form->input('remaining_hours',array('required','label'=>false,'type'=>'text'));
                ?>
                <?php
                        echo $this->Form->input('project_id',array('label'=>false,
										                            'type' => 'hidden',
										                            'value' => $projectid
                        											));
                        echo "<br>".$this->Form->submit('Create Milestone',array('class' => 'btn'));
                        echo $this->Form->end();
                ?>
        </div>
    </div>
</div>
