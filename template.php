<table>
    <tr>
        <td colspan=2><b>информация про клиента</b></td>
    </tr>
    <tr>
        <td>название клиента</td>
        <td><?= $data['info']['name_customer'] ?></td>
    </tr>
    <tr>
        <td>компания</td>
        <td><?= $data['info']['company'] ?></td>
    </tr>
    <tr>
        <td colspan=2><b>информация про договор</b></td>
    </tr>

    <?php foreach ($data['contracts'] as $contract) : ?>
        <tr>
            <td>номер договора</td>
            <td><?= $contract['number'] ?></td>
        </tr>
        <tr>
            <td>дата подписания</td>
            <td><?= $contract['date_sign'] ?></td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <td colspan=2><b>информация про сервисы</b></td>
    </tr>
    <tr>
        <td>
            <!-- в services_name вывести название сервисов через <br> -->
            <?php foreach ($data['services'] as $service) : ?>
                <?= $service['title_service'] ?>
            <?php endforeach; ?>
        </td>
    </tr>
</table>
