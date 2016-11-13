<?php

require __DIR__ . '/PersonsFactoryAbstract.class.php';
require __DIR__ . '/CustomersFactory.class.php';

require __DIR__ . '/Customer.interface.php';
require __DIR__ . '/Customer.class.php';

if ($_POST) {
    $search = strip_tags(trim($_POST['search'])) ?? null;
    if (isset($search)) {

        if (isset($_POST['status']) && is_array($_POST['status'])) {
            $status = (sizeof($_POST['status']) > 0) ? array_keys($_POST['status']) : [];
        } else {
            $status = [];
        }

        $customerFactory = new CustomersFactory();
        $customerFactory->search($search);
        $data = $customerFactory->getData($status);

        if ($data !== false) {
            echo json_encode($data);
            exit;
        }
    }
    echo json_encode(['error' => 'Нет клиента по данному запросу']);
}
?>
