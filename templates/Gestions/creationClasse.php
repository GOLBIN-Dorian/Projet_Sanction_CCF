<?php

$title = 'Gestion des Sanctions — creation de classe';
ob_start();

?>




<!-- BANNIÈRE HERO -->
<div class="bg-primary-blue rounded-xl shadow-lg text-white text-center py-16 px-4">
    <div class="flex flex-col items-center justify-center space-y-2">
        <div class="text-5xl mb-2 text-blue-300 opacity-50 absolute" style="margin-top: -60px;">+</div>
        <h2 class="text-4xl font-bold flex items-center gap-3">
            <i class="fa-solid fa-plus text-3xl"></i> Créer une classe
        </h2>
        <p class="text-blue-100 text-lg">Ajoutez une nouvelle classe à votre établissement</p>
    </div>
</div>


<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 max-w-2xl mx-auto">
    <div class="mb-6 border-b border-gray-100 pb-4">
        <h3 class="text-xl font-bold text-gray-900">Informations de la classe</h3>
        <p class="text-gray-500 text-sm mt-1">Renseignez les informations nécessaires pour créer la classe</p>
    </div>

    <form action="#" method="POST" class="space-y-6">

        <div>
            <label for="nom_classe" class="block text-sm font-medium text-gray-700 mb-1">
                Nom de la classe <span class="text-red-500">*</span>
            </label>
            <input type="text" id="nom_classe" placeholder="Ex: Terminale S1, Première ES2, Seconde A"
                class="w-full rounded-md border-gray-300 border px-4 py-2 text-gray-700 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition shadow-sm">
            <p class="text-xs text-gray-500 mt-2">Exemples : Terminale S1, Première ES2, Seconde A</p>
        </div>

        <div>
            <label for="niveau" class="block text-sm font-medium text-gray-700 mb-1">
                Niveau <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <select id="niveau" class="w-full rounded-md border-gray-300 border px-4 py-2 text-gray-900 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition shadow-sm appearance-none bg-white">
                    <option value="" disabled selected>Sélectionnez un niveau</option>
                    <option value="seconde">Seconde</option>
                    <option value="premiere">Première</option>
                    <option value="terminale">Terminale</option>
                    <option value="bts">BTS</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                    <i class="fa-solid fa-chevron-down text-xs"></i>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between gap-4 pt-4">
            <button type="button" class="w-1/2 bg-gray-100 text-gray-700 font-medium py-2.5 px-4 rounded-md hover:bg-gray-200 transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-arrow-left text-sm"></i> Retour à la liste
            </button>
            <button type="submit" class="w-1/2 bg-primary-blue text-white font-medium py-2.5 px-4 rounded-md hover:bg-blue-700 transition flex items-center justify-center gap-2 shadow-md">
                <i class="fa-solid fa-plus text-sm"></i> Créer la classe
            </button>
        </div>
    </form>
</div>

<div class="max-w-2xl mx-auto bg-blue-50 border border-blue-100 rounded-lg p-4 flex gap-3 items-start">
    <div class="mt-0.5">
        <div class="bg-blue-500 rounded-full w-5 h-5 flex items-center justify-center text-white text-xs">
            <i class="fa-solid fa-info"></i>
        </div>
    </div>
    <div>
        <h4 class="text-blue-800 font-medium text-sm flex items-center gap-2">
            <i class="fa-regular fa-lightbulb text-yellow-500"></i> Conseil
        </h4>
        <p class="text-blue-700 text-sm mt-1">
            Une fois la classe créée, vous pourrez y associer des élèves et gérer leurs sanctions.
        </p>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../layout.php';
?>