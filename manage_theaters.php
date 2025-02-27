<?php
include 'database.php';

// Fetch theaters from the database
$sql = "SELECT * FROM theaters";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Theaters</title>
    <link rel="stylesheet" href="theater.css"> <!-- Link to your CSS -->

    <script>
    function validateTheaterForm() {
        var name = document.forms["theaterForm"]["theater_name"].value;
        var showtimes = document.forms["theaterForm"]["showtimes"].value;
        
        if (name == "" || showtimes == "") {
            alert("All fields must be filled out");
            return false;
        }
        return true;
    }

    function confirmDelete() {
        return confirm("Are you sure you want to delete this theater?");
    }

    function searchTheater() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("theaterTable");
        tr = table.getElementsByTagName("tr");
        
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // theater name column
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }       
        }
    }
</script>

</head>
<body>
    <div class="container">
        <h1>Manage Theaters</h1>
        <a href="add_theater.php" class="btn">Add New Theater</a>
        
        
        <!-- Theaters Table -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Capacity</th>
                    <th>Showtimes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['location']; ?></td>
                            <td><?php echo $row['capacity']; ?></td>
                            <td><?php echo $row['showtimes']; ?></td>
                            <td>
                                <a href="edit_theater.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
                                <a href="delete_theater.php?id=<?php echo $row['id']; ?>" class="btn delete" onclick="return confirm('Are you sure you want to delete this theater?')">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No theaters found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
