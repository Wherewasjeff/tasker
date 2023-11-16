
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input.css">
    <title>Task Management</title>
    <style>


    </style>
</head>
<body>
<?php
include 'header.php';
?>


<!--InputBox-->
  <div class="box">
    <div class="logo">
      <img class="boximg" src="asset/logo.png" href="img"></img>
    </div>
    <div class="int">
        <div class="task">
        <h1>Tasks</h1>
        </div>
        <div class="taskName">
        <label  class="boxlable">Task Name:</label>
        <input class="boxinput"  type="text" id="taskName" >
        <p id="taskNameError" class="error"></p>
        <p id="taskNameSuccess" class="success"></p>
        </div>
        <div class="taskDesc">
        <label class="boxlable">Description:</label>
        <input class="boxinput"  id="description" type="text" ></input><br>
        <p id="descriptionError" class="error"></p>
        <p id="descriptionSuccess" class="success"></p>
        </div>
        <div class="taskDate">
        <label class="boxlable">Due Date:</label>
          <input  class="boxinput"   type="date" id="date"><br>
          <p id="dateError" class="error"></p>
          <p id="dateSuccess" class="success"></p>
          </div>
          <div class="taskStatus">
            <label class="boxlable">Status</label>
            <select  class="boxinput"   id="statusDropdown">
                <option value=""></option>

            </select>
            <p id="dropdownError" class="error"></p>
            <p id="dropdownSuccess" class="success"></p>
        
        
          </div>
    </div> 
    
  
  <div class="add"><button  class="pogaadd"  type="submit" id="add">Add  </button></div>

</div>








</div>

<script src="script.js"></script>
<script>
    // Function to display error message
    function displayError(elementId, message) {
      var errorElement = document.getElementById(elementId);
      errorElement.innerText = message;
      errorElement.classList.add("error");
    }
  
    // Function to display success message
    function displaySuccess(elementId, message) {
      var successElement = document.getElementById(elementId);
      successElement.innerText = message;
      successElement.classList.remove("error");
    }
  
    // Function to validate the task name
    function validateTaskName() {
      var taskName = document.getElementById("taskName").value;
      var taskNameError = "taskNameError";
      var taskNameSuccess = "taskNameSuccess";
  
      if (taskName.trim() === "") {
        displayError(taskNameError, "Task name is required");
        displaySuccess(taskNameSuccess, "");
        return false;
      } else if (/[^a-zA-Z0-9\s]/.test(taskName)) {
        displayError(taskNameError, "Task name cannot contain special characters");
        displaySuccess(taskNameSuccess, "");
        return false;
      } else {
        displayError(taskNameError, "");
        displaySuccess(taskNameSuccess, "Task name is valid");
        return true;
      }
    }
  
    // Function to validate the description
    function validateDescription() {
      var description = document.getElementById("description").value;
      var descriptionError = "descriptionError";
      var descriptionSuccess = "descriptionSuccess";
  
      if (description.trim() === "") {
        displayError(descriptionError, "Description is required");
        displaySuccess(descriptionSuccess, "");
        return false;
      } else if (/[^a-zA-Z0-9\s]/.test(description)) {
        displayError(descriptionError, "Description cannot contain special characters");
        displaySuccess(descriptionSuccess, "");
        return false;
      } else {
        displayError(descriptionError, "");
        displaySuccess(descriptionSuccess, "Description is valid");
        return true;
      }
    }
  
    // Function to validate the due date
    function validateDate() {
      var date = document.getElementById("date").value;
      var dateError = "dateError";
      var dateSuccess = "dateSuccess";
  
      if (date.trim() === "") {
        displayError(dateError, "Due date is required");
        displaySuccess(dateSuccess, "");
        return false;
      } else if (!/^\d{4}-\d{2}-\d{2}$/.test(date)) {
        displayError(dateError, "Invalid date format (YYYY-MM-DD)");
        displaySuccess(dateSuccess, "");
        return false;
      } else {
        displayError(dateError, "");
        displaySuccess(dateSuccess, "Date is valid");
        return true;
      }
    }
  
    // Function to validate the status dropdown
    function validateDropdown() {
      var dropdown = document.getElementById("statusDropdown");
      var dropdownError = "dropdownError";
      var dropdownSuccess = "dropdownSuccess";
  
      if (dropdown.value === "") {
        displayError(dropdownError, "Status is required");
        displaySuccess(dropdownSuccess, "");
        return false;
      } else if (dropdown.value !== "todo" && dropdown.value !== "done") {
        displayError(dropdownError, "Invalid status value");
        displaySuccess(dropdownSuccess, "");
        return false;
      } else {
        displayError(dropdownError, "");
        displaySuccess(dropdownSuccess, "Status is valid");
        return true;
      }
    }
  
    // Function to validate all fields on form submission
    function validateForm() {
      var isTaskNameValid = validateTaskName();
      var isDescriptionValid = validateDescription();
      var isDateValid = validateDate();
      var isDropdownValid = validateDropdown();
  
      // Return true only if all fields are valid
      return isTaskNameValid && isDescriptionValid && isDateValid && isDropdownValid;
    }
  
    // Add event listeners for input fields
    document.getElementById("taskName").addEventListener("blur", validateTaskName);
    document.getElementById("description").addEventListener("blur", validateDescription);
    document.getElementById("date").addEventListener("blur", validateDate);
    document.getElementById("statusDropdown").addEventListener("change", validateDropdown);
  </script>
  

</body>
</html>