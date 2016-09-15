<html>
<body>
<h1>Update Users</h1>
<form action="adminupdateuserssubmit.php" method="post">
<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanageauthors.php">Authors</a>

<a href="adminmanagebooks.php">Books</a>
<a href="adminmanagepublishers.php">Publishers</a>
<a href="adminmanagecustomers.php">Customers</a>
<a href="adminmanagetransactions.php">transactions</a>
<a href="adminmanagelogout.php">Logout</a>

<p>User Number:- <input type="text" name="userno" size=20 maxlength=20>
</p>
<p>User name:- <input type="text" name="uname" size=20 maxlength=20>
</p>
<p>Password:- <input type="password" name="pass" size=20 maxlength=20>
</p>
<p>Confirm Password:- <input type="password" name="cpass" size=20 maxlength=20>
</p>
<p>Email:- <input type="text" name="email" size=20 maxlength=20>
</p>
<p>First name:- <input type="text" name="fname" size=20 maxlength=20>
</p>
<p>Last name:- <input type="text" name="lname" size=20 maxlength=20>
</p>
<p>
<input type="checkbox" name="countries"  value="y"  />
<label for="countries">manage countries</label>
<input type="checkbox" name="cities" value="y" />
<label for="cities">manage cities</label>
<input type="checkbox" name="authors" value="y" />
<label for="authors">manage authors</label>
<input type="checkbox" name="publishers" value="y"  />
<label for="publishers">manage publishers</label>
<input type="checkbox" name="categories" value="y" />
<label for="categories">manage categories</label>
<input type="checkbox" name="users" value="y"  />
<label for="users">manage users</label>
<input  type="checkbox" name="books" value="y" />
<label for="books">manage books</label>
<input  type="checkbox" name="customers" value="y"  />
<label for="customers">manage customers</label>
<input type="checkbox" name="transactions" value="y"  />
<label for="transactions">manage transactions</label>
</p>
<p>Status:- <input type="text" name="stat" size=20 maxlength=20>
</p>
<br><input type="submit" name="updateusers" value="updateusers" >
</html>
</body>