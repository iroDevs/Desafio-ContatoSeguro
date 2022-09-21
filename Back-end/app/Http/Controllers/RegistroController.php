<?php

namespace App\Http\Controllers;
use App\Models\Registro;
use Illuminate\Http\Request;


class RegistroController extends Controller
{
    private $typed;
    private $deleted;
    private $register;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Registro $register){
        $this->register = $register;
    }

   public function index($typed,$deleted)  {
        
        $registro = Registro::where('type', $typed)
		->where('deleted', $deleted)->get();
           
        $retorno = json_encode($registro);
        return  $retorno;

     }

   

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

  /*  private function connection()
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
        
    }*/

   /* public function filterRegistroType() :array {
        $con = $this->connection();
        $stmt = $con->prepare("SELECT * FROM registros WHERE type = :_type AND deleted = :_deleted");
        $stmt->bindValue(":_type",$this->getType(), \PDO::PARAM_STR);
        $stmt->bindValue(":_deleted",$this->getDelete(), \PDO::PARAM_INT);

        if($stmt->execute()){
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }
        return [];
    }
*/

    //
}
