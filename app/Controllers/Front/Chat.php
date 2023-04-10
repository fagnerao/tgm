<?php namespace App\Controllers\Front;
    use CodeIgniter\Controller;
    use App\Models\Front\Categorias_model;
    use App\Models\Front\Pagina_model;
    use App\Models\Front\siteConfig_model;
    use App\Models\Front\Chat_model;

class Chat extends Controller
{
    protected $helpers = ['auth','Funcoes','text'];
   
	public function index()
	{
        
        $freeToGO = pageAutorize(31);
          if(!$freeToGO){
              setMsgFront('msg', 'Você não possui acesso a essa página','erro');
             return redirect()->to(base_url().'/admin/painel'); 
          }
 		$model            = new siteConfig_model();
        $data = [
            'dados'       => $model->getDados(),
            'menu'        => $model->getLinks(),
          
        ];
       
        return view('front/chat/index', $data);
		
	}



	public function chatWith()
	{
        
        $freeToGO = pageAutorize(31);
        if(!$freeToGO){
            setMsgFront('msg', 'Você não possui acesso a essa página','erro');
           return redirect()->to(base_url().'/admin/painel'); 
        }



        $myUniqueId = session()->get('unique_id');

        
        $id_chat = $this->request->uri->getSegment(2);

    
        $output = "";

        $model            = new siteConfig_model();
        $model_chat            = new Chat_model();
        $data = [
          'dados'       => $model->getDados(),
          'menu'        => $model->getLinks(),
          'chatUser'    => $model_chat->getDados($id_chat),
                 
      ];
     
      return view('front/chat/chatWith', $data);
    }
        




