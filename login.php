<?php include 'Partials/header.php'; ?>

<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $myusername = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']);

    $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
//    if ($row == null) {
//        redirect('login.php');
//    }
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // Ak dostanem $myusername aj $mypassword, riadok z tabulky musi byt 1
    if($count == 1) {
        $_SESSION["myusername"];
        $_SESSION['login_user'] = $myusername;

        header("location: index.php");
    }else if ($row == null) {
        redirect('login.php');
        //echo "Nesprávne prihlasovacie meno alebo heslo!";
        //$error = "Nesprávne prihlasovacie meno alebo heslo!";
    }
}
?>

<div style="height: 100vh">
    <form action="" method="post">
        <section class="login_section">
            <h2 style="margin-top: 10%">Prihlásenie</h2>
            <input name="username" type="text" placeholder="Username">
            <input name="password" type="password" placeholder="Heslo"><br>
            <button class="login_button" value="submit" type="submit">Prihlásiť</button>
        </section>
    </form>
</div>

<?php include 'Partials/footer.php'; ?>
