<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestion des Sanctions — Accueil</title>

    <!-- Inter (Google Fonts) -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CDN + petite config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: { inter: ['Inter', 'ui-sans-serif', 'system-ui'] },
            colors: {
              primary: {
                50: '#eff6ff',
                100: '#dbeafe',
                200: '#bfdbfe',
                300: '#93c5fd',
                400: '#60a5fa',
                500: '#3b82f6',
                600: '#2563eb', // bouton bleu
                700: '#1d4ed8',
                800: '#1e40af',
                900: '#1e3a8a'
              },
              success: {
                600: '#16a34a'
              }
            },
            boxShadow: {
              card: '0 10px 30px 0 rgba(2,6,23,.08)',
              hover: '0 16px 48px rgba(2,6,23,.10)'
            },
            maxWidth: {
              'content': '1180px'
            },
            borderRadius: {
              '2.5xl': '20px'
            }
          }
        }
      }
    </script>

    <style>
      :root{ color-scheme: light; }
      html,body{ height:100%; }
      body{ background:#f5f7fb; }
    </style>
  </head>
  <body class="font-inter text-slate-900 antialiased min-h-screen flex flex-col">

    <!-- ====================== HEADER / APP BAR ====================== -->
    <header class="bg-white border-b border-slate-200 mb-20">
      <div class="mx-auto max-w-content px-5">
        <div class="h-16 flex items-center justify-between">
          <!-- Branding gauche -->
          <div class="flex items-center gap-2 text-primary-600 font-bold">
            <div class="w-[22px] h-[22px] grid place-items-center border rounded-md text-[11px]">📋</div>
            <span>Gestion des Sanctions</span>
          </div>
          <!-- Nom d'appli à droite -->
          <div class="text-sm text-slate-500">Application Vie Scolaire</div>
        </div>
      </div>
      <!-- Ruban / fil d'Ariane -->
      <div class="bg-primary-800 text-primary-100">
        <div class="mx-auto max-w-content px-5 py-2">
          <span class="inline-flex items-center gap-2 rounded-md px-2.5 py-1 text-sm">
            <span>🏠</span> Accueil
          </span>
        </div>
      </div>
    </header>

  <main class="flex-1 mx-auto max-w-content px-5">
      <!-- ====================== HERO ====================== -->
      <section class="mt-4 mb-7">
        <div class="flex flex-col items-center justify-center text-center text-white py-12 bg-gradient-to-r from-blue-600 to-blue-800 rounded-2xl shadow-lg">
  <h1 class="text-4xl sm:text-5xl font-extrabold mb-2">
    🎓 Application de Gestion des Sanctions
  </h1>
  <p class="text-lg sm:text-xl text-indigo-100">
    Système de gestion de la vie scolaire pour le lycée
  </p>
</div>

      </section>

      <!-- ====================== CARTES AUTH ====================== -->
      <section class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-6 lg:gap-8 mb-9">
        <!-- Connexion -->
          <article class="bg-white rounded-2xl shadow p-6 flex flex-col items-center text-center">
  <div class="w-12 h-12 grid place-items-center bg-indigo-50 text-blue-700 rounded-xl border mb-3 text-2xl">🔐</div>
  <h3 class="text-xl font-semibold mb-1">Connexion</h3>
  <p class="text-gray-500 mb-4">Accédez à votre espace personnel pour gérer les sanctions</p>
  <a href="index.php?action=connexion" class="bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl px-4 py-2 shadow">
    Se connecter
  </a>
</article>

        <!-- Inscription -->
        <article class="bg-white rounded-2xl shadow p-6 flex flex-col items-center text-center">
  <div class="w-12 h-12 grid place-items-center bg-green-50 text-green-700 rounded-xl border mb-3 text-2xl">📝</div>
  <h3 class="text-xl font-semibold mb-1">Créer un compte</h3>
  <p class="text-gray-500 mb-4">Inscrivez-vous pour accéder au système de gestion</p>
  <a href="index.php?action=inscription" class="bg-green-500 hover:bg-green-600 text-white font-medium rounded-xl px-4 py-2 shadow">
    S’inscrire
  </a>
</article>

      </section>

      <!-- ====================== À PROPOS / FEATURES ====================== -->
      <!-- ====================== À PROPOS / FEATURES ====================== -->
      

      <section
        class="bg-gradient-to-b from-[#f7faff] to-[#f4f8ff] border border-[#e6eefc] rounded-xl md:rounded-2xl shadow-sm p-4 md:p-6 mb-14">
        <h2 class="text-center text-[20px] md:text-[22px] font-bold mb-4">
        <span class="mr-2">🚀</span> À propos de l’application
      </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4">
          <!-- Feature 1 -->
          <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-primary-800/5 transition">
            <div class="w-12 h-12 rounded-full grid place-items-center text-lg bg-indigo-50 text-slate-700 border border-slate-200">⚖️</div>
            <div>
              <h4 class="font-semibold text-base mb-1">Gestion des Sanctions</h4>
              <p class="text-sm text-slate-500">
                Enregistrez et suivez les sanctions des élèves de manière efficace
              </p>
            </div>
          </div>
          <!-- Feature 2 -->
          <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-primary-800/5 transition">
            <div class="w-12 h-12 rounded-full grid place-items-center text-lg bg-indigo-50 text-slate-700 border border-slate-200">👥</div>
            <div>
              <h4 class="font-semibold text-base mb-1">Gestion des Élèves</h4>
              <p class="text-sm text-slate-500">
                Centralisez les informations des élèves et leurs classes
              </p>
            </div>
          </div>
          <!-- Feature 3 -->
          <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-primary-800/5 transition">
            <div class="w-12 h-12 rounded-full grid place-items-center text-lg bg-indigo-50 text-slate-700 border border-slate-200">📊</div>
            <div>
              <h4 class="font-semibold text-base mb-1">Tableau de Bord</h4>
              <p class="text-sm text-slate-500">
                Visualisez les statistiques et l’activité récente
              </p>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- ====================== FOOTER ====================== -->
    <footer class="bg-slate-900 text-slate-200 border-t border-white/10 mt-5">
      <div class="mx-auto max-w-content px-5 py-9">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Col 1 -->
          <div>
            <h5 class="font-semibold mb-2">📑 Gestion des Sanctions</h5>
            <p class="text-sm text-slate-300">
              Application de gestion de la vie scolaire pour le suivi des sanctions et incidents.
            </p>
          </div>
          <!-- Col 2 -->
          <div>
            <h5 class="font-semibold mb-2">🔗 Liens utiles</h5>
            <ul class="space-y-1 text-sm text-slate-300">
              <li><a class="hover:text-white" href="#">Documentation</a></li>
              <li><a class="hover:text-white" href="#">Support</a></li>
              <li><a class="hover:text-white" href="#">Contact</a></li>
            </ul>
          </div>
          <!-- Col 3 -->
          <div>
            <h5 class="font-semibold mb-2">🧾 Informations</h5>
            <p class="text-sm text-slate-300">
              Développé dans le cadre du BTS SIO – Projet CCF 2025
            </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- ====================== Notes ======================
      - Remplace les liens # par tes routes.
      - Les emojis jouent le rôle d’icônes (peuvent être remplacés par Heroicons/Phosphor).
      - Le bloc hero utilise un dégradé inline pour être fidèle à la maquette.
      - La largeur max du contenu suit ~1180px comme sur l’image (max-w-content).
    ====================================================== -->
  </body>
</html>
