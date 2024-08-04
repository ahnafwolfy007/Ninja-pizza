<head>
  <title>Ninja Pizza</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
    .brand {
      background: #cbb09c !important;
    }


    .brand-text {
      color: #cbb09c !important;
    }

    form {
      max-width: 460px;
      margin: 20px auto;
      padding: 20px;
    }

    .pizza {
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }

    .ninja {
      width: 300px;
      margin: 80px auto;
      display: block;
      position: relative;
      top: -30px;
    }

    .icon {
      width: 60px;
      margin: 30px auto top:-10px;
      position: relative;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 8px;
      text-align: left;
    }

    .btn-danger {
      background-color: red;
      color: white;
      border: none;
      padding: 8px 16px;
      cursor: pointer;
    }

    .btn-danger:hover {
      background-color: darkred;
    }

    .btn-edit {
      background-color: silver;
      color: white;
      border: none;
      padding: 8px 16px;
      cursor: pointer;
    }

    .btn-edit:hover {
      background-color: darkgrey;
    }

    .btn-served {
      background-color: green;
      color: white;
      border: none;
      padding: 8px 16px;
      cursor: pointer;
    }

    .btn-served:hover {
      background-color: darkgreen;
    }

    .btn-cancel {
      background-color: goldenrod;
      color: white;
      border: none;
      padding: 8px 16px;
      cursor: pointer;
    }

    .btn-cancel:hover {
      background-color: darkgoldenrod;
    }

    .Danger {
      color: red;
    }

    .btn {
      background-color: darkgoldenrod;
    }
  </style>
</head>

<body class="grey lighten-4">
  <nav class="white z-depth-0">
    <div class="container">
      <img src="img/ninja.svg" class="icon">
      <a href="index.php" class="brand-logo brand-text ">Ninja Pizza</a>

      <ul id="nav-mobile" class="right hide-on-small-and-down">


        <li><a href="add.php" class="btn brand z-depth-0 ">Add a Pizza</a></li>
        <li><a href="orders.php" class="btn brand z-depth-0">Orders</a></li>
        <li><a href="staffs.php" class="btn brand z-depth-0 ">Ninjas</a></li>
        <li><a href="join_ninja.php" class="btn brand z-depth-0">Be a ninja</a></li>
      </ul>
    </div>
  </nav>