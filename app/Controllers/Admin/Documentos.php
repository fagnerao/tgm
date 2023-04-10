<?php namespace App\Controllers\Admin;

use CodeIgniter\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Documentos extends Controller{
    
    protected $helpers = ['auth','Funcoes','text'];
  
    public function index() {
        
            $freeToGO = pageAutorize(65);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        

        $model = new \App\Models\Admin\Documentos_model();
        $data = ['documentos' => $model->getDados(),
                 'title' => 'Lista de Documentos',
        ];
    

         if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na consulta');
        }
        
        
        return view('admin/documentos/index', $data);

    }


    public function create($id=NULL) {
        
        $freeToGO = pageAutorize(65);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Documentos_model();
        $data = [
            'documento' => $model->doCreate($id),
            'title'    => "Editar/Criar Documento",
        ];
          
        return view('admin/documentos/modulo' ,$data);
      
    }

    

    public function core() {
        
        $freeToGO = pageAutorize(65);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Documentos_model();
        $rules=['titulo' => 'required' ];
      
        if ($this->validate($rules)){
            $dados_salvar['id']           = $this->request->getVar('id');
            $dados_salvar['id_dep']       = $this->request->getVar('id_dep');
            $dados_salvar['titulo']       = $this->request->getVar('titulo');

            $model->save($dados_salvar);
           
        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro na inserção');    
        }
        setMsg('msg', 'Registro atualizado com sucesso','sucesso');
    
       //Send Notification
       $to = 'subaco@gmail.com';
       $name = session()->get('name');
       $message = 'Novo documento criado na intranet';

       $this->sendNotification($to, $name,$message);

        return redirect()->to(base_url().'/admin/documentos'); 

    }


    public function arquivos($id=NULL) {
        
        $freeToGO = pageAutorize(65);
        if(!$freeToGO){
           setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }
        $id  = $this->request->getVar('id');

        $model_doc = new \App\Models\Admin\Documentos_model();
        $model_arq = new \App\Models\Admin\Arquivos_model();

        $data = [
            'documento' => $model_doc->getDados($id),
            'arquivos'  => $model_arq->getDados($id),
            'title'    => "Enviar Arquivos",
        ];
          
 
        return view('admin/documentos/arquivos' ,$data);
      
    }

    public function upload() {
        
        $freeToGO = pageAutorize(65);
        if(!$freeToGO){
            setMsg('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }

        $model = new \App\Models\Admin\Arquivos_model();
        $rules=['titulo' => 'required' ];
        
        $file  = $this->request->getFile('imagem');

        $nome = NULL;
        if (isset($file)){
            if ($file->isValid() && ! $file->hasMoved())
            {
                  $nome = $file->getRandomName();
                  $file->move('uploads/documentos', $nome);
                 
                };
        }
       
        $id_doc = $this->request->getVar('id_doc');
      
        if ($this->validate($rules)){
            $dados_salvar['id']      = $this->request->getVar('id');
            $dados_salvar['id_doc']  = $id_doc;
            $dados_salvar['id_user'] = $this->request->getVar('id_user');
            $dados_salvar['titulo']  = $this->request->getVar('titulo');

            if(isset($nome)){
                $dados_salvar['file'] = $nome;
            }
           
            $model->save($dados_salvar);
           
        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro no cadastro do arquivo');    
        }
        setMsg('msg','Registro atualizado' , 'sucesso');
    
        return redirect()->to(base_url().'/admin/documentos/arquivos/'.$id_doc); 

    }

    public function del($id=NULL) {
        $freeToGO = pageAutorize(65);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
        } 
        $db      = \Config\Database::connect();
        $builder = $db->table('int_documentos');
        
        if ($builder->delete(['id' => $id])){
            echo json_encode( TRUE );
        }
        else echo json_encode( FALSE );

    }


    public function delArquivo($id=NULL) {
        $freeToGO = pageAutorize(65);
            if(!$freeToGO){
                setMsg('msg', 'Você não possui acesso a essa página','erro');
               return redirect()->to(base_url().'/admin/painel'); 
            }

        if ($this->request->isAJAX()) {
            $id = service('request')->getPost('id');
        } 
        $db      = \Config\Database::connect();
        $builder = $db->table('int_arquivos');
        $delete  = $builder->delete(['id' => $id]);

        //Send Notification of deleted
        $to = 'subaco@gmail.com';
        $name = session()->get('name');
        $message = 'O arquivo - '.$id.' foi deletado do sistema';

        $this->sendNotification($to, $name,$message);


        if ($delete){
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


