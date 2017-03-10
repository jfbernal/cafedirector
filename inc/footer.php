</div>
</div>
</p>
<hr>
<center>
  <?php
  if(isset($_SESSION['logged_userID'])){
    echo "<a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a>";
  }
  else {
    echo "<a href='account.php'><span class='glyphicon glyphicon-user'></span> Sign Up - </a>";
    echo "<a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a>";
  }
  ?>
 Cafe Director v0.22
All Rights Reserved &copy;
2015
by Jorge Bernal
</center>
</div>
</body>
</html>
