<!doctype html>
<html ng-app>
  
  <head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  </head>

  <body>

    <div class="container">
      <label>Name:</label>
      	<input type="number" class="form-control" ng-model="price" placeholder="Quantity">
      	<input type="number" class="form-control" ng-model="qty" placeholder="Quantity">
      	<p>Total : {{ price * qty }}</p>

    </div>

  </body>
  
  <script src="angular.min.js"></script>
</html>