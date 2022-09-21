<?php
//Essa Entidade serve para manipular os dados do sqlite e gerenciar filtragens necessarias

  class Registros {

    private $id;
    private $delete;
    private $type;

    public function setId(int $id) :void 
    {
        $this->id = $id;
    }

    public function getId() :int
    {
        return $this->id;
    }

    public function setDeleted(int $delete) :void {
        $this->delete = $delete;
    }

    public function getDelete() :int 
    {
        return $this->delete;
    }

    public function setType(string $type) :void
    {
        $this->type = $type;
    }

    public function getType() :string 
    {
        return $this->type;
    }

    private function connection()
    {
        try{
        $pdo = new PDO(
            'sqlite:../data/db.sq3',
            '',
            '',
            [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            ]
        );
        return $pdo;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
        
    }

    public function filterRegistroType() :array {
        $con = $this->connection();
        $stmt = $con->prepare("SELECT * FROM registros WHERE type = :_type AND deleted = :_deleted");
        $stmt->bindValue(":_type",$this->getType(), \PDO::PARAM_STR);
        $stmt->bindValue(":_deleted",$this->getDelete(), \PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return [];
    }


    


  }


