document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');

    let debounceTimeout;

    searchInput.addEventListener('input', () => {
        clearTimeout(debounceTimeout);
        const query = searchInput.value.trim();

        if (query.length > 0) {
            debounceTimeout = setTimeout(() => {
                fetch(`/autocompletion/search?query=${encodeURIComponent(query)}`, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    searchResults.innerHTML = ''; // Efface les anciens résultats
                    if (data.length > 0) {
                        data.forEach(item => {
                            // Création d'un élément pour chaque résultat
                            const resultItem = document.createElement('div');
                            resultItem.className = 'search-result';

                            // Correction : Utilisation de backticks pour une chaîne multi-lignes
                            resultItem.innerHTML = `
                                <div class="result-item">
                                    <img src="./public/img/${item.image_url}" alt="${item.name}" class="result-image">
                                    <div class="result-info">
                                        <h5 class="title_name">${item.name}</h5>
                                    </div>
                                </div>
                            `;

                            // Ajoute un événement de clic pour rediriger vers les détails
                            resultItem.addEventListener('click', () => {
                                window.location.href = `/autocompletion/element?id=${item.id_animal}`;
                            });

                            // Ajoute l'élément au conteneur des résultats
                            searchResults.appendChild(resultItem);
                        });
                    } else {
                        searchResults.innerHTML = '<p>Aucun résultat trouvé.</p>';
                    }
                })
                .catch(error => {
                    console.error('Erreur lors de la récupération des résultats :', error);
                    searchResults.innerHTML = '<p>Une erreur est survenue.</p>';
                });
            }, 300); // Debounce : délai de 300ms
        } else {
            searchResults.innerHTML = ''; // Vide les résultats si aucune saisie
        }
    });
});
