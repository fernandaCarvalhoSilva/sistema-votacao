<?php
require_once 'Controller.php';


class EnqueteController extends Controller {
    public $enquete;
    private $opcoes;

    public function listagem() {
        $this->view('listagem_enquete');
    }

    public function create() {
        $this->view('criar_enquete');
    }

    public function cadasterEnquete() {
        $this->opcoes = new Opcoes();
        $this->enquete = new Enquete();
        $this->enquete->setTitulo($_POST['titulo']);
        $this->enquete->setDescricao($_POST['descricao']);
        $this->enquete->setDataInicio($_POST['dataIni']);
        $this->enquete->setDataFim($_POST['dataFim']);
        $status = $this->enquete->verifyStatus($_POST['dataIni'], $_POST['dataFim']);
        $this->enquete->setStatus($status);
        $opcao[0] = $_POST['opcao1'];
        $opcao[1] = $_POST['opcao2'];
        $opcao[2] = $_POST['opcao3'];

        $this->opcoes->setOpcoes($opcao);
        $id_enquete = $this->enquete->createEnquete();

        $this->opcoes->createOpcoes($id_enquete);
        header('Location: http://localhost/sistema_votacao/');

    }

    public function edit($param) {
        $this->view('edit_enquete');
    }

    public function votar() {
        $param = $_POST['checkbox'];
        $id = intval($param);
        $this->opcoes = new Opcoes();
        $votos = $this->opcoes->countVotos($id);
        $this->opcoes->votar($votos + 1, $id);
        header('Location: http://localhost/sistema_votacao/');
    }

    public function delete($param) {
        $id = intval($param[0]);
        $this->enquete = new Enquete();
        $this->opcoes = new Opcoes();
        $this->opcoes->delete($id);
        $this->enquete->delete($id);
        header('Location: http://localhost/sistema_votacao/');
    }
}