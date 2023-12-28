<!DOCTYPE html>
<html>
<head>
  <title>Performing Two Operations on Click</title>
</head>
<body>

  <button id="myButton">Click me</button>

  <script>
    // Get the button element
    const button = document.getElementById('myButton');

    // Function to perform the first operation
    function operationOne() {
      alert('Operation One executed!');
      // Add your first operation code here
    }

    // Function to perform the second operation
    function operationTwo() {
      alert('Operation Two executed!');
      // Add your second operation code here
    }

    // Function to perform both operations when the button is clicked
    function performOperations() {
      operationOne();
      operationTwo();
    }

    // Attach a click event listener to the button
    button.addEventListener('click', performOperations);
  </script>

</body>
</html>
