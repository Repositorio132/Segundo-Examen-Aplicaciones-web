<?php 
include "../index/header.php";
require "../index/connect.php";
$db = connectDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $query = "INSERT INTO seller (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $response = mysqli_query($db, $query);

    if($response){
        echo "Seller Created";
    } else {
        echo "Seller NOT created";
    }
}
?>

<section>
    <h2>Sellers Form</h2>
    <div>
        <form action="crearsellers.php" method="POST">
            <fieldset>
                <legend>Fill all fields to Create a new Seller</legend>
                <div>
                    <label for="name">name</label>
                    <input type="text" name="name" id="name" placeholder="Name">
                </div>
                <div>
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" placeholder="Email">
                </div>
                <div>
                    <label for="number">number</label>
                    <input type="text" id="phone" name="phone" placeholder="Phone">
                </div>
                <div>
                    <button type="submit">Create a New Seller</button>
                </div>
            </fieldset>
        </form>
    </div>
</section>

