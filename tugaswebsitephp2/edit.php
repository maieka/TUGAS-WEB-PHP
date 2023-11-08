<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
</head>
<style>
        /* body {
            display: flex;
            /* justify-content: center;
            align-items: center; */
            height: 100vh;
            margin: 0;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-top: 5px;
        }

        form {
            width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="text"],
        input[type="text"],
       
        input[type="submit"] {
            background-color: #228B22;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .error-message {
            color: red;
        }
    </style> 
<body>
<?php
    include 'koneksi.php';

    $product = mysqli_query($conn, "SELECT * from product where id='$_GET[id]'");

    while ($p = mysqli_fetch_array($product)) {
        $id = $p["id"];
        $name = $p["name"];
        $price = $p["price"];
    }
    ?>

<div class="container col-md-6 mt-4">
		<h1></h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Edit Product
			</div>
      <div class="card-body">
    <form action="update_produk.php?id=<?php echo $id ?>" method="post" onsubmit="return validateForm()">
        <table class="table">

            <tr>
                <td>Id</td>
                <td>:</td>
                <td><input type="text" name="id"  value="<?php echo $id ?>"></td>
            </tr>

            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="name" value="<?php echo $name ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><span id="NameError" class="error-message"></span></td>
            </tr>

            <tr>
                <td>Price</td>
                <td>:</td>
                <td><input type="text" name="price" value="<?php echo $price ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><span id="priceError" class="error-message"></span></td>
            </tr>

        </table>
        <input type="submit" name="Submit" value="Simpan">
    </form>

    <script>
        function validateForm() {
            var id = document.forms[0]["id"].value;
            var name = document.forms[0]["name"].value;
            var price = document.forms[0]["price"].value;
            var valid = true;

            if (name === "") {
                document.getElementById("NameError").innerHTML = "Name harus diisi.";
                valid = false;
            } else {
                document.getElementById("NameError").innerHTML = "";
            }

            if (price === "") {
                document.getElementById("priceError").innerHTML = "price harus diisi.";
                valid = false;
            } else {
                document.getElementById("priceError").innerHTML = "";
            }
            return valid;
        }
       
    </script>
</body>

</html>
