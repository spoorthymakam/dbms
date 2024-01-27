// Fetch candidates from the backend
axios.get('http://localhost:5000/api/candidates')
  .then(response => {
    const candidatesList = document.getElementById('candidatesList');

    response.data.forEach(candidate => {
      const listItem = document.createElement('li');
      listItem.innerHTML = `
        <span>${candidate.name}</span>
        <button onclick="vote(${candidate.id})">Vote</button>
      `;
      candidatesList.appendChild(listItem);
    });
  })
  .catch(error => {
    console.error('Error fetching candidates:', error);
  });

// Vote for a candidate
function vote(id) {
  axios.post(`http://localhost:5000/api/vote/${id}`)
    .then(response => {
      const updatedVotes = response.data.votes;
      alert(`Vote counted for Candidate ${response.data.name}. Total votes: ${updatedVotes}`);
    })
    .catch(error => {
      console.error('Error voting:', error);
    });
}
