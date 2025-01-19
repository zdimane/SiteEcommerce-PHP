<?php  
// Connexion à la base de données  
$conn = new mysqli("localhost", "root", "", "ecommerce_cms", "3307");  

if ($conn->connect_error) {  
    die("Connection failed: " . $conn->connect_error);  
}  

// Fonction pour récupérer les catégories  
function getCats($conn)  
{  
    $get_cats = "SELECT * FROM categories";  
    $run_cats = mysqli_query($conn, $get_cats);  
    
    while ($row_cats = mysqli_fetch_assoc($run_cats)) {  
        $IdCat = $row_cats['IdCat'];  
        $TitleCat = htmlspecialchars($row_cats['titleCat']); // Échappez les caractères spéciaux  
        echo "<li><a href='indexx.php?cat=$IdCat'>$TitleCat</a></li>";  
    }  
}  

// Fonction pour récupérer les marques  
function Brands($conn)  
{  
    $get_Marque = "SELECT * FROM marques";  
    $run_Marque = mysqli_query($conn, $get_Marque);  
    
    while ($row_Marque = mysqli_fetch_assoc($run_Marque)) {  
        $IdMarque = $row_Marque['IdMarque'];  
        $TitleMarque = htmlspecialchars($row_Marque['TitleMarque']); // Échappez les caractères spéciaux  
        echo "<li><a href='indexx.php?Marque=$IdMarque'>$TitleMarque</a></li>";  
    }  
}  

// Fonction pour récupérer les produits  
function get_Product($conn)  
{  
    if (!isset($_GET['cat']) && !isset($_GET['Marque'])) {  
        $get_Boite = "SELECT * FROM products ORDER BY RAND() LIMIT 6";  
        $run_Boite = mysqli_query($conn, $get_Boite);  
        
        while ($row_Boite = mysqli_fetch_assoc($run_Boite)) {  
            $Prd_id = $row_Boite['product_id'];  
            $Prd_titre = htmlspecialchars($row_Boite['product_title']); // Échappez les caractères spéciaux  
            $Prd_Prix = $row_Boite['product_price'];  
            $Prd_Image = $row_Boite['product_image'];  

            echo "  
                <div id='single_pro'>  
                    <a href='Details.php?Prd_id=$Prd_id'><img src='admin_area/Product_images/$Prd_Image' width='180' height='180'/></a>  
                    <h3>$Prd_titre</h3>  
                    <p><b>$Prd_Prix MAD</b></p>  
                    <a href='indexx.php?add_cart=$Prd_id'>  
                        <button style='border-radius: 20px; width:150px;height:40px;'>  
                            <i class='fa-solid fa-cart-plus'></i> Ajouter au panier  
                        </button>  
                    </a>  
                </div>  
            ";  
        }  
    }  
}  

// Fonction pour récupérer les produits par catégorie  
function get_Product_by_categories_id($conn)  
{  
    if (isset($_GET['cat'])) {  
        $IdCat = intval($_GET['cat']); // Validation et sécurisation de l'entrée  
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_cat = ?");  
        $stmt->bind_param("i", $IdCat);  
        $stmt->execute();  
        $result = $stmt->get_result();  

        if ($result->num_rows == 0) {  
            echo "<h2 style='padding:20px;'>No products found in this category!</h2>";  
        }  

        while ($rowCatPrd = $result->fetch_assoc()) {  
            $Prd_id = $rowCatPrd['product_id'];  
            $Prd_titre = htmlspecialchars($rowCatPrd['product_title']);  
            $Prd_Prix = $rowCatPrd['product_price'];  
            $Prd_Image = $rowCatPrd['product_image'];  

            echo "  
                <div id='single_pro'>  
                    <a href='Details.php?Prd_id=$Prd_id'><img src='admin_area/Product_images/$Prd_Image' width='180' height='180'/></a>  
                    <h3>$Prd_titre</h3>  
                    <p><b>Price: $Prd_Prix MAD</b></p>  
                    <a href='indexx.php?add_cart=$Prd_id
