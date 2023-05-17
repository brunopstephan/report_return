<div class="report">
    <h2>Código: <?= $report['code'] ?></h2>
    <h4><?= $report['name'] ?></h4>
    <h4><?= $report['email'] ?></h4>
    <h3>Denúncia:</h3>
    <p><?= $report['report'] ?></p>
    <form class="response" action="" method="post">
        <input type="hidden" name="id" value="<?= $report['id']?>">
        <textarea name="response" id="response" cols="40" rows="5" <?= ($report['state'] == 0) ? "" : "disabled" ?> placeholder="<?=(isset($report['response'])) ? "" : "Digite aqui sua resposta."?>"><?=(isset($report['response'])) ? $report['response'] : ""?></textarea>
        <input class="btn-all" type="submit" value="Responder" name="responseaction" <?= ($report['state'] == 0) ? "" : "disabled" ?>>
    </form>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $report['id']?>">
        <input class="btn-all" type="submit" value="<?= ($report['state'] == 0) ? "Concluir" : "Reabrir" ?>" name="<?= ($report['state'] == 0) ? "conclude" : "deconclude" ?>">
    </form>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $report['id']?>">
        <input class="btn-all" type="submit" value="Deletar" name="delete">
    </form>
</div>
<hr>