	public function getUsers()	{
        
        $freeToGO = pageAutorize(31);
          if(!$freeToGO){
              setMsgFront('msg', 'Você não possui acesso a essa página','erro');
             return redirect()->to(base_url().'/admin/painel'); 
          }
        
          $model_chat     = new Chat_model();
          $myUniqueID = session()->get('unique_id');
          
          $db = db_connect();
          $data = $db->query('SELECT * FROM vz_users WHERE NOT unique_id = '.$myUniqueID.' ORDER BY id DESC')->getResult();
         
          $output = '';

          if(empty($data)) {
              $output .= "Nenhum usuário online";
          }

        foreach($data as $dt){

            // busca conversas
            $ultimas_msgs = $db->query("SELECT * FROM messages WHERE (incoming_msg_id = $dt->unique_id
                    OR outgoing_msg_id = $dt->unique_id) AND (outgoing_msg_id = $myUniqueID 
                    OR incoming_msg_id = $myUniqueID) ORDER BY msg_id DESC LIMIT 1")->getResult();
                       
                (!empty($ultimas_msgs)) ? $msg = $ultimas_msgs[0]->msg : $msg ="Sem mensagens";

                if(isset($ultimas_msgs[0]->outgoing_msg_id)){
                    ($myUniqueID == $ultimas_msgs[0]->outgoing_msg_id) ? $you = "<span class='font-semibold'>Você:</span> " : $you = "";
                }else{
                    $you = "";
                }
              
                ($dt->status == "Offline") ? $status = "text-gray-900" : $status = "text-green-500";
                ($myUniqueID == $dt->unique_id) ? $hid_me = "hide" : $hid_me = "";
                (!empty($ultimas_msgs[0]->img)) ? $avatar= $ultimas_msgs[0]->img : $avatar = "user.png";

                $output .= '<li class="w-full"><a href="/chatWith/'. $dt->unique_id .'" class="mb-3 flex font-sans">
                                <div class="flex align-center bg-gray-50 px-2 py-2 gap-4 rounded-2xl">
                                <img src="uploads/avatar/'.$avatar.'" alt="" class="w-[40px] h-[40px] bg-white p-2 rounded-full">
                                    <div class="font-medium ml-3 min-w-[350px]">
                                        <span>'. $dt->name .'</span>
                                        <span class="ml-2 mt-[-7px] '. $status .'"><i class="ri-record-circle-fill"></i></span>
                                        <p class="flex-row">'. $you . $ultimas_msgs[0]->msg .'</p>
                                    </div>
                            </a></li>';
            }
        
           
        echo  $output ;
		
	}



            
public function getMessages()
{
    
    $freeToGO = pageAutorize(31);
    if(!$freeToGO){
        setMsgFront('msg', 'Você não possui acesso a essa página','erro');
       return redirect()->to(base_url().'/admin/painel'); 
    }

    $myUniqueId = session()->get('unique_id');

    $chat_id = $this->request->getPost('chat_id');
    
    $db = db_connect();
    $data = $db->query('SELECT * FROM messages LEFT JOIN vz_users ON vz_users.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = '.$myUniqueId.' AND incoming_msg_id = '.$chat_id.')
            OR (outgoing_msg_id = '.$chat_id.' AND incoming_msg_id = '.$myUniqueId.') ORDER BY msg_id')->getResult();

    $output = "";

    if(empty($data)) {
        $output .= "Sem mensagens no momento";
    }

    foreach ($data as $dt){
        (!empty($dt->img))? $avatar = $dt->img : $avatar = "user.png";

        if($dt->outgoing_msg_id === $myUniqueId){
            $output .= '<div class="chat outgoing">
                            <div class="details">
                                <p>'. $dt->msg .'</p>
                            </div>
                        </div>';
        }else{
            $output .= '<div class="chat incoming">
                        <img src="/uploads/avatar/'.$avatar.'" alt="">
                            <div class="details">
                                <p>'. $dt->msg .'</p>
                            </div>
                        </div>';
        }
  
    }
    echo $output;

 
}



public function searchUser()
{
    
    $freeToGO = pageAutorize(31);
    if(!$freeToGO){
        setMsgFront('msg', 'Você não possui acesso a essa página','erro');
       return redirect()->to(base_url().'/admin/painel'); 
    }

    $myUniqueId = session()->get('unique_id');

    $searchTerm = $this->request->getPost('searchTerm');

    $db = db_connect();
    $data = $db->query("SELECT * FROM vz_users WHERE NOT unique_id = $myUniqueId AND (name LIKE '%$searchTerm%')")->getResult();

    $output = "";

    if(empty($data)) {
        $output .= "Usuário não encontrado";
    }

    foreach($data as $dt){

        // busca conversas
        $ultimas_msgs = $db->query("SELECT * FROM messages WHERE (incoming_msg_id = $dt->unique_id
                OR outgoing_msg_id = $dt->unique_id) AND (outgoing_msg_id = $myUniqueID 
                OR incoming_msg_id = $myUniqueID) ORDER BY msg_id DESC LIMIT 1")->getResult();
               
            if(isset($ultimas_msgs[0]->outgoing_msg_id)){
                ($myUniqueID == $ultimas_msgs[0]->outgoing_msg_id) ? $you = "Você: " : $you = "";
            }else{
                $you = "";
            }

            ($dt->status == "Offline") ? $status = "text-gray-900" : $status = "text-green-500";
            ($myUniqueID == $dt->unique_id) ? $hid_me = "hide" : $hid_me = "";
            (!empty($ultimas_msgs[0]->img)) ? $avatar= $ultimas_msgs[0]->img : $avatar = "user.png";

            $output .= '<a href="/chatWith/'. $dt->unique_id .'" class="py-5">
                            <div class="flex align-center bg-gray-100 px-2 py-2 gap-4 rounded-2xl">
                            <img src="uploads/avatar/'.$avatar.'" alt="" class="w-[40px] h-[40px]">
                            <div class="font-medium gap-5">
                                <span>'. $dt->name .'</span>
                                <p>'. $you . $ultimas_msgs[0]->msg .'</p>
                            </div>
                            <div class="pt-2 ml-2 '. $status .'"><i class="ri-record-circle-fill"></i></div>
                        </a>';
    }
       
    echo  $output ;

 
}



public function insertChat()
        {
            
            $freeToGO = pageAutorize(31);
            if(!$freeToGO){
                setMsgFront('msg', 'Você não possui acesso a essa página','erro');
            return redirect()->to(base_url().'/admin/painel'); 
            }

            $myUniqueId = session()->get('unique_id');

            $chat_id = $this->request->getPost('incoming_id');
            $message = $this->request->getPost('message');

            
            $db = db_connect();
            $data = $db->query("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
            VALUES ('$chat_id', '$myUniqueId', '$message')");

        echo'<pre>';
        print_r($data);
        echo'</pre>';

        
        }
            
  
   
}
