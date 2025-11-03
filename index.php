<?php /* index.php */ ?>
<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Qohwah.id</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800&family=Exo+2:wght@400;600;700&display=swap" rel="stylesheet">
  <style type="text/css">
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css");
  </style>

  <style>
    :root {
      --bg: #050812;
      --bg2: #070b1a;
      --panel: #0b1230;
      --stroke: #162555;
      --muted: #9fb0d6;
      --text: #e8edff;
      --accent: #00E5FF;
      --accent2: #7C3AED;
      --radius: 18px;
    }

    * {
      box-sizing: border-box
    }

    html,
    body {
      height: 100%
    }

    body {
      margin: 0;
      color: var(--text);
      font: 400 16px/1.6 "Exo 2", system-ui, -apple-system, Segoe UI, Roboto;
      background:
        radial-gradient(1200px 600px at 10% -10%, #0d1b3f88, transparent 60%),
        radial-gradient(900px 600px at 110% 0%, #340a5f66, transparent 60%),
        radial-gradient(600px 700px at 70% 110%, #0a3f3f66, transparent 60%),
        var(--bg);
    }

    header {
      position: sticky;
      top: 0;
      z-index: 10;
      background: linear-gradient(180deg, #001870CC, #060a18aa, transparent);
      backdrop-filter: blur(10px) saturate(120%);
      border-bottom: 1px solid #101d43;
    }

    .head {
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 14px;
      padding: 10px 24px;
      align-items: center
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 12px
    }

    .logo {
      width: 46px;
      height: 46px;
      border-radius: 14px;
      overflow: hidden;
      background: linear-gradient(135deg, #0e1b3f, #0a1024);
      border: 1px solid #24356b;
      display: grid;
      place-items: center;
      font-family: "Orbitron";
      font-weight: 800;
      letter-spacing: 1px;
      color: #00e5ff;
      position: relative;
    }

    .logo img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      display: block
    }

    .brand-title b {
      font-family: "Orbitron";
      font-weight: 800;
      letter-spacing: .6px;
      display: block
    }

    .brand-title small {
      color: var(--muted)
    }

    .actions {
      display: flex;
      gap: 8px;
      align-items: center
    }

    .btn {
      border: 1px solid #2b3f8a;
      background: #0b1540;
      color: var(--text);
      padding: 10px;
      border-radius: 12px;
      cursor: pointer;
      display: grid;
      place-items: center;
      transition: transform .15s ease, box-shadow .2s ease, border-color .2s ease;
    }

    .btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 8px 24px #0008, 0 0 16px #00e5ff44;
      border-color: #3a59cc
    }

    .btn-icon {
      width: 42px;
      height: 42px
    }

    .btn-icon i {
      font-size: 18px
    }

    .chip {
      border: 1px solid #25408e;
      color: #9bb3ff;
      background: #0a1333;
      border-radius: 999px;
      padding: 6px 10px;
      font-size: 12px;
      display: inline-flex;
      gap: 8px;
      align-items: center;
      box-shadow: inset 0 0 10px #0b1c55;
    }

    .layout {
      display: grid;
      grid-template-columns: minmax(520px, 2fr) minmax(420px, 1fr);
      gap: 18px;
      padding: 18px 24px
    }

    @media (max-width:1100px) {
      .layout {
        grid-template-columns: 1fr
      }
    }

    .hero {
      position: relative;
      min-height: 420px;
      border-radius: 22px;
      overflow: hidden;
      border: 1px solid #1a2f6a;
      box-shadow: 0 30px 120px #0008;
      transition: transform .15s ease, box-shadow .30s ease, border-color .15s ease;
    }

    .banner {
      position: absolute;
      inset: 0;
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .hero:hover {
      box-shadow: 0 8px 24px #0008, 0 0 20px var(--accent2);
      /* box-shadow: 0 8px 24px #3450aa; */
      border-color: #3450aa
    }

    .gloss {
      position: absolute;
      inset: 0;
      background: radial-gradient(900px 300px at 40% 0%, #ffffff18, transparent 60%);
      mix-blend-mode: screen
    }

    .hero-content {
      position: relative;
      padding: 28px;
      /* max-width: 860px; */
      display: grid;
      gap: 16px
    }

    h1 {
      font-family: "Orbitron";
      font-size: 46px;
      margin: 6px 0 0;
      letter-spacing: .8px
    }

    .desc {
      color: #c7d4ff
    }

    .kpi {
      background: #0a1233;
      border: 1px solid #253a86;
      border-radius: 999px;
      padding: 6px 10px;
      font-size: 12px;
      color: #a6b8ff;
      margin-right: 8px
    }

    .section-title {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 16px 6px 10px
    }

    .section-title h3 {
      margin: 0;
      font-family: "Orbitron";
      font-size: 16px;
      color: #a8b7ff;
      letter-spacing: .4px
    }

    .grid {
      display: grid;
      gap: 16px;
      grid-template-columns: repeat(auto-fill, minmax(190px, 1fr))
    }

    .card {
      text-decoration: none;
      position: relative;
      overflow: hidden;
      border-radius: 16px;
      background: linear-gradient(180deg, #0b1535, #0a1129);
      border: 1px solid #1f2f66;
      transition: transform .15s ease, box-shadow .25s ease, border-color .25s ease;
    }

    .card::before {
      content: "";
      position: absolute;
      inset: -2px;
      border-radius: inherit;
      background: conic-gradient(from 50deg, transparent 0 200deg, var(--accent), #3450aa, var(--accent));
      filter: blur(12px);
      opacity: 0;
      transition: opacity .25s ease;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 24px #0008, 0 0 20px var(--accent2);
      /* box-shadow: 0 14px 40px #3450aa; */
      border-color: #3450aa
    }

    .card:hover::before {
      opacity: .25
    }

    .thumb {
      aspect-ratio: 16/10;
      display: grid;
      place-items: center;
      background: #0d1638
    }

    .thumb i {
      font-size: 64px;
      color: var(--accent);
      filter: drop-shadow(0 0 18px #00e5ff55)
    }

    .meta {
      padding: 12px 12px 14px
    }

    .title {
      font-weight: 700;
      color: var(--accent);
      letter-spacing: .2px
    }

    .hint {
      font-size: 12px;
      color: #9fb0d6;
      margin-top: 2px
    }

    aside.playlist {
      background: linear-gradient(180deg, #0b1333, #0a1024);
      border: 1px solid #1a2e66;
      border-radius: 22px;
      padding: 16px;
      position: sticky;
      top: 80px;
      max-height: calc(100vh - 120px);
      overflow: auto;
      box-shadow: 0 30px 120px #0007;
    }

    .pl-list {
      display: flex;
      flex-direction: column;
      gap: 10px;
      margin-top: 8px
    }

    .pl-item {
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 12px;
      align-items: center;
      background: linear-gradient(180deg, #0e1742, #0a1233);
      border: 1px solid #20306a;
      border-radius: 14px;
      padding: 10px 12px;
      transition: transform .12s ease, border-color .2s ease, background .2s ease, box-shadow .2s ease;
    }

    .pl-item:hover {
      transform: translateX(3px);
      border-color: #3450aa;
      box-shadow: 0 10px 24px #0007
    }

    .folder {
      display: flex;
      gap: 10px;
      align-items: center
    }

    .folder .avatar {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      display: grid;
      place-items: center;
      border: 1px solid #22346f;
      background: #0c1435
    }

    .folder .avatar i {
      font-size: 22px
    }

    .crumbs {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin: 6px 0 10px
    }

    .crumbs a {
      color: #9fb0d6;
      text-decoration: none;
      border: 1px dashed #2a3f82;
      padding: 4px 8px;
      border-radius: 999px;
      font-size: 12px
    }

    .crumbs a:hover {
      border-style: solid;
      color: #cfe0ff
    }

    dialog {
      width: min(1100px, 96vw);
      max-height: 86vh;
      border: 1px solid #1b2f6b;
      border-radius: 18px;
      padding: 0;
      background: #0b1333;
      color: var(--text);
      box-shadow: 0 30px 120px #000b;
    }

    dialog::backdrop {
      background: #000c;
      backdrop-filter: blur(2px)
    }

    .dlg-head {
      position: sticky;
      top: 0;
      z-index: 2;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 16px 18px;
      background: linear-gradient(180deg, #0b1536, #0a1230);
      border-bottom: 1px solid #182a60;
    }

    .dlg-body {
      padding: 16px 18px;
      overflow: auto;
      /* max-height: calc(86vh - 120px); */
    }

    .dlg-foot {
      position: sticky;
      bottom: 0;
      z-index: 2;
      padding: 12px 18px;
      background: linear-gradient(0deg, #0b1536, #0a1230);
      border-top: 1px solid #182a60;
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      align-items: center;
    }

    .form-grid {
      display: grid;
      gap: 12px;
      grid-template-columns: 1fr 1fr 1fr
    }

    .form-grid label {
      display: block;
      font-size: 12px;
      color: #a5b6e6;
      margin-bottom: 6px
    }

    input[type="text"],
    input[type="url"],
    input[type="color"],
    input[type="file"],
    textarea,
    table input[type="text"],
    table input[type="url"] {
      width: 100%;
      padding: 10px 12px;
      border-radius: 12px;
      border: 1px solid #25346b;
      background: linear-gradient(180deg, #0b1330, #0a1128);
      color: var(--text);
      font-size: 14px;
      transition: border-color .2s ease, box-shadow .2s ease, background .2s ease, transform .05s ease;
      box-shadow: inset 0 0 0 rgba(0, 0, 0, 0), 0 0 0 rgba(0, 0, 0, 0);
    }

    input[type="color"] {
      height: 40px;
      padding: 0 6px;
      border-radius: 12px;
      background: #0b1330;
      cursor: pointer;
    }

    input::placeholder,
    textarea::placeholder {
      color: #8ea2d7
    }

    input[type="text"]:hover,
    input[type="url"]:hover,
    textarea:hover {
      border-color: #3450aa;
    }

    input[type="text"]:focus,
    input[type="url"]:focus,
    input[type="color"]:focus,
    textarea:focus {
      outline: none;
      border-color: var(--accent);
      box-shadow: 0 0 0 3px color-mix(in srgb, var(--accent) 30%, transparent);
      background: #0b1336;
      transform: translateY(-1px);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px
    }

    th,
    td {
      border-bottom: 1px solid #1d2c5c;
      padding: 8px 6px;
      font-size: 14px;
      vertical-align: top
    }

    th {
      text-align: left;
      color: #a8b6e4
    }

    #tbl-top td,
    #tbl-rem td {
      vertical-align: middle
    }

    #tbl-top input,
    #tbl-rem input {
      margin: 6px 0
    }

    .btn.primary {
      background: linear-gradient(180deg, color-mix(in srgb, var(--accent) 22%, #0b1540), #0b1540);
      border-color: color-mix(in srgb, var(--accent) 45%, #2b3f8a);
    }

    .btn.primary:hover {
      box-shadow: 0 8px 24px #0008, 0 0 16px color-mix(in srgb, var(--accent) 35%, transparent);
      border-color: color-mix(in srgb, var(--accent) 70%, #3a59cc);
    }

    .actions {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-top: 10px
    }

    .danger {
      color: #fff;
      background: #5d1a1a;
      border-color: #7e2a2a
    }
  </style>
</head>

<body>
  <header>
    <div class="head">
      <div class="brand">
        <div class="logo" id="logo">Q</div>
        <div class="brand-title">
          <b id="brand-name">Qohwah.id</b>
          <small id="brand-sub">Smart Digital Solutions</small>
        </div>
      </div>
      <div class="actions">
        <span class="chip" id="net">🌐 Memeriksa jaringan…</span>
        <button class="btn btn-icon" id="btn-reminder" title="Pengingat">
          <i class="fa-solid fa-bell"></i>
        </button>
        <button class="btn btn-icon" id="btn-option" title="Option">
          <i class="fa-solid fa-gear"></i>
        </button>
      </div>
      <div class="clock" style="text-align:right">
        <div style="font-family:'Orbitron'; font-size:26px; font-weight:800; letter-spacing:.4px" id="time">00:00</div>
        <div style="font-size:12px; color:#9fb0d6" id="date">—</div>
      </div>
    </div>
  </header>

  <main class="layout">
    <section>
      <a href="https://qohwah.id" style="text-decoration: none; color: inherit">
        <div class="hero">
          <div class="banner" id="banner"></div>
          <div class="gloss"></div>
          <div class="hero-content">
            <div>
              <span class="kpi" id="badge-updated">Terakhir diubah: —</span>
            </div>
            <h1 id="hero-title">Solusi Pintar untuk Dunia Digital</h1>
            <div class="desc" id="hero-desc">Apakah Teknologi yang semakin Pintar akan membuat Manusia juga semakin Pintar?</div>
          </div>
        </div>
      </a>

      <div class="section-title">
        <h3>Shortcuts</h3>
        <span class="kpi" id="badge-tools">0 Tools</span>
      </div>
      <div class="grid" id="grid-top"></div>
    </section>

    <aside class="playlist">
      <div class="section-title">
        <h3>Daftar Aplikasi / Proyek</h3>
        <span class="chip" id="badge-apps">—</span>
      </div>
      <div class="crumbs" id="crumbs"></div>
      <div class="pl-list" id="pl-list"></div>
    </aside>
  </main>

  <!-- DIALOG: OPTION -->
  <dialog id="dlg-option">
    <div class="dlg-head">
      <div>
        <b style="font-size: x-large;">Option</b>
        <div style="font-size:12px;color:#9fb0d1">Brand, warna, banner/logo, shortcuts, reminders, root proyek, launch pattern</div>
      </div>
      <div class="actions">
        <button class="btn" id="btn-close-opt">Tutup</button>
      </div>
    </div>

    <div class="dlg-body">
      <div class="form-grid">
        <div><label>Title</label><input id="opt-title" type="text" placeholder="Qohwah.id"></div>
        <div><label>Subtitle</label><input id="opt-subtitle" type="text" placeholder="Smart Digital Solutions"></div>
        <div><label>Accent</label><input id="opt-accent" type="color" value="#00e5ff"></div>

        <div>
          <label>Banner</label>
          <input id="opt-banner-file" type="file" accept="image/*">
          <button class="btn" id="btn-clear-banner" style="margin-top:6px">Hapus Banner</button>
        </div>

        <div><label>Logo Teks (fallback)</label><input id="opt-logo-text" type="text" placeholder="Q"></div>

        <div>
          <label>Logo PNG</label>
          <input id="opt-logo-file" type="file" accept="image/png,image/*">
          <button class="btn" id="btn-clear-logo" style="margin-top:6px">Hapus Logo</button>
        </div>

        <div style="grid-column:1/-1"><label>Projects Root (absolute/relative)</label><input id="opt-root" type="text" placeholder="C:\laragon\www"></div>

        <div style="grid-column:1/-1">
          <label>Launch Pattern</label>
          <input id="opt-launch-pattern" type="text" placeholder="http://localhost/{rel}/">
          <div style="font-size:12px;color:#9fb0d6;margin-top:4px">
            <b>{rel}</b> = path relatif penuh dari root. Contoh: qohwah/landingpage ⇒ http://localhost/<b>qohwah/landingpage</b>/
          </div>
        </div>
      </div>

      <h3 style="margin-top:16px">Shortcuts</h3>
      <table id="tbl-top">
        <thead>
          <tr>
            <th>Ikon (FA/BI)</th>
            <th>Judul</th>
            <th>URL</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
      <div class="actions"><button class="btn" id="add-top">Tambah Shortcut</button></div>

      <h3>Reminders (Pengingat)</h3>
      <table id="tbl-rem">
        <thead>
          <tr>
            <th>Pesan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
      <div class="actions"><button class="btn" id="add-rem">Tambah Pengingat</button></div>
    </div>

    <div class="dlg-foot">
      <button class="btn danger" id="btn-reload" title="Reload dari JSON">Reload</button>
      <button class="btn primary" id="btn-save" title="Simpan ke config.json">
        <i class="fa-solid fa-floppy-disk"></i>
      </button>
    </div>
  </dialog>

  <!-- DIALOG: PENGINGAT -->
  <dialog id="dlg-reminder">
    <div class="dlg-head">
      <div><b>Pengingat</b>
        <!-- <div style="font-size:12px;color:#9fb0d1">Proyek Berjalan</div> -->
      </div>
      <div class="actions"><button class="btn" id="btn-close-rem">Tutup</button></div>
    </div>
    <div class="dlg-body">
      <ul id="rem-list"></ul>
      <div style="font-size:12px;color:#9fb0d1;margin-top:8px"><b>Qohwah</b>.id</div>
    </div>
  </dialog>

  <script>
    const $ = (s, r = document) => r.querySelector(s);
    const gridTop = $('#grid-top'),
      plList = $('#pl-list'),
      crumbs = $('#crumbs');
    const brandName = $('#brand-name'),
      brandSub = $('#brand-sub'),
      logo = $('#logo'),
      banner = $('#banner');
    const badgeApps = $('#badge-apps'),
      badgeTools = $('#badge-tools'),
      badgeUpdated = $('#badge-updated');
    const dlgOpt = $('#dlg-option'),
      dlgRem = $('#dlg-reminder');

    // OPTION fields
    const optTitle = $('#opt-title'),
      optSubtitle = $('#opt-subtitle'),
      optAccent = $('#opt-accent');
    const optLogoText = $('#opt-logo-text'),
      optRoot = $('#opt-root');
    const optLaunchPattern = $('#opt-launch-pattern');
    const optBannerFile = $('#opt-banner-file'),
      optLogoFile = $('#opt-logo-file');
    const btnClearBanner = $('#btn-clear-banner'),
      btnClearLogo = $('#btn-clear-logo');
    const tblTop = $('#tbl-top tbody'),
      tblRem = $('#tbl-rem tbody');

    let CONFIG = null;

    // helpers
    function setAccent(color) {
      if (/^#([0-9a-fA-F]{3}){1,2}$/.test(color)) {
        document.documentElement.style.setProperty('--accent', color);
      }
    }

    function esc(s) {
      return String(s ?? '').replace(/[&<>\"']/g, m => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;'
      } [m] || m));
    }

    function hostHint(url) {
      try {
        return (new URL(url)).host;
      } catch (_) {
        return url || '';
      }
    }

    function timeTick() {
      const now = new Date();
      $('#time').textContent = now.toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit'
      });
      $('#date').textContent = now.toLocaleDateString('id-ID', {
        weekday: 'long',
        day: '2-digit',
        month: 'long',
        year: 'numeric'
      });
    }
    setInterval(timeTick, 1000);
    timeTick();

    function updateNet() {
      $('#net').textContent = navigator.onLine ? '🌐 Online' : '⚠️ Offline';
    }
    addEventListener('online', updateNet);
    addEventListener('offline', updateNet);
    updateNet();

    // API
    async function apiGetConfig() {
      const r = await fetch('_portal/api.php?action=get_config');
      return await r.json();
    }
    async function apiSaveConfig(payload) {
      const r = await fetch('_portal/api.php?action=save_config', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(payload)
      });
      return await r.json();
    }
    async function apiList(rel = '') {
      const r = await fetch('_portal/api.php?action=list_dirs&rel=' + encodeURIComponent(rel));
      return await r.json();
    }

    // UI
    function renderFromConfig() {
      const c = CONFIG;
      brandName.textContent = c.title || 'Qohwah.id';
      brandSub.textContent = c.subtitle || 'Smart Digital Solutions';
      setAccent(c.accent || '#00E5FF');
      logo.innerHTML = c.logoImg ? `<img alt="logo" src="${esc(c.logoImg)}">` : esc((c.logoText || 'Q').slice(0, 3).toUpperCase());
      banner.style.backgroundImage = c.banner ? `url(${esc(c.banner)})` : 'none';
      badgeTools.textContent = (c.topApps?.length || 0) + ' Tools';
      badgeUpdated.textContent = 'Terakhir diubah: ' + new Date((c.updatedAt || Date.now()) * 1000).toLocaleString('id-ID');

      // Shortcuts
      gridTop.innerHTML = '';
      (c.topApps || []).forEach(app => {
        const a = document.createElement('a');
        a.className = 'card';
        a.href = app.url || '#';
        a.target = '_self';
        a.innerHTML = `<div class="thumb"><i class="${esc(app.icon||'fa-solid fa-link')}"></i></div>
      <div class="meta"><div class="title">${esc(app.title||'Link')}</div><div class="hint">${esc(hostHint(app.url||''))}</div></div>`;
        gridTop.appendChild(a);
      });
    }

    // Option dialog
    function fillOption() {
      const c = CONFIG,
        L = c.launch || {};
      optTitle.value = c.title || '';
      optSubtitle.value = c.subtitle || '';
      optAccent.value = c.accent || '#00E5FF';
      optLogoText.value = c.logoText || 'Q';
      optRoot.value = c.projectsRoot || '';
      optLaunchPattern.value = L.pattern || 'http://localhost/{rel}/';

      // reset file pickers
      if (optBannerFile) optBannerFile.value = '';
      if (optLogoFile) optLogoFile.value = '';

      // Shortcuts
      tblTop.innerHTML = '';
      (c.topApps || []).forEach((app, i) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
      <td><input type="text" data-k="icon" data-i="${i}" value="${esc(app.icon||'fa-solid fa-link')}" placeholder="fa-solid fa-link"></td>
      <td><input type="text" data-k="title" data-i="${i}" value="${esc(app.title||'')}" placeholder="Judul"></td>
      <td><input type="text" data-k="url" data-i="${i}" value="${esc(app.url||'')}" placeholder="https://"></td>
      <td><button class="btn" data-act="up" data-i="${i}"><i class="fas fa-angle-up"></i></button>
          <button class="btn" data-act="down" data-i="${i}"><i class="fas fa-angle-down"></i></button>
          <button class="btn danger" data-act="del" data-i="${i}"><i class="fas fa-trash-can"></i></button></td>`;
        tblTop.appendChild(tr);
      });

      // Reminders
      tblRem.innerHTML = '';
      (c.reminders || []).forEach((msg, i) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `<td><input type="text" data-rem="msg" data-i="${i}" value="${esc(msg)}" placeholder="Tulis pengingat..."></td>
                    <td><button class="btn danger" data-remact="del" data-i="${i}"><i class="fas fa-trash-can"></i></button></td>`;
        tblRem.appendChild(tr);
      });
    }

    // banner/logo upload
    function readImageAsDataURL(file, cb) {
      const maxBytes = 3 * 1024 * 1024;
      if (file.size > maxBytes) {
        alert('Ukuran gambar terlalu besar (>3MB). Kompres dulu ya.');
        return;
      }
      const fr = new FileReader();
      fr.onload = () => cb(fr.result);
      fr.onerror = () => alert('Gagal membaca file gambar.');
      fr.readAsDataURL(file);
    }

    // listeners
    document.addEventListener('input', (e) => {
      const t = e.target;
      if (t === optTitle) CONFIG.title = t.value;
      else if (t === optSubtitle) CONFIG.subtitle = t.value;
      else if (t === optAccent) CONFIG.accent = t.value;
      else if (t === optLogoText) CONFIG.logoText = t.value;
      else if (t === optRoot) CONFIG.projectsRoot = t.value;
      else if (t === optLaunchPattern) {
        CONFIG.launch ??= {};
        CONFIG.launch.pattern = t.value;
      } else if (t.dataset && t.dataset.k) {
        const i = +t.dataset.i,
          k = t.dataset.k;
        if (CONFIG.topApps && CONFIG.topApps[i]) CONFIG.topApps[i][k] = t.value;
      } else if (t.dataset && t.dataset.rem === 'msg') {
        const i = +t.dataset.i;
        if (CONFIG.reminders && CONFIG.reminders[i] !== undefined) CONFIG.reminders[i] = t.value;
      }
    });

    document.addEventListener('click', async (e) => {
      const b = e.target.closest('button');
      if (!b) return;

      // Shortcuts
      if (b.dataset && b.dataset.act) {
        const i = +b.dataset.i;
        if (b.dataset.act === 'del') CONFIG.topApps.splice(i, 1);
        else if (b.dataset.act === 'up' && i > 0) {
          const it = CONFIG.topApps.splice(i, 1)[0];
          CONFIG.topApps.splice(i - 1, 0, it);
        } else if (b.dataset.act === 'down' && i < CONFIG.topApps.length - 1) {
          const it = CONFIG.topApps.splice(i, 1)[0];
          CONFIG.topApps.splice(i + 1, 0, it);
        }
        fillOption();
        renderFromConfig();
      }
      if (b.id === 'add-top') {
        CONFIG.topApps.push({
          icon: 'fa-solid fa-link',
          title: 'Aplikasi Baru',
          url: 'http://localhost/'
        });
        fillOption();
        renderFromConfig();
      }

      // Reminders actions
      if (b.dataset && b.dataset.remact === 'del') {
        const i = +b.dataset.i;
        CONFIG.reminders.splice(i, 1);
        fillOption();
      }
      if (b.id === 'add-rem') {
        CONFIG.reminders.push('Pengingat baru…');
        fillOption();
      }

      // Option dialog
      if (b.id === 'btn-option') {
        fillOption();
        dlgOpt.showModal();
      }
      if (b.id === 'btn-close-opt') {
        dlgOpt.close();
      }

      // Save/reload
      if (b.id === 'btn-save') {
        const r = await apiSaveConfig({
          title: CONFIG.title,
          subtitle: CONFIG.subtitle,
          accent: CONFIG.accent,
          banner: CONFIG.banner,
          logoText: CONFIG.logoText,
          logoImg: CONFIG.logoImg,
          projectsRoot: CONFIG.projectsRoot,
          topApps: CONFIG.topApps,
          reminders: CONFIG.reminders,
          launch: CONFIG.launch
        });
        if (!r.ok) return alert('Gagal simpan: ' + (r.error || ''));
        CONFIG = r.config;
        renderFromConfig();
        alert('Tersimpan ke config.json');
      }
      if (b.id === 'btn-reload') {
        const r = await apiGetConfig();
        if (!r.ok) return alert('Gagal ambil konfigurasi.');
        CONFIG = r.config;
        renderFromConfig();
        fillOption();
        alert('Muat ulang dari config.json');
      }

      // Reminders dialog
      if (b.id === 'btn-reminder') {
        const ul = $('#rem-list');
        ul.innerHTML = '';
        (CONFIG.reminders || []).forEach(m => {
          const li = document.createElement('li');
          li.textContent = m;
          ul.appendChild(li);
        });
        dlgRem.showModal();
      }
      if (b.id === 'btn-close-rem') dlgRem.close();
    });

    // file pickers
    if (optBannerFile) {
      optBannerFile.addEventListener('change', () => {
        const f = optBannerFile.files?.[0];
        if (!f) return;
        readImageAsDataURL(f, (dataURL) => {
          CONFIG.banner = dataURL;
          banner.style.backgroundImage = `url(${dataURL})`;
        });
      });
    }
    if (optLogoFile) {
      optLogoFile.addEventListener('change', () => {
        const f = optLogoFile.files?.[0];
        if (!f) return;
        readImageAsDataURL(f, (dataURL) => {
          CONFIG.logoImg = dataURL;
          logo.innerHTML = `<img alt="logo" src="${dataURL}">`;
        });
      });
    }
    if (btnClearBanner) {
      btnClearBanner.addEventListener('click', (e) => {
        e.preventDefault();
        CONFIG.banner = "";
        banner.style.backgroundImage = 'none';
        if (optBannerFile) optBannerFile.value = '';
      });
    }
    if (btnClearLogo) {
      btnClearLogo.addEventListener('click', (e) => {
        e.preventDefault();
        CONFIG.logoImg = "";
        logo.textContent = (CONFIG.logoText || 'QW').slice(0, 3).toUpperCase();
        if (optLogoFile) optLogoFile.value = '';
      });
    }

    // File manager
    function buildLaunchUrl(item) {
      let rel = String(item.rel || '').replace(/^[\\/]+/, '').replace(/\\/g, '/');
      rel = rel.split('/').map(encodeURIComponent).join('/');
      const pattern = (CONFIG.launch && CONFIG.launch.pattern) || 'http://localhost/{rel}/';
      return pattern.replace('{rel}', rel);
    }

    async function loadDir(rel = '') {
      const res = await apiList(rel);
      if (!res.ok) {
        plList.innerHTML = `<div class="chip">Error: ${esc(res.error||'')}</div>`;
        return;
      }

      crumbs.innerHTML = '';
      const rootLink = document.createElement('a');
      rootLink.textContent = 'root';
      rootLink.href = '#';
      rootLink.addEventListener('click', e => {
        e.preventDefault();
        loadDir('');
      });
      crumbs.appendChild(rootLink);
      (res.breadcrumbs || []).forEach(cr => {
        const a = document.createElement('a');
        a.textContent = cr.name;
        a.href = '#';
        a.addEventListener('click', e => {
          e.preventDefault();
          loadDir(cr.rel);
        });
        crumbs.appendChild(a);
      });

      // items
      plList.innerHTML = '';
      let count = 0;
      (res.items || []).forEach(it => {
        if (it.type !== 'dir') return;
        count++;
        const row = document.createElement('div');
        row.className = 'pl-item';
        const launchUrl = buildLaunchUrl(it);
        row.innerHTML = `
      <div class="folder" data-act="open" style="cursor:pointer;">
        <button class="btn btn-icon" title="Buka Direktori" data-act="open"><i class="fa-solid fa-folder-open"></i></button>
        <div>
          <div class="title">${esc(it.name)}</div>
          <div class="hint">${it.hasChildren ? 'berisi sub-direktori' : 'kosong / hanya file'}</div>
        </div>
      </div>
      <div style="display:flex; gap:8px; margin-left:auto;">
        <button class="btn btn-icon" title="Jalankan Aplikasi" data-act="play"><i class="fa-solid fa-play"></i></button>
      </div>`;
        row.querySelector('[data-act="open"]').addEventListener('click', () => loadDir(it.rel));
        row.querySelector('[data-act="play"]').addEventListener('click', () => window.open(launchUrl, '_self'));
        plList.appendChild(row);
      });
      badgeApps.textContent = count + ' folder';
    }

    // bootstrap
    (async function init() {
      const r = await apiGetConfig();
      if (!r.ok) {
        alert('Gagal memuat konfigurasi awal.');
        return;
      }
      CONFIG = r.config;
      renderFromConfig();
      await loadDir('');
    })();
  </script>
</body>

</html>