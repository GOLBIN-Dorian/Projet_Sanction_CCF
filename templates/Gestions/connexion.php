<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Application de Gestion des Sanctions — Connexion</title>

    <!-- Inter -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: { inter: ['Inter', 'ui-sans-serif', 'system-ui'] },
            colors: {
              primary: {
                600: '#2563eb',
                700: '#1d4ed8',
                800: '#1e40af',
              },
            },
            borderRadius: { '2.5xl': '22px' },
            maxWidth: { shell: '1180px' },
            boxShadow: {
              card: '0 10px 28px rgba(2,6,23,.10)',
              input: '0 2px 8px rgba(2,6,23,.06)',
              btn: '0 6px 16px rgba(30,64,175,.25)',
            },
          },
        },
      };
    </script>

    <style>
      body {
        background: #f5f7fb;
      }
      :where(input, a, button, select, textarea):focus-visible {
        outline: 2px solid #2563eb;
        outline-offset: 2px;
      }
    </style>
  </head>

  <body class="min-h-screen flex flex-col font-inter text-slate-900 antialiased">

    <!-- ===== HEADER ===== -->
    <header class="bg-white border-b border-slate-200">
      <div class="mx-auto max-w-shell px-5">
        <div class="h-16 flex items-center justify-between">
          <!-- LOGO sans cadre -->
          <a href="index.php?action=connexion" class="flex items-center gap-2 text-primary-600 font-extrabold tracking-tight">
            <span class="text-[16px]">📋</span>
            <span>Gestion des Sanctions</span>
          </a>
          <div class="text-sm text-slate-500">Application Vie Scolaire</div>
        </div>
      </div>

      <!-- Ruban (fond plein sans arrière-plan translucide) -->
      <div class="bg-primary-700 text-white">
        <div class="mx-auto max-w-shell px-5">
          <div class="h-11 flex items-center text-[14px] font-medium gap-2">
            <a href="index.php?action=index"><span >🏠</span> Accueil</a>
          </div>
        </div>
      </div>
    </header>

    <!-- ===== MAIN ===== -->
    <main class="flex-1">
      <div class="mx-auto max-w-shell px-5">

        <!-- HERO -->
        <section class="mt-8 md:mt-10">
          <div
            class="mx-auto max-w-[1040px] rounded-[18px] md:rounded-[20px] text-white px-8 md:px-12 py-10 md:py-12 shadow-card"
            style="background: linear-gradient(135deg,#2f66f0 0%, #264fcd 55%, #1b3ea6 100%);">
            <h1 class="flex items-center justify-center gap-3 text-[30px] md:text-[36px] font-extrabold tracking-tight">
              <span class="text-[30px] md:text-[36px]">🔐</span> Connexion
            </h1>
            <p class="mt-2 text-center text-indigo-100/95 text-[15px] md:text-[16px]">
              Accédez à votre espace personnel
            </p>
          </div>
        </section>

        <!-- FORM CARD (descendue, plus de chevauchement) -->
        <section class="grid place-items-center mt-10">
          <form
            class="w-full max-w-[560px] bg-white border border-slate-100 rounded-[20px] shadow-card px-6 md:px-8 py-6 md:py-7">

            <!-- Email -->
            <div class="mb-4">
              <label for="email" class="block text-[13.5px] font-semibold text-slate-700 mb-1">
                <span class="mr-1">📧</span> Adresse email
              </label>
              <input
                id="email"
                type="email"
                placeholder="votre.email@exemple.com"
                class="w-full h-11 rounded-[10px] border border-slate-200 bg-white px-3.5 text-[14px] placeholder:text-slate-400 focus:border-primary-600 focus:ring-0 shadow-input"
              />
            </div>

            <!-- Password -->
            <div class="mb-1.5">
              <label for="password" class="block text-[13.5px] font-semibold text-slate-700 mb-1">
                <span class="mr-1">🔒</span> Mot de passe
              </label>
              <input
                id="password"
                type="password"
                placeholder="Votre mot de passe"
                class="w-full h-11 rounded-[10px] border border-slate-200 bg-white px-3.5 text-[14px] placeholder:text-slate-400 focus:border-primary-600 focus:ring-0 shadow-input"
              />
            </div>

            <!-- Submit -->
            <button
              type="submit"
              class="mt-4 w-full inline-flex items-center justify-center gap-2 h-11 rounded-[10px] font-semibold text-white bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 shadow-btn"
            >
              <span>🛠️</span> Se connecter
            </button>

            <!-- Links -->
            <p class="mt-4 text-center text-[14px] text-slate-600">
              Pas encore de compte ?
              <a href="index.php?action=inscription" class="text-primary-700 font-medium hover:underline">Créer un compte</a>
            </p>
            <p class="mt-2 text-center text-[13px] text-slate-500">
              ← <a href="index.php?action=index" class="hover:underline">Retour à l’accueil</a>
            </p>
          </form>
        </section>
      </div>
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-slate-900 text-slate-200 border-t border-white/10 mt-10">
      <div class="mx-auto max-w-shell px-5 pt-10 pb-9">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div>
            <h5 class="font-semibold mb-2">📑 Gestion des Sanctions</h5>
            <p class="text-sm text-slate-300">
              Application de gestion de la vie scolaire pour le suivi des sanctions et incidents.
            </p>
          </div>
          <div>
            <h5 class="font-semibold mb-2">🔗 Liens utiles</h5>
            <ul class="space-y-1 text-sm text-slate-300">
              <li><a class="hover:text-white" href="#">Documentation</a></li>
              <li><a class="hover:text-white" href="#">Support</a></li>
              <li><a class="hover:text-white" href="#">Contact</a></li>
            </ul>
          </div>
          <div>
            <h5 class="font-semibold mb-2">🧾 Informations</h5>
            <p class="text-sm text-slate-300">
              Développé dans le cadre du BTS SIO – Projet CCF 2025
            </p>
          </div>
        </div>
        <hr class="border-white/10 mt-8 mb-4">
        <p class="text-center text-xs text-slate-400">
          © 2025 Application de Gestion des Sanctions. Tous droits réservés.
        </p>
      </div>
    </footer>

    <!-- Bloquer l’envoi réel -->
    <script>
      document.querySelector("form")?.addEventListener("submit", (e) => e.preventDefault());
    </script>
  </body>
</html>
