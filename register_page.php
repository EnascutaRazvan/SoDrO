<?PHP

$name = $_POST['userName'];
$email = $_POST['email'];
$password = $_POSTT['psw'];
$password2 = $_POST['psw-repeat'];



echo $name;
echo $email;
echo $password;

//Database Connection code

$serverName = "localhost";
$userName = "id19129635_sodrodatabase";
$passwordDataBase = "Desenedesene123!";
$database_name = "id19129635_cezarazvan";

// Create connection
$conn = mysqli_connect($serverName, $userName, $passwordDataBase, $database_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

else{
    echo "Connected";
}
if($password == $password2){
    $sql = "INSERT INTO Register (name,email,password) VALUES ($name,$email,$password)";

    if($conn ->query($sql)){
        echo "Registration Done";
    }
    
    else{
        echo "Something went wrong";
    }
}

else{
    echo "Password not matched...";
}

?>