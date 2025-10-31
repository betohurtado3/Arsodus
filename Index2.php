<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Sitio en Desarrollo</title>
  <style>
    /* Reset minimal */
    * { box-sizing: border-box; margin: 0; padding: 0; }

    /* Fondo */
    :root{
      --bg1: #0f172a;
      --bg2: #071031;
      --accent: #ffd166;
      --muted: rgba(255,255,255,0.75);
    }

    body{
      min-height: 100vh;
      display: grid;
      place-items: center;
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background: radial-gradient(1200px 600px at 10% 10%, rgba(13,50,90,0.40), transparent),
                  radial-gradient(900px 500px at 90% 90%, rgba(80,30,100,0.20), transparent),
                  linear-gradient(180deg, var(--bg1), var(--bg2));
      color: white;
      padding: 24px;
    }

    .card {
      width: 100%;
      max-width: 920px;
      background: linear-gradient(180deg, rgba(255,255,255,0.03), rgba(255,255,255,0.015));
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(2,6,23,0.6), inset 0 1px 0 rgba(255,255,255,0.02);
      padding: 36px;
      display: grid;
      grid-template-columns: 220px 1fr;
      gap: 24px;
      align-items: center;
      backdrop-filter: blur(6px) saturate(120%);
    }

    /* Ilustración grande (SVG) */
    .illustration {
      display:flex;
      align-items:center;
      justify-content:center;
    }
    .gear {
      width:160px;
      height:160px;
      transform-origin: center;
      animation: spin 6s linear infinite;
      filter: drop-shadow(0 10px 20px rgba(2,6,23,0.6));
    }

    @keyframes spin {
      from { transform: rotate(0deg) scale(1); }
      50% { transform: rotate(18deg) scale(1.02); }
      to { transform: rotate(360deg) scale(1); }
    }

    .content h1{
      font-size: clamp(1.6rem, 2.6vw, 2.4rem);
      letter-spacing: -0.02em;
      margin-bottom: 8px;
    }
    .tag {
      display:inline-block;
      font-weight:600;
      color: #0b1220;
      background: var(--accent);
      padding: 6px 10px;
      border-radius: 999px;
      font-size: 0.85rem;
      margin-bottom: 14px;
    }
    .content p{
      color: var(--muted);
      line-height: 1.5;
      margin-bottom: 18px;
      font-size: 0.98rem;
    }

    .actions {
      display:flex;
      gap:12px;
      align-items:center;
      flex-wrap:wrap;
    }
    .btn {
      display:inline-flex;
      align-items:center;
      gap:10px;
      padding: 10px 16px;
      border-radius: 12px;
      font-weight:600;
      text-decoration:none;
      border: none;
      cursor: pointer;
      transition: transform .12s ease, box-shadow .12s ease;
      background: rgba(255,255,255,0.06);
      color: white;
      box-shadow: 0 6px 18px rgba(2,6,23,0.45);
    }
    .btn:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(2,6,23,0.55); }

    .btn.primary {
      background: linear-gradient(90deg, #ffb86b, #ff7a7a);
      color: #0b1220;
    }

    .small {
      font-size: .88rem;
      color: rgba(255,255,255,0.6);
      margin-top: 10px;
    }

    /* Responsive */
    @media (max-width:720px){
      .card { grid-template-columns: 1fr; text-align:center; padding:28px; gap:14px; }
      .illustration { order: -1; }
    }
  </style>
</head>
<body>
  <main class="card" role="main" aria-labelledby="title">
    <div class="illustration" aria-hidden="true">
      <!-- SVG minimal de engranaje/construcción -->
      <svg class="gear" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Engranaje animado">
        <defs>
          <linearGradient id="g" x1="0" x2="1">
            <stop offset="0" stop-color="#ffd166"/>
            <stop offset="1" stop-color="#ff7a7a"/>
          </linearGradient>
        </defs>
        <g fill="none" stroke="url(#g)" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="32" cy="32" r="10" fill="url(#g)" opacity="0.12" />
          <path d="M44 28h4v8h-4a12 12 0 0 1-2 4l2.8 2.8-5.6 5.6L38 47a12 12 0 0 1-4 2v4h-8v-4a12 12 0 0 1-4-2l-1.2 1.2-5.6-5.6L22 40a12 12 0 0 1 2-4H20v-8h4a12 12 0 0 1 2-4L23.2 21.2l5.6-5.6L30 17a12 12 0 0 1 4-2V11h8v4a12 12 0 0 1 4 2l1.2-1.2 5.6 5.6L46 28a12 12 0 0 1-2 4z" />
        </g>
      </svg>
    </div>

    <div class="content">
      <span class="tag">En construcción</span>
      <h1 id="title">Estamos trabajando en algo genial</h1>
      <p>Perdón por la interrupción — estamos afinando los últimos detalles para darte la mejor experiencia. Vuelve pronto o deja tu correo y te avisamos cuando todo esté listo.</p>
      <div class="small">Sugerencia: guarda esta página y revisa más tarde. — © Minerva Software</div>
    </div>
  </main>

  <script>
    // Función simple: copia el email al portapapeles
    function copyEmail() {
      const email = "soporte@tusitio.com";
      navigator.clipboard?.writeText(email).then(() => {
        alert("Correo copiado: " + email);
      }).catch(() => {
        prompt("Copia manualmente este correo:", email);
      });
    }
  </script>
</body>
</html>
