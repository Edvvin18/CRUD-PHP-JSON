<?php

require "menu.php";
$obj = new menu();

if(isset($_POST['fetch'])){
    $obj->fetch();
}

if(isset($_POST['del'])){
    $id = $_POST['id'];
    $obj->del($id);
}

if(isset($_POST['add'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $datan = $_POST['datan'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $contacto = $_POST['contacto'];
    $obj->addnew($id, $nome, $datan, $email, $endereco, $contacto);
}

if(isset($_POST['edit'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $datan = $_POST['datan'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $contacto = $_POST['contacto'];
    $obj->edit($id, $nome, $datan, $email, $endereco, $contacto);
}
?>