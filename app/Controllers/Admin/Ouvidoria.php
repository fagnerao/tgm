<?php namespace App\Controllers\Admin;
    use CodeIgniter\Controller;
    use App\Models\Admin\Ouvidoria_model;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

class Ouvidoria extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
  
    public function index() {
        
            $freeToGO = pageAutorize(17);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }
      
        $model =  new Ouvidoria_model();

        $data = ['ouvidorias' => $model->getDados(),
                 'title'      => 'Ouvidoria - Denúncias',
        ];

        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');
        }
        
        
        return view('admin/ouvidoria/index', $data);

    }


    public function getProtocolo() {
        
        //Buscar por protocolo pelo usuario
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('protocolo');
        }

        $model =  new Ouvidoria_model();
        $data =  $model->getProtocoloDados($id);

           
        print json_encode($data);

    }


    public function create($id=NULL) {
        
        $freeToGO = pageAutorize(17);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model =  new Ouvidoria_model();
        $data = [
            'ouvidoria'=> $model->doCreate($id),
            'title'    => "Editar Ouvidoria",
        ];
          
        return view('admin/ouvidoria/modulo' ,$data);
      
    }


    public function core() {

          
        $id = $this->request->getVar('id');

        $model = new Ouvidoria_model();

        if (!empty($id)){ 

            $dados['id']  = $id;
            $dados['status']  = $this->request->getVar('status');
            $dados['resposta']  = $this->request->getVar('resposta');

            $model->save($dados);
            setMsg('msg', 'Solicitação atualizada','sucesso');
            return redirect()->to(base_url('/admin/ouvidoria')); 
            
        }else { 
            $fileName=null;
            $dados['nome']      = $this->request->getVar('nome');
            $dados['categoria'] = $this->request->getVar('categoria'); 
            $dados['mensagem']  = $this->request->getVar('mensagem');
            $dados['protocolo'] = uniqid();
            //Upload do anexo    
            $img  = $this->request->getFile('imagem');

                if (isset($img)){
                    if ($img->isValid() && ! $img->hasMoved())
                    {
                        $fileName = $img->getRandomName();
                        $img->move('uploads/ovd', $fileName);
                        
                        };
                }

            $dados['file'] = $fileName;
            
            $id = $model->insert($dados);

            $protocolo = $model->getProtocolo($id);
            
            if ($dados['categoria']=="Assédio Sexual"){
                $to = 'assedio@terragoyana.com.br';
            }else {
                $to = 'fagnersi@gmail.com';
            }
            $mensagem = $dados['mensagem'];

            //Send Notification
            $name = 'Ouvidoria';
            $message = 'Nova denúncia cadastrada na Intranet';

            $this->sendNotification($to, $name,$message);

            setMsgFront('msg', 'Anote o numero do seu protocolo - '.$protocolo->protocolo.'','sucesso');
        }
      
        return redirect()->to(base_url('/ouvidoria')); 
    }

    

    public function del($id=NULL) {
        
        $freeToGO = pageAutorize(17);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
        } 
        $db      = \Config\Database::connect();
        $builder = $db->table('int_ouvidoria');
        
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
                
                //print_r($mail->ErrorInfo);
               
            }
        
        }
}


