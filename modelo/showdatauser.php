
<?php  
    include("../modelo/conexion.php");
    
    $id = $_SESSION['id'];

    $query = "SELECT u.username, u.userlastname, u.email, r.rol_name, c.name_country, b.name_branches, rk.name_ranks 
    FROM user u
    JOIN rol r ON u.rol_id = r.id
    JOIN country c ON u.country_id = c.id
    JOIN branches b ON u.branches_id = b.id
    JOIN ranks rk ON u.ranks_id = rk.id
    WHERE u.id = $id";
    $result = mysqli_query($conexion, $query);
    $user_data = mysqli_fetch_assoc($result);


    
?>


