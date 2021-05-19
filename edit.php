<?php 

include("db.php");

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $query="SELECT * FROM peluqueria.servicio where id=$id";
    $resul=pg_query($conn,$query);

    if(pg_num_rows($resul)==1){
        $row=pg_fetch_array($resul);
        $servicio=$row['nombre'];
        $precio=$row['precio'];
    }else{
        echo 'ups!, tenemos problemas';
    }

}
if(isset($_POST['actualizar'])){
    $id=$_GET['id'];
    $servicio= $_POST['servicios'];
    $precio=$_POST['precio'];
   
    $query="UPDATE peluqueria.servicio set nombre='$servicio', precio='$precio' where id=$id";
    pg_query($conn,$query);
    $_SESSION['message']='Servicio actualizado exitosamente!';
    $_SESSION['message_type']='warning';
    header("Location:Admin.php");
}

?>
<?php include("includes/header.php"); ?>

   <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
               
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                        <div class="form-group  mb-4">
                            <input type="text" name="servicios" value="<?php echo $servicio; ?>" class="form-control" placeholder="Actualiza el servicio">
                        </div>
                        <div class="form-group  mb-4">
                            <input type="number" name="precio" value="<?php echo $precio ?>" class="form-control" placeholder="Actualiza el precio" autofocus>
                        </div>
                        <button class=" btn btn-success btn-block" name="actualizar">Actualizar</button>
                    </form>
                </div>
            </div>
        </div>
   </div>


<?php include("includes/footer.php"); ?>


