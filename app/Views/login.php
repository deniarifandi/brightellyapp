<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Brightelly School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .login-container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
      
    </style>
</head>
<body>
    <div class="login-container">
        <div class="row">
            <div class="col-md-12">
                
                <div class="card login-card p-4">
                    <div class="card-body">
                        <!-- <img src="<?= base_url('assets/img/brightelly_logo.png') ?>" alt="Brightelly School Logo" class="school-logo"> -->
                        <h2 class="card-title text-center mb-4">Welcome to Brightelly School</h2>
                        
                        <?php if(session()->getFlashdata('msg')):?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('msg') ?>
                            </div>
                        <?php endif;?>

                        <form action="<?= base_url('login/auth') ?>" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>