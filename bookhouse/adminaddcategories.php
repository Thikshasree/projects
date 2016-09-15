<html>
<body>
<h1>Manage Categories</h1>
<form action="adminaddcategoriessubmit.php" method="post">
<a href="adminmanagecitystate.php">Cities</a>
<a href="adminmanagecountries.php">Countries</a>
<a href="adminmanagepublishers.php">Publishers</a>
<a href="adminmanageauthors.php">Authors</a>
<a href="adminmanageusers.php">Users</a>
<a href="adminmanagebooks.php">Books</a>
<a href="adminmanagecustomers.php">Customers</a>
<a href="adminmanagetransactions.php">transactions</a>
<a href="adminmanagelogout.php">Logout</a>
<p>Category No:- <input type="text" name="categoryno" size="20" value="" maxlength="20" />
<p>Category:- <input type="text" name="category" size="20" value="" maxlength="20" />
</p>
<td width="22%" valign="top" align="right" class "mandatory">Description:&nbsp;</td>
<td width="78%">
<textarea name="description" cols="85" rows="5" title="enter the description"></textarea>
</td>
<p><br><input type="submit" name="addcategory" value="addcategory" ></p>
</body>
</html>