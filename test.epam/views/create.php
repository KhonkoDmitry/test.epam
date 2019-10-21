<?php include 'header.php'?>
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
                        <input type="text" class="form-control" name="fname" placeholder="enter first name">
                    </td>
                </tr>
                <tr>
                    <td>
                        LName
                    </td>
                    <td>
                        <input type="text" class="form-control" name="lname" placeholder="enter last name">
                    </td>
                </tr>
                <tr>
                    <td>
                        Department
                    </td>
                    <td>
                        <select class="form-control" name="id_department">
                            <?php foreach ($departments as $department): ?>
                                <option value="<?= $department['id'] ?>"><?= $department['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary" name="submit" value="create_worker">Save</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<?php include 'footer.php'?>