<?php
    echo $this->Html->script('jqBootstrapValidation');
?>
<script>
    $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>



<div class="container">
	<?php 
		echo $this->Form->create('UserInfo',array('class' => 'form-horizontal form-signin',
												'url' => array('controller' => 'Home',
																'action' => 'signIn')));
	?>
        <div class="top-bar">
          <h3><i class="icon-leaf"></i>Project<span class="header-text-color"><strong>Ally</strong></h3>
        </div>
        <div class="well no-padding">

          <div class="control-group">
            <label class="control-label" for="inputName"><i class="icon-user"></i></label>
            <div class="controls">
            <?php 
  					echo $this->Form->input('input_email',array('label' => false,
  																	'placeholder' => 'Email',
  																	'id' => "inputName",
  																	'type' => 'email',
  																	'required'));
  				  ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inputUsername"><i class="icon-key"></i></label>
            <div class="controls">
			     	<?php 												
					  echo $this->Form->input('input_password',array('label' => false,
																  'placeholder' => 'Password',
																  'type' => 'password',
																  'id' => 'inputUserName',
                                  'required'));
				    ?>
            </div>
          </div>

        <div class="padding">
          <button class="btn btn-primary" type="submit">Sign in</button>
          <button class="btn" type="submit">Forgot Password</button>
          </div>
        </div>
     </form>
</div>







