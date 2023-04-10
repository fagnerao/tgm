<?php
    function setMsg($id, $msg, $tipo){
        
        switch ($tipo) {
            case 'erro':
                $session = session();
                $session->setFlashdata($id,'<div class="alert alert-error" role="alert">
                <h4 class="alert-heading">Ops!</h4><hr>
                <p class="mb-0">'.$msg.'</p>
              </div>');
                
                break;
             case 'sucesso':
                $session = session();
                $session->setFlashdata($id,'<div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Sucesso!</h4><hr>
                <p class="mb-0">'.$msg.'</p>
              </div>'); 
                break;
            }
            return FALSE;
        
    }
    function setMsgFront($id, $msg, $tipo){
        
        switch ($tipo) {
            case 'erro':
                $session = session();
                $session->setFlashdata($id,'<div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                  <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" style="height:20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                  <div>
                    <p class="font-bold">Erro</p>
                    <p class="text-lg">'.$msg.'</p>
                  </div>
                </div>
              </div>');
                
                break;
             case 'sucesso':
                $session = session();
                $session->setFlashdata($id,'<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                  <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" style="height:20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                  <div>
                    <p class="font-bold">Sucesso</p>
                    <p class="text-lg">'.$msg.'</p>
                  </div>
                </div>
              </div>'); 
                break;
            }
            return FALSE;
        
    }
    
    function getMsg($id){
        $CI =& get_instance();
        if ($CI->session->flashdata($id)) {
            echo $CI->session->flashdata($id);
        } 
        
    }

    function errosValidacao(){
        if (validation_errors()){
        echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
              
        }

    }
    function formataDataDb($data=NULL){
        if ($data){
            $data = explode("/", $data);
            $dia = $data[0];
            $mes = $data[1];
            $ano = $data[2];
            
            return $ano.'-'.$mes.'-'.$dia;
        }
    }

    function dateTimeBr ($data=null){
        $newDate = date("d-m-Y", strtotime($data));

        return $newDate;
    }
    function dateTimeAgenda ($data=null){
        $newDate = date("d-M-Y H:m", strtotime($data));

        return $newDate;
    }

    function formataDataView($data=NULL){
        if ($data){
            $data = explode("-", $data);
            $ano = $data[0];
            $mes = $data[1];
            $dia = $data[2];
            
            return $dia.'/'.$mes.'/'.$ano;
        }
    }

    function formataMoedaReal($valor=NULL, $real=FALSE){

        if ($valor){
            $valor = ($real == TRUE ? 'R$ ' : ''). number_format($valor, 2 , ',' ,'.');
            return $valor;
        }
    }

    function formatoDecimal($valor=NULL){
            $valor = str_replace('.','', $valor);
            $valor = str_replace(',','.', $valor);
            return $valor;
   }

   function dataDiaDb(){
    
    $formato = 'DATE_W3C';
    $hora    = time();
    return standard_date($formato, $hora); 
    }

    function dataDb(){
        
        $stringdedata = "%Y-%m-%d";
        $data         = time();
        $data         = mdate($stringdedata, $data);
        return $data; 
        }

    function slug($string=NULL){
            $string = remove_acentos($string);
            return url_title($string, '-', TRUE);
        }
        
    function remove_acentos($string=NULL){
            $procurar    = array('À','Á','Ã','Â','É','Ê','Í','Ó','Õ','Ô','Ú','Ü','Ç','à','á','ã','â','é','ê','í','ó','õ','ô','ú','ü','ç');
            $substituir  = array('a','a','a','a','e','r','i','o','o','o','u','u','c','a','a','a','a','e','e','i','o','o','o','u','u','c');
            return str_replace($procurar, $substituir, $string);
        }
    function loga($str){
        file_put_contents('C:/xampp/htdocs/site/log.txt', $str.PHP_EOL, FILE_APPEND);
    }

    function limpaString($string=NULL){
        if($string){
            return preg_replace("/[^0-9\s]/", "",$string);
        }
    }

    function pageAutorize($access){
        $auth = session()->get('group');
        return ($access & $auth);
    }


    
?> 