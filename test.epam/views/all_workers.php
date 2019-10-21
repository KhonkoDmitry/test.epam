<?php include 'header.php'?>
<body>
<a href="/"><i class="fa fa-home fa-5x" aria-hidden="true"></i></a>
<div class="container">
    <div class="row">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">№</th>
                <th scope="col">FName</th>
                <th scope="col">LName</th>
                <th scope="col">Department <a href="/?route=all_workers&order=dname&sort=desc"><i
                                class="fa fa-caret-down"></i></a><a href="/?route=all_workers&order=dname"><i
                                class="fa fa-caret-up"></i></a></th>
                <th scope="col">Product</th>
                <th scope="col">Quantity <a href="/?route=all_workers&order=quantity&sort=desc"><i
                                class="fa fa-caret-down"></i></a><a href="/?route=all_workers&order=quantity"><i
                                class="fa fa-caret-up"></i></a></th>
                <th scope="col">Price</th>
                <th scope="col">Salary <a href="/?route=all_workers&salary=sort_desc"><i class="fa fa-caret-down"></i></a><a href="/?route=all_workers&salary=sort_asc"><i
                                class="fa fa-caret-up"></i></a></th>
                <th scope="col">Edit/Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($table as $item): ?>
            <tr>
                <td>
                    <?= $item['id'] ?>
                </td>
                <td>
                    <?= $item['fname'] ?>
                </td>
                <td>
                    <?= $item['lname'] ?>
                </td>
                <td>
                    <?= $item['dname'] ?>
                </td>
                <td>
                    <?= $item['name'] ?>
                </td>
                <td>
                    <?= $item['quantity'] ?>
                </td>
                <td>
                    <?= $item['price'] ?>
                </td>
                <td>
                    <?= $item['salary'] ?>
                </td>
                <td>
                    <a href="/?route=edit&id_worker=<?= $item['id'] ?>" class="btn btn-primary btn-lg active"
                       role="button"
                       aria-pressed="true">edit</a>
                    <a href="/?route=delete&id_worker=<?= $item['id'] ?>" class="btn btn-danger btn-lg active"
                       role="button"
                       aria-pressed="true">delete</a>
                </td>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
<?php include 'footer.php'?>