<?php 
include "../index/header.php";
require "../index/connect.php"; 
$db = connectDB();

// Consulta para obtener los vendedores
$query = "SELECT id, name FROM seller";
$response = mysqli_query($db, $query);

// Verifica que la consulta se haya ejecutado correctamente
if (!$response) {
    die("Query Failed: " . mysqli_error($db));
}

// Verifica que el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera y asigna los valores de $_POST solo si existen
    $id = $_POST["id"] ?? null;
    $tittle = $_POST["tittle"] ?? null;
    $price = $_POST["price"] ?? null;
    $image = $_POST["image"] ?? null;
    $description = $_POST["description"] ?? null;
    $rooms = $_POST["rooms"] ?? null;
    $wc = $_POST["wc"] ?? null;
    $garage = $_POST["garage"] ?? null;
    $timestap = $_POST["timestap"] ?? null;
    $seller = $_POST["seller"] ?? null;

    // Verifica que el ID del vendedor existe en la base de datos antes de insertar
    $checkSeller = "SELECT id FROM seller WHERE id = '$seller'";
    $result = mysqli_query($db, $checkSeller);

    if (mysqli_num_rows($result) > 0) {
        // Si el vendedor existe, procede con la inserción
        $query = "INSERT INTO propierties (title, price, image, description, rooms, wc, garage, timestap, id_seller) 
                  VALUES ('$tittle', '$price', '$image', '$description', '$rooms', '$wc', '$garage', '$timestap', '$seller')";
        $response = mysqli_query($db, $query);
        
        if ($response) {
            echo "Property Created";
        } else {
            echo "Error: " . mysqli_error($db);
        }
    } else {
        echo "Seller does not exist. Please enter a valid seller ID.";
    }
} else {
    echo "Please fill in the form to create a property.";
}

?>

<section>
    <h2>Properties Form</h2>
    <div>
        <form action="crearpropiedad.php" method="post">
            <fieldset>
                <legend>Fill all Forms to Create New Property</legend>
                <div>
                    <label for="id">ID</label>
                    <input type="number" id="id" name="id">
                </div>
                <div>
                    <label for="tittle">Title</label>
                    <input type="text" id="tittle" name="tittle" placeholder="Title of property">
                </div>
                <div>
                    <label for="price">Price</label>
                    <input type="number" id="price" name="price" placeholder="Price">
                </div>
                <div>
                    <label for="image">Image</label>
                    <input type="text" id="image" name="image" placeholder="Insert image URL here">
                </div>
                <div>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" placeholder="Description"></textarea>
                </div>
                <div>
                    <label for="rooms">Rooms</label>
                    <input type="number" id="rooms" name="rooms">
                </div>
                <div>
                    <label for="wc">Bathrooms</label>
                    <input type="number" id="wc" name="wc">
                </div>
                <div>
                    <label for="garage">Garage</label>
                    <input type="number" id="garage" name="garage">
                </div>
                <div>
                    <label for="timestap">Date</label>
                    <input type="date" id="timestap" name="timestap">
                </div>
                <div>
                    <label for="seller">Seller ID</label>
                    <select id="seller" name="seller">
                       <?php 
                        while ($seller = mysqli_fetch_assoc($response)) : ?>
                            <option value="<?php echo $seller['id']; ?>"><?php echo $seller['name']; ?></option>    
                       <?php endwhile; ?>
                    </select>
                </div>
                <div>
                    <button type="submit">Create a new property</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>


