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
//a parte principal do desafio o filtro de informações
   public function index($typed = 'todos',$deleted= 0) {
        
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
//metodo para verificar se o typed e o deleted são validos , é melhor essa verificação ficar no back-end do que no client side
    public function validaRequest($type,$deleted){
      
       
        if ($type === "duvida" || $type=== "denuncia" || $type === "sugestao") {
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
            return 'type ou deleted foram informados incorretamente' ;
        }
        
        $data = [
            "type" => $request->type,
            "message" =>$request->message,
            "is_identified" => $request->is_identified ?? 0,
            "whistleblower_name" => ($request->is_identified ? $request->whistleblower_name : null),
            "whistleblower_birth" => ($request->is_identified ? $request->whistleblower_birth : null),
            "deleted" =>$request->deleted,
        ];

    //Caso seja um valor repetido ele irá retornoar o elemento normal sem duplicar no db
       $retorno = Registro::firstOrCreate($data);

       return $retorno;
     }

     //com essa rota podemos apagar os registros de verdade eleminando dados do nosso bd
     public function deletarRegistro($id){
        $res =Registro::where('id',$id)->delete();
        //1 se houver suceeso e 0 se houver falha
        if ($res === 1) {
            return "tudo ocorreu bem , registro foi apagado";
        }
        
     }
     //com essa rota podemos marcar os registros como deleted 1 ocultando eles com alguma logica no front-end
     public function updateRegistro(Request $request,$id){

        $verificaRequest = $this->validaRequest($request->type,$request->deleted);

        if (!$verificaRequest) {
            return 'type ou deleted foram informados incorretamente' ;
        }

        $data = [
            "type" => $request->type,
            "message" =>$request->message,
            "is_identified" => $request->is_identified ?? 0,
            "whistleblower_name" => ($request->is_identified ? $request->whistleblower_name : null),
            "whistleblower_birth" => ($request->is_identified ? $request->whistleblower_birth : null),
            "deleted" =>$request->deleted,
        ];
       
        $res = Registro::where('id', $id)->update($data);

      return $res;
     }

   public function peguePeloIdRegistro($id){
    $registro = Registro::where('id', $id)->first();
    return $registro;
   }

    // 

}
