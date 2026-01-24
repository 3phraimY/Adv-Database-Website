<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Title</title>
  <link rel="stylesheet" href="styles.css" />
  <script src="script.js"></script>
</head>

<body>
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
</body>

</html>