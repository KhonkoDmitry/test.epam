<?php include 'header.php' ?>
<body>
<a href="/"><i class="fa fa-home fa-5x" aria-hidden="true"></i></a>
<div class="container">
    <div class="row menu">
        <form action="/action.php" method="post">
            <table class="table table-dark">
                <tbody>
                <tr>
                    <td>
                        FName
                    </td>
                    <td>
                        <?= $data['fname'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        LName
                    </td>
                    <td>
                        <?= $data['lname'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Department
                    </td>
                    <td>
                        <?= $data['dname'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Product
                    </td>
                    <td>
                        <?= $data['name'] ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Price
                    </td>
                    <td>
                        <?= $data['price'] ?>
                    </td>
                </tr>
                <tr id="salary_line">
                    <td>
                        Salary
                    </td>
                    <td id="salary">
                        <?= $data['price'] * $data['quantity'] * 0.15 ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Quantity
                    </td>
                    <td>
                        <input type="hidden" class="form-control" name="id_worker" value="<?= $data['id_worker'] ?>">
                        <input type="hidden" class="form-control" name="id_product" value="<?= $data['id_product'] ?>">
                        <input type="number" class="form-control" name="quantity" value="<?= $data['quantity'] ?>">
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit" value="edit_worker">Save</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<script src="js/validation.js"></script>
<?php include 'footer.php' ?>