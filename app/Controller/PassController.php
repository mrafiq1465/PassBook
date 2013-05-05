<?php
App::uses('AppController', 'Controller');
/**
 * Pass Controller
 *
 * @property Pass $Pass
 */
class PassController extends AppController
{


    public function index()
    {

    }

    public function create($action = 'event')
    {
        $pass_type = $this->Pass->PassType->find('first',array(
            'recursive' => -1,
            'conditions' => array(
                'name' => $action
            ),
        ));
        $pass_type_id = $pass_type['PassType']['id'];

        if ($this->request->is('post')) {
            $this->autoRender = false;
            $this->Pass->create();
            $this->request->data['Pass']['pass_type_id'] = $pass_type_id;

            # set label color same as foreground color
            # as label_color field is being removed
            $this->request->data['Pass']['labelColor'] = $this->request->data['Pass']['foregroundColor'];

            //settting default values for some fields that must be a JS array to work with KENDO MVVM
            $this->request->data['Pass']['primaryFields'] = '[]';
            $this->request->data['Pass']['secondaryFields'] = '[]';
            $this->request->data['Pass']['auxiliaryFields'] = '[]';
            $this->request->data['Pass']['backFields'] = '[]';
            $this->request->data['Pass']['locations'] = '[]';

            if ($this->isLoggedIn()) {
                $this->request->data['Pass']['user_id'] = $this->user_id();
            }
            if ($this->Pass->save($this->request->data)) {
                $this->ajax_response(array('success' => array('id' => $this->Pass->id)));
            } else {
                $this->ajax_response(array('error' => __('The user could not be saved. Please, try again.')));
            }
        }
    }

