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
    <?php foreach ($data['contracts'] as $contract) : ?>
        <tr>
            <td colspan=2><b>информация про договор</b></td>
        </tr>
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
            <?php echo "<pre>"; print_r($data); echo "</pre>"; ?>
            <!-- в services_name вывести название сервисов через <br> -->
            <?php foreach ($data['services'] as $service) : ?>
                <?= $service['title_service'] . '<br>' ?>
            <?php endforeach; ?>
        </td>
    </tr>
</table>
