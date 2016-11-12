<?php

if ($_POST) {
    $search = strip_tags(trim($_POST['search'])) ?? null;
    $status = strip_tags($_POST['status']) ?? null;

    if (isset($search)) {


        ob_start();

        $customerFactory = new CustomersFactory();
        $customerFactory->search($search);


        $data = $customerFactory->getData();
        include 'template.php';
        $content = ob_get_clean();

    }

}