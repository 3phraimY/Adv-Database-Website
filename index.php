<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Title</title>
  <link rel="stylesheet" href="styles.css" />
  <script src="script.js"></script>
</head>

<body>
  <div class="navigation bar">
    <a href="index.php">Home</a>
    <a href="about.php">About</a>
    <a href="contact.php">Contact</a>
  </div>

  <div class="two-column-container">
    <div class="column">
      <h1 class="test-formatting">Here is a fish</h1>
      <h1 class="title">What should we name him?</h1>

      <img src="https://www.cmaquarium.org/app/uploads/2023/09/Tropical-Fish-3-1024x683.jpg" height="300px" />
      <br />
      <label for="fish-names">Choose a name:</label>
      <select id="fish-names" name="fish-names">
        <option value="Bubbles">Bubbles</option>
        <option value="Finley">Finley</option>
        <option value="Splash">Splash</option>
        <option value="Goldie">Goldie</option>
        <option value="Neptune">Neptune</option>
        <option value="Coral">Coral</option>
        <option value="Sunny">Sunny</option>
        <option value="Blue">Blue</option>
      </select>
      <br />
    </div>
    <div class="column">
      <h2 class="title">What is his favorite activity?</h2>
      <label>
        <input type="radio" name="activity" value="Swimming" />
        Swimming
      </label><br />
      <label>
        <input type="radio" name="activity" value="Blowing bubbles" />
        Blowing bubbles
      </label><br />
      <label>
        <input type="radio" name="activity" value="Hiding in coral" />
        Hiding in coral
      </label><br />
      <label>
        <input type="radio" name="activity" value="Chasing other fish" />
        Chasing other fish
      </label>

      <h2>Fun Facts about him</h2>
      <ul>
        <li>Loves to swim in circles every morning.</li>
        <li>Can recognize different colors and shapes.</li>
        <li>Enjoys hiding behind rocks and coral.</li>
        <li>Blows bubbles when he’s happy.</li>
      </ul>
    </div>
  </div>
  <p>PHP function: <a href="csc4060.php">CSC4060</a></p>

  <div class="php-links">
    <h2 style="background-color: lightgray;">Chapter 1 PHP Files</h2>
    <ul>
      <li><a href="textbook-code/ch01/comments.php">comments.php</a></li>
      <li><a href="textbook-code/ch01/concat.php">concat.php</a></li>
      <li><a href="textbook-code/ch01/constants.php">constants.php</a></li>
      <li><a href="textbook-code/ch01/first.php">first.php</a></li>
      <li><a href="textbook-code/ch01/hello.php">hello.php</a></li>
      <li><a href="textbook-code/ch01/numbers.php">numbers.php</a></li>
      <li><a href="textbook-code/ch01/predefined.php">predefined.php</a></li>
      <li><a href="textbook-code/ch01/quotes.php">quotes.php</a></li>
      <li><a href="textbook-code/ch01/second.php">second.php</a></li>
      <li><a href="textbook-code/ch01/strings.php">strings.php</a></li>
      <li><a href="textbook-code/ch01/test.php">test.php</a></li>
    </ul>
    <h2 style="background-color: lightgray;">Chapter 2 PHP Files</h2>
    <ul>
      <li><a href="textbook-code/ch02/calendar.php">calendar.php</a></li>
      <li><a href="textbook-code/ch02/handle_form.php">handle_form.php</a></li>
      <li><a href="textbook-code/ch02/multi.php">multi.php</a></li>
      <li><a href="textbook-code/ch02/sorting.php">sorting.php</a></li>
    </ul>
  </div>
</body>

</html>