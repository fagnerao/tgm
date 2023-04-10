<?php namespace App\Controllers\Admin;
    use CodeIgniter\Controller;
    use App\Models\Admin\Suporte_model;
    use App\Models\Admin\Usuario_model;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

class Suporte extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
  
    public function index() {
        
            $freeToGO = pageAutorize(255);

            $model =  new Suporte_model();

            if(!$freeToGO){
               setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }elseif(session()->get('group') & 5){
                $data = ['suportes'    => $model->getDados()]; 
            }else{
                $user_id = session()->get('id');
                $data = ['suportes' => $model->getDados($user_id)]; 
            }

        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');
        }
              
        return view('admin/suporte/index', $data);

    }


    
    public function create($id=NULL) {
        
        $freeToGO = pageAutorize(255);

        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model =  new Suporte_model();
        $data = [
            'suporte'     => $model->doCreate($id),
            'title'       => "Criar/Editar minhas solicitações",
            ];

        

        return view('admin/suporte/modulo' ,$data);
      
    }

    public function createAdmin($id=NULL) {
        
        $freeToGO = pageAutorize(5);

        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model =  new Suporte_model();
        $data = [
            'suporte'     => $model->doCreate($id),
            'title'       => "Criar/Editar minhas solicitações",
            'solicitante' => $freeToGO
        ];
       
        return view('admin/suporte/moduloAdmin' ,$data);
      
    }


    public function core() {

        $freeToGO = pageAutorize(255);

        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $fileName = NULL;

        $dados['id']        = $this->request->getVar('id');
        $dados['id_user']   = session()->get('id');
        $dados['mensagem']  = $this->request->getVar('mensagem');

        $img  = $this->request->getFile('imagem');

     
        if (isset($img)){
            if ($img->isValid() && ! $img->hasMoved())
            {
                $fileName = $img->getRandomName();
                $img->move('uploads/suporte', $fileName);
            };
        }
       
        $model = new Suporte_model();

        if(!empty($fileName)){
            $dados['file'] = $fileName;
        }

        $model->save($dados);
         setMsg('msg', 'Solicitação efetuada com sucesso','sucesso');
        
      //Send Notification
       $to = 'subaco@gmail.com';
       $name = session()->get('name');
       $message = 'Novo suporte cadastrado';

       $this->sendNotification($to, $name,$message);

        return redirect()->to(base_url('/admin/suporte')); 
    }


    public function coreAdmin() {

        $freeToGO = pageAutorize(5);

        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }
        
        $fileName = NULL;

        $dados['id']        = $this->request->getVar('id');
        $dados['id_user']   = $this->request->getVar('id_user');
        $dados['status']    = $this->request->getVar('status');
        $dados['resposta']  = $this->request->getVar('resposta');

       
        $model = new Suporte_model();
        $model_user = new Usuario_model();
        
        $model->save($dados);
         setMsg('msg', 'Solicitação efetuada com sucesso','sucesso');

        $usuario =$model_user->getDados($this->request->getVar('id_user'));
             
        //Send Notification
        $to = $usuario->email;
        $name = session()->get('name');
        $message = 'Seu suporte de TI foi atualizado';

        $this->sendNotification($to, $name,$message);
        return redirect()->to(base_url('/admin/suporte')); 
    }



    public function del($id=NULL) {
        $freeToGO = pageAutorize(5);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
        } 
        $db      = \Config\Database::connect();
        $builder = $db->table('int_suporte');
        
        if ($builder->delete(['id' => $id])){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }

    public function sendNotification($to, $name, $message){

      $mailContent = '
          <h2>** Notificações Intranet **</h2>
          <h3>'.$name.'</h3>
          <p>'.$message.'</p>
      ';
          // mailer
          $mail = new PHPMailer(true);

          try {
              //Server settings
              $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'mail.ebasico.com.br';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'enviado@ebasico.com.br';                     //SMTP username
              $mail->Password   = 'enviado123@';                               //SMTP password
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
              //Recipients
              $mail->setFrom('enviado@ebasico.com.br', $name);
              $mail->addAddress($to);  //Name is optional
              $mail->addReplyTo($to, 'Não responda esse email');
      
              $mail->isHTML(true); //Set email format to HTML
              $mail->Subject = 'Mensagem enviada pelo site';
              $mail->Body    = $mailContent;
              $mail->AltBody = $mailContent;
  
               $mail->send();
              
               return true;
          
              } catch (Exception $e) {
              
              print_r($mail->ErrorInfo);
             
          }
      
      }

    
}


