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

   public function index($typed = 'todos',$deleted=0) {
        
        if ($typed === 'todos') {
            $registro = Registro::paginate(10);
            $registro = json_encode($registro);
            return $registro;
        }

        $registro = Registro::where('type', $typed)
		->where('deleted', $deleted)->paginate(10);
           
        $retorno = json_encode($registro);
        return  $retorno;

     }

    public function validaRequest($type,$deleted){
      
       
        if ($type === "duvida" || $type=== "denuncia" || $type === "sugestaão") {
            if ($deleted === 0 || $deleted === 1) {
                return true;
            }
            return false;
        }
        return false;
     }

     public function salvarRegistro(Request $request) {

       

        $verificaRequest = $this->validaRequest($request->type,$request->deleted);

        if (!$verificaRequest) {
            return 'type ou deleted foram informados incorretamente ou a messagem esta repetida';
        }
        
        //Como o timeStep na minha models ta deligado o valor do id tem que ser colocado manualmente
        $ultimoRegistro = Registro::orderBy('id', 'desc')->first();
        $novoId = $ultimoRegistro->id + 1;
        $agora = date('d/m/Y H:i');
    
        $data = [
            "id"=> $novoId,
            "type" => $request->type,
            "message" =>$request->message,
            "is_identified" => $request->is_identified ?? 0,
            "whistleblower_name" => ($request->is_identified ? $request->whistleblower_name : null),
            "whistleblower_birth" => ($request->is_identified ? $request->whistleblower_birth : null),
            "deleted" =>$request->deleted,
            "created_at" =>$agora
        ];

       $retorno = Registro::firstOrCreate($data);

       return $retorno;
     }

}
