<?php 
require_once('../conexao.php');
require_once('../includes/includes.php'); 
include('../views/paginaPix.php'); 
include('../views/paginaDeposito.php');
include('../views/paginaSaque.php');
include('../views/paginaExtrato.php'); 
$dados = select("SELECT u.nome,c.saldo FROM users u JOIN conta c ON c.id_user = u.id WHERE u.id = {$_SESSION['id_user']}");?>