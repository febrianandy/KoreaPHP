<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <?php include_once("components/header.php");?>
    <div class="d-flex">
      <?php include_once("components/navbar.php");?>
        <div class="main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3">Picking List</h1>
                <div>
                    <button class="btn btn-primary">Add New Data</button>
                </div>
            </div>

            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>NO.</th>
                        <th>PL DATE</th>
                        <th>PL CODE</th>
                        <th>COMPANY</th>
                        <th>LOCATION</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>08-05-2024</td>
                        <td>PL-PIP-2304-000009</td>
                        <td>INDAPLAS</td>
                        <td>IWD PUSAT</td>
                        <td>PICKING LIST ALREADY CREATED</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>02-05-2024</td>
                        <td>PL-PIP-2405-000009</td>
                        <td>INDAPLAS</td>
                        <td>IWD PUSAT</td>
                        <td>CANCELLED</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php include_once("components/footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
