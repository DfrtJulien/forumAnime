<?php
require_once(__DIR__ . "/partials/head.php");
?>



<div class="usersContainer my-5">
    <h1 class="my-5">Les utilisateurs du forum :</h1>
    <h2>Les utilisateurs</h2>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pseudo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $userId = 1;
            if (isset($users)) {
                foreach ($users as $user) {
            ?>
                    <tr>
                        <th scope="row"><?= $userId++ ?></th>
                        <td><a href="/profile?id=<?= $user['id'] ?>"><?= $user['pseudo'] ?><a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<div class="usersContainer my-5">
    <h2>Les admins</h2>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col tablePseudo">Pseudo</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($admins)) {
                $adminId = 1;
                foreach ($admins as $admin) {
            ?>
                    <tr>
                        <th scope="row"><?= $adminId++ ?></th>
                        <td><a href="/profile?id=<?= $admin['id'] ?>"><?= $admin['pseudo'] ?><a></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include_once(__DIR__ . "/partials/footer.php");
?>