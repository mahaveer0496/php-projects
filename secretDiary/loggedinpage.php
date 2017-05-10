<?php
session_start();
if (array_key_exists("id", $_SESSION)) {
    $text = "Log Out";
    include ("connection.php");
} else {
    header("Location: index.php");
}
?>
<?php include("header.php"); ?>
    <a name="" id="" class="btn btn-primary" href="index.php?logout=1" role="button"><?php echo $text;?></a>
    <div class="container-fluid">
        <div class="form-group">
            <textarea class="form-control text" name="" id="" rows="3" placeholder="Enter your deepest thoughts">hehe</textarea>
        </div>
    </div>
<?php include("footer.php");?>
