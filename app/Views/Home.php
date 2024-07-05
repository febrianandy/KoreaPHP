<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    <style>
        body {
            font-size: 0.875rem;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }
        .main-content {
            padding: 20px;
            flex-grow: 1;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .dropdown-menu {
            min-width: auto;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 10px 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="d-flex align-items-center">
            <h1 class="h4 mb-0">Envipedia Unity</h1>
        </div>
        <div class="d-flex align-items-center">
            <div class="dropdown mr-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="groupDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    INDACO GROUP
                </button>
                <div class="dropdown-menu" aria-labelledby="groupDropdown">
                    <a class="dropdown-item" href="#">Group 1</a>
                    <a class="dropdown-item" href="#">Group 2</a>
                </div>
            </div>
            <div class="dropdown mr-3">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="companyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    3 COMPANIES
                </button>
                <div class="dropdown-menu" aria-labelledby="companyDropdown">
                    <a class="dropdown-item" href="#">Company 1</a>
                    <a class="dropdown-item" href="#">Company 2</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    FEBRI@UNITY
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Profile</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex">
        <nav class="sidebar d-flex flex-column p-3">
          <ul class="nav flex-column">
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#">
                      <i class="bi bi-gear mr-2"></i>
                      Master Data and Settings
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#">
                      <i class="bi bi-cart3 mr-2"></i>
                      Procurement
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#">
                      <i class="bi bi-currency-dollar mr-2"></i>
                      Sales
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#">
                      <i class="bi bi-box-seam mr-2"></i>
                      Production
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#">
                      <i class="bi bi-boxes mr-2"></i>
                      Inventory
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#">
                      <i class="bi bi-calculator mr-2"></i>
                      Accounting
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#">
                      <i class="bi bi-bar-chart mr-2"></i>
                      Report
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link d-flex align-items-center" href="#">
                      <i class="bi bi-journal-text mr-2"></i>
                      Example
                  </a>
              </li>
          </ul>
        </nav>


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
                    <!-- Example rows -->
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
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p>20:53 WIB 04 Jul 2024</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
