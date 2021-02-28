<!DOCTYPE html>
<html>
<head>
    <title><?= $title;?></title>
    <link rel="stylesheet" href="<?= base_url('assets/')?>login.css">
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>


    <div class="login">
        <h1 class="mb-3">Login</h1>
        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('auth')?>" method="post">
            <input class="mb-3"type="text" name="email" id="email" placeholder="Email" required="required" />
            <input class="mb-3" type="password" name="password" id="password" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large mb-3">Let me in.</button>
        </form>
    </div>

</body>
</html>