<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/')?>login.css">
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    <div class="login">
    <h3 class="mb-3">Change your password for </h3>
    <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
    <?= $this->session->flashdata('message'); ?>
          <form action="<?= base_url('auth/changepassword')?>" method="post">
            <input class="mb-3" type="password" name="password1" id="password1" placeholder="New Password" required="required" />
            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
            <input class="mb-3" type="password" name="password2" id="password2" placeholder="Repeat Password" required="required" />
            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
            <button type="submit" class="btn btn-primary btn-block btn-large mb-2">Change password</button>
          </form>
      </div>
</body>
</html>


