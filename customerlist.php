<?php include 'include/header.php'; 
$sql = 'SELECT 
        `id`,
        `CustomerName`,
        `CustomerEmail`,
        `CustomerUserName`,
        `CustomerLoginTime`,
        `CustomerLoginType`
        FROM `Customer`';
$query = mysqli_query($conn,$sql);
?>
<body>
    <div class="container_12">
        <?php include 'include/subheader.php'; ?>
        <div class="clear">
        </div>
        <?php include 'include/navpanel.php'; ?>
        <div class="clear">
        </div>
        <?php include 'include/sidepanel.php'; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>
                    Vendors</h2>
                <div class="block">
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th>Name</th>
							<th>Username</th>
							<th>Email</th>
							<th>Login Type</th>
                            <th>login Time</th>
                            <th>Details</th>
						</tr>
					</thead>
					<tbody>
                        <?php while($row = mysqli_fetch_assoc($query)) { ?>
						<tr class="odd gradeX">
							<td><?php echo $row['CustomerName'] ?></td>
							<td><?php echo $row['CustomerEmail'] ?></td>
							<td><?php echo $row['CustomerUserName'] ?></td>
							<td><?php echo $row['CustomerLoginType'] ?></td>
                            <td><?php echo $row['CustomerLoginTime'] ?></td>
                            <td><a href="view_customer.php?vendorID=<?php echo $row['id'] ?>">Details</a></td>
                        </tr>
                        <?php } ?>
					</tbody>
				</table>
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
            Copyright <a href="#">wowcafe.in Admin</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
