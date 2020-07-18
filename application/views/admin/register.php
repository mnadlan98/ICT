<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
                <h1 class="h2">Registrasi Admin</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-5 mx-auto mt-5">
                <form action="<?= site_url('admin/register') ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <small class="form-text text-danger"><?php echo form_error('username'); ?></small>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" id="level" name="level">
                            <option value="">Pilih Level..</option>
                            <option value="1">T-Regional</option>
                            <option value="2">Witel</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role">
                            <option value="">Pilih Role..</option>
                            <option value="0">T-Regional</option>
                            <option value="1">Viewer</option>
                            <option value="2">Editor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_witel">Witel</label>
                        <select class="form-control" id="id_witel" name="id_witel">
                            <option value="">Pilih Witel..</option>
                            <option value="0">T-Regional</option>
                            <option value="1">Bandung</option>
                            <option value="2">Bandung Barat</option>
                            <option value="3">Cirebon</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary w-100" value="Register" />
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>