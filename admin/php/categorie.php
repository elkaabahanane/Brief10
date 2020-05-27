<?php
    include('menu.php');


    echo '<form method="POST" action="">
        <div class="form-row align-items-center divstandard">
            <div class="col-auto">
            <label class="sr-only" for="inlineFormInput">Name</label>
            <input type="text" class="form-control mb-2" id="inlineFormInput" name="DESC_cat" placeholder="Nome catégorie">
            </div>
            <div class="col-auto">
                <button type="submit" name="addCategrie" class="btn btn-light btn-lg">ajouter</button>
            </div>
        </div>
    </form>';

    // Create connection

    
    $conn = new mysqli("localhost", "root", "", "shop");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM categorie  ORDER BY `categorie`.`ID_CAT` ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        echo '<table class="table table-striped divstandard">
            <thead>
            <tr>
                <th scope="col">id catégorie</th>
                <th scope="col">nom catégorie</th>
            </tr>
            </thead>
            <tbody>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>
                    <th scope="row">'. $row["ID_CAT"].'</th>
                    <td>'. $row["DESC_cat"].'</td>
                </tr>';
        }
        echo "</tbody>
        </table>";
    } 
    else {
    echo '<p class="text-center font-weight-bolder">Aucun catégorie</p>';
    }
    $conn->close();


    if(isset($_POST['addCategrie']))
    {
        $conn = new mysqli("localhost", "root", "", "shop");
        // Check connection

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }


        $nomCat=$_POST['DESC_cat'];
        $sql = "select DESC_cat from categorie where DESC_cat='".$nomCat."'";
        $result = $conn->query($sql);


        if ($result->num_rows > 0)
        {
            echo "<script>alert(\"nom de catégorie est deja exist\")</script>";
            $conn->close();
        }
        else
        {
            $conn->close();
            $conn = new mysqli("localhost", "root", "", "shop");
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "INSERT INTO categorie VALUES ('','admin','".$nomCat."')"; 

            if ($conn->query($sql) === TRUE) {
            echo "<script>alert(\"ajouter catégorie terminer avec succès\")</script>";
            } else {
            echo "Error";
            }
            $conn->close();
            echo '<script>javascript:history.go(-1);</script>';
        }
    }


?>