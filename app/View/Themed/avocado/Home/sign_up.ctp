<!--validation code starts here-->
<?php
    echo $this->Html->script('jqBootstrapValidation');
?>
<script>
    $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>
<?php $user_role = array('2' => 'Administrator', '3' =>'Employee', '4' =>'User'); ?>

<div class="container">
	<?php 
		echo $this->Form->create('Profile',array('class' => 'form-horizontal form-signin-signup',
														'url' => array('controller' => 'Home',
														'action' => 'signUp')));
	?>
        <div class="top-bar">
          <h3><i class="icon-leaf"></i> Sign up - Project<span class="header-text-color"><strong>Ally</strong></h3>
        </div>
        <div class="well no-padding">

          <div class="control-group">
            <label class="control-label" for="inputName"><i class="icon-user"></i>Full name</label>
            <div class="controls">
            	<?php echo $this->Form->input('user_name',array('label' => false,
																		'placeholder' => '...',
																		'type' => 'text',
                                                                        'required',
                                                                        'class' => 'span6 ')); ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputUsername"><i class="icon-circle"></i>Company name</label>
            <div class="controls">
				<?php echo $this->Form->input('company_name',array('label' => false,
																		   'placeholder' => '...',
																		   'type' => 'text',
                                                                           'required',
                                                                        'class' => 'span6 ')); ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputUsername"><i class="icon-key"></i>Designation</label>
            <div class="controls">
				<select class="span6 m-wrap" data-placeholder="Choose designation" tabindex="1">
					<option value="">Select...</option>
					<option value="2">Administrator</option>
					<option value="3">Employee</option>
					<option value="4">User</option>
				</select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputUsername"><i class="icon-envelope"></i>Email address</label>
            <div class="controls">
				<?php echo $this->Form->input('input_email',array('label' => false,
																		  'placeholder' => '',
																		  'type' => 'email',
																		  'required',
                                                                        'class' => 'span6')); ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputUsername"><i class="icon-key"></i>Password</label>
            <div class="controls">
				<?php echo $this->Form->input('input_password',array('label' => false,
																			 'placeholder' => 'Password',
																			 'type' => 'password',
                                                                             'required',
                                                                        'class' => 'span6 ')); ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputUsername"><i class="icon-key"></i>Confirm</label>
            <div class="controls">
			<?php echo $this->Form->input('confirm_password',array('label' => false,
																			 'placeholder' => 'Confirm Password',
																			 'type' => 'password',
																			 'data-validation-match-match' => 'data[Profile][input_password]',
																			'name' => 'data[Profile][confirm_password]',	
                                                                             'required',
                                                                        'class' => 'span6 ')); ?>
            </div>
          </div>

        <div class="padding">
          <button class="btn btn-primary" type="submit">Sign up</button>
        </div>
        </div>
     </form>
</div>