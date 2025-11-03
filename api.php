<?php
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

$CONFIG_FILE = __DIR__ . '/config.json';

function detect_default_projects_root(): string
{
  $laragon = getenv('LARAGON_ROOT');
  if ($laragon && is_dir($laragon . DIRECTORY_SEPARATOR . 'www')) {
    return rtrim($laragon . DIRECTORY_SEPARATOR . 'www', DIRECTORY_SEPARATOR);
  }
  $candidate = realpath(__DIR__ . '/../');
  if ($candidate && is_dir($candidate)) return $candidate;
  return __DIR__;
}

function default_config(): array
{
  return [
    "version"      => 1,
    "title"        => "Qohwah.id",
    "subtitle"     => "Smart Digital Solutions",
    "accent"       => "#00E5FF",
    "banner"       => "",
    "logoText"     => "Q",
    "logoImg"      => "",
    "projectsRoot" => detect_default_projects_root(),
    "topApps"      => [
      ["icon" => "bi bi-person-workspace", "title" => "Qohwah.id", "url" => "https://qohwah.id"],
      ["icon" => "bi bi-github", "title" => "GitHub", "url" => "https://github.com/izzi-digital"],
      ["icon" => "bi bi-youtube", "title" => "YouTube", "url" => "https://www.youtube.com/@qohwahid"],
      ["icon" => "bi bi-tiktok", "title" => "Tiktok", "url" => "https://www.tiktok.com/@qohwah_id"],
    ],
    "reminders"    => [
      "Selalu backup data penting Anda secara rutin.",
      "Periksa pembaruan keamanan untuk perangkat lunak yang Anda gunakan.",
      "Gunakan password yang kuat dan unik untuk setiap akun online Anda.",
      "Hindari mengklik tautan mencurigakan dalam email atau pesan.",
      "Pastikan untuk logout dari akun Anda setelah selesai menggunakan perangkat bersama.",
    ],
    "launch"       => [
      "pattern" => "http://localhost/{rel}/"
    ],
    "updatedAt"    => time(),
  ];
}

function ensure_config(string $file): array
{
  if (!file_exists($file)) {
    $cfg = default_config();
    file_put_contents($file, json_encode($cfg, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
    return $cfg;
  }
  $json = file_get_contents($file);
  $cfg = json_decode($json, true);
  if (!is_array($cfg)) {
    $cfg = default_config();
    file_put_contents($file, json_encode($cfg, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
    return $cfg;
  }
  $def = default_config();
  $merged = array_merge($def, $cfg);
  foreach (['topApps', 'reminders'] as $k) {
    if (!isset($merged[$k]) || !is_array($merged[$k])) $merged[$k] = $def[$k];
  }
  if (!isset($merged['launch']) || !is_array($merged['launch'])) $merged['launch'] = $def['launch'];
  if (empty($merged['projectsRoot'])) $merged['projectsRoot'] = $def['projectsRoot'];
  return $merged;
}

function save_config(string $file, array $payload): array
{
  $allowed = ['title', 'subtitle', 'accent', 'banner', 'logoText', 'logoImg', 'projectsRoot', 'topApps', 'reminders', 'launch'];
  $cfg = ensure_config($file);
  foreach ($allowed as $k) {
    if (array_key_exists($k, $payload)) $cfg[$k] = $payload[$k];
  }
  $cfg['updatedAt'] = time();
  $root = $cfg['projectsRoot'] ?? '';
  if ($root !== '' && (!is_dir($root))) {
    $cfg['projectsRoot'] = detect_default_projects_root();
  }
  file_put_contents($file, json_encode($cfg, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), LOCK_EX);
  return $cfg;
}

function has_child_dir(string $dir): bool
{
  $h = @opendir($dir);
  if (!$h) return false;
  while (($n = readdir($h)) !== false) {
    if ($n === '.' || $n === '..') continue;
    if (is_dir($dir . DIRECTORY_SEPARATOR . $n)) {
      closedir($h);
      return true;
    }
  }
  closedir($h);
  return false;
}

function list_dir_secure(string $base, string $rel = ''): array
{
  $baseReal = realpath($base);
  if ($baseReal === false) return ["ok" => false, "error" => "projectsRoot tidak valid."];

  $target = $baseReal;
  if ($rel !== '') {
    $candidate = realpath($baseReal . DIRECTORY_SEPARATOR . $rel);
    if ($candidate && str_starts_with($candidate, $baseReal)) {
      $target = $candidate;
    } else {
      return ["ok" => false, "error" => "Path di luar root."];
    }
  }
  if (!is_dir($target)) return ["ok" => false, "error" => "Path bukan direktori."];

  $items = [];
  $h = opendir($target);
  if ($h) {
    while (($name = readdir($h)) !== false) {
      if ($name === '.' || $name === '..') continue;
      $full = $target . DIRECTORY_SEPARATOR . $name;
      $isDir = is_dir($full);
      $items[] = [
        "name" => $name,
        "type" => $isDir ? "dir" : "file",
        "rel"  => ltrim(str_replace($baseReal, '', $full), DIRECTORY_SEPARATOR),
        "hasChildren" => $isDir ? has_child_dir($full) : false
      ];
    }
    closedir($h);
  }
  usort($items, function ($a, $b) {
    if ($a['type'] !== $b['type']) return $a['type'] === 'dir' ? -1 : 1;
    return strcasecmp($a['name'], $b['name']);
  });

  $relNorm = trim(str_replace('\\', '/', str_replace($baseReal, '', $target)), '/');
  $crumbs = [];
  $accum = '';
  if ($relNorm !== '') {
    foreach (explode('/', $relNorm) as $seg) {
      $accum = ($accum == '' ? $seg : $accum . '/' . $seg);
      $crumbs[] = ["name" => $seg, "rel" => $accum];
    }
  }

  return ["ok" => true, "base" => $baseReal, "rel" => $relNorm, "breadcrumbs" => $crumbs, "items" => $items];
}

$action = $_GET['action'] ?? 'get_config';

try {
  if ($action === 'get_config') {
    $cfg = ensure_config($CONFIG_FILE);
    echo json_encode(["ok" => true, "config" => $cfg], JSON_UNESCAPED_SLASHES);
    exit;
  }

  if ($action === 'save_config') {
    $raw = file_get_contents('php://input');
    $payload = json_decode($raw, true);
    if (!is_array($payload)) throw new Exception("Payload bukan JSON.");
    $cfg = save_config($CONFIG_FILE, $payload);
    echo json_encode(["ok" => true, "config" => $cfg], JSON_UNESCAPED_SLASHES);
    exit;
  }

  if ($action === 'list_dirs') {
    $cfg = ensure_config($CONFIG_FILE);
    $rel = $_GET['rel'] ?? '';
    echo json_encode(list_dir_secure($cfg['projectsRoot'], $rel), JSON_UNESCAPED_SLASHES);
    exit;
  }

  echo json_encode(["ok" => false, "error" => "Aksi tidak dikenal."]);
} catch (Throwable $e) {
  http_response_code(500);
  echo json_encode(["ok" => false, "error" => $e->getMessage()]);
}
