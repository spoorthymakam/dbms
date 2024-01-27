$(document).ready(function () {
    // Function to render candidates list
    async function renderCandidates() {
      const candidatesList = $('#candidatesList');
      candidatesList.empty();
  
      try {
        // Fetch candidates from the backend
        const response = await fetch('/api/candidates');
        const candidatesData = await response.json();
  
        candidatesData.forEach(candidate => {
          const candidateItem = $('<div class="candidate-item"></div>');
          candidateItem.append(`<span>${candidate.name}</span>`);
  
          const voteButton = $(`<button class="vote-button" data-name="${candidate.name}">Vote</button>`);
          voteButton.click(function () {
            vote(candidate.name);
          });
  
          const voteCount = $(`<span class="vote-count">${candidate.votes}</span>`);
          candidateItem.append(voteCount);
  
          candidateItem.append(voteButton);
          candidatesList.append(candidateItem);
        });
      } catch (error) {
        console.error('Error fetching candidates:', error);
      }
    }
  
    // Function to handle voting
    async function vote(candidateName) {
      try {
        // Send a request to the backend to update the vote count in MongoDB
        await fetch('/api/vote', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: `candidateName=${encodeURIComponent(candidateName)}`,
        });
  
        // Update the candidates list after voting
        renderCandidates();
      } catch (error) {
        console.error('Error voting:', error);
      }
    }
  
    // Initial render
    renderCandidates();
  });
  