<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: 'Times New Roman', Times, serif;
}

.sidenav {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  {{-- <a href="#about">Roles</a>     --}}
  <button onclick="myFunction()" class="dropbtn">Roles</a>    
    <div id="myDropdown" class="dropdown-content">
        <a href="">Create Role</a>
        <a href="">Role List</a>
    </div>
  <a href="#services">Users</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Dashboard</a>
  <a href="#contact">Training</a>
  <a href="#contact">QM Sheet</a>
  <a href="#contact">Auditor Requests</a>
  <a href="#contact">Actual Claim</a>
  <a href="#contact">Campaign</a>
  <a href="#contact">Touchpoint</a>
  <a href="#contact">Modes and Scenario</a>
  <a href="#contact">Beat Plan</a>
  <a href="#contact">Completed Audits</a>
  <a href="#contact">Action Planing</a>
  <a href="#contact">Client Rebuttals</a>
  <a href="#contact">QC Rebuttals</a>
  <a href="#contact">Payment Management</a>
  <a href="#contact">Edit Transcation</a>
  <a href="#contact">Reports</a>
</div>

<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }
    
    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
    </script>
   
</body>
</html> 
