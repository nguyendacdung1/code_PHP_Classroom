<?php

    require_once 'config.php';

    //khai báo biến rỗng
    $name = $author = $price = "";
    $name_err = $author_err = $price_err = "";

    //lấy dữ liệu từ form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Xác thực name
        $input_name = trim($_POST["name"]);
        if (empty($input_name)){
            $name_err = "Please enter a name.";
        }elseif (!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP,
                array("options" => array("regexp" => "/^[a-zA-Z'-.\s ]+$/")))){
            $name_err = "Please enter valid name.";
        }else {
            $name = $input_name;
        }

        //Xác thực author
        $input_author = trim($_POST["author"]);
        if (empty($input_author)){
            $name_err = "Please enter a name author.";
        }elseif (!filter_var(trim($_POST["author"]), FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => "/^[a-zA-Z'-.\s ]+$/")))){
            $name_err = "Please enter valid name author.";
        }else {
            $author = $input_author;
        }

        //xác thực price
        $input_price = trim($_POST["price"]);
        if (empty($input_price)){
            $price_err = "Please enter a price.";
        }elseif (!ctype_digit($input_price)) {
            $price_err = 'Please enter a positive integer value';
        }else{
            $price = $input_price;
        }

        //kiểm tra lỗi nhập vào database
        if (empty($name_err) && empty($author_err) && empty($price_err)) {
            // câu lệnh prepare insert
            $sql = "INSERT INTO book(name, author, price) VALUES (?, ?, ?)";

            if ($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_author, $param_price);

                //truyền vào các kiểu dữ liệu
                $param_name = $name;
                $param_author = $author;
                $param_price = $price;

                if (mysqli_stmt_execute($stmt)){
                    header("location: index.php");
                    exit();
                }else{
                    echo "Something went wrong. Please try again later.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Create Record</h2>
                </div>
                <p>Please fill this form and submit to add employee record to database</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : '';  ?>">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        <span class="help-block"><?php echo $name_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($author_err)) ? 'has-error' : '';  ?>">
                        <label>Author</label>
                        <input type="text" name="author" class="form-control" value="<?php echo $name; ?>">
                        <span class="help-block"><?php echo $author_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : '';  ?>">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="<?php echo $name; ?>">
                        <span class="help-block"><?php echo $price_err; ?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="index.php" class="btn btn-primary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
