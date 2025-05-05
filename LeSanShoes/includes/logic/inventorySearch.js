let allCards = []; 
let fuse; 

$.ajax({
    url: "../includes/logic/inventoryToDB.php", 
    type: "POST",
    data: {myJson : JSON.stringify({action: 'search'})},
    success: function(data) {
        allCards = data;

    // Initialize Fuse
    fuse = new Fuse(allCards, {
      keys: ['name', 'description'], 
      threshold: 0.4, 
    });

    renderCards(allCards);
    }
});

    /*
fetch('../api/cardsAPI.php')
  .then(response => response.json())
  .then(data => {
    allCards = data;

    // Initialize Fuse
    fuse = new Fuse(allCards, {
      keys: ['name', 'description'], // Search in these fields
      threshold: 0.4, // Lower = stricter match
    });

    renderCards(allCards);
  })
  .catch(error => console.error('Error loading cards:', error));

  */

// Search input listener
document.getElementById('searchInput').addEventListener('input', function () {
  const query = this.value.trim();

  if (query === '') {
    renderCards(allCards); // Show all if search is empty
  } else {
    const results = fuse.search(query).map(result => result.item);
    renderCards(results);
  }
});

// Render cards in the DOM
function renderCards(cards) {
  const container = document.getElementById('cardContainer');
  container.innerHTML = '';

  if (cards.length === 0) {
    container.innerHTML = '<p>No results found.</p>';
    return;
  }

  cards.forEach(card => {
    const html = `
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">${card.name}</h5>
            <p class="card-text">${card.description}</p>
          </div>
        </div>
      </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
  });
}
