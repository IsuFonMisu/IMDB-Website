<!DOCTYPE html>
<html>
<head>
	<title>index</title>
  <link rel="stylesheet" href="styles.css">


<style>

div {
  width: "50%";
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>


</head>
<body>


<div class = "myDiv">
  <b>Admin view on Actors</b>
  <br>


  <?php 
  include "actors_table.php";
  ?>

  <form action="addActors.php" method="POST">
  	<input type="text" id="name" name="name" placeholder="Type Actor's name"><br>

    <label for="gender"> Select gender</label>
      <select name="gender">
      <option value="M">Male</option>
      <option value="F">Female</option>


  	<input type="text" id="age" name="age" placeholder="Type Actor's age"><br>
  	<input type="text" id="ssn" name="ssn" placeholder="Type Actors SSN"><br>


  	<label for="started">Started:</label>
  	<input type="date" id="started" name="started"> <br>

  	<label for="retired">Retired:</label>
  	<input type="date" id="retired" name="retired"><br>

  	<button class="button2">ADD</button>
  </form>


  <br>
  <br><br><br>


  <!--
  <form action="selected_actors.php" method="POST">



    <label for="gender"> You can Select and list Actor/Actresses accordingly</label>
      <select name="gender">
        <option value="N" selected>Gender</option>
        <option value="M">Male</option>
        <option value="F">Female</option>
      </select>
    

    <br>
    <br>
    <label for = "ageL" > Age Bounds: </label> 
    <input type="number" id="ageL" name="ageL" placeholder="Age Lower Bound" value =0>
    <input type="number" id="ageU" name="ageU" placeholder="Age Upper Bound" value =150><br>
    <br>

    <label for="is_retired"> Is actor Retired ? </label>
      <select name="is_retired">
        <option value="n" selected> No </option>
        <option value="y"> Yes </option>
      </select>

    <button class="button2">LIST</button>

  </form>
  -->

  <br>
  <br>

</div>
</body>
</html>