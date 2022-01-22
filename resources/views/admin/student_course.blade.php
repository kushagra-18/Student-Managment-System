<!DOCTYPE html>
<html>
<body>

<h2>Assign Students to Courses</h2>

<!-- <p>The select element defines a drop-down list:</p> -->

<form action="/action_page.php">
  <label for="cars">Choose a stream</label>
  <select id="course" name="course">
    <option value="DS">Data Science</option>
    <option value="CS">Computer Science</option>
    <option value="CY">Cyber Security</option>
    <option value="FS">Full Stack Development</option>
  </select>
  <form action="/action_page.php">
  <label for="cars">Choose a car:</label>
  <select id="cars" name="cars" size="4" multiple>
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="fiat">Fiat</option>
    <option value="audi">Audi</option>
  </select><br><br>
</form>

  <input type="submit">
</form>

</body>
</html>

