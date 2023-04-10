<?php 
namespace App\Controllers\Front;
use CodeIgniter\Controller;
use App\Models\Front\siteConfig_model;
use App\Models\Front\Banners_model;
use App\Models\Front\Pagina_model;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Home extends Controller
{
    protected $helpers = ['auth','Funcoes','text'];
   
	public function index()
	{
        
 		$model            = new siteConfig_model();
 		$model_banner     = new Banners_model();
 		$model_pagina     = new Pagina_model();

        $data = [
            'dados'       => $model->getDados(),
            'menu'        => $model->getLinks(),
            'noticias'    => $model_pagina->getNews(2,4,'desc'),
            'comunicados' => $model_pagina->getComunicados(8,4,'desc'),
            'sobre'       => $model_pagina->getTexto(175),
        ];
       
        return view('front/intranet/content', $data);
		
	}

    //--------------------------------------------------------------------
	
    public function contato()
	{
        $model            = new siteConfig_model();
        $model_banner     = new Banners_model();
        $model_pagina     = new Pagina_model();

       $data = [
           'dados'        => $model->getDados(),
           'banners'      => $model_banner->getDados('3'),
           'popup'        => $model_banner->getDados('2'),
           'menu'         => $model->getLinks(),
           'galeria'      => $model_pagina->getTexto(100),
           'sobre'        => $model_pagina->getTexto(99),
       ];
     
        return view('front/contato/index', $data);
		
    }
    public function curriculo()
	{
        helper('text','Funcoes');
        $model            = new siteConfig_model();
        $model_pagina      = new Pagina_model();

       $data = [
            'dados'    => $model->getDados(),
            'noticias' => $model_pagina->getNews(6,5,'asc'),
            'servicos' => $model_pagina->getNews(7,10,'asc'),
       ];
     
        return view('front/site/curriculo', $data);
		
    }
    
    public function enviarCurriculo() {
       
        $model = new \App\Models\Categorias_model();
        $rules=['nome' => 'required' ];
        $img  = $this->request->getFile('imagem');

        $nome = NULL;
        if (isset($img)){
            if ($img->isValid() && ! $img->hasMoved())
            {
                  $nome = $img->getRandomName();
                  $img->move('uploads/curriculos', $nome);
                 
                };
        }
       
        if ($this->validate($rules)){
            $dados_salvar['nome']     = $this->request->getVar('nome');
            $dados_salvar['email']    = $this->request->getVar('email');
            $dados_salvar['fone']     = $this->request->getVar('fone');
            $dados_salvar['curriculo'] = $nome;
          
            $db      = \Config\Database::connect();
            $builder = $db->table('curriculo');
            $builder->insert($dados_salvar);
           
        }
        else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Erro ao enviar.');    
        }

        $session = session();
        $session->setFlashdata('msg', 'Seu currículo foi envaido com sucesso !', 'sucesso');
    
        return redirect()->to(base_url().'/curriculo'); 

    }
	
	//--------------------------------------------------------------------
		
 public function sendEmail(){
   
            $nome = service('request')->getPost('nome');
            $email = service('request')->getPost('email');
            $fone = service('request')->getPost('fone');
            $para = 'fagnersi@gmail.com';
            $mensagem = service('request')->getPost('mensagem');
            $adminSite = 'fagnersi@gmail.com';
       
                  
        $mailContent = '
            <h2>Email de Contato enviado pelo Site</h2>
            <p>Fone: '.$fone.'</p>
            <p>'.$mensagem.'</p>
        ';

		// mailer
        $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.vectorzero.com.br';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'enviado@vectorzero.com.br';                     //SMTP username
                $mail->Password   = 'enviado123@';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('enviado@vectorzero.com.br', $nome);
                $mail->addAddress($adminSite);               //Name is optional
                $mail->addReplyTo($email, 'Reposta email site');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Mensagem enviada pelo site';
                $mail->Body    = $mailContent;
                $mail->AltBody = $mailContent;

                 $mail->send();
                
                 $retorno = [
                    'erro' => 0,
                    'msg'  => 'Mensagem enviada com sucesso'
                    ];
                    
                } catch (Exception $e) {
                $retorno = [
                    'erro' => 1,
                    'msg'  => $mail->ErrorInfo
                    ];
               
            }
        
            // mailer
            
            echo json_encode($retorno);
            exit;
   }



}