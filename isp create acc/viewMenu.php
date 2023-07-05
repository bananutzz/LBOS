<!DOCTYPE html>
<html>
<head>
  <title>View Menu</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* Add your additional styles here */
    body {
      margin: 0;
      padding: 0;
    }
    .header {
      background-color: #f8def3;
      padding: 3px;
    }
    .logo {
      text-align: center;
      margin-bottom: 10px;
    }
    .logo h1 {
      font-size: 24px;
      margin: 0;
      color: #000000;
    }
    .nav {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 10px;
    }
    .nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    .nav li {
      display: inline-block;
      margin-right: 20px;
    }
    .nav a {
      text-decoration: none;
      color: #fff;
      font-size: 16px;
    }
    .hero-section {
      background-image: url('img/cute-cake-background.jpg');
      background-size: cover;
      background-position: center;
      color: #fff;
      padding: 5px;
      text-align: center;
    }
    .hero-section h2 {
      font-size: 36px;
      margin-bottom: 20px;
      color: #ffc0cb;
    }
    .menu-category-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom: 10px;
    }
    .menu-category-container ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }
    .menu-category-container li {
      display: inline-block;
      margin-right: 20px;
    }
    .menu-category-container a {
      text-decoration: none;
      color: #000;
      font-size: 16px;
      border-radius: 5px;
      padding: 5px 10px;
      background-color: #f8def3;
    }
    .menu-container {
      display: flex;
      justify-content: center;
      align-items: stretch;
      padding: 20px;
      height: calc(100vh - 160px); /* Utilize the available vertical space */
    }
    .menu-column {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-between; /* Add space between the frames */
      margin: 10px; /* Add margin to create space between columns */
    }
    .menu-frame {
      position: relative;
      width: 300px;
      height: 200px;
      border-radius: 10px;
      border: 2px solid #ffc0cb;
      background-color: #ffffff;
      overflow: hidden;
    }
    .menu-frame .menu-image {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .menu-details {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin: 10px; /* Add margin to create space between columns */
    }
    .menu-details h3 {
      margin: 0;
      margin-bottom: 10px;
    }
    .menu-details p {
      margin: 0;
      margin-bottom: 5px;
    }
    .menu-details span {
      font-weight: bold;
    }
    .arrow-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
    }
    .arrow {
      cursor: pointer;
      color: #ffc0cb;
      font-size: 24px;
    }
    .confirmation-message {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: none;
      background-color: #ffc0cb;
      border-radius: 10px;
      padding: 20px;
      color: #fff;
      text-align: center;
    }
    .confirmation-message h3 {
      margin: 0;
      margin-bottom: 10px;
    }
    .confirmation-message button {
      padding: 10px 20px;
      background-color: #fff;
      border: none;
      color: #000;
      font-size: 16px;
      cursor: pointer;
      margin-right: 10px;
    }
  </style>
</head>
<body>
<header>
  <div class="nav-container">
    <div class="logo">
      <h1>LOVELY CAKE BAKERY</h1>
    </div>
    <div class="nav-items">
      <nav>
        <ul>
          <li><a href="adminHomePage.html">HOME</a></li>
          <li><a href="#">DESSERT MENU</a></li>
        </ul>
      </nav>
      <div class="icons">
        <a href="indexAdmin.html"><img src="img/profile-icon.png" alt="Profile Icon"></a>
      </div>
    </div>
  </div>
</header>

<div class="view-menu-container">
  <?php
  // Connect to the database
  $host = "your_host";
  $port = "your_port";
  $dbname = "your_database_name";
  $user = "your_username";
  $password = "your_password";
  $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password");

  // Retrieve the menu data from the database
  $sql = "SELECT * FROM menu";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $menuItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

  if (count($menuItems) > 0) {
    foreach ($menuItems as $menuItem) {
      $category = $menuItem["category"];
      $productName = $menuItem["product_name"];
      $description = $menuItem["description"];
      $price = $menuItem["price"];
      $image = $menuItem["image_url"];

      // Display the menu item
      echo '
        <div class="menu-item">
          <div class="menu-frame">
            <img class="menu-image" src="' . $image . '" alt="' . $productName . '">
          </div>
          <div class="menu-details">
            <h3>' . $productName . '</h3>
            <p>' . $description . '</p>
            <p>Price: ' . $price . '</p>
          </div>
        </div>
      ';
    }
  } else {
    echo "No menu items found.";
  }
  ?>
</div>

<!-- Add your footer HTML code here -->

</body>
</html>
