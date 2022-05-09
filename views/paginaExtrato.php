<?php $extratos = select("SELECT * FROM extratos WHERE id_user = {$_SESSION['id_user']}"); ?>
<div id="extrato" style="display: none;">
    <div class="row">
        <table class="table">
            <thead>
                <th>Data</th>
                <th>Ação</th>
            </thead>
            <?php foreach($extratos as $extrato){ ?>
                <tr>
                    <td><?= $extrato->created_at ?></td>
                    <td><?= $extrato->acao ?></td>
                </tr>
            <?php } ?>

        </table>
    </div>
</div>