    public function edit($id, $step = 'step1')
    {
        if (empty($id)) {
            throw new NotFoundException(__('Invalid id'));
        }
        $this->Pass->id = $id;
        $pass = $this->Pass->read();
        $user_id = $pass["Pass"]["user_id"];


        if(!empty($user_id) && $this->user_id() != $user_id ){

        }
        else{
           // $this->redirect('/pass/edit/'.$id.'/step5');
        }

        if (!$this->Pass->exists()) {
            throw new NotFoundException(__('Invalid pass'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->autoRender = false;
            $this->Pass->read();

            if (isset($this->request->query['remove'])) {
                $remove_field = $this->request->query['remove'];
                preg_match('/data\[(.+)\]/',$remove_field,$remove_field_array);
                $remove_field = $remove_field_array[1];
                if (!empty($this->Pass->data['Pass'][$remove_field])) {
                    unlink(WWW_ROOT . $this->Pass->data['Pass'][$remove_field]);
                    $this->Pass->data['Pass'][$remove_field] = '';
                    $this->Pass->save($this->Pass->data);
                    $this->ajax_response(array('success' => true));
                }
            } else {
                foreach ($this->request->data as $k=>$val) {
                    if ((isset($val['error']) && $val['error'] == 0) ||
                        (!empty( $val['tmp_name']) && $val['tmp_name'] != 'none' && is_uploaded_file($val['tmp_name']))
                    ) {
                        $uploaded_field = $k;
                    }
                }
                //var_dump($this->request->data);
                if (isset($uploaded_field)) {
                    usleep(300000);
                    $destination_dir = WWW_ROOT . "data" . DS . $id . DS;
                    if (!is_dir($destination_dir)) {
                        mkdir($destination_dir, 0777, true);
                    }

                    if (strstr($uploaded_field, 'Retina')) $file_name = str_replace('ImageRetina','@2x', $uploaded_field);
                    else $file_name = str_replace('Image','',$uploaded_field);

                    if($file_name == "logo@2x") {
                        $destination_path_icon_2x = $destination_dir . "icon@2x.png";
                        $destination_path_icon = $destination_dir . "icon.png";
                        $destination_path_logo = $destination_dir . "logo.png";
                        copy($this->request->data[$uploaded_field]['tmp_name'], $destination_path_icon_2x);
                        copy($this->request->data[$uploaded_field]['tmp_name'], $destination_path_icon);
                        copy($this->request->data[$uploaded_field]['tmp_name'], $destination_path_logo);
                        $this->Pass->data['Pass']['iconImageRetina'] = str_replace(WWW_ROOT, '', $destination_path_icon_2x);
                        $this->Pass->data['Pass']['iconImage'] = str_replace(WWW_ROOT, '', $destination_path_icon);
                        $this->Pass->data['Pass']['logoImage'] = str_replace(WWW_ROOT, '', $destination_path_logo);

                        // Image resize
                        $image = new SimpleImage();
                        $image->load($destination_path_logo);

                        // for logo
                        $image->resizeToWidth(130);
                        $image->save($destination_path_logo);

                        // for icon
                        $image->resizeToWidth(130);
                        $image->save($destination_path_icon);

                        // for icon 2x
                       #$image->resizeToWidth(200);
                       #$image->save($destination_path_logo);

                        // for other goes here

                    }
                    if($file_name == "strip@2x") {
                        $destination_path_strip = $destination_dir . "strip.png";
                        copy($this->request->data[$uploaded_field]['tmp_name'], $destination_path_strip);

                        $image = new SimpleImage();
                        $image->load($destination_path_strip);

                        // for strip
                        $image->resizeToWidth(320);
                        $image->save($destination_path_strip);

                        $image->save($destination_path_strip);
                        $this->Pass->data['Pass']['stripImage'] = str_replace(WWW_ROOT, '', $destination_path_strip);
                    }

                    $destination_path = $destination_dir . "$file_name.png";

                    move_uploaded_file($this->request->data[$uploaded_field]['tmp_name'], $destination_path);
                    $this->Pass->data['Pass'][$uploaded_field] = str_replace(WWW_ROOT, '', $destination_path);
                    $this->Pass->save($this->Pass->data);
                } else {
                    $this->encodeDynamicFields($this->request->data);

                    # set label color same as foreground color
                    # as label_color field is being removed
                    if (isset($this->request->data['Pass']['foregroundColor'])) {
                        $this->request->data['Pass']['labelColor'] = $this->request->data['Pass']['foregroundColor'];
                    }

                    $this->Pass->save($this->request->data);
                }
            }

            if (isset($destination_path)) $this->ajax_response(array('success' => '/' . str_replace(WWW_ROOT, '', $destination_path)));
            else $this->ajax_response(array('success' => $id));
        }

        $this->request->data = $this->Pass->read(null, $id);
        $this->decodeDynamicFields($this->request->data);

        $step = substr($step, 4);

        $barcodeFormats = $this->Pass->BarcodeFormat->find('list');

        $user_data = $this->Session->read('User');

        $this->set(compact('step', 'barcodeFormats','user_data'));
    }

    public function generate_pass($id)
    {
        $this->autoRender = false;

        if ($this->request->is('post') || $this->request->is('put')) {
            $to = $this->request->data['email'];
            if (empty($to)) {
                die(json_encode(array('error' => 'email not given')));
            }
            $pass = $this->Pass->generate_pass($id);
            if (!isset($pass['error'])) {
                App::uses('CakeEmail', 'Network/Email');
                $email = new CakeEmail();
                $email->from(array(SITE_EMAIL => SITE_NAME));
                $email->to($to);
                $email->subject('Pass file');
                $email->attachments($pass['path']);
                $email->send('My message');
                $this->ajax_response(array('success' => true));
            } else {
                $this->ajax_response(array('error' => $pass['error']));
            }
        } else {
            $this->ajax_response(array('error' => 'Invalid method'));
        }

    }

    public function encodeDynamicFields(&$data)
    {
        $step = isset($data['step']) ? $data['step'] : 0;

        if (isset($data['Pass']['primaryFields']))
            $data['Pass']['primaryFields'] = json_encode(array_merge(array_filter($data['Pass']['primaryFields'],array($this, 'check_all_keys_values'))));
        else if ($step == 2)
            $data['Pass']['primaryFields'] = '[]';

        if (isset($data['Pass']['secondaryFields'])) $data['Pass']['secondaryFields'] = json_encode(array_merge(array_filter(
            $data['Pass']['secondaryFields'],
            array($this, 'check_all_keys_values'))));
        else if ($step == 2)
            $data['Pass']['secondaryFields'] = '[]';

        if (isset($data['Pass']['auxiliaryFields']))$data['Pass']['auxiliaryFields'] = json_encode(array_merge(array_filter(
            $data['Pass']['auxiliaryFields'],
            array($this, 'check_all_keys_values'))));
        else if ($step == 2)
            $data['Pass']['auxiliaryFields'] = '[]';

        if (isset($data['Pass']['backFields'])) $data['Pass']['backFields'] = json_encode(array_merge(array_filter(
            $data['Pass']['backFields'],
            array($this, 'check_all_keys_values'))));
        else if ($step == 3)
            $data['Pass']['backFields'] = '[]';

        if (isset($data['Pass']['locations'])) $data['Pass']['locations'] = json_encode(array_merge(array_filter(
            $data['Pass']['locations'],
            array($this, 'check_all_keys_values'))));
        else if ($step == 4)
            $data['Pass']['locations'] = '[]';
    }
    public function decodeDynamicFields(&$data)
    {
        if (!empty($data['Pass']['primaryFields'])) {
            $data['Pass']['primaryFields'] = json_decode($data['Pass']['primaryFields'],1);
        }
        if (!empty($data['Pass']['secondaryFields'])) {
            $data['Pass']['secondaryFields'] = json_decode($data['Pass']['secondaryFields'],1);
        }
        if (!empty($data['Pass']['auxiliaryFields'])) {
            $data['Pass']['auxiliaryFields'] = json_decode($data['Pass']['auxiliaryFields'],1);
        }
        if (!empty($data['Pass']['backFields'])) {
            $data['Pass']['backFields'] = json_decode($data['Pass']['backFields'],1);
        }
        if (!empty($data['Pass']['locations'])) {
            $data['Pass']['locations'] = json_decode($data['Pass']['locations'],1);
        }

    }

    public function check_all_keys_values($item)
    {
        foreach ($item as $v) {
            if ($v == '' || is_null($v)) {
                return false;
            }
        }
        return true;
    }

    public function web_pass($id = null)
    {
        $this->layout = 'web_pass';

        $iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
        $webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");

        $download_link = false;
        if( $iPad || $iPhone ){
             $download_link = true;
        }else if($iPod){
            //increase the count
        }else if($Android){
            //increase the count
        }else if($webOS){
            // Just show the pass
        }

        $this->request->data = $this->Pass->read(null, $id);
        $this->decodeDynamicFields($this->request->data);
        $barcodeFormats = $this->Pass->BarcodeFormat->find('list');
        $this->set(compact('barcodeFormats','download_link'));
    }

    public function web($id = null)
    {
        $this->layout = 'web_pass';

       // $status = $this->update_download_history($id);

        $this->request->data = $this->Pass->read(null, $id);

        $this->decodeDynamicFields($this->request->data);
        $barcodeFormats = $this->Pass->BarcodeFormat->find('list');
        //print_r( $this->request->data);
        $this->set(compact('barcodeFormats'));
    }

    public function download_pkpass($id = null) {
        $this->autoRender = false;

        $status = $this->update_download_history($id);

        $data_path = APP . 'data' . DS;
        $pkpass_file = $data_path . 'passes/' . $id . '/pass.pkpass';

        header("Pragma: no-cache");
        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/vnd.apple.pkpass");
        header('Content-Disposition: attachment; filename="pass.pkpass"');
        clearstatcache();
        $filesize = filesize($pkpass_file);
        if ($filesize)
            header("Content-Length: ". $filesize);
        header('Content-Transfer-Encoding: binary');
        if (filemtime($pkpass_file)) {
            date_default_timezone_set("UTC");
            header('Last-Modified: ' . date("D, d M Y H:i:s", filemtime($pkpass_file)) . ' GMT');
        }
        flush();
        readfile($pkpass_file);
    }

    public function update_download_history($pass_id) {
        $this->autoRender = false;

        $this->Pass->id = $pass_id;
        $pass =  $this->Pass->read(null, $pass_id);

        $pass_updated = $pass["Pass"]['updated'];

        $pass_download_count = $pass["Pass"]['download_count'];

        $cookie_name = 'flypass_'.$pass_id;
        $browser_cookie = '';
        if (isset($_COOKIE[$cookie_name])){
            $browser_cookie = $_COOKIE[$cookie_name];
        }

        $pass_download = $this->Pass->Download->find('first', array('recursive' => -1, 'conditions' => array('Download.pass_id' => $pass_id,'Download.browser_cookie' => $browser_cookie, 'Download.created >'=> $pass_updated)));


        if(empty($pass_download)){
            $browser_cookie = uniqid();

            $response = $this->Pass->Download->save(array(
                'pass_id' => $pass_id,
                'browser_cookie' => $browser_cookie,
                'device' => '',
                'browser' => ''
            ));

            if($response){
                $this->Pass->id = $pass_id;
                $response = $this->Pass->save(array(
                    'download_count' => $pass_download_count+1
                ));
            }
            setcookie($cookie_name, $browser_cookie, time()+360000);

        } else {

        }

        return 'success';

    }

    public function payment_status($pass_id) {
        $pass_data = $this->Pass->Payment->find('first', array(
            'recursive' => -1,
            'conditions' => array(
                'pass_id' => $pass_id,
            ),
        ));
        $this->ajax_response(array('result' => !empty($pass_data)));
    }

    public function download_report($id = null){

        $this->autoRender = false;

        $this->Pass->id = $id;
        if (!$this->Pass->exists()) {
            throw new NotFoundException(__('Invalid pass'));
        }
        $rows[] = array_keys($this->Pass->Download->getColumnTypes());

        $pass_download = $this->Pass->Download->find('all', array('recursive' => -1, 'conditions' => array('Download.pass_id' => $id)));

        foreach ($pass_download as $d) {
            $rows[] = $d['Download'];
        }

        $temp_file_name = '/tmp/' . mt_rand(1, 1000000000) . '.csv';
        $fp = fopen($temp_file_name, 'w');
        foreach ($rows as $row) {
            fputcsv($fp, $row);
        }
        fclose($fp);
        $FileName = 'Pass-download-' . date("d-m-y") . '.csv';
        header('Content-Disposition: inline; filename="' . $temp_file_name . '"');
        header("Content-Transfer-Encoding: Binary");
        header("Content-length: " . filesize($temp_file_name));
        header('Content-Type: application/excel');
        header('Content-Disposition: attachment; filename="' . $FileName . '"');
        readfile($temp_file_name);

    }

    public function update_download_limit(){
        $this->autoRender = false;
        $pass_id = $this->request->data['pass_id'];
        $limit = $this->request->data['limit'];

        $this->Pass->id = $pass_id;
        $success = $this->Pass->save(array(
                'download_limit' => $limit,
        ));
        $success = true;
        $this->response->type('json');
        $this->RequestHandler->respondAs('json');
        //echo json_encode(array('response' => !empty($success)));
        $this->ajax_response(array('success' => true));

    }

    public function update_pass_user(){
        $this->autoRender = false;
        $pass_id = $this->request->data['pass_id'];
        $user_id = $this->request->data['user_id'];

        $this->Pass->id = $pass_id;
        $success = $this->Pass->save(array(
            'user_id' => $user_id,
        ));
        $success = true;
        $this->response->type('json');
        $this->RequestHandler->respondAs('json');
        $this->ajax_response(array('success' => true));

    }
}

class SimpleImage {

   var $image;
   var $image_type;

   function load($filename) {

      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {

         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {

         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {

         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {

      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {

         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {

         imagepng($this->image,$filename);
      }
      if( $permissions != null) {

         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {

      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {

         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {

         imagepng($this->image);
      }
   }
   function getWidth() {

      return imagesx($this->image);
   }
   function getHeight() {

      return imagesy($this->image);
   }
   function resizeToHeight($height) {

      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }

   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }

   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }

   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }

}
