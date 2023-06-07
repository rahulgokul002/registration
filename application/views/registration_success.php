<!DOCTYPE html>
<html>
<head>
    <title>Registration Success</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Registration Successful!</h2>
        <a href="<?= base_url('registration') ?>" class="btn btn-primary">Back to Registration Form</a>

        <h3>Registered Users:</h3>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    // print_r($registrations);

                foreach ($registrations as $registration): ?>
                    <tr>
                        <td><?= $registration['name'] ?></td>
                        <td><?= $registration['email'] ?></td>
                        <td><?= $registration['phone'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?= $pagination ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
