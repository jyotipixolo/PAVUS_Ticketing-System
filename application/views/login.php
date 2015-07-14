<?php $this->load->view('head'); ?>


<body>
   <?php echo print_r($this->session->userdata, TRUE); ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open(); ?>
    <?php echo form_input('email'); ?>
    <?php echo form_password('password'); ?>
    <?php echo form_submit('submit','Login', 'class="btn btn-primary"'); ?>
    <?php echo form_close(); ?>
<body>