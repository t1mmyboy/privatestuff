document.addEventListener('DOMContentLoaded', function () {
  const apiUrl = 'https://pokeapi.co/api/v2/pokemon/';
  const numberOfPokemon = 649;

  async function fetchPokemonData() {
    try {
      for (let i = 1; i <= numberOfPokemon; i++) {
        const response = await fetch(`${apiUrl}${i}`);
        const data = await response.json();

        // Create a card element
        const a = document.createElement("a");
        const card = document.createElement('div');
        a.classList.add('pokemon-card');

        // Display the Pokémon name
        const nameElement = document.createElement('h2');
        nameElement.textContent = data.name;
        a.href = "./single.html?id="+i;


        // Display the Pokémon image
        const imageElement = document.createElement('img');
        imageElement.src = data.sprites.front_default;
        imageElement.alt = data.name;
        a.appendChild(card);

        // Append elements to the card
        card.appendChild(nameElement);
        card.appendChild(imageElement);

        // Append the card to the document body
        document.getElementById('pokedex-container').appendChild(a);
      }
    } catch (error) {
      console.error('Error fetching Pokemon data:', error);
    }
  }

  // Initial fetch
  fetchPokemonData();

  // Search functionality
  const searchInput = document.getElementById('search');
  searchInput.addEventListener('input', function () {
    const searchTerm = searchInput.value.toLowerCase();

    // Show/hide cards based on search term
    const cards = document.querySelectorAll('.pokemon-card');
    cards.forEach((a) => {
      const name = a.querySelector('h2').textContent.toLowerCase();
      if (name.includes(searchTerm)) {
        a.style.display = 'block';
      } else {
        a.style.display = 'none';
      }
    });
  });
});
