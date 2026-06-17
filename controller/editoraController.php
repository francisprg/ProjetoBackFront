<?php 

    
    require __DIR__ . '/../DAO/editoraDAO.php';


     Class editoraController {


    
        private editoraDAO $dao;


         public function __construct()
        {
        $this->dao = new editoraDAO();
      
        }   








     }








?